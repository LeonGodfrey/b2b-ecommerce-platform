<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="../index.php" class="brand-link">
    <img src="../images/stockug_white.png" alt="stockUg Logo" class="brand-image" style="opacity: .8">
    <span class="brand-text font-weight-light">.</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?php echo (!empty($sme['photo'])) ? '../images/' . $sme['photo'] : '../images/profile.jpg'; ?>" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?php echo $sme['firstName'].' '.$sme['lastName']; ?></a>
      </div>
    </div>



    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

        <li class="nav-item">
          <a href="home.php" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>
              Orders
              <i class="fas fa-angle-left right"></i>              
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="pending.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Pending Orders</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="confirmed_orders.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Confirmed Orders</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="delivered_orders.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Delivered Orders</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="rejected_orders.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Rejected Orders</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="cancelled_orders.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Orders cancelled</p>
              </a>
            </li>
          </ul>
        
        <li class="nav-item">
          <a href="../logout.php" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>
              logout
            </p>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>