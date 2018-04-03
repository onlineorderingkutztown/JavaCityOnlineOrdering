<head>
	<title> Java City Online Ordering </title>
	<link rel="stylesheet" type="text/css" href="mystyles.css">
</head>
<?php
  session_start();
  if(!$_SESSION['isLogged'] || !$_SESSION['isCustomer'])
  {
    header("location:customerlogin.php");
    die();
  } 
  include 'links.php';
?>

<body>
<div>
<center>
	<h1> Active Orders </h1>
</center>
<center>
	<?php
	$DB_HOST='localhost';
	$DB_USER='cscproject';
	$DB_PASS='csc354';
	$DB_NAME='project';


  	$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
	$query = "SELECT * FROM orders WHERE isCompleted=0";
	$res = $conn->query($query);
	echo "<table class= order><tr><th>Order ID</th><th>Order Details</th><th>Time Placed</th><th>Total</th><th>Cancel?</th></tr>";
	while($row = mysqli_fetch_assoc($res))
	{
			$title =  $row["order_id"];
			$author2 = $row["placed"];
			$price = number_format($row["total"], 2);

			echo "<tr><td>".$title."</td><td><a href='./Rorder.php?orderid=".$title."'>Order Details</a></td><td>".$author2."</td><td>".$price."</td><td><a href='./cancel.php?orderid=".$title."'>Cancel</a></tr>";
	}
	echo "</table>";
  $conn->close();
?>

<center>
	<h1> Past Orders </h1>
</center>
<center>
	<?php
	$DB_HOST='localhost';
	$DB_USER='cscproject';
	$DB_PASS='csc354';
	$DB_NAME='project';


  	$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
	$query = "SELECT * FROM orders WHERE isCompleted=1";
	$res = $conn->query($query);
	echo "<table class= order><tr><th>Order ID</th><th>Order Details</th><th>Time Placed</th><th>Total</th></tr>";
	while($row = mysqli_fetch_assoc($res))
	{
			$title =  $row["order_id"];
			$author2 = $row["placed"];
			$price = number_format($row["total"], 2);

			echo "<tr><td>".$title."</td><td><a href='./Rorder.php?orderid=".$title."'>Order Details</a></td><td>".$author2."</td><td>".$price."</td></tr>";
	}
	echo "</table>";
  $conn->close();
?>
<br>
</div>
</center>
<?php
echo "<br><br>";
include 'footer.php';
?>
</body>
