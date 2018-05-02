<?php

function updateProfile() {
}
function updateAccountInfo() {
}
function showAccount() {
}
function orderDetails($orderid) {
	include 'dbconnect.php';
	$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
        $query = "SELECT * FROM orders WHERE order_id=".$orderid;
        $res = $conn->query($query);
	echo "<table class= table><tr><th>OrderID</th><th>Time Placed</th>
	      <th>Subtotal</th><th>Tax</th><th>Total</th><th>Status</th></tr>";
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
		     echo "<tr><td>".$orderid."</td><td>".$placed."</td><td>$".$subtotal."</td><td>$".$tax."</td>
			  <td>$".$total."</td><td>Not Completed</td></tr>";
             }
             else
             {
		     echo "<tr><td>".$orderid."</td><td>".$placed."</td><td>$".$subtotal."</td><td>$".$tax."</td>
			     <td>$".$total."</td><td>Completed</tr>";
             }
             echo "</table>";
      	}
        $conn->close();
}
function itemsInOrder($orderid) {
	include 'dbconnect.php';
	$conn1 = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
        $query1 = "SELECT * FROM order_items WHERE order_id=".$orderid;
        $res = $conn1->query($query1);
	echo "<table class= table><tr><th>Food ID</th><th>Food Name</th><th>Quantity Ordered</th>
		<th>Individual Cost</th></tr>";
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
		    echo "<tr><td>".$foodid."</td><td>".$name."</td><td>".$quantity."</td>
			  <td>$".$price_s."</td></tr>";

		  }
		  else if($size == "Medium")
		  {
		         $price_m = $row2["price_m"];
			 echo "<tr><td>".$foodid."</td><td>".$name."</td><td>".$quantity."</td>
			      <td>$".$price_m."</td></tr>";
                  }
		  else
		  {
		        $price_l = $row2["price_l"];
			echo "<tr><td>".$foodid."</td><td>".$name."</td><td>".$quantity."</td>
				<td>$".$price_l."</td></tr>";
                  }
            }

        }
        echo "</table>";
        $conn->close();
}
function destroyAccount() {
}
function startOrder() {
}
function cancelOrder() {
}
function getOrderTime($orderid) {
	include 'dbconnect.php';
	$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
	$query = "SELECT * FROM orders WHERE isCompleted=0";
	$res = $conn->query($query);
	$totalitems = 0;
	while($row = mysqli_fetch_assoc($res))
	{
		if($row['order_id'] <= $orderid)
		{
			$conn2 = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
			$query2 = "SELECT * FROM order_items WHERE order_id=".$row['order_id'];
			$res2 = $conn2->query($query2);
			while($row2 = $res2->fetch_array())
			{
				$quantity = $row2['quantity'];
				$totalitems = $totalitems + $quantity;
			}
		}
	}
	return $totaltime = $totalitems;
}


function viewPastOrders() {
       include 'dbconnect.php';
       session_start();
       $conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
       $query = "SELECT * FROM orders WHERE isCompleted=1";
       $res = $conn->query($query);
       echo "<table class= table><tr><th>Order ID</th><th>Order Details</th><th>Time Placed</th><th>Total</th></tr>";
       while($row = mysqli_fetch_assoc($res))
       {
	    $customer = $row["customer_id"];
            $order =  $row["order_id"];
            $placed = $row["placed"];
            $price = money_format($row["total"], 2);


	    if($_SESSION["customer_id"] == $customer)
	    {
	    	echo "<tr><td>".$order."</td><td><a href='./Rorder.php?orderid=".$order."'>Order Details</a></td>
		  <td>".$placed."</td><td>$".$price."</td></tr>";
	    }
	    else
	    {
	    }
       }
       echo "</table>";
       $conn->close();
}


function login($email, $password) {
	include 'dbconnect.php';
	$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
        $query = "SELECT * FROM customer WHERE email = '$email'";
        $res = $conn->query($query);
        while($row = mysqli_fetch_assoc($res))
	{
                if ($row["password"] == "$password")
		{ 	
			echo "<h1>Logged in</h1>";
	                session_start();
	                $_SESSION["isLogged"] = true;
	                $_SESSION["user"] = $email;
	                $_SESSION["isManager"] = false;
	                $_SESSION["isEmployee"] = false;
			$_SESSION["isCustomer"] = true;
			$_SESSION["customer_id"] = $row["customer_id"];
			header('Location: index.php');
		}
	        $conn->close();
	}
}
function setFavorite() {
}
function returnFavorite() {
}
function isCustomer() {
	session_start();
	if(!$_SESSION['isLogged'] || !$_SESSION['isCustomer'])
	{
	        header("location: managementlogin.php");
                die();
        }
        include 'links.php';
}
?>
