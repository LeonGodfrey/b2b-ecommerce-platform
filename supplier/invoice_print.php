<?php include 'includes/session.php'; ?>

<?php include 'includes/header.php'; ?>

<?php
if (isset($_SESSION['orderId'])) {
    $id =  $_SESSION['orderId'];
    

    $conn = $pdo->open();

    $stmt = $conn->prepare("SELECT * FROM orders LEFT JOIN sme ON orders.userIdS = sme.userIdS WHERE orderId=:id");
    $stmt->execute(['id' => $id]);
    $row = $stmt->fetch();

    $pdo->close();
    unset($_SESSION['orderId']);
}

?>


<body>
    <div class="wrapper">
        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-12">
                    <h2 class="page-header">
                    <img src="../images/stockug_black.png" alt="stockUg Logo" width="200px"  style="opacity: .8">
                        <small class="float-right">Date: <?php echo date('Y/m/d'); ?></small>
                    </h2>
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
                    <b>Invoice #0<?php echo (rand(10, 1000)); ?></b><br>
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
                                <td><?php echo $row['delivery']; ?></td>
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
        </section>
        <!-- /.content -->
    </div>
    <!-- ./wrapper -->
    <!-- Page specific script -->
    <script>
        window.addEventListener("load", window.print());
    </script>
</body>

</html>