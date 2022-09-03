<?php
	include '../includes/conn.php';
	session_start();

	if(!isset($_SESSION['user']) || trim($_SESSION['user']) == ''){
		header('location: ../index.php');
		exit();
	}

	$conn = $pdo->open();

	$stmt = $conn->prepare("SELECT * FROM sme WHERE userIdS=:id");
	$stmt->execute(['id'=>$_SESSION['user']]);
	$sme = $stmt->fetch();

	$pdo->close();

?>