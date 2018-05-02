<!DOCTYPE html>
<!--
Name: Bryce Andress
Prof: Hussain
-->
<?php
  session_start();
  if(!$_SESSION['isLogged'] && !$_SESSION('isManager'))
  {
    header("location:managementlogin.php");
    die();
  } 
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

<?php
include 'links.php'
?>

<body>
<div>
<h2 align="center"> Account Created Successfully </h2>
<h2 align="center"> Current Orders </h2>
<center>
	<?php
	$DB_HOST='localhost';
	$DB_USER='cscproject';
	$DB_PASS='csc354';
	$DB_NAME='project';


  	$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
	$query = "SELECT * FROM orders WHERE isCompleted=0";
	$res = $conn->query($query);
	echo "<table border=1><tr><th>Order ID</th><th>Customer ID</th><th>Time Placed</th><th>Subtotal</th><th>Tax</th><th>Total</th><th>Completed?</th></tr>";
	$number = 1;
	while($row = mysqli_fetch_assoc($res))
	{
			$title =  $row["order_id"];
			$author = $row["customer_id"];
			$author2 = $row["placed"];
			$author3 = $row["subtotal"];
			$quantity = $row["tax"];
			$price = number_format($row["total"], 2);
			$author3 = number_format($row["subtotal"], 2);
			$quantity = number_format($row["tax"], 2);

			echo "<tr><td>".$title."</td><td>".$author."</td><td>".$author2."</td><td>".$author3."</td><td>".$quantity."</td><td>".$price."</td><td><a href='./completed.php?orderid=".$title."'>Complete</a></tr>";
	}
	echo "</table>";
  $conn->close();
?>
	<br>
</center>
</div>
<?php
include 'footer.php';
?>
</body>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</html>

