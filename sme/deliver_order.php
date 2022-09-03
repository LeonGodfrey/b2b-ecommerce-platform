<?php
	include 'includes/session.php';
    //confirm order
	if(isset($_POST['deliver'])){
		$id = $_POST['id'];
		$delivery_date = date('Y-m-d');
		
		$conn = $pdo->open();

		try{            
			$stmt = $conn->prepare("UPDATE orders SET status = :status, delivery_date = :delivery_date WHERE orderId=:id");
			$stmt->execute([ 'status'=>'delivered', 'delivery_date'=>$delivery_date, 'id'=>$id]);

			$_SESSION['success'] = 'Order delivered!';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();		
	}
	else{
		$_SESSION['error'] = 'Select order you delivered first!';		
	}

	header('location: confirmed_orders.php');
	exit();
	
	
	
?>