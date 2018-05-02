<!DOCTYPE html>
<!--
Name: Bryce Andress
Prof: Hussain
-->
<?php
  session_start();
  if(!$_SESSION['isLogged'] || !$_SESSION['isEmployee'])
  {
    header("location:employeelogin.php");
    die();
  } 
include 'links.php';
?>
<head>
	<title> Java City Online Ordering </title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap core CSS -->
		<link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="css/modern-business.css" rel="stylesheet">
</head>

<script>
	setTimeout('window.location.reload();', 10000);
</script>

<body>
	<!-- Page Content -->
    <div class="container">
      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Current Orders
        <small> Kutztown Java City </small>
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Current Orders</li>
      </ol>
<center>
<?php
	include 'dbconnect.php';

  	$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
	$query = "SELECT * FROM orders WHERE isCompleted=0";
	$res = $conn->query($query);
	echo "<table class= table><tr><th>Order ID</th><th>Order Details</th><th>Time Placed</th><th>Total</th><th>Status</th></tr>";
	$number = 1;
	while($row = mysqli_fetch_assoc($res))
	{
			$title =  $row["order_id"];
			$author2 = $row["placed"];
			$price = number_format($row["total"], 2);

			echo "<tr><td>".$title."</td><td><a href='./orderdetails.php?orderid=".$title."'>Order Details</a></td><td>".$author2."</td><td>$".$price."</td><td><a href='./completed.php?orderid=".$title."'>Complete</a></tr>";
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
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

