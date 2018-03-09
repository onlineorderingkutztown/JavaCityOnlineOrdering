<!DOCTYPE html>
<!--
Name: Bryce Andress
Prof: Hussain
-->
<?php
  session_start();
  if(!$_SESSION['isLogged'])
  {
    header("location:customerlogin.html");
    die();
  } 
?>
<head>
	<title> Java City Online Ordering </title>
	<link rel="stylesheet" type="text/css" href="mystyles.css">
</head>

<?php
include 'customerlinks.php'
?>

<body>
<div>
<h2 align="center"> Welcome to Java City's Online Ordering Platform </h2>
<center>
	<a href="hotdrinks.php"><l> Hot Drinks </l></a> &emsp;
	<a href="colddrinks.php"><l> Cold Drinks </l></a><br><br>
	<a href="pastries.php"><l> Pastries </l></a> &emsp;
	<a href="smoothies.php"><l> Smoothies </l></a>
</center>
</div>
</body>

