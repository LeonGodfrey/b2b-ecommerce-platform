<?php include 'includes/session.php'; ?>

<?php include 'includes/header.php'; ?>

<body class="hold-transition skin-blue sidebar-mini sidebar-collapse">
    <div class="wrapper">

        <?php include 'includes/navbar.php'; ?>
        <?php include 'includes/menubar.php'; ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">

                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Invoice</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                <li class="breadcrumb-item active">orders delivered</li>
                                <li class="breadcrumb-item">Invoice</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Main content -->
            <section class="content">
            <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <!-- get the order -->
                <?php 
                if(isset($_POST['order'])){
                    $id = $_POST['order'];
                    $_SESSION['orderId'] = $id;
                    
                    $conn = $pdo->open();
            
                    $stmt = $conn->prepare("SELECT * FROM orders LEFT JOIN sme ON orders.userIdS = sme.userIdS WHERE orderId=:id");
                    $stmt->execute(['id'=>$id]);
                    $row = $stmt->fetch();
                                        
                    $pdo->close();
            
                   
                }
                
                ?>


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                  <img src="../images/stockug_black.png" alt="stockUg Logo" width="200px"  style="opacity: .8">
                    <small class="float-right">Date: <?php echo date('Y/m/d'); ?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong><?php echo $supplier['shopName']; ?></strong><br>
                    <?php echo $supplier['address']; ?><br>
                    
                    Phone: <?php echo $supplier['tel']; ?><br>
                    Email: <?php echo $supplier['email']; ?>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  To
                  <address>
                    <strong><?php echo $row['shopName']; ?></strong><br>
                    <?php echo $row['address']; ?><br>
                    
                    Phone: <?php echo $row['tel']; ?><br>
                    Email: <?php echo $row['email']; ?>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Invoice #0<?php echo(rand(10,1000)); ?></b><br>
                  <br>
                  <b>Order No:</b> <?php echo $row['orderNo']; ?><br>
                  <b>Payment Due:</b> <?php echo $row['delivery_date']; ?><br>
                  
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      
                      <th>Product</th>
                      <th>Qty</th>
                      <th>Price</th>
                      <th>Order Date</th>
                      <th>Order Time</th>
                      <th>Delivery Date</th>
                      <th>Method</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                      
                      <td><?php echo $row['productName']; ?></td>
                      <td><?php echo $row['quantity']; ?></td>
                      <td><?php echo $row['price']; ?></td>
                      <td><?php echo $row['order_date']; ?></td>
                      <td><?php echo $row['order_time']; ?></td>
                      <td><?php echo $row['delivery_date']; ?></td>                      
                      <td>UGX<?php echo $row['delivery']; ?></td>
                    </tr>                   
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  <p class="lead">Payment Methods:</p>
                 
                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                    Physical payments.
                  </p>
                  <p class="lead">Remarks:</p>
                 
                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                   Thank you for stocking with us!            
                  </p>
                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                   We welcome any feedback on how to make our services better!            
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">Amount Due <?php echo $row['delivery_date']; ?></p>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th style="width:50%">Total:</th>
                        <td>UGX <?php echo $row['amount']; ?>.00</td>
                      </tr>
                      
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href="invoice_print.php" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                  
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
            </section>

        </div>
        <?php include 'includes/footer.php'; ?>


    </div>
    <!-- ./wrapper -->

    <?php include 'includes/scripts.php'; ?>


    <!-- table script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": [ /*"copy", "csv", "excel", */ "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
</body>

</html>