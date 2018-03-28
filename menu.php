<?php SESSION_START(); ?>
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
<body> 
<?php
require_once 'functions.php';
$menuItems = getMenu();

foreach($menuItems as $item) {
        echo getItemString($item);
}

echo "<div>SOMETHING</div>";
?>

 <!--	<div class="footer"> <a href="./index.html"> Home </a> &nbsp; <a href="./login.html"> Login </a>&nbsp;
		<a href="./createaccount.html">Create Account </a> &nbsp;
		<a href="./contact.html"> Contact Us </a>
		</div> 
  -->
</body>

