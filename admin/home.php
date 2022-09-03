<?php
include 'includes/session.php';
include 'includes/format.php';
?>
<?php
$today = date('Y-m-d');
$year = date('Y');
if (isset($_GET['year'])) {
  $year = $_GET['year'];
}

$conn = $pdo->open();
?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition skin-blue sidebar-mini sidebar-collapse">
  <div class="wrapper">

    <?php include 'includes/navbar.php'; ?>
    <?php include 'includes/menubar.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Administrator's Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <?php
        if (isset($_SESSION['error'])) {
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              " . $_SESSION['error'] . "
            </div>
          ";
          unset($_SESSION['error']);
        }
        if (isset($_SESSION['success'])) {
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              " . $_SESSION['success'] . "
            </div>
          ";
          unset($_SESSION['success']);
        }
        ?>
        <div class="container-fluid">
          <!-- Info boxes -->
          <div class="row">
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-barcode"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">All Products</span>
                  <span class="info-box-number">
                    <?php
                    $stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM product");
                    $stmt->execute();
                    $prow =  $stmt->fetch();
                    echo $prow['numrows'];
                    ?>
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon .bg-dark elevation-1"><i class="fas fa-users"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Clients</span>
                  <span class="info-box-number">
                    <?php
                    $stmt = $conn->prepare("SELECT count(*) as numrows from sme");
                    $stmt->execute([]);
                    $crow = $stmt->fetch();

                    echo $crow['numrows'];
                    ?>
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Distributors</span>
                  <span class="info-box-number">
                    <?php

                    $stmt = $conn->prepare("SELECT count(*) as numrows from distributor");
                    $stmt->execute([]);
                    $drow = $stmt->fetch();

                    echo $drow['numrows'];

                    ?>

                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Admins</span>
                  <span class="info-box-number">
                    <?php
                    $stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM admin");
                    $stmt->execute();
                    $urow =  $stmt->fetch();
                    echo $urow['numrows'];
                    ?>
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->

          <!-- chart -->
          <div class="row">

          
            <div class="col-md-6">
              <!-- Info Boxes Style 2 -->
              <div class="info-box mb-3 bg-success">
                <span class="info-box-icon"><i class="fas fa-check"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Delivered Orders</span>
                  <span class="info-box-number">
                    <?php
                    $stmt = $conn->prepare("SELECT count(*) as numrows from orders where status = :status");
                    $stmt->execute(['status' => 'delivered']);
                    $derow = $stmt->fetch();
                    echo $derow['numrows'];
                    ?>
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- Info Boxes Style 2 -->
              <div class="info-box mb-3" style="background-color: lightgreen;">
                <span class="info-box-icon"><i class="fas fa-thumbs-up"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">All Orders</span>
                  <span class="info-box-number">
                    <?php
                    $stmt = $conn->prepare("SELECT count(*) as numrows from orders");
                    $stmt->execute([]);
                    $crow = $stmt->fetch();

                    echo $crow['numrows'];
                    ?>
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              
            </div>
              

            
            <div class="col-md-6">

              
              <!-- /.info-box -->
              <div class="info-box mb-3" style="background-color: #ffcccb;">
                <span class="info-box-icon"><i class="fa fa-times"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Rejected orders by Distributors</span>
                  <span class="info-box-number">
                    <?php
                    $stmt = $conn->prepare("SELECT count(*) as numrows from orders where status = :status");
                    $stmt->execute(['status' => 'rejected']);
                    $penrow = $stmt->fetch();

                    echo $penrow['numrows'];
                    ?>
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>

              <!-- /.info-box -->
              <div class="info-box mb-3 bg-danger">
                <span class="info-box-icon"><i class="fas fa-times"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Cancelled orders by Clients</span>
                  <span class="info-box-number">
                    <?php
                    $stmt = $conn->prepare("SELECT count(*) as numrows from orders where status = :status");
                    $stmt->execute(['status' => 'cancelled']);
                    $rrow = $stmt->fetch();

                    echo $rrow['numrows'];
                    ?>
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->


            </div>
            <!-- /.col (RIGHT) -->
          </div>
          <!-- /.row -->

        </div>
        <!-- /.row -->

        <!-- end chart -->


        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <div class="col-md-12">


            <!-- TABLE: LATEST ORDERS -->
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">New Clients</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">

                    </tbody>

                    <thead>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Business</th>
                      <th>Email</th>
                      <th>Address</th>
                      <th>Phone</th>
                      <th>Active</th>
                      
                    </thead>
                    <tbody>
                      <?php
                      $conn = $pdo->open();
                      try {

                        $stmt = $conn->prepare("SELECT * from sme where status=:status order by dateCreated desc limit 5");
                        $stmt->execute(['status' => 1]);
                        foreach ($stmt as $row) {

                          echo "
                          <tr>
                            <td>" . $row['firstName'] . "</td>
                            <td>" . $row['lastName'] . "</td>
                            <td>" . $row['shopName'] . "</td>
                            <td>" . $row['email'] . "</td>
                            <td>" . $row['address'] . "</td>
                            <td>" . $row['tel'] . "</td>                           
                            <td><span class='badge badge-warning'>Active</span></td>
                            
                        ";
                        }
                      } catch (PDOException $e) {
                        echo $e->getMessage();
                      }

                      $pdo->close();
                      ?>
                    </tbody>

                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <a href="pending.php" class="btn btn-sm btn-secondary float-right">All clients</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->

          -



          <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <?php include 'includes/footer.php'; ?>
  </div>
  <!-- ./wrapper -->

  <?php include 'includes/scripts.php'; ?>
  



</body>

</html>