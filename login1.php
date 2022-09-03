




<?php include 'includes/session.php'; ?>
<?php
  if(isset($_SESSION['user'])){
    header('location: cart_view.php');
  }  

?>
<?php include 'includes/header.php'; ?>

<!-- start form -->
<body class="hold-transition register-page">
<div class="register-box">
  <?php
      if(isset($_SESSION['error'])){
        echo "
          <div class='callout callout-danger text-center s-danger'>
            <p>".$_SESSION['error']."</p> 
          </div>
        ";
        unset($_SESSION['error']);
      }

      if(isset($_SESSION['success'])){
        echo "
          <div class='callout callout-success text-center s-success'>
            <p>".$_SESSION['success']."</p> 
          </div>
        ";
        unset($_SESSION['success']);
      }
    ?>
  <div class="card card-outline card-warning">
    <div class="card-header text-center">
      <a href="index.html" class="h1"><b>stock</b>Ug</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Distributor or Supplier Sign In!</p>
      <form action="verify1.php" method="post">

      
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo (isset($_SESSION['email'])) ? $_SESSION['email'] : '' ?>" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-8">
            
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn s-warning btn-block" name="login">login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center">
        <a href="signup1.php" class="btn btn-block s-warning">
          No account? Sign Up.
        </a>
        
        
        
      </div>
      <br>
                    <a href="password_forgot.php">I forgot my password</a><br>
      <a href="index.php"><i class="fas fa-home"></i> Back to Home</a>

      
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
  
<?php include 'includes/scripts.php' ?>
</body>
</html>