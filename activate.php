<?php include 'includes/session.php'; ?>
<?php
	if(isset($_POST['activate'])){
	
	
		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM user WHERE activateCode=:code AND userId=:id");
		$stmt->execute(['code'=>$_POST['code'], 'id'=>$_POST['uid']]);
		$row = $stmt->fetch();

		if($row['numrows'] > 0){
			if($row['status']){							
				$_SESSION['error'] = 'Account already activated, Login!';
				header('location: login.php');
			}
			else{
				try{
					$stmt = $conn->prepare("UPDATE user SET status=:status WHERE userId=:id");
					$stmt->execute(['status'=>1, 'id'=>$row['userId']]);
					
					$_SESSION['success'] = 'Account Activated, Login!.';
				     header('location: login.php');
				}
				catch(PDOException $e){
					$_SESSION['error'] = $e->getMessage();
				 	header('location: activate1.php');
				}

			}
			
		}
		else{
		
			$_SESSION['error'] = "Cannot activate account. Wrong code.";
			header('location: activate1.php');
		}

		$pdo->close();
	}else{
		$_SESSION['error'] = "Please Enter activation code.";
		header('location: activate1.php');

	}
