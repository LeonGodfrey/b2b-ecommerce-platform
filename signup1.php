

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
      <p class="login-box-msg">Register a new membership</p>

      <form action="register1.php" method="post">
        <div class="input-group mb-3">          
          <input type="text" class="form-control" name="firstname" placeholder="Firstname" value="<?php echo (isset($_SESSION['firstname'])) ? $_SESSION['firstname'] : '' ?>" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="lastname" placeholder="Lastname" value="<?php echo (isset($_SESSION['lastname'])) ? $_SESSION['lastname'] : '' ?>"  required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo (isset($_SESSION['email'])) ? $_SESSION['email'] : '' ?>" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="telephone" class="form-control" name="tel" placeholder="Contact" value="<?php echo (isset($_SESSION['tel'])) ? $_SESSION['tel'] : '' ?>" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
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
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="repassword" placeholder="Retype password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">          
          <input type="text" class="form-control" name="shopName" placeholder="Business name" value="<?php echo (isset($_SESSION['shopName'])) ? $_SESSION['shopName'] : '' ?>"required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-business-time"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">          
          <textarea class="form-control" name="description" placeholder="Business description" value="<?php echo (isset($_SESSION['description'])) ? $_SESSION['description'] : '' ?>" required></textarea> 
          
        </div>
        <div class="input-group mb-3">          
          <input type="text" class="form-control" name="address" placeholder="Business Lccation" value="<?php echo (isset($_SESSION['address'])) ? $_SESSION['address'] : '' ?>"required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-map-marker"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree" required>
              <label for="agreeTerms">
               I agree to the <a href="terms.php">terms and conditions</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn s-warning btn-block" name="signup">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center">
        <a href="login.php" class="btn btn-block s-warning">
          I already have an account!
        </a>
        
        
        
      </div>
      <a href="index.php"><i class="fas fa-home"></i> Back to Home</a>

      
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
  
<?php include 'includes/scripts.php' ?>
</body>
</html>