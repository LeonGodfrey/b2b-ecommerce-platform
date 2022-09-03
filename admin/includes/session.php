<?php
	include '../includes/conn.php';
	session_start();

	if(isset($_SESSION['user'])){
		header('location: ../sme/home.php');
	}
	if(isset($_SESSION['supplier'])){
		header('location: ../supplier/home.php');
	}

	if(isset($_SESSION['admin'])){
		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("SELECT * FROM admin WHERE userIdA=:id");
			$stmt->execute(['id'=>$_SESSION['admin']]);
			$admin = $stmt->fetch();			
		}
		catch(PDOException $e){
			echo "There is some problem in connection: " . $e->getMessage();
		}

		$pdo->close();
	}
?>