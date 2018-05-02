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
  require_once 'customerfunctions.php';
  isCustomer();
?>

<body>
	<!-- Page Content -->
    <div class="container">
      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Customer Orders
        <small> Kutztown Java City </small>
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Customer Orders</li>
      </ol>
	</div>
	
	<div class="container">
	<div class="row">
	<div class="col-md-6">
	<h3> Active Orders </h3>

	<?php
  	session_start();
	$DB_HOST='localhost';
	$DB_USER='cscproject';
	$DB_PASS='csc354';
	$DB_NAME='project';


  	$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
	$query = "SELECT * FROM orders WHERE isCompleted=0";
	$res = $conn->query($query);
	echo "<table class= table><tr><th>Order ID</th><th>Order Details</th><th>Time Placed</th><th>Total</th><th>Cancel?</th></tr>";
	while($row = mysqli_fetch_assoc($res))
	{
			$customer = $row["customer_id"];
			$orderid =  $row["order_id"];
			$placed = $row["placed"];
			$price = number_format($row["total"], 2);

			if($_SESSION["customer_id"] == $customer)
			{
			   echo "<tr><td>".$orderid."</td><td><a href='./Rorder.php?orderid=".$orderid."'>Order Details</a></td><td>".$placed."</td><td>$".$price."</td><td><a href='./cancel.php?orderid=".$orderid."'>Cancel</a></tr>";
			}
	}
	echo "</table>";	
  $conn->close();
?>
</div>


	<div class="col-md-6">
	<h3>Past Orders</h3>
	<?php
		require_once 'customerfunctions.php';
		viewPastOrders();
	?>
	</div>
	</div>
	</div>

<?php
echo "<br><br>";
include 'footer.php';
?>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
