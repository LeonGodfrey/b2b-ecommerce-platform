<?php include 'includes/session.php'; ?>
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
								<h1>Contact us</h1>
							</div>
							<div class="col-sm-6">
								<ol class="breadcrumb float-sm-right">
									<li class="breadcrumb-item"><a href="#">Home</a></li>
									<li class="breadcrumb-item active">Contact us</li>
								</ol>
							</div>
						</div>
					</div><!-- /.container-fluid -->
				</section>

				<!-- Main content -->
				<section class="content">


					<!-- Default box -->
					<div class="card">
						<div class="card-body row">
							<div class="col-5 text-center d-flex align-items-center justify-content-center">
								<div class="">
									<h2>stock<strong>Ug</strong></h2>
									<p class="lead mb-5">Makerere University Kampala Uganda<br>
										Phone: +256 753446252
									</p>
								</div>
							</div>
							<div class="col-7">
								<div class="form-group">
									<label for="inputName">Name</label>
									<input type="text" id="inputName" class="form-control" />
								</div>
								<div class="form-group">
									<label for="inputEmail">E-Mail</label>
									<input type="email" id="inputEmail" class="form-control" />
								</div>
								<div class="form-group">
									<label for="inputSubject">Subject</label>
									<input type="text" id="inputSubject" class="form-control" />
								</div>
								<div class="form-group">
									<label for="inputMessage">Message</label>
									<textarea id="inputMessage" class="form-control" rows="4"></textarea>
								</div>
								<div class="form-group">
									<input type="submit" class="btn btn-primary" value="Send message">
								</div>
							</div>
						</div>
					</div>
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