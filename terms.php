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
								<h1>Terms and Conditions.</h1>
							</div>
							<div class="col-sm-6">
								<ol class="breadcrumb float-sm-right">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									
									<li class="breadcrumb-item active">Terms</li>
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
                 Read the following terms and Conditions.
                </h3>
              </div>
              <div class="card-body">
               <h3>Payments</h3>
                <div class="text-muted mt-3">
                 
                  Payments are made on delivery or at pick up only.
                </div>
              </div>
              <!-- /.card -->
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