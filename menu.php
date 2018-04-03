<?php 
SESSION_START(); 
include 'links.php';
?>
<!DOCTYPE html>
<!--
Name: Bryce Andress
Prof: Hussain
-->
<head>
	<title> Java City Online Ordering </title>
	<link rel="stylesheet" type="text/css" href="mystyles.css">
</head>

<body> 
<div>
<center>
<h1> Menu </h1>
<?php
require_once 'functions.php';

$menuItems = getMenu();

echo
"
	<table class= menu>
	<tr>
		<th class= menu> Name </th>
		<th class= menu> Small </th>
		<th class= menu> Medium </th>
		<th class= menu> Large </th>
		<th class= menu> Quantity </th>
		<th class= menu> Order </th>
	</tr>
";

foreach($menuItems as $item) {
        echo getItemString($item);
}

echo
"
	</table>
	<br><br>
";

include 'footer.php';
?>

 <!--	<div class="footer"> <a href="./index.html"> Home </a> &nbsp; <a href="./login.html"> Login </a>&nbsp;
		<a href="./createaccount.html">Create Account </a> &nbsp;
		<a href="./contact.html"> Contact Us </a>
		</div> 
  -->
</center>
</div>
</body>


