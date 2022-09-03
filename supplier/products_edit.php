<?php
	include 'includes/session.php';
	

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$name = $_POST['name'];		
		$category = $_POST['category'];
		$price = $_POST['price'];
		$description = $_POST['description'];

		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("UPDATE product SET productName=:name, catId=:category, price=:price, description=:description WHERE productId=:id");
			$stmt->execute(['name'=>$name, 'category'=>$category, 'price'=>$price, 'description'=>$description, 'id'=>$id]);
			$_SESSION['success'] = 'Product updated successfully';
		}
		catch(PDOException $e){
			$_SESSION['error'] = $e->getMessage();
		}
		
		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up edit product form first';
	}

	header('location: products.php');

?>