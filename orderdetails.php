<!DOCTYPE html>
<!--
Name: Bryce Andress
Prof: Hussain
-->
<?php
  session_start();
  if(!$_SESSION['isLogged'])
  {
     header("Location: http://doopliss.com/kuproject/logins.php");
  } 
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

<?php
include 'links.php'
?>

<body>
	<!-- Page Content -->
    <div class="container">
      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Order Details
        <small> Kutztown Java City </small>
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Employee Order Details</li>
      </ol>
<center>
	<?php
	$DB_HOST='localhost';
	$DB_USER='cscproject';
	$DB_PASS='csc354';
	$DB_NAME='project';
	$orderid=$_GET['orderid'];

  	$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
	$query = "SELECT * FROM orders WHERE order_id=".$orderid;
	$res = $conn->query($query);
	echo "<table class= table><tr><th>Order ID</th><th>Customer ID</th><th>Customer Name</th><th>Customer Email</th><th>Phone Number</th><th>Time Placed</th><th>Subtotal</th><th>Tax</th><th>Total</th><th>Status</th></tr>";
	while($row = $res->fetch_array())
	{
		$orderid =  $row["order_id"];
		$customerid = $row["customer_id"];
		$placed = $row["placed"];
		$subtotal = number_format($row["subtotal"], 2);
		$tax = number_format($row["tax"], 2);
		$total = number_format($row["total"], 2);
		$isCompleted = $row["isCompleted"];

	        //Get Customer Info	
		$conn2 = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
		$query2 = "SELECT * FROM customer WHERE customer_id=".$customerid;
		$res2 = $conn2->query($query2);
		while($row2 = $res2->fetch_array())
		{
		    $first_name = $row2["first_name"];
		    $last_name = $row2["last_name"];
		    $name = $first_name." ".$last_name;
		    $email = $row2["email"];
		    $phone = $row2["phone"];

		    if(!$isCompleted)
		    {
		        echo "<tr><td>".$orderid."</td><td>".$customerid."</td><td>".$name."</td><td>".$email."</td><td>".$phone."</td><td>".$placed."</td><td>$".$subtotal."</td><td>$".$tax."</td><td>$".$total."</td><td><a href='./completed.php?orderid=".$orderid."'>Complete</a></tr>";
		    }
		    else
		    {
		        echo "<tr><td>".$orderid."</td><td>".$customerid."</td><td>".$name."</td><td>".$email."</td><td>".$phone."</td><td>".$placed."</td><td>$".$subtotal."</td><td>$".$tax."</td><td>$".$total."</td><td>Completed</tr>";
		    }
	         }
	echo "</table>";
	}
  $conn->close();
?>
	<br>
	</center>
	
<h2 align="center"> Items In Order </h2>
<center>
	<?php
	$DB_HOST='localhost';
	$DB_USER='cscproject';
	$DB_PASS='csc354';
	$DB_NAME='project';
	$orderid=$_GET['orderid'];

  	$conn1 = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
	$query1 = "SELECT * FROM order_items WHERE order_id=".$orderid;
	$res = $conn1->query($query1);
	echo "<table class= table><tr><th>Food ID</th><th>Food Name</th><th>Quantity Ordered</th><th>Individual Cost</th></tr>";
	while($row = $res->fetch_array())
	{
		$foodid = $row["food_id"];
		$quantity= $row["quantity"];
		$size = $row["Size"];
		
  		$conn2 = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
		$query2 = "SELECT * FROM food WHERE food_id=".$foodid;
		$res2 = $conn2->query($query2);
		while($row2 = $res2->fetch_array())
		{
		    $name = $row2["name"];
		    if($size == "Small")
		    {
		      $price = $row2["price_s"];
		      echo "<tr><td>".$foodid."</td><td>".$name."</td><td>".$quantity."</td><td>$".$price."</td></tr>";
		    }
		    else if($size == "Medium")
		    {
	              $price = $row2["price_m"];
		      echo "<tr><td>".$foodid."</td><td>".$name."</td><td>".$quantity."</td><td>$".$price."</td></tr>";
		    }
		    else
		    {
		      $price = $row2["price_l"];
		      echo "<tr><td>".$foodid."</td><td>".$name."</td><td>".$quantity."</td><td>$".$price."</td></tr>";
		    }
		}

	}
	echo "</table>";
  $conn->close();
?>
	<br>
</center>

</div>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
<?php
include 'footer.php'
?>
