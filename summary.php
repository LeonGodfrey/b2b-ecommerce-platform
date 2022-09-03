

<?php include 'includes/session.php'; ?>

<?php
if(!(isset($_SESSION['checkout']))){ 
	header('location: index.php');

}

if(!(isset($_POST['deliver']))){
	
	$_SESSION['error'] = 'Choose a delivery method first!';
	header('location: checkout.php');
	exit();

}else{
	// //get the delivery method
	
		$_SESSION['delivery'] = $_POST['deliver'];
}



?>


<?php include 'includes/header.php'; ?>
<body  class="hold-transition skin-blue layout-top-nav">
	<div class="wrapper">

		<?php include 'includes/navbar.php'; ?>

		<div style="background-color:#fff;" class="content-wrapper">
			<div class="container">

				<!-- Content Header (Page header) -->
				<section class="content-header">
					<div class="container-fluid">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Your Order.</h1>
							</div>
							<div class="col-sm-6">
								<ol class="breadcrumb float-sm-right">
									<li class="breadcrumb-item"><a href="cart_view.php">cart</a></li>
									<li class="breadcrumb-item"><a href="checkout.php">checkout</a></li>
									<li class="breadcrumb-item active">summary</li>
								</ol>
							</div>
						</div>
					</div><!-- /.container-fluid -->
				</section>

				<!-- Main content -->
				<section class="content">

					<div class="container-fluid">
						<div class="row">
							<div class="col-md-12">
								<div class="card card-warning card-outline">
									<div class="card-header">
										<h3 class="card-title">
											<i class="fas fa-check"></i>
											YOUR ORDER
										</h3>
									</div>
									<div class="card-body table-responsive p-0">
										<table class="table table-hover text-nowrap">
											<thead>
												<tr>                  
													<th>Name</th>
													<th>Distributor</th>
													<th>Price</th>
													<th>Quantity</th>
													<th>Subtotal</th>
												</tr>
											</thead>
											<tbody>
												<!-- fech cart -->
												<?php
												$output = ''; 
												try{

													$total = 0;
													$stmt = $conn->prepare("SELECT *, cart.cartId AS cartid, product.photo AS pPhoto FROM cart LEFT JOIN product ON product.productId=cart.productId LEFT JOIN distributor ON distributor.userIdD = product.userIdD WHERE userIdS=:user");

													$stmt->execute(['user'=>$user['userIdS']]);
													foreach($stmt as $row){
														
														$subtotal = $row['price']*$row['quantity'];
														$total += $subtotal;
														$output .= "
														<tr>

														<td>".$row['productName']."</td>
														<td>".$row['shopName']."</td>
														<td>UGX ".number_format($row['price'], 2)."</td>
														<td>".$row['quantity']."</td>

														<td>UGX ".number_format($subtotal, 2)."</td>
														</tr>
														";
													}
													$output .= "
													<tr>
													<td colspan='4' align='right'>Total</td>
													
													<td><b>UGX ".number_format($total, 2)."</b></td>

													</tr>
													";
													echo $output;

													

												}
												catch(PDOException $e){
													$output .= $e->getMessage();
													echo $output;
												}

												?>
												<!-- end cart -->

											</tbody>
										</table>
									</div>
									<!-- /.card -->
								</div>
								<div class="card card-warning card-outline">
									<div class="card-header">
										<h3 class="card-title">
											<i class="fas fa-check"></i>
											YOUR ADDRESS
										</h3>
									</div>
									<div class="card-body">
										<p style="font-size:24px;"><?php echo $user['shopName'];?></p>
										<p>Managed by <?php echo $user['firstName']." ".$user['lastName'];?></p>
										<p><?php echo $user['address'];?></p>
										<p><?php echo $user['email'];?></p>
										<p><?php echo $user['tel'];?></p>

									</div>
									<!-- /.card -->
								</div>            

								<div class="card card-warning card-outline">
									<div class="card-header">
										<h3 class="card-title">
											<i class="fas fa-check"></i>
											PAYMENT METHOD
										</h3>
									</div>
									<div class="card-body">

										<p style="font-size:20px;">Physical payment upon receiving stock.</p>
									</div>
									<!-- /.card -->
								</div>

								<div class="card card-warning card-outline">
									<div class="card-header">
										<h3 class="card-title">
											<i class="fas fa-check"></i>
											DELIVERY METHOD
										</h3>
									</div>
									<div class="card-body">

										<p style="font-size:20px;"> <?php echo $_SESSION['delivery'];?> </p>
									</div>
									<!-- /.card -->
								</div>


								<div class="card s-warning">
									<form action="confirmed.php" method="POST" style="width:100%;">
										
										<center><button type="submit" value="yes" name="placeOrder" class="btn-lg s-warning" style="width:100%;"><b>CONFIRM ORDERS</b></button></center>
										
									</form>
								</div>
							</div>
							<!-- /.card -->
							<?php include 'includes/scroll_btn.php'; ?>
						</section>
						<!-- /.content -->


					</div>
				</div>

				<?php include 'includes/footer.php'; ?>
			</div>

			<?php include 'includes/scripts.php'; 
			unset($_POST['delivery']);
			?>
		</body>
		</html>
	