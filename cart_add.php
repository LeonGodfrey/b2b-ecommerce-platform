<?php
	include 'includes/session.php';

	$conn = $pdo->open();

	$output = array('error'=>false);

	$id = $_POST['id'];
	$quantity = $_POST['quantity'];
	
	if(isset($_SESSION['user'])){
		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM cart WHERE userIdS=:userIdS AND productId=:productId");
		$stmt->execute(['userIdS'=>$user['userIdS'], 'productId'=>$id]);
		$row = $stmt->fetch();
		if($row['numrows'] < 1){
				$stmt1 = $conn->prepare("SELECT userIdD FROM product WHERE productId=:productId");
				$stmt1->execute(['productId'=>$id]);
				$row1 = $stmt1->fetch();
			try{
				$stmt = $conn->prepare("INSERT INTO cart (userIdS, productId, quantity, userIdD) VALUES (:userIdS, :productId, :quantity, :userIdD)");
				$stmt->execute(['userIdS'=>$user['userIdS'], 'productId'=>$id, 'quantity'=>$quantity, 'userIdD'=>$row1['userIdD']]);
				
				$output['message'] = 'Item added to cart';
				
			}
			catch(PDOException $e){
				$output['error'] = true;
				$output['message'] = $e->getMessage();
			}
		}
		else{
			$output['error'] = true;
			$output['message'] = 'Product already in cart';
		}
	}
	else{
		if(!isset($_SESSION['cart'])){
			$_SESSION['cart'] = array();
		}

		$exist = array();

		foreach($_SESSION['cart'] as $row){
			array_push($exist, $row['productid']);//push 
		}

		if(in_array($id, $exist)){
			$output['error'] = true;
			$output['message'] = 'Product already in cart';
		}
		else{
			$data['productid'] = $id;
			$data['quantity'] = $quantity;

			if(array_push($_SESSION['cart'], $data)){
				$output['message'] = 'Item added to cart';
			}
			else{
				$output['error'] = true;
				$output['message'] = 'Cannot add item to cart';
			}
		}

	}

	$pdo->close();
	echo json_encode($output);

?>