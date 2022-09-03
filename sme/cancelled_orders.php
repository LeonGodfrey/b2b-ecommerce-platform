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
            <h1>Orders cancelled by you!</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home.php">Home</a></li>              
              <li class="breadcrumb-item active">orders cancelled</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      
      <div class="row">
        <div class="col-12">
          <div class="card">
              
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <th>Order No.</th>
                  <th>Distributor</th>
                  <th>Product</th>                  
                  <th>Quantity</th>
                  <th>Delivery</th>
                  <th>date</th>
                  <th>Time</th>                  
                  <th>Comment</th>
                </thead>
                <tbody>
                  <?php
                    $conn = $pdo->open();                  
                    try{
                      
                      $stmt = $conn->prepare("SELECT * from orders left join distributor on orders.userIdD = distributor.userIdD where orders.userIdS= :id AND orders.status = :status");
                        $stmt->execute(['id'=>$sme['userIdS'], 'status'=>'cancelled']);
                      foreach($stmt as $row){
                        
                        echo "
                          <tr>
                            <td>".$row['orderNo']."</td>
                            <td>".$row['shopName']."</td>
                            <td>".$row['productName']."</td>
                            <td>".$row['quantity']."</td>
                            <td>".$row['delivery']."</td>
                            <td>".$row['order_date']."</td>
                            <td>".$row['order_time']."</td>
                            <td>".$row['cancelComment']."</td>
                            
                        ";
                      }
                    }
                    catch(PDOException $e){
                      echo $e->getMessage();
                    }

                    $pdo->close();
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div> 
    </section>
     
  </div>
  	<?php include 'includes/footer.php'; ?>
        

</div>
<!-- ./wrapper -->

<?php include 'includes/scripts.php'; ?>

<script>


function getRow(id){
  $.ajax({
    type: 'POST',
    url: 'order_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
     
      $('.name').html(response.orderNo);
      $('.orderId').val(response.orderId);
      
    }
  });
}

// function pageRedirect() {
//       window.location.href = "invoice.php";
//     }
</script>


<!-- table script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": [/*"copy", "csv", "excel", */"pdf", "print", "colvis"]
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
