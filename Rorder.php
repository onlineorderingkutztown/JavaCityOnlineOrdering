<?php SESSION_START(); ?>
<!DOCTYPE html>
<!--
Name: Bryce Andress
Prof: Hussain
-->
<?php
ob_start();
?>
<head>
	<title> Java City Online Ordering </title>
	<link rel="stylesheet" type="text/css" href="mystyles.css"> <style> h1 { font-family: 'Helvetica Neue', sans-serif;
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
<div>
<h2 align="center"> Order Details </h2>
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
	echo "<table class= order><tr><th>Order ID</th><th>Time Placed</th><th>Subtotal</th><th>Tax</th><th>Total</th><th>Completed?</th></tr>";
	while($row = $res->fetch_array())
	{
		$orderid =  $row["order_id"];
		$placed = $row["placed"];
		$subtotal = number_format($row["subtotal"], 2);
		$tax = number_format($row["tax"], 2);
		$total = number_format($row["total"], 2);
		$isCompleted = $row["isCompleted"];


		if(!$isCompleted)
		{
		        echo "<tr><td>".$orderid."</td><td>".$placed."</td><td>".$subtotal."</td><td>".$tax."</td><td>".$total."</td><td>Not Completed</td></tr>";
		}
		else
		{
		        echo "<tr><td>".$orderid."</td><td>".$placed."</td><td>".$subtotal."</td><td>".$tax."</td><td>".$total."</td><td>Completed</tr>";
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
	echo "<table class= order><tr><th>Food ID</th><th>Food Name</th><th>Quantity Ordered</th><th>Individual Cost</th></tr>";
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
			$price_s = $row2["price_s"];
		        echo "<tr><td>".$foodid."</td><td>".$name."</td><td>".$quantity."</td><td>".$price_s."</td></tr>";
		    }else if($size == "Medium")
		    {
			$price_m = $row2["price_m"];
		        echo "<tr><td>".$foodid."</td><td>".$name."</td><td>".$quantity."</td><td>".$price_m."</td></tr>";
		    }
		    else
		    {
			$price_l = $row2["price_l"];
		        echo "<tr><td>".$foodid."</td><td>".$name."</td><td>".$quantity."</td><td>".$price_l."</td></tr>";
		    }
		}

	}
	echo "</table>";
  $conn->close();
?>
	<br>
</center>

</div>
</body>
<?php
include 'footer.php'
?>
