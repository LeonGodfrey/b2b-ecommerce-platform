<?php 
include 'includes/session.php';
 //reject order
 if(isset($_POST['reject'])){
    $id = $_POST['id'];
    $comment = $_POST['comment'];
    
    $conn = $pdo->open();

    try{            
        $stmt = $conn->prepare("UPDATE orders SET status = :status, comment = :comment WHERE orderId=:id");
        $stmt->execute([ 'status'=>'rejected', 'comment'=>$comment, 'id'=>$id]);

        $_SESSION['success'] = 'Order rejected';
    }
    catch(PDOException $e){
        $_SESSION['error'] = $e->getMessage();
    }

    $pdo->close();  
}
else{
    $_SESSION['error'] = 'Select order to reject first';    
}

header('location: pending.php');
exit();


?>