<!DOCTYPE html>
<!--
Name: Bryce Andress
Prof: Hussain
-->
<head>
	<title> Java City Online Ordering </title>
	<link rel="stylesheet" type="text/css" href="mystyles.css">
	<style>
	h1 {
		font-family: 'Helvetica Neue', sans-serif;
		font-size: 40px;
		font-weight: bold;
		letter-spacing -1px;
		line-height: 1;
		text-align: center;
		text-decoration: underline;
	}
	</style>
</head> 
<?php
include 'links.php'
?>
<div>
<body> <h1 align="center"> Menu </h1> 
	<center>
	<th>Beverages</th><br>
	<td><input type="checkbox" name="menu" value="coffee" />Medium Coffee $2.75</td>
	<td><input type="checkbox" name="menu" value="coffee" />Strawberry Smoothie $3.25</td><br>
	<br>
	<th>Food</th><br>
	<td><input type="checkbox" name="menu" value="donut" />Chocolate Frosted Donut $.97</td>
	</center>
	<input type="submit" style="float: right;" value="Submit"
    onclick="window.location='cart.php';" />
</div>
 <!--	<div class="footer"> <a href="./index.html"> Home </a> &nbsp; <a href="./login.html"> Login </a>&nbsp;
		<a href="./createaccount.html">Create Account </a> &nbsp;
		<a href="./contact.html"> Contact Us </a>
		</div> 
  -->
</body>

