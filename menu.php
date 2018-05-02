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
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">
</head>

<body> 
	<!-- Page Content -->
    <div class="container">
      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Menu
        <small> Kutztown Java City </small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Menu</li>
      </ol>
	  <center>
<?php
require_once 'functions.php';

$menuItems = getMenu();

echo
"
	<table class= table table-bordered>
	<tr>
		<th> Name </th>
		<th> Small </th>
		<th> Medium </th>
		<th> Large </th>
		<th> Quantity </th>
		<th> Order </th>
	</tr>
";

foreach($menuItems as $item) {
        echo getItemString($item);
}

echo
"
	</tbody>
	</table>
	<br><br>
";
?>

 <!--	<div class="footer"> <a href="./index.html"> Home </a> &nbsp; <a href="./login.html"> Login </a>&nbsp;
		<a href="./createaccount.html">Create Account </a> &nbsp;
		<a href="./contact.html"> Contact Us </a>
		</div> 
  -->
  </center>
</div>
<?php
include 'footer.php';
?>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>


