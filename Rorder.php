<?php SESSION_START(); ?>
<!DOCTYPE html>
<!--
Name: Bryce Andress
Prof: Hussain
-->
<?php
ob_start();
require_once 'customerfunctions.php';
isCustomer();
?>
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
<?php
require_once 'functions.php';

    $exist = isset($_SESSION['user']);
    $total =0;
    if(!$_SESSION['isLogged'])
    {
      echo "<div><p>Please Log In to save items to the cart.</p></div>";
      ob_end_clean( );
      header('Location: http://doopliss.com/kuproject/logins.php');
      exit;
    }
    else
    {
    }
?>
	<!-- Page Content -->
    <div class="container">
      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Order Information
        <small> Kutztown Java City </small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Order Information</li>
      </ol>
<center>
	<div class="row">
	<div class="col-md-6">
	<h2>Order Details</h2>
<?php
	$orderid=$_GET['orderid'];
    	require_once 'customerfunctions.php';
	orderDetails($orderid);
?>
	</div>
	
	<div class="col-md-6">
	<h2 align="center"> Items In Order </h2>
<?php
	$orderid=$_GET['orderid'];
	require_once 'customerfunctions.php';
	itemsInOrder($orderid);
?>
	<br>
	</div>
	</div>
<?php
	$orderid=$_GET['orderid'];
	$totaltime = getOrderTime($orderid);

	if ($totaltime == 0){
		echo "<center><h2>Order Complete<h2></center>";
	}
	else{
	echo "<center>
	<h2>Order will be ready in ".$totaltime." minute(s)</h2>
	</center>";
	}
?>
</center>

</div>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
<?php
include 'footer.php'
?>
