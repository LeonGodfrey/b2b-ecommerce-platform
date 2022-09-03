<?php
	include 'includes/conn.php';
	session_start();

	if(isset($_SESSION['admin'])){
		header('location: admin/home.php');
	}
	if(isset($_SESSION['supplier'])){
		header('location: supplier/home.php');
	}

	if(isset($_SESSION['user'])){
		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("SELECT * FROM sme WHERE userIdS=:id");
			$stmt->execute(['id'=>$_SESSION['user']]);
			$user = $stmt->fetch();			
		}
		catch(PDOException $e){
			echo "There is some problem in connection: " . $e->getMessage();
		}

		$pdo->close();
	}
?>