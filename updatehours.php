<?php
	session_start();
	$orderid = $_GET['orderid'];

	$DB_HOST='localhost';
	$DB_USER='cscproject';
	$DB_PASS='csc354';
	$DB_NAME='project';
	$time_am = $_GET['timeam'];
	$time_am = date("G:i", strtotime($time_am));
	$time_pm = $_GET['timepm'];
	$time_pm = date("G:i", strtotime($time_pm));

  	$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
	$command = "INSERT INTO store (store_id, open_hour, close_hour) VALUE (1, '".$time_am."', '".$time_pm."') 
		ON DUPLICATE KEY UPDATE open_hour='".$time_am."', close_hour='".$time_pm."'";

	if(!$conn->query($command)){
		printf("Errormessage: %s\n", $conn->error);
	}
  	$conn->close();

	header('Location: settings.php');
?>
