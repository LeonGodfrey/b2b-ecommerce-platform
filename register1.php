<?php
	
	include 'includes/session.php';
	
	

	if(isset($_POST['signup'])){
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$tel = $_POST['tel'];
		$address = $_POST['address'];
		$shopName = $_POST['shopName'];		
		$password = $_POST['password'];
		$repassword = $_POST['repassword'];
		$description = $_POST['description'];
		
		//set sessions
		$_SESSION['firstname'] = $firstname;
		$_SESSION['lastname'] = $lastname;
		$_SESSION['email'] = $email;
		$_SESSION['tel'] = $tel;
		$_SESSION['address'] = $address;
		$_SESSION['shopName'] = $shopName;
		$_SESSION['description'] = $description;		

		if($password != $repassword){
			$_SESSION['error'] = 'Passwords did not match';
			header('location: signup.php');
		}
		else{
			//check if email already exists
			
			$conn = $pdo->open();

			$stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM distributor WHERE email = :email");
			$stmt->execute(['email'=>$email]);
			$row = $stmt->fetch();
							

			if($row['numrows'] > 0){
				$_SESSION['error'] = 'Email already taken';
				header('location: signup.php');
			}
			else{
				
				$now = date('Y-m-d');
				//create a password hash
				$password = password_hash($password, PASSWORD_DEFAULT);

				//generate code
				$set='0123456789';
				$code=substr(str_shuffle($set), 0, 5);

				try{
					$stmt = $conn->prepare("INSERT INTO distributor (email, password, firstName, lastName, address, tel, status, dateCreated, shopName, activateCode, description) VALUES (:email, :password, :firstname, :lastname, :address, :tel, :status, :dateCreated, :shopName, :activateCode, :description)");
					$stmt->execute(['email'=>$email, 'password'=>$password, 'firstname'=>$firstname, 'lastname'=>$lastname, 'address'=>$address, 'tel'=>$tel, 'status'=>1, 'dateCreated'=>$now, 'shopName'=>$shopName, 'activateCode'=>$code,'description'=>$description]);

					$userid = $conn->lastInsertId();

					//unset the sessions on login values

					// unset($_SESSION['firstname']);
					// unset($_SESSION['lastname']);
					// unset($_SESSION['email']);
					// unset($_SESSION['address']);
					// unset($_SESSION['tel']);
					// unset($_SESSION['shopName']);
					// unset($_SESSION['description']);
					
					$_SESSION['uid'] = $userid;
					$_SESSION['success'] = 'Account created. Check your email to activate.';
					header('location: activate1.php');
	
				}
				catch(PDOException $e){
					$_SESSION['error'] = $e->getMessage();
					header('location: signup.php');
				}		

				
					
				// 	echo "hello";
				// 	exit();
					// $message = "
					// 	<h2>Thank you for Registering.</h2>
					// 	<p>Your Account:</p>
					// 	<p>Email: ".$email."</p>
					// 	<p>Password: ".$_POST['password']."</p>
					// 	<p>Please click the link below to activate your account.</p>
					// 	<a href='http://localhost/ecommerce/activate.php?code=".$code."&user=".$userid."'>Activate Account</a>
					// ";
					// $to = "ssegodfrey171@gmail.com";
					// $subject = "My subject";
					// $txt = "Hello world!";
					// $headers = "From: webmaster@example.com" . "\r\n" .
					// "CC: ssegodfrey171@gmail.com";
					
					// mail($to,$subject,$txt,$headers);
					// echo "mail sent"
									

				$pdo->close();

			}

		}

	}
	else{
		$_SESSION['error'] = 'Fill up signup form first';
		header('location: signup.php');
	}

?>