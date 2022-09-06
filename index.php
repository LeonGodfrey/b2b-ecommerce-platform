<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body  class="hold-transition layout-top-nav layout-navbar-fixed" onload="myFunction()" style="margin:0;">
<div id="loader"></div>
<div style="display:none;" id="myDiv" class="animate-bottom">
	<div class="wrapper">

		<?php include 'includes/navbar.php'; ?>

		<div style="background-color:#fff;" class="content-wrapper">
			<div class="container">

				<!-- Main content -->
				<section class="content">

					<div class="row">
						<div class='col-xs-12 col-sm-12 col-md-9 col-lg-9'>


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
							
							<!-- carousel start -->


							<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
								<ol class="carousel-indicators">
									<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
									<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
									<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
								</ol>
								<div class="carousel-inner">
									<div class="carousel-item active">
										<img class="d-block w-100" src="images/banner12.jpg" alt="First slide">
									</div>
									<div class="carousel-item">
										<img class="d-block w-100" src="images/banner13.png" alt="Second slide">
									</div>
									<div class="carousel-item">
										<img class="d-block w-100" src="images/banner12.jpg" alt="Third slide">
									</div>
								</div>
								<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
									<span class="carousel-control-custom-icon" aria-hidden="true">
										<i class="fas fa-chevron-left"></i>
									</span>
									<span class="sr-only">Previous</span>
								</a>
								<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
									<span class="carousel-control-custom-icon" aria-hidden="true">
										<i class="fas fa-chevron-right"></i>
									</span>
									<span class="sr-only">Next</span>
								</a>
							</div>

							<!-- carousel end -->
						</div>

						<div class='col-xs-12 col-sm-12 col-md-3 col-lg-3'>
							<div class="card">	             

								<div class="card-body">
									<p style="font-size:20px;">Welcome to stockUg</p>
									<p style="font-size:18px;">A home of all stock distributors!</p>
									<p>Find all you will every need to stock you shop!</p>
																		
								</div>
							</div>
						</div>
					</div>
					<h2 style="text-align: center;" class="dist_list">Our Distributors.</h2>
						
					<div class="row">
					
						<?php
						$month = date('m');
						$conn = $pdo->open();

						try{
							$inc = 2;							    
							$stmt = $conn->prepare("SELECT * from distributor");
							$stmt->execute();
							foreach ($stmt as $row) {
								//$description = (strlen($row['description']) > 30) ? substr_replace($row['prodname'], '...', 27) : $row['prodname'];
								$image = (!empty($row['shopPhoto'])) ? 'images/'.$row['shopPhoto'] : 'images/noimage.jpg';
								$inc = ($inc == 2) ? 1 : $inc + 1;
								if($inc == 1) echo "<div class='row'>";
								echo "
								<div class='col-lg-6'>
								<a style='color:black; background-color:grey;' href='index1.php?supplier=".$row['userIdD']."'>
								<div class='card'>
								<div class='card-body' style='background-color:#fff;' >
								<div class='row'>
								<div  class='col-3 col-xl-3 col-xs-3 col-sm-3 col-md-3 col-lg-3'>
								<img src='".$image."' width='100%' height=auto class='user-image elevation-5'>

								</div>
								<div  class='col-9 col-xl-9 col-xs-9 col-sm-9 col-md-9 col-lg-9'>
								<p style='font-size: 23px'>".$row['shopName']."</p>
								<p>".$row['description']."</p>
								<p>Contact us on <span style='font-size: 13px'><b> ".$row['tel']."</b></span></p>												
								</div>
								</div>													
								</div>
								<div style='' >

								<p style='margin-left:20px;'> <i class='fas fa-map-marker' aria-hidden='true'></i> Located at <span style='font-size: 15px'><b> ".$row['address']."</b></span></p>
								</div>
								</div>
								</a>
								</div>
								";
								if($inc == 2) echo "</div>";
							}
							if($inc == 1) echo "<div class='col-lg-6'></div></div>"; 
							
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
					</div>
	<script>
var myVar;

function myFunction() {
  myVar = setTimeout(showPage, 3000);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv").style.display = "block";
}
</script>

	<?php include 'includes/scripts.php'; ?>
</body>
</html>