<?php
	include 'includes/session.php';
	$conn = $pdo->open();

	$output = array('list'=>'','count'=>0);

	if(isset($_SESSION['user'])){
		try{
			$stmt = $conn->prepare("SELECT *, product.productName AS prodname, category.catName AS catname FROM cart LEFT JOIN product ON product.productId=cart.productId LEFT JOIN category ON category.catId=product.catId WHERE userIdS=:userIdS");
			$stmt->execute(['userIdS'=>$user['userIdS']]);
			foreach($stmt as $row){
				$output['count']++;
				$image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
				$productname = (strlen($row['prodname']) > 30) ? substr_replace($row['prodname'], '...', 27) : $row['prodname'];
				$output['list'] .= "
					<li>
						<a href='product.php?product=".$row['productId']."' class='dropdown-item'>
							<div>
								
								<img src='".$image."' class='img-size-50' height='10%' alt='User Image'>
							
						
                <p class='dropdown-item-title ' display='inline'>
		                        ".$productname."
		                        <span class='float-right text-sm text-danger'><small>&times; ".$row['quantity']."</small></span>
		                        
		                    </p>
		                    
		                    
		                    </div>
						</a>
					</li>
					<div class='dropdown-divider'></div>
				";
			}
			$output['list'] .= '
			<div class="dropdown-divider"></div>
            <a href="cart_view.php" class="dropdown-item dropdown-footer">Go to Cart</a>
          </div>
			';

		}
		catch(PDOException $e){
			$output['message'] = $e->getMessage();
		}
	}
	else{
		if(!isset($_SESSION['cart'])){
			$_SESSION['cart'] = array();
		}

		if(empty($_SESSION['cart'])){
			$output['count'] = 0;
		}
		else{
			foreach($_SESSION['cart'] as $row){
				$output['count']++;
				$stmt = $conn->prepare("SELECT *, product.productName AS prodname, category.catName AS catname, distributor.shopName FROM distributor LEFT JOIN product ON distributor.userIdD = product.userIdD LEFT JOIN category ON category.catId=product.catId WHERE product.productId=:id");
				$stmt->execute(['id'=>$row['productid']]);
				$product = $stmt->fetch();
				$image = (!empty($product['photo'])) ? 'images/'.$product['photo'] : 'images/noimage.jpg';
				$productname = (strlen($product['prodname']) > 30) ? substr_replace($product['prodname'], '...', 27) : $product['prodname'];
				$output['list'] .= "
					<li>
						<a href='product.php?product=".$product['productId']."' class='dropdown-item'>
							<div>
								
								<img src='".$image."' class='img-size-50' height='10%' alt='User Image'>
							
						
                <p class='dropdown-item-title ' display='inline'>
		                        ".$productname."
		                        <span class='float-right text-sm text-danger'><small>&times; ".$row['quantity']."</small></span>
		                        
		                    </p>
		                    
		                    
		                    </div>
						</a>
					</li>
					<div class='dropdown-divider'></div>
				";
				
			}
			$output['list'] .= '
			<div class="dropdown-divider"></div>
            <a href="cart_view.php" class="dropdown-item dropdown-footer">Go to Cart</a>
          </div>
			';
		}
	}

	$pdo->close();
	echo json_encode($output);

?>

