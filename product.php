<?php include 'includes/session.php'; ?>
<?php
$conn = $pdo->open();

$id = $_GET['product'];

try {

	$stmt = $conn->prepare("SELECT *, product.productName AS prodname, category.catName AS catname, product.productId AS prodid FROM product LEFT JOIN category ON category.catId=product.catId WHERE productId = :id");
	$stmt->execute(['id' => $id]);
	$product = $stmt->fetch();
} catch (PDOException $e) {
	echo "There is some problem in connection: " . $e->getMessage();
}


?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition layout-top-nav layout-navbar-fixed">

	<div class="wrapper">

		<?php include 'includes/navbar.php'; ?>

		<div class="content-wrapper">
			<div class="container">

				<!-- Main content -->
				<section class="content">

					<!-- Default box -->
					<div class="card card-solid">
						<div class="card-header">
							<h3 class="d-inline-block"><?php echo $product['prodname']; ?></h3>
						</div>
						<div class="card-body">

							<div class="row">


								<div class="col-12 col-sm-6">

									<div class="col-12">
										<!-- <img src="../../dist/img/prod-1.jpg" class="product-image" alt="Product Image"> -->
										<img src="<?php echo (!empty($product['photo'])) ? 'images/' . $product['photo'] : 'images/noimage.jpg'; ?>" class="product-image" alt="Product Image">
									</div>

								</div>
								<div class="col-12 col-sm-6">

									<h3 class="my-3"><b>Description</b></h3>
									<p><?php echo $product['description']; ?></p>

									<hr>



									<div class="bg-gray py-2 px-3 mt-4">
										<h2 class="mb-0">
											<b>UGX <?php echo number_format($product['price'], 2); ?></b>
										</h2>

									</div>

									<div class="mt-4 col">
										<form class="form-inline" id="productForm">
											<div class="form-group">
												<div class="input-group col-sm-5">

													<span class="input-group-btn">
														<button type="button" id="minus" class="btn btn-default btn-flat btn"><i class="fa fa-minus"></i></button>
													</span>
													<input type="text" size='10' name="quantity" id="quantity" class="form-control input" value="1">
													<span class="input-group-btn">
														<button type="button" id="add" class="btn btn-default btn-flat btn"><i class="fa fa-plus"></i>
														</button>
													</span>
													<input type="hidden" value="<?php echo $product['prodid']; ?>" name="id">
													<input type="hidden" value="<?php echo $product['userIdD']; ?>" name="userIdD">
												</div>
												<br>
												<button type="submit" class="btn s-warning btn-md btn-flat"><i class="fas fa-cart fa-md mr-2"></i> Add to Cart</button>
											</div>
										</form>
										<br>

										<div class="callout" id="callout" style="display:none">
											<button type="button" class="close"><span aria-hidden="true">&times;</span></button>
											<span class="message"></span>
										</div>
									</div>
								</div>



							</div>
						</div>

					</div>
			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->
		<?php include 'includes/scroll_btn.php'; ?>
		</section>

	</div>
	</div>
	<?php $pdo->close(); ?>
	<?php include 'includes/footer.php'; ?>
	</div>

	<?php include 'includes/scripts.php'; ?>
	<script>
		$(function() {
			$('#add').click(function(e) {
				e.preventDefault();
				var quantity = $('#quantity').val();
				quantity++;
				$('#quantity').val(quantity);
			});
			$('#minus').click(function(e) {
				e.preventDefault();
				var quantity = $('#quantity').val();
				if (quantity > 1) {
					quantity--;
				}
				$('#quantity').val(quantity);
			});

		});
	</script>
</body>

</html>