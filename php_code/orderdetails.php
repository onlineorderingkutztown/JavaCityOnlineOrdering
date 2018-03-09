<!--
Name: Bryce Andress
Prof: Hussain
Class: Web Programming I
Date: 2/27/17
URL: www.unixweb.kutztown.edu/~bandr670/Project/Phase2/orderdetails.php
Project Phase 2
Look at order details for Bryce's Books
-->
<head>
	<title> Order Details </title>
	<link rel="stylesheet" type="text/css" href="mystyles.css">
</head>
<body>
<center>
	<h1> Order Details</h1>
</center>
	<p class="topcorner">
	<a href="login.html"> Login </a>
	</p>
	<?php
	$DB_HOST='localhost';
	$DB_USER='bandr670';
	$DB_PASS='6erebEFr';
	$DB_NAME='bookstore_bandr670';

	$OrderID = $_GET["OrderID"];

  $conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
	$query = "SELECT * FROM OrderDetails WHERE OrderID=$OrderID";
	$res = $conn->query($query);
	echo "<center>";
	echo "<table border=1><tr><th>Product ID</th><th>Quantity</th><th>Line Total</th></tr>";
	while($row = mysqli_fetch_assoc($res))
	{
			$ProductID = $row["ProductID"];
			$Quantity= $row["Quantity"];
			$LineTotal = $row["LineTotal"];

			echo "<tr><td>".$ProductID."</td><td>".$Quantity."</td><td>".$LineTotal."</td></tr>";
	}
	echo "</table></center>";
  $conn->close();
?>
<div class="footer">
			<a href="./index.html"> Home </a> &nbsp;
			<a href="./search.html"> Search </a> &nbsp;
			<a href="./browse.php"> Browse Categories </a> &nbsp;
			<a href="./login.html"> Login </a>&nbsp;
			<a href="./createaccount.html">Create Account </a> &nbsp;
			<a href="./orders.php"> Orders </a> &nbsp;
			<a href="./contact.html"> Contact Us </a>
		</div>

</body>
