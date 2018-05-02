<?php
// Set availablity of food item
function setAvailablity($foodid) {
	include 'dbconnect.php';

	$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
	$command = "UPDATE food SET availability = CASE WHEN availability=1 THEN 0 ELSE 1 END WHERE food_id=$foodid";

        if(!$conn->query($command)){
           printf("Errormessage: %s\n", $conn->error);
        }
        $conn->close();
	header('Location: itemavailability.php');
}

// Mark Order Complete and Email customer for pickup
function markComplete($orderid) {
	include 'dbconnect.php';
	isBoth();
	$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
	$command = "UPDATE orders SET isCompleted=1 WHERE order_id=$orderid";
	if(!$conn->query($command)){
           printf("Errormessage: %s\n", $conn->error);
        }
	else
	{
		$conn2 = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
		$command2 = "SELECT customer_id FROM orders WHERE order_id=$orderid";
	        $res2 = $conn2->query($command2);
		while($row2 = mysqli_fetch_assoc($res2))
		{
			$conn3 = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
			$command3 = "SELECT email FROM customer WHERE customer_id=".$row2['customer_id'];
			$res3 = $conn3->query($command3);
			while($row3 = mysqli_fetch_assoc($res3))
			{
				$email = $row3['email'];
			}
		}	
		$msg = "Order #".$orderid." is ready for pickup.";
		echo $msg;
		mail($email, "Order #".$orderid." has been completed", $msg);
	}
        $conn->close();
	session_start();
	$employee = $_SESSION["isEmployee"];
	if($employee)
	{
		header('Location: employeeorders.php');
	}
	else
	{
		header('Location: managementorders.php');
	}
}

//Delete Item from the Database
function deleteItem($foodid) {
	include 'dbconnect.php';
	$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
	$command = "DELETE FROM food WHERE food_id=$foodid";
	if(!$conn->query($command)){
               printf("Errormessage: %s\n", $conn->error);
        }
        $conn->close();
        header('Location: itemavailability.php');
}

//Authenticate a Manager
function login($email, $password) {
	include 'dbconnect.php';

        $conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
        $query = "SELECT password, isManager FROM employees WHERE email = '$email'";
        $res = $conn->query($query);
        while($row = mysqli_fetch_assoc($res))
	{
		if ($row["password"] == "$password" && $row["isManager"] == 1)
		{
			session_start();
			$_SESSION["isLogged"] = true;
			$_SESSION["isManager"] = true;
                	$_SESSION["isEmployee"] = false;
	        	$_SESSION["isCustomer"] = false;
			header('Location: managementorders.php');
		}
	}
        $conn->close();
}
function setStoreHours($time_am, $time_pm) {
	include 'dbconnect.php';
	$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
        $command = "INSERT INTO store (store_id, open_hour, close_hour) VALUE (1, '".$time_am."', '".$time_pm."')
	                ON DUPLICATE KEY UPDATE open_hour='".$time_am."', close_hour='".$time_pm."'";

        if(!$conn->query($command)){
	                printf("Errormessage: %s\n", $conn->error);
		        }
		        $conn->close();

		        header('Location: settings.php');	
}
// Display the Store Hours
function getStoreHours() {
	include 'dbconnect.php';
	$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
	$query = "SELECT * FROM store";
	$res = $conn->query($query);
		echo "	<div class='container'>
				<div class='row'>
				<div class='col-md-6'>";
        echo "<h2>Store Hours</h2>";
        echo "<p> Customers can place orders between:<p>";
        echo "<table><tr><th>Open</th><th>Close</th></tr>";
        while($row = mysqli_fetch_assoc($res))
        {
            $open = $row["open_hour"];
            $open = date("g:i a", strtotime($open));
            $close = $row["close_hour"];
            $close = date("g:i a", strtotime($close));
            echo "<tr><td>".$open."</td><td>".$close."</td></tr>";
        }
        echo "</table></div>";
	$conn->close();
}
// Check to see if user trying to access the page is a manager
function isManager() {
	session_start();
	if(!$_SESSION['isLogged'] || !$_SESSION['isManager'])
	{
        	header("location: managementlogin.php");
                die();
	}
	include 'links.php';
}

// Check to see if user trying to acces the page is a manager or employee
function isBoth() {
	session_start();
	if(!$_SESSION['isLogged'] || !$_SESSION['isEmployee'])
	{
		if(!$_SESSION['isLogged'] || !$_SESSION['isManager'])
		{
        	  header("location: logins.php");
		  die();
		}
	}
	include 'links.php';
}

// Get all current orders and output in a table format
function getCurrentOrders() {
	include 'dbconnect.php';

	$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
        $query = "SELECT * FROM orders WHERE isCompleted=0";
        $res = $conn->query($query);
	echo    "<table class= table><tr><th>Order ID</th><th>Order Details</th><th>Time Placed</th>
		<th>Total</th><th>Status</th></tr>";

        while($row = mysqli_fetch_assoc($res))
        {
	        $orderid =  $row["order_id"];
                $placed = $row["placed"];
                $total = number_format($row["total"], 2);

		echo	"<tr><td>".$orderid."</td><td><a href='./orderdetails.php?orderid=".$orderid.
			"'>Order Details</a></td><td>".$placed."</td><td>".$total."</td><td>
			<a href='./completed.php?orderid=".$orderid."'>Complete</a></tr>";
	}
	echo "</table><br><br>";
	$conn->close();
}

// Display all processed orders
function getPastOrders() {
	include 'dbconnect.php';
	$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
        $query = "SELECT * FROM orders WHERE isCompleted=1";
        $res = $conn->query($query);
	echo 
	"<table class= table><tr><th>Order ID</th><th>Order Details</th><th>Time Placed</th><th>Total</th></tr>";
        while($row = mysqli_fetch_assoc($res))
        {
             $orderid =  $row["order_id"];
             $placed = $row["placed"];
             $price = number_format($row["total"], 2);
	     echo 
		     "<tr><td>".$orderid."</td><td><a href='./orderdetails.php?orderid=".$orderid."'>
		     Order Details</a></td><td>".$placed."</td><td>$".$price."</td></tr>";
        }
        echo "</table><br><br>";
        $conn->close();
}
?>
