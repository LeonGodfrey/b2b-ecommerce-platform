<?php
	include 'includes/session.php';
	
	if(isset($_POST['add'])){
		$name = $_POST['name'];		
		$category = $_POST['category'];
		$distributor = $_POST['distributor'];
		$price = $_POST['price'];
		$description = $_POST['description'];
		$filename = $_FILES['photo']['name'];
		$now = date('Y-m-d');

		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM product WHERE productName=:name");
		$stmt->execute(['name'=>$name]);
		$row = $stmt->fetch();

		if($row['numrows'] > 0){
			$_SESSION['error'] = 'Product already exist';
		}
		else{
			if(!empty($filename)){
				$ext = pathinfo($filename, PATHINFO_EXTENSION);
				$new_filename = $name.'dis'.$distributor.'.'.$ext;
				$new_filename = strtolower(str_replace(" ", "_", $new_filename));
				move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$new_filename);	
			}
			else{
				$new_filename = '';
			}

			try{
				$stmt = $conn->prepare("INSERT INTO product (catId, userIdD, productName, description, price, photo, dateCreated) VALUES (:category, :distributor, :name, :description, :price, :photo, :dateCreated)");
				$stmt->execute(['category'=>$category, 'distributor'=>$distributor, 'name'=>$name, 'description'=>$description, 'price'=>$price, 'photo'=>$new_filename, 'dateCreated'=>$now]);
				$_SESSION['success'] = 'Product added successfully';

			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up product form first';
	}

	header('location: products.php');

?>