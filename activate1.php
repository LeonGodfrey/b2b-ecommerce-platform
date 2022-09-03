




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
      <p class="login-box-msg">Enter your activation code!</p>
      <form action="reset.php" method="post">

      
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="code" placeholder="Activation Code" value="" required>
            <input type="text" class="" name="uid"  value="<?php echo $_SESSION[uid];?>" hidden>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-code"></span>
            </div>
          </div>
        </div>
        
        
        
        <div class="row">
          <div class="col-8">
            
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn s-warning btn-block" name="activate">Activate</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

     
        
        
      
      <br>
                   <a href="login.php">I already have a membership</a><br>
      <a href="index.php"><i class="fas fa-home"></i> Back to Home</a>

      
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
  
<?php include 'includes/scripts.php' ?>
</body>
</html>