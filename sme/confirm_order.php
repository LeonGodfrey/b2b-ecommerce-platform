<?php
	include 'includes/session.php';
    //confirm order
	if(isset($_POST['confirm'])){
		$id = $_POST['id'];
		
		$conn = $pdo->open();

		try{            
			$stmt = $conn->prepare("UPDATE orders SET status = :status WHERE orderId=:id");
			$stmt->execute([ 'status'=>'confirmed', 'id'=>$id]);

			$_SESSION['success'] = 'Order confirmed!';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();		
	}
	else{
		$_SESSION['error'] = 'Select order to confirm first';		
	}

	header('location: pending.php');
	exit();
	
	
	
?>