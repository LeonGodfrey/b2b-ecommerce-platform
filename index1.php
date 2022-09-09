<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition layout-top-nav layout-navbar-fixed">
	<div class="wrapper">

		<?php include 'includes/navbar.php'; ?>

		<?php
		$conn = $pdo->open();

		$id = $_GET['supplier'];

		try{

			$stmt = $conn->prepare("SELECT * FROM product WHERE userIdD = :id");
			$stmt->execute(['id' => $id]);
			$product = $stmt->fetch();

		}
		catch(PDOException $e){
			echo "There is some problem in connection: " . $e->getMessage();
		}	

		try{

			$stmt1 = $conn->prepare("SELECT * FROM distributor WHERE userIdD = :id");
			$stmt1->execute(['id' => $id]);
			$shop = $stmt1->fetch();

		}
		catch(PDOException $e){
			echo "There is some problem in connection: " . $e->getMessage();
		}	


		?>

		<div style="background-color:#fff;" class="content-wrapper">
			<div class="container">

				<!-- Main content -->
				<section class="content">

					<div class="row">	        	
						<?php
						if(isset($_SESSION['error'])){
							echo "
							<div class='alert alert-danger'>
							".$_SESSION['error']."
							</div>
							";
							unset($_SESSION['error']);
						}
						?>


						<!-- Default box -->
						<br>
						<div class="card col-12">
							<div class="card-header">
								<center><h2><?php echo $shop['shopName'];?></h2></center>
							</div>
							<div class="card-body">
								<center><p style="color:green; font-size:15px;"><?php echo $shop['description'];?>.</p></center>

							</div>
						</div>


					<!-- <div class='row'>
						<div class='col-xs-6 col-sm-4 col-md-3 col-lg-2'>hello</div>
						<div class='col-xs-6 col-sm-4 col-md-3 col-lg-2'>hello</div>
						<div class='col-xs-6 col-sm-4 col-md-3 col-lg-2'>hello</div>
						<div class='col-xs-6 col-sm-4 col-md-3 col-lg-2'>hello</div>
						<div class='col-xs-6 col-sm-4 col-md-3 col-lg-2'>hello</div>
						<div class='col-xs-6 col-sm-4 col-md-3 col-lg-2'>hello</div>
					</div> -->
					
					<?php
					$month = date('m');
					$conn = $pdo->open();

					try{
						$id = $_GET['supplier'];
						$inc = 6;								    

						$stmt = $conn->prepare("SELECT * FROM product WHERE userIdD = :id");
						$stmt->execute(['id' => $id]);

						foreach ($stmt as $row) {
							$name = (strlen($row['productName']) > 19) ? substr_replace($row['productName'], '..', 19) : $row['productName'];
							$image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
							$inc = ($inc == 6) ? 1 : $inc + 1;
							if($inc == 1) echo "<div class='row'>";
							echo "
							<div class='col-6 col-xs-6 col-sm-4 col-md-3 col-lg-2'>
							<a style='color:black;' href='product.php?product=".$row['productId']."'>
							
							<div class='card'>
							<div class='card-header'>
							<p>".$name."</p>
							</div>	
							<div class='card-body'>																				
							<img src='".$image."' width='100%' height='auto'>

							</div>
							<div class='card-footer'>
							<b>UGX. ".number_format($row['price'], 2)."</b>
							</div>
							</div>
							</a>
							</div>
							";
							if($inc == 6) echo "</div>";


						}
						if($inc == 1) echo "<div class='col-6 col-xs-6 col-sm-4 col-md-3 col-lg-2'></div><div class='col-6 col-xs-6 col-sm-4 col-md-3 col-lg-2'></div><div class='col-6 col-xs-6 col-sm-4 col-md-3 col-lg-2'></div><div class='col-xs-6 col-sm-4 col-md-3 col-lg-2'></div><div class='col-6 col-xs-6 col-sm-4 col-md-3 col-lg-2'></div></div>"; 
						if($inc == 2) echo "<div class='col-6 col-xs-6 col-sm-4 col-md-3 col-lg-2'></div><div class='col-6 col-xs-6 col-sm-4 col-md-3 col-lg-2'></div><div class='col-6 col-xs-6 col-sm-4 col-md-3 col-lg-2'></div><div class='col-6 col-xs-6 col-sm-4 col-md-3 col-lg-2'></div></div>";
						if($inc == 3) echo "<div class='col-xs-6 col-sm-4 col-md-3 col-lg-2'></div><div class='col-6 col-xs-6 col-sm-4 col-md-3 col-lg-2'></div><div class='col-xs-6 col-sm-4 col-md-3 col-lg-2'></div></div>";
						if($inc == 4) echo "<div class='col-6 col-xs-6 col-sm-4 col-md-3 col-lg-2'></div><div class='col-6 col-xs-6 col-sm-4 col-md-3 col-lg-2'></div></div>";
						if($inc == 5) echo "<div class='col-6 col-xs-6 col-sm-4 col-md-3 col-lg-2'></div></div>";
					}
					catch(PDOException $e){
						echo "There is some problem in connection: " . $e->getMessage();
					}

					$pdo->close();

					?> 	        	     	
				</div>
				<?php include 'includes/scroll_btn.php'; ?>
			</section>

		</div>
	</div>

	<?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
</body>
</html>