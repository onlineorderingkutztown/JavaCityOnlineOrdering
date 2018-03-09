<head>
	<title> Java City Online Ordering </title>
	<link rel="stylesheet" type="text/css" href="mystyles.css">
</head>
<?php
  session_start();
  if(!$_SESSION['isLogged'] && !$_SESSION['isManager'])
  {
    header("location:managementlogin.html");
    die();
  } 
  include 'adminlinks.php'
?>

<body>
<div>
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
	echo "<table border=1><tr><th>Order ID</th><th>Customer ID</th><th>Time Placed</th><th>Subtotal</th><th>Tax</th><th>Total</th></tr>";
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

			echo "<tr><td>".$title."</td><td>".$author."</td><td>".$author2."</td><td>".$author3."</td><td>".$quantity."</td><td>".$price."</td></tr>";
	}
	echo "</table>";
  $conn->close();
?>
<br>
</div>
</center>
</body>
