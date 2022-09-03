


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
      <p class="login-box-msg">Enter email associated with account.</p>
      <form action="reset.php" method="post">

      
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        
        
        
        <div class="row">
          <div class="col-8">
            
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn s-warning btn-block" name="reset">login</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center">
        <a href="login.php" class="btn btn-block s-warning">
          No account? Sign Up.
        </a>
        
        
        
      </div>
      <br>
                   <a href="login.php">I rememberd my password</a><br>
      <a href="index.php"><i class="fas fa-home"></i> Back to Home</a>

      
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
  
<?php include 'includes/scripts.php' ?>
</body>
</html>