<head>
	<title> Java City Online Ordering </title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Bootstrap core CSS -->
		<link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="css/modern-business.css" rel="stylesheet">
</head>
<?php
  session_start();
  include "links.php"
?>

<body>
	<!-- Page Content -->
    <div class="container">
      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Past Orders
        <small> Kutztown Java City </small>
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Past Orders</li>
      </ol>
	  </div>
<center>
	<?php
	$DB_HOST='localhost';
	$DB_USER='cscproject';
	$DB_PASS='csc354';
	$DB_NAME='project';


  	$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
	$query = "SELECT * FROM orders WHERE isCompleted=1";
	$res = $conn->query($query);
	echo "<table class= order><tr><th>Order ID</th><th>Order Details</th><th>Time Placed</th><th>Total</th></tr>";
	while($row = mysqli_fetch_assoc($res))
	{
			$title =  $row["order_id"];
			$author2 = $row["placed"];
			$price = number_format($row["total"], 2);

			echo "<tr><td>".$title."</td><td><a href='./orderdetails.php?orderid=".$title."'>Order Details</a></td><td>".$author2."</td><td>".$price."</td></tr>";
	}
	echo "</table><br><br>";
  $conn->close();
?>
<br>
</center>
<?php
include 'footer.php';
?>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
