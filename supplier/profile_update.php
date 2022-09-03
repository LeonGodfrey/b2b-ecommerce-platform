<?php
	include 'includes/session.php';

	if(isset($_GET['return'])){
		$return = $_GET['return'];
		
	}
	else{
		$return = 'home.php';
	}

	if(isset($_POST['save'])){
		$curr_password = $_POST['curr_password'];
		$email = $_POST['email'];
		$tel = $_POST['tel'];
		$password = $_POST['password'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$photo = $_FILES['photo']['name'];
		//shop
		$address = $_POST['address'];
		$shopName = $_POST['shopName'];
		$description = $_POST['description'];		
		$shopPhoto = $_FILES['shopPhoto']['name'];
		if(password_verify($curr_password, $supplier['password'])){
			if(!empty($photo)){ //upload user photo
				move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$photo);
				$filename = $photo;	
			}
			else{
				$filename = $supplier['photo'];
			}
			//upload shoplogo
			if(!empty($shopPhoto)){
				move_uploaded_file($_FILES['shopPhoto']['tmp_name'], '../images/'.$shopPhoto);
				$filename1 = $shopPhoto;	
			}
			else{
				$filename1 = $supplier['shopPhoto'];
			}



			if($password == $supplier['password']){
				$password = $supplier['password'];
			}
			else{
				$password = password_hash($password, PASSWORD_DEFAULT);
			}

			$conn = $pdo->open();

			try{
				$stmt = $conn->prepare("UPDATE distributor SET email=:email, password=:password, firstName=:firstname, lastName=:lastname, photo=:photo, tel=:tel, shopName=:shopName, address=:address, description=:description, shopPhoto=:shopPhoto   WHERE userIdD=:id");
				$stmt->execute(['email'=>$email, 'password'=>$password, 'firstname'=>$firstname, 'lastname'=>$lastname, 'photo'=>$filename, 'tel'=>$tel, 'shopName'=>$shopName, 'address'=>$address, 'description'=>$description, 'shopPhoto'=>$filename1, 'id'=>$supplier['userIdD']]);

				$_SESSION['success'] = 'Account updated successfully';
			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}

			$pdo->close();
			
		}
		else{
			$_SESSION['error'] = 'Incorrect password';
		}
	}
	else{
		$_SESSION['error'] = 'Fill up required details first';
	}

	header('location:'.$return);

?>