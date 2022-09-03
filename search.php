<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition layout-top-nav layout-navbar-fixed">
<div class="wrapper">

	<?php include 'includes/navbar.php'; ?>
	 
	  <div class="content-wrapper">
	    <div class="container">

	      <!-- Main content -->
	      <section class="content">
	        
	        	
	            <?php
	       			
	       			$conn = $pdo->open();

	       			$stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM product WHERE productName LIKE :keyword");
	       			$stmt->execute(['keyword' => '%'.$_POST['keyword'].'%']);
	       			$row = $stmt->fetch();
	       			if($row['numrows'] < 1){
	       				echo '<h1 class="page-header">No results found for <i>'.$_POST['keyword'].'</i></h1>';
	       			}
	       			else{
	       				echo '<h1 class="page-header">Search results for <i>'.$_POST['keyword'].'</i></h1>';
		       			try{
		       			 	$inc = 6;	
						    $stmt = $conn->prepare("SELECT * FROM product WHERE productName LIKE :keyword");
						    $stmt->execute(['keyword' => '%'.$_POST['keyword'].'%']);
					 
						    foreach ($stmt as $row) {
								$name = (strlen($row['productName']) > 19) ? substr_replace($row['productName'], '..', 19) : $row['productName'];
						    	$highlighted = preg_filter('/' . preg_quote($_POST['keyword'], '/') . '/i', '<b>$0</b>', $row['productName']);
						    	$image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
							$inc = ($inc == 6) ? 1 : $inc + 1;
							if($inc == 1) echo "<div class='row'>";
							echo "
							<div class='col-6 col-xs-6 col-sm-4 col-md-3 col-lg-2'>
							<a style='color:black;' href='product.php?product=".$row['productId']."'>
							<div class='card'>
							<div class='card-header'>
							<p>".$name."</p>
							</div>	
							<div class='card-body'>																				
							<img src='".$image."' width='100%' height='auto'>

							</div>
							<div class='card-footer'>
							<b>UGX. ".number_format($row['price'], 2)."</b>
							</div>
							</div>
							</a>
							</div>
							";
							if($inc == 6) echo "</div>";


						}
						if($inc == 1) echo "<div class='col-6 col-xs-6 col-sm-4 col-md-3 col-lg-2'></div><div class='col-6 col-xs-6 col-sm-4 col-md-3 col-lg-2'></div><div class='col-6 col-xs-6 col-sm-4 col-md-3 col-lg-2'></div><div class='col-xs-6 col-sm-4 col-md-3 col-lg-2'></div><div class='col-6 col-xs-6 col-sm-4 col-md-3 col-lg-2'></div></div>"; 
						if($inc == 2) echo "<div class='col-6 col-xs-6 col-sm-4 col-md-3 col-lg-2'></div><div class='col-6 col-xs-6 col-sm-4 col-md-3 col-lg-2'></div><div class='col-6 col-xs-6 col-sm-4 col-md-3 col-lg-2'></div><div class='col-6 col-xs-6 col-sm-4 col-md-3 col-lg-2'></div></div>";
						if($inc == 3) echo "<div class='col-xs-6 col-sm-4 col-md-3 col-lg-2'></div><div class='col-6 col-xs-6 col-sm-4 col-md-3 col-lg-2'></div><div class='col-xs-6 col-sm-4 col-md-3 col-lg-2'></div></div>";
						if($inc == 4) echo "<div class='col-6 col-xs-6 col-sm-4 col-md-3 col-lg-2'></div><div class='col-6 col-xs-6 col-sm-4 col-md-3 col-lg-2'></div></div>";
						if($inc == 5) echo "<div class='col-6 col-xs-6 col-sm-4 col-md-3 col-lg-2'></div></div>";
					}
						catch(PDOException $e){
							echo "There is some problem in connection: " . $e->getMessage();
						}
					}

					$pdo->close();

	       		?> 
	        	
	        
	      </section>
	     
	    </div>
	  </div>
  
  	<?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
</body>
</html>