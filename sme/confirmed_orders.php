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
            <h1>Confirmed Orders by distributor(s).</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="home.php">Home</a></li>              
              <li class="breadcrumb-item active">orders confirmed</li>
            </ol>
          </div>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      <?php
        if(isset($_SESSION['error'])){
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
          unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>
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
                  
                </thead>
                <tbody>
                  <?php
                    $conn = $pdo->open();                  
                    try{
                      
                      $stmt = $conn->prepare("SELECT * from orders left join distributor on orders.userIdD = distributor.userIdD where orders.userIdS= :id AND orders.status = :status");
                      $stmt->execute(['id'=>$sme['userIdS'],'status'=>'confirmed']);
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
                           </tr> 
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
    <?php include 'includes/order_modal.php'; ?>
    

</div>
<!-- ./wrapper -->

<?php include 'includes/scripts.php'; ?>

<script>
$(function(){
 
  $(document).on('click', '.deliver', function(e){
    e.preventDefault();
    $('#deliver').modal('show');
    var id = $(this).data('id');  
    getRow(id);  
  });


 

});

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
