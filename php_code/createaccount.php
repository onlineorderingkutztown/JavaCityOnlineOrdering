<!--
Name: Bryce Andress
Prof: Hussain
Class: Web Programming I
Date: 2/27/17
URL: www.unixweb.kutztown.edu/~bandr670/Project/Phase2/createaccount.php
Project Phase 2
Create an account for Bryce's Books
-->
<?php //Login.php"
	 $first = $_POST['first'];
	 $last = $_POST['last'];
	 $email = $_POST['email'];
	 $password = $_POST['password'];
	 $pconfirm = $_POST['pconfirm'];
	 $address = $_POST['address'];
	 $city = $_POST['city'];
	 $state = $_POST['state'];
	 $zip = $_POST['zip'];
	 $street2 = $_POST['2street'];
	 $phone = $_POST['phone'];

	 $DB_HOST='localhost';
	 $DB_USER='bandr670';
	 $DB_PASS='6erebEFr';
	 $DB_NAME='bookstore_bandr670';
	 $conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
	 $query = "SELECT * FROM Customers WHERE Email = '$email'";
	 $res = $conn->query($query);
	 if($row = mysqli_fetch_assoc($res))
	 {
			header('Location: badcreateaccount.html');
	 }
	 else
	 {
	 		$query = "INSERT INTO Customers (Email, Passwd, FirstName, LastName, Address1, Address2, ZipCode, State, PhoneNumber, City) values ('$email', '$password', '$first', '$last', '$address', '$street2', '$zip', '$state', '$phone', '$city')" or die("Cannot insert the row". mysql_error());
	 		$res = $conn->query($query);
	 		$conn->close();
	 }
?>
<head>
	<title> Bryce's Books </title>
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
<body>
	<h1 align="center"> Welcome to Bryce's Books</h1>
	<center>
	<img src="../Images/books.jpg" alt="books"
	height="400" width="700"> <br>
	<center><form id="search" method="get" action="search.php">
		<input type="search" name="searchbox" placeholder="Search">
		<h3> Account Created Successfully </h3>
	</form></center>
	<p>
	Bryce's Books is a used bookstore that specializes in rare and hard to find books. <br>
	At Bryce's Books we strive to find any book for all customer's, while keeping prices
	as low as possible.<br> <br>

	This website was coded as a project for Kutztown Univeristy's CSC 242 class. <br>
	Since this website was designed for a class it is for education purposes only and is NOT an actualy store. <br> <br>
	</center>
	</p>
	<p class="topcorner">

		<a href="logout.html"> Logout </a> &nbsp; &nbsp; &nbsp;
	</p>

	<div class="footer">
		<a href="./index.html"> Home </a> &nbsp;
		<a href="./login.html"> Login </a>&nbsp;
		<a href="./search.html"> Search </a>&nbsp;
		<a href="./browse.php"> Browse </a>&nbsp;
		<a href="./createaccount.html">Create Account </a> &nbsp;
		<a href="./orders.php"> Orders </a>&nbsp;
		<a href="./contact.html"> Contact Us </a>
		</div>
</body>

