<?php
	include 'includes/session.php';

	$output = '';

	$conn = $pdo->open();

	$stmt = $conn->prepare("SELECT * FROM category");
	$stmt->execute();

	foreach($stmt as $row){
		$output .= "
			<option value='".$row['catId']."' class='append_items'>".$row['catName']."</option>
		";
	}

	$pdo->close();
	echo json_encode($output);

?>