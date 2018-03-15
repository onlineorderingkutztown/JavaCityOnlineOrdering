<?php
	session_start();
	$foodid = $_GET['foodid'];

	$DB_HOST='localhost';
	$DB_USER='cscproject';
	$DB_PASS='csc354';
	$DB_NAME='project';


  	$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
	//$command = "UPDATE food SET availability=0 WHERE food_id=$foodid";
	$command = "UPDATE food SET availability = CASE WHEN availability=1 THEN 0 ELSE 1 END WHERE food_id=$foodid";

	if(!$conn->query($command)){
		printf("Errormessage: %s\n", $conn->error);
	}
  	$conn->close();

	header('Location: itemavailability.php');
?>
