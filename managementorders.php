<!DOCTYPE html>
<!--
Name: Bryce Andress
Prof: Hussain
-->
<?php
  session_start();
  if(!$_SESSION['isLogged'] || !$_SESSION['isManager'])
  {
     header("location: managementlogin.php");
	 die();
  }
  include 'links.php';
?>
<head>
	<title> Java City Online Ordering </title>
	<link rel="stylesheet" type="text/css" href="mystyles.css">
</head>

<body>
<div>
<h2 align="center"> Current Orders </h2>
<center>
<?php
	include 'dbconnect.php';

  	$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
	$query = "SELECT * FROM orders WHERE isCompleted=0";
	$res = $conn->query($query);
	echo "<table class= order><tr><th>Order ID</th><th>Order Details</th><th>Time Placed</th><th>Total</th><th>Completed?</th></tr>";
	$number = 1;
	while($row = mysqli_fetch_assoc($res))
	{
			$orderid =  $row["order_id"];
			$placed = $row["placed"];
			$total = number_format($row["total"], 2);

			echo "<tr><td>".$orderid."</td><td><a href='./orderdetails.php?orderid=".$orderid."'>Order Details</a></td><td>".$placed."</td><td>".$total."</td><td><a href='./completed.php?orderid=".$orderid."'>Complete</a></tr>";
	}
	echo "</table><br><br>";
  $conn->close();
?>
	<br>
</center>
</div>
<?php
include 'footer.php';
?>
</body>

