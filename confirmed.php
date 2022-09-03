<?php include 'includes/session.php'; ?>



<?php
if (!(isset($_SESSION['checkout']))) {
	header('location: index.php');
}

//check if order is comfirmed
if (!(isset($_POST['placeOrder']))) {

	header('location: summary.php');
} else {

	$delivery = $_SESSION['delivery']; //get the delivery method




	//cart
	$output1 = "";
	$order_date = date("Y-m-d");
	$order_time = date("h:i:s A");

	try {
		$total = 0;
		$stmt = $conn->prepare("SELECT *, cart.cartId AS cartid FROM cart LEFT JOIN product ON product.productId=cart.productId LEFT JOIN distributor ON distributor.userIdD = product.userIdD WHERE userIdS=:user");

		$stmt->execute(['user' => $user['userIdS']]);
		foreach ($stmt as $row) {
			//send individual orders
			try {
				$amount = $row['price'] * $row['quantity'];
				//generate order number
				$orderNo = "st" . $row['productId'] . "" . date("Ymd") . "" . date("hi");
				//insert into order

				$stmt = $conn->prepare("INSERT INTO orders (amount, orderNo, userIdS, userIdD, status, productName, price, quantity, delivery, order_date, order_time) VALUES (:amount, :orderNo, :userIdS, :userIdD, :status, :productName, :price, :quantity, :delivery, :order_date, :order_time)");

				$stmt->execute(['amount' => $amount, 'orderNo' => $orderNo, 'userIdS' => $user['userIdS'], 'userIdD' => $row['userIdD'], 'status' => 'pending', 'productName' => $row['productName'], 'price' => $row['price'], 'quantity' => $row['quantity'], 'delivery' => $delivery, 'order_date' => $order_date, 'order_time' => $order_time]);
			} catch (PDOException $e) {
				$output1 .= $e->getMessage();
			}

			//delete item from cart
			try {
				$stmt = $conn->prepare("DELETE FROM cart WHERE cartId=:id");
				$stmt->execute(['id' => $row['cartId']]);
			} catch (PDOException $e) {
				$output1 .= $e->getMessage();
			}
		}
	} catch (PDOException $e) {
		$output1 .= $e->getMessage();
		echo $output1;
	}
	//dele

}

unset($_SESSION['delivery']);
unset($_SESSION['checkout']);

?>


<?php include 'includes/header.php'; ?>

<body class="hold-transition skin-blue layout-top-nav">
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

									<li class="breadcrumb-item active">Info</li>
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
											info..
										</h3>
									</div>
									<div class="card-body">

										<p style="font-size:20px;"> Your orders have been placed </p>
										<p>Wait for the distributor to confirm the order(s)</p>
										<h2>Proceed to <a href="sme/home.php" class="st-warning">Dashboard</a> ! or to <a href="index.php" class="st-warning">Home</a>!</h2>
									</div>
									<!-- /.card -->
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

	<?php include 'includes/scripts.php'; ?>
</body>

</html>