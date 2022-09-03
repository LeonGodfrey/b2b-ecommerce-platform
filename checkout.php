<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body  class="hold-transition layout-top-nav layout-navbar-fixed">
	<div class="wrapper">

		<?php include 'includes/navbar.php'; 
    $_SESSION['checkout'] = 'checkout';
    ?>

		<div style="background-color:#fff;" class="content-wrapper">
			<div class="container">

				<!-- Content Header (Page header) -->
				<section class="content-header">
					<div class="container-fluid">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Checkout</h1>
							</div>
							<div class="col-sm-6">
								<ol class="breadcrumb float-sm-right">
									<li class="breadcrumb-item"><a href="cart_view.php">cart</a></li>
									<li class="breadcrumb-item active">checkout</li>
								</ol>
							</div>
						</div>
					</div><!-- /.container-fluid -->
				</section>

				<!-- Main content -->
				<section class="content">

					 <div class="container-fluid">
            <?php
      if(isset($_SESSION['error'])){
        echo "
          <div class='callout callout-danger text-center s-danger'>
            <p>".$_SESSION['error']."</p> 
          </div>
        ";
        unset($_SESSION['error']);
      }

     
    ?>
        <div class="row">

          
          <div class="col-md-12">
            <div class="card card-warning card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-check"></i>
                  ADDRESS DETAILS
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
               
               <p style="font-size:20px;">Payments are upon agreement between the distributor and client!</p>
              </div>
              <!-- /.card -->
              </div>

              <div class="card card-warning card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-edit"></i>
                  SELECT A DELIVERY METHOD
                </h3>
              </div>
              <div class="card-body">
               
                
                <form action="summary.php" method="post" >
                  <div class="row">
                    <div class="col-sm-6">

                <div class="form-group">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="deliver" value="deliver">
                          <label class="form-check-label"><b>Distributor delivery?</b> your stock will be delivered by the distributor and charges may apply!</label>
                        </div>
                        <div class='dropdown-divider'></div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="deliver" value="pickup">
                          <label class="form-check-label"><b>Pickup?</b> You will pickup your stock from the distributor.</label>
                        </div>
                        <br>

                        <button type="submit" value="yes" name="continue" class="btn-lg s-warning"><b>PROCEED TO SUMMARY</b></button>
                        
                      </div>
                      </div>
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