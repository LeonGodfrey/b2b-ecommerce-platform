

<!-- Close 2 divs -->

<!-- Navbar -->
<header class="main-header">
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white navbar-fixed">
    <div class="container">
      <a href="index.php" class="navbar-brand">
        <img src="images/stockug_black.png" alt="stockUg Logo" width="180px">
        <!-- <span class="brand-text font-weight-light" style="font-size: 25px;"><span style="color:#ffa500;"><b>stock</b></span>Ug</span> -->
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="index.php" class="nav-link">Home</a>
          </li>          
          <li class="nav-item">
            <a href="contact.php" class="nav-link">Help</a>
          </li>  
          <li class='nav-item'>
            <a href='login1.php' class='nav-link'>Supply with us!</a>
          </li>         
          <li class="nav-item dropdown">
            
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">SUPPLIERS</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              
              <?php
              
              $conn = $pdo->open();
              try{
                $stmt = $conn->prepare("SELECT * FROM distributor");
                $stmt->execute();
                foreach($stmt as $row){
                  echo "
                  <li><a href='distributor.php?distributor=".$row['userIdD']."' class='dropdown-item'><b>".$row['shopName']."</b></a></li>
                  ";                  
                }
              }
              catch(PDOException $e){
                echo "There is some problem in connection: " . $e->getMessage();
              }

              $pdo->close();

              ?>
            </ul>
          </li>
          <?php
          if(isset($_SESSION['user'])){
            echo '

            <li class="nav-item">
            <a href="sme/home.php" class="nav-link"> <i class="nav-icon fas fa-tachometer-alt"></i> Dashboard</a>
            </li>';
          } ?>
        </ul>

        <!-- SEARCH FORM -->
        
        
        <form method="POST" class="navbar-form navbar-left" action="search.php" class="form-inline ml-0 ml-md-3">
          <div class="input-group input-group-sm">
            <input  type="text" class="form-control form-control-navbar" id="navbar-search-input" name="keyword" placeholder="Search for Product" required>
            <div class="input-group-append">
              <button type="submit" class="btn btn-default btn-flat"><i class="fas fa-search"></i> </button>
            </div>
          </div>
        </form>
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Messages Dropdown Menu -->
        <li class="dropdown messages-menu">
          <!-- Menu toggle button -->
          <a href="#" class="nav-link" data-toggle="dropdown">
            <i class="fa fa-shopping-cart"></i>
            <span class="badge badge-warning navbar-badge cart_count"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-header">You have <span class="cart_count"></span> item(s) in cart</span>
            <div class="dropdown-divider"></div>
            <ul style="list-style: none; padding: 0;" id="cart_menu">
            </ul>
            
            
          
        </li>

        

        
        <!-- end user menu -->
        <?php
        if(isset($_SESSION['user'])){
          $image = (!empty($user['photo'])) ? 'images/'.$user['photo'] : 'images/profile.jpg';
          echo '
          <li class="nav-item dropdown user-menu">
          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
          <img src="'.$image.'" class="user-image img-circle elevation-2" alt="User Image">
          <span class="hidden-xs">Profile</span>
          </a>
          <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <!-- User image -->
          <li class="user-header bg-warning">
          <img src="'.$image.'" class="img-circle elevation-2" alt="User Image">

          <p>
          '.$user['firstName'].' '.$user['lastName'].'
          <small>Member since '.date('M. Y', strtotime($user['dateCreated'])).'</small>
          </p>
          </li>
          <li class="user-footer">
          
          <a href="profile.php" class="btn btn-default btn-flat">Profile</a>
          
          <a href="logout.php" class="btn btn-default btn-flat float-right">Sign out</a>
          
          </li>
          </ul>
          </li>
          ';
        }
        else{
          echo "
          <li><a class='nav-link' href='login.php'><b>LOGIN</b></a></li>  
                 
          ";
        }
        ?>

      
      </ul>
    </div>
  </nav>
</header>
  <!-- /.navbar -->