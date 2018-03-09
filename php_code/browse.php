<!--
Name: Bryce Andress
Prof: Hussain
Class: Web Programming I
Date: 2/27/17
URL: www.unixweb.kutztown.edu/~bandr670/Project/Phase2/browse.php
Project Phase 2
Browse Categories for Bryce's Books
-->
<head>
	<title> Bryce's Books Selection </title>
	<link rel="stylesheet" type="text/css" href="mystyles.css">
</head>
<body>
<center>
	<h1> Bryce's Books Categories </h1>
</center>
	<p class="topcorner">
	<a href="login.html"> Login </a>
	</p>
	<?php
	session_start();
	$DB_HOST='localhost';
	$DB_USER='bandr670';
	$DB_PASS='6erebEFr';
	$DB_NAME='bookstore_bandr670';

  $conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
	$query = "SELECT CategoryID, CategoryName FROM Categories";
	$res = $conn->query($query);
	while($row = mysqli_fetch_assoc($res))
	{
			$category =  $row["CategoryName"];
			$categoryID = $row["CategoryID"];

			echo '<a href="./products.php?categoryID='.$categoryID.'">'.$category.'<br>';
	}
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
