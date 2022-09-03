<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		
		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("DELETE FROM sme WHERE userIdS=:id");
			$stmt->execute(['id'=>$id]);

			$_SESSION['success'] = 'Client deleted successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Select Client to delete first';
	}

	header('location: clients.php');
	
?>