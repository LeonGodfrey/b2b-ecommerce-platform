

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="home.php" class="nav-link">Home</a>
      </li>
      
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">        
         
      
      <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
          <img src="<?php echo (!empty($supplier['shopPhoto'])) ? '../images/'.$supplier['shopPhoto'] : '../images/profile.jpg'; ?>" class="user-image img-circle elevation-2" alt="User Image">
            <span class="hidden-xs">Edit your business details</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <!-- User image -->
          <li class="user-header bg-primary">
            <img src="<?php echo (!empty($supplier['shopPhoto'])) ? '../images/'.$supplier['shopPhoto'] : '../images/profile.jpg'; ?>" class="img-circle elevation-2" alt="User Image">

              <p>              
                <?php echo $supplier['shopName']; ?>
                <small>Member since <?php echo date('M. Y', strtotime($supplier['dateCreated'])); ?></small>
              </p>
          </li>
          <!-- Menu Body -->
          <li class="user-body">
            
          </li>
          <!-- Menu Footer-->
          <li class="user-footer">
            
                <a href="#profile" data-toggle="modal" class="btn btn-default btn-flat" id="admin_profile">Update</a>
              
                <a href="../logout.php" class="btn btn-default btn-flat float-right">Sign out</a>
              
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
     
    </ul>
  </nav>
  <!-- /.navbar -->


<?php include 'includes/profile_modal.php'; ?>