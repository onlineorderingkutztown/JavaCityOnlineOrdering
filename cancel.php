<?php
	session_start();
	$orderid = $_GET['orderid'];

	$DB_HOST='localhost';
	$DB_USER='cscproject';
	$DB_PASS='csc354';
	$DB_NAME='project';


  	$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
	$command = "UPDATE orders SET isCompleted=2 WHERE order_id=$orderid";

	if(!$conn->query($command)){
		printf("Errormessage: %s\n", $conn->error);
	}
  	$conn->close();

	header('Location: customerorders.php');
?>
