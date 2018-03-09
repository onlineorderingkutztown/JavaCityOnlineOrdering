<!--
Name: Bryce Andress
Prof: Hussain
Class: Web Programming I
Date: 2/27/17
URL: www.unixweb.kutztown.edu/~bandr670/Project/Phase2/orders.php
Project Phase 2
Look at order for Bryce's Books
-->
<head>
	<title> Bryce's Books Selection </title>
	<link rel="stylesheet" type="text/css" href="mystyles.css">
</head>
<body>
<center>
	<h1> Bryce's Books Orders </h1>
</center>
	<?php
	session_start();
	if(isset($_SESSION["isLoggedIn"])  && $_SESSION["isLoggedIn"] == True)
	{
		echo "<p class='topcorner'>
		<a href='logout.php'> Logout </a> &nbsp; &nbsp; &nbsp;
		</p>";

	}
	else
	{
		echo "<p class='topcorner'>
		<a href='login.html'> Login </a> &nbsp; &nbsp; &nbsp;
		</p>";
	}
	$DB_HOST='localhost';
	$DB_USER='bandr670';
	$DB_PASS='6erebEFr';
	$DB_NAME='bookstore_bandr670';
	if(isset($_SESSION["CustomerID"]))
	{
		$id = $_SESSION["CustomerID"];

  	$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
		$query = "SELECT OrderID, OrderDate, ShippingCost, Tax, Total FROM Orders WHERE CustomerID=$id";
		$res = $conn->query($query);
		echo "<center>";
		echo "<table border=1><tr><th>Order ID</th><th>Order Date</th><th>Shipping Cost</th><th>Tax</th><th>Total</th><th>Details</th></tr>";
		while($row = mysqli_fetch_assoc($res))
		{
			$OrderID =  $row["OrderID"];
			$OrderDate = $row["OrderDate"];
			$ShippingCost = $row["ShippingCost"];
			$Tax = $row["Tax"];
			$Total = $row["Total"];
			echo '<tr><td>'.$OrderID.'</td><td>'.$OrderDate.'</td><td>'.$ShippingCost.'</td><td>'.$Tax.'</td><td>'.$Total.'</td><td><a href="./orderdetails.php?OrderID='.$OrderID.'">Details</td></tr>';
		}
		echo "</table></center>";
  	$conn->close();
	}
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
