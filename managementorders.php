<!DOCTYPE html>
<!--
Name: Bryce Andress
Prof: Hussain
-->

<!-- Make sure user is a manager -->
<?php
  require_once 'managerfunctions.php';
  isManager();
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

<script>
  setTimeout('window.location.reload();', 10000);
</script>

<body>
    <div class="container">
      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Current Orders
        <small> Kutztown Java City </small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Current Orders</li>
      </ol>
	<center>
		<!-- Get Current Orders -->
		<?php
  			require_once 'managerfunctions.php';
  			getCurrentOrders();
		?>
		<br>
	</center>
	</div>
	    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
<?php
	include 'footer.php';
?>