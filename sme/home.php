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
              <h1 class="m-0"><?php echo $sme['shopName']; ?></h1>
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
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Distributors</span>
                  <span class="info-box-number">
                    <?php
                    $stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM distributor");
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
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-check"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Delivered Ordes</span>
                  <span class="info-box-number">
                    <?php
                    $stmt = $conn->prepare("SELECT count(*) as numrows from orders where userIdS= :id AND status = :status");
                    $stmt->execute(['id' => $sme['userIdS'], 'status' => 'delivered']);
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

            <!-- fix for small devices only -->
            <div class="clearfix hidden-md-up"></div>

            <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Total Cash spent</span>
                  <span class="info-box-number">UGX
                    <?php

                    $stmt = $conn->prepare("SELECT sum(amount) as sales from orders where userIdS= :id AND status = :status");
                    $stmt->execute(['id' => $sme['userIdS'], 'status' => 'delivered']);
                    $total = $stmt->fetch();

                    $total1 = number_format_short($total['sales'], 2);
                    echo $total1;

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
                  <span class="info-box-text">Other Clients</span>
                  <span class="info-box-number">
                    <?php
                    $stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM sme");
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


              <!-- DONUT CHART -->
              <div class="card card-danger">
                <div class="card-header">
                  <h3 class="card-title">Clients' Orders</h3>

                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <div class="card-body">
                  <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->



            </div>
            <div class="col-md-6">

              <!-- Info Boxes Style 2 -->
              <div class="info-box mb-3 bg-success">
                <span class="info-box-icon"><i class="fas fa-check"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Delivered Orders</span>
                  <span class="info-box-number">
                    <?php
                    $stmt = $conn->prepare("SELECT count(*) as numrows from orders where userIdS= :id AND status = :status");
                    $stmt->execute(['id' => $sme['userIdS'], 'status' => 'delivered']);
                    $derow = $stmt->fetch();

                    echo $derow['numrows'];
                    ?>
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- Info Boxes Style 2 -->
              <div class="info-box mb-3 bg-warning">
                <span class="info-box-icon"><i class="fas fa-thumbs-up"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Confirmed Orders</span>
                  <span class="info-box-number">
                    <?php
                    $stmt = $conn->prepare("SELECT count(*) as numrows from orders where userIdS= :id AND status = :status");
                    $stmt->execute(['id' => $sme['userIdS'], 'status' => 'confirmed']);
                    $crow = $stmt->fetch();

                    echo $crow['numrows'];
                    ?>
                  </span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
              <div class="info-box mb-3 bg-info">
                <span class="info-box-icon"><i class="fa fa-tag"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Pending</span>
                  <span class="info-box-number">
                    <?php
                    $stmt = $conn->prepare("SELECT count(*) as numrows from orders where userIdS= :id AND status = :status");
                    $stmt->execute(['id' => $sme['userIdS'], 'status' => 'pending']);
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
                  <span class="info-box-text">Rejected Orders</span>
                  <span class="info-box-number">
                    <?php
                    $stmt = $conn->prepare("SELECT count(*) as numrows from orders where userIdS= :id AND status = :status");
                    $stmt->execute(['id' => $sme['userIdS'], 'status' => 'delivered']);
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
                <h3 class="card-title">Latest Orders</h3>

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
                      <th>Order No.</th>
                      <th>Client</th>
                      <th>Product</th>
                      <th>Quantity</th>
                      <th>Delivery</th>
                      <th>date</th>
                      <th>Time</th>
                      <th>Status</th>
                    </thead>
                    <tbody>
                      <?php
                      $conn = $pdo->open();
                      try {

                        $stmt = $conn->prepare("SELECT * from orders left join sme on orders.userIdS = sme.userIdS where orders.userIdS= :id AND orders.status = :status");
                        $stmt->execute(['id' => $sme['userIdS'], 'status' => 'confirmed']);
                        foreach ($stmt as $row) {

                          echo "
                          <tr>
                            <td>" . $row['orderNo'] . "</td>
                            <td>" . $row['shopName'] . "</td>
                            <td>" . $row['productName'] . "</td>
                            <td>" . $row['quantity'] . "</td>
                            <td>" . $row['delivery'] . "</td>
                            <td>" . $row['order_date'] . "</td>
                            <td>" . $row['order_time'] . "</td>
                            <td><span class='badge badge-warning'>confirmed</span></td>
                            
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
                <a href="pending.php" class="btn btn-sm btn-secondary float-right">View All Orders</a>
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
  <?php
  $data = [];
  //get rejected orders.
  $stmt = $conn->prepare("SELECT COUNT(orderId) as numrows from orders where orders.userIdS= :id AND status = :status");
  $stmt->execute(['id' => $sme['userIdS'], 'status' => 'rejected']);
  $row = $stmt->fetch();
  array_push($data, $row['numrows']);

  //get delivered orders.
  $stmt3 = $conn->prepare("SELECT COUNT(orderId) as numrows from orders where orders.userIdS= :id AND status = :status");
  $stmt3->execute(['id' => $sme['userIdS'], 'status' => 'delivered']);
  $row3 = $stmt3->fetch();
  array_push($data, $row3['numrows']);

  //get confirmed orders.
  $stmt1 = $conn->prepare("SELECT COUNT(orderId) as numrows from orders where orders.userIdS= :id AND status = :status");
  $stmt1->execute(['id' => $sme['userIdS'], 'status' => 'confirmed']);
  $row1 = $stmt1->fetch();
  array_push($data, $row1['numrows']);

  //get pending orders.
  $stmt2 = $conn->prepare("SELECT COUNT(orderId) as numrows from orders where orders.userIdS= :id AND status = :status");
  $stmt2->execute(['id' => $sme['userIdS'], 'status' => 'pending']);
  $row2 = $stmt2->fetch();
  array_push($data, $row2['numrows']);

  $data1 = json_encode($data);

  ?>


  <script>
    $(function() {

      var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
      var donutData = {
        labels: [
          'rejected',
          'delivered',
          'confirmed',
          'pending',
        ],
        datasets: [{
          data: <?php echo $data1; ?>,
          backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef'],
        }]
      }
      var donutOptions = {
        maintainAspectRatio: false,
        responsive: true,
      }
      //Create pie or douhnut chart
      // You can switch between pie and douhnut using the method below.
      new Chart(donutChartCanvas, {
        type: 'doughnut',
        data: donutData,
        options: donutOptions
      })



    })
  </script>


</body>

</html>