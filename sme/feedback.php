<?php 
include 'includes/session.php';
 //reject order
 if(isset($_POST['reject'])){
    $id = $_POST['id'];
    $comment = $_POST['comment'];
    
    $conn = $pdo->open();

    try{            
        $stmt = $conn->prepare("UPDATE orders set feedback = :comment WHERE orderId=:id");
        $stmt->execute([ 'comment'=>$comment, 'id'=>$id]);

        $_SESSION['success'] = 'Feedback sent.';
    }
    catch(PDOException $e){
        $_SESSION['error'] = $e->getMessage();
    }

    $pdo->close();  
}
else{
    $_SESSION['error'] = 'Sorry, please try again!';    
}

header('location: pending.php');
exit();


?>