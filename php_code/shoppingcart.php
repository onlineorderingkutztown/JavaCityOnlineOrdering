<!DOCTYPE html>
<!--
Name: Bryce Andress
Prof: Hussain
Class: Web Programming I
Date: 2/27/17
URL: www.unixweb.kutztown.edu/~bandr670/Project/Phase1/index.html
Project Phase 1
Create an online bookstore

External Style Sheet: Has been used on all pages and can be found in between <head> </head>
Embedded Style Sheet: Can be found on the index.html page (this page)
--!>
<?php
	session_start();

	echo "<center><h3> Shopping Cart </h3></center>";
	echo "<center><table border='1' id='books'>";
	echo "<tr><th>Title</th><th>Author</th><th>Co-Author</th><th>Co-Author</th><th>Price</th></tr>";

	$DB_HOST='localhost';
	$DB_USER='bandr670';
	$DB_PASS='6erebEFr';
	$DB_NAME='bookstore_bandr670';

  $conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

	$TOTAL = 0;
	//if(isset($_SESSION["cart"]))
	//{
			foreach($_SESSION["cart"] as $cart)
			{
				$query = "SELECT * FROM Products WHERE Title = '$cart'";
				$res = $conn->query($query);
				$row = mysqli_fetch_assoc($res);
				$title =  $row["Title"];
				$author = $row["Author1"];
				$author2 = $row["Author2"];
				$author3 = $row["Author3"];
				$price = number_format($row["Price"], 2);
				$TOTAL += $price;

			echo "<tr><td>".$title."</td><td>".$author."</td><td>".$author2."</td><td>".$author3."</td><td>".$price."</td>";
			}
	//}
	echo "</table></center>";
	echo "<h3 align='right'>Total: $ $TOTAL</h3>";
	$TAX = $TOTAL * 0.06;
	echo "<h3 align='right'>Tax:$ $TAX</h3>";
	if ($TOTAL == 0)
	{
		echo "<h3 align='right'>S&H: $0.00</h3>";
	}
	elseif ($TOTAL < 50)
	{
		echo "<h3 align='right'>S&H: $4.50</h3>";
	}
	elseif ($TOTAL < 100)
	{
		echo "<h3 align='right'>S&H: $7.00</h3>";
	}
	else
	{
		echo "<h3 align='right'>S&H: $ $10.25</h3>";
	}
	if (isset($_SESSION["isLoggedIn"]) && $_SESSION["isLoggedIn"] == True)
	{
		echo "<button style='float: right;' type='submit'> Order </button>";
	}
	if(isset($_SESSION["isLoggedIn"]) && $_SESSION["isLoggedIn"] == True)
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

?>
<head>
	<link rel="stylesheet" type="text/css" href="mystyles.css">
	<style>
	h1 {
		font-family: 'Helvetica Neue', sans-serif;
		font-size: 50px;
		font-weight: bold;
		letter-spacing -1px;
		line-height: 1;
		text-align: center;
		text-decoration: underline;
	}
	</style>
</head>
