<?php
	include '../includes/conn.php';
	session_start();

	if(!isset($_SESSION['supplier']) || trim($_SESSION['supplier']) == ''){
		header('location: ../index.php');
		exit();
	}

	$conn = $pdo->open();

	$stmt = $conn->prepare("SELECT * FROM distributor WHERE userIdD=:id");
	$stmt->execute(['id'=>$_SESSION['supplier']]);
	$supplier = $stmt->fetch();

	$pdo->close();

?>