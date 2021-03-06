<?php SESSION_START(); ?>
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
<?php
include 'links.php'
?>
<body>
<?php
require_once 'functions.php';
echo "<div class='container'>
      <!-- Page Heading/Breadcrumbs -->
      <h1 class='mt-4 mb-3'>Cart
        <small> Kutztown Java City </small>
      </h1>

      <ol class='breadcrumb'>
        <li class='breadcrumb-item'>
          <a href='index.php'>Home</a>
        </li>
        <li class='breadcrumb-item active'>Cart</li>
      </ol>
	  </div>";
    $exist = isset($_SESSION['user']);
    $total = 0;
    if(!$exist)
    {
      echo "<div class='container'><p>Please Log In to save items to the cart.</p></div>";
    }else
    {		
    	if(!isset($_SESSION['cartprice']))
    	{
    		$mycartp = [];
    		$_SESSION['cartprice'] = $mycartp;
    	}

	if(!isset($_SESSION['cartquan']))
    	{
    		$mycartq = [];
    		$_SESSION['cartquan'] = $mycartq;
    	}

	if(isset($_GET['pid']))
    	{
    		if(!isset($_SESSION['cartquan'][$_GET['pid']]))
    		{
    			$_SESSION['cartquan'][$_GET['pid']] = $_GET['quan'];
    		}
		if(!isset($_SESSION['cartprice'][$_GET['pid']]))
    		{
    			$_SESSION['cartprice'][$_GET['pid']] = $_GET['price'];
    		}
	echo "
	<div class='container'>
			<table class= table><tr>
			<th>Product Name</th>
			<th>Price</th>
			<th>Quantity</th>
			<th>Remove</th>
			</tr>";
    	}
     
	if(isset($_GET['remove']))
    	{
		UNSET($_SESSION['cartprice'][$_GET['remove']]);
		UNSET($_SESSION['cartquan'][$_GET['remove']]);
	}

	foreach($_SESSION['cartquan'] as $key => $value)
    	{

    	$crecord = getSearchRecords($key);
    	$name = $crecord[0][2];
	$quant = $_SESSION['cartquan'][$key];
	$price = $_SESSION['cartprice'][$key];

    	echo "<tr>
			<td>$name</td>
          	<td>&#36; $price</td><br>
            <td>Quantity: $quant</td>
			<td>
          	<form action=cart.php method=get>
                <input type=hidden name=remove value='$key'>
                <input type='submit' value='Remove'></td>
          	     </form></tr>";
    	} 

if(!(empty($_SESSION['cartquan'])))
        {
    	foreach($_SESSION['cartquan'] as $key => $value)
    	{
	
	  $price = $_SESSION['cartprice'][$key];
	  $total = $total + ($price * $value);
	
          $Stot = number_format($total, 2);
        }

	$Stotwtax = $Stot * 1.06;
	$Stotwtax = number_format($Stotwtax, 2);
	$tax = $Stotwtax - $Stot;

	$DB_HOST='localhost';
	$DB_USER='cscproject';
	$DB_PASS='csc354';
	$DB_NAME='project';
	
  	$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
        $query = "SELECT * FROM store";
	$res = $conn->query($query);
	while($row = mysqli_fetch_assoc($res))
	{
		echo"<tfoot><tr><td>Order Total = $$Stotwtax</td>
					<td> </td> <td> </td> <td> </td>
					</tr></tfoot></table>
					(Sales tax of 6% included)<br>";
                    echo"<form action=cart.php method=get>
                    <input type=hidden name=checkout value='1'>";

		$open =  $row["open_hour"];
		$twelveopen = $open % 12;
		$close = $row["close_hour"];
		$twelveclose = $close % 12;
		$time = date("H:i:s");
		if($time > $open && $time < $close)
		{
                    echo "<center><input type='submit' value='Checkout'></center><br>";
		}
		else
		{
		    echo "Sorry Ordering is disabled while Java City is Closed<br>";
		    echo "Store Hours are ".$twelveopen.":00 AM - ".$twelveclose.":00 PM";
                    echo "<br><input type='submit' disabled value='Checkout'>";
		}

          	echo "</form></div>";
	}
	
     }

	if(isset($_GET['checkout']))
        {
 
	$DB_HOST='localhost';
	$DB_USER='cscproject';
	$DB_PASS='csc354';
	$DB_NAME='project';

  	$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
	
	$cemail = $_SESSION['user'];
	$cart = $_SESSION['cartquan'];
		// get the order number
        	$query = "SELECT * FROM customer WHERE email = '$cemail'";
        	$stmt = $conn->query($query);
        	$record = mysqli_fetch_all($stmt);
        	$customer = $record[0][0];
        	$insert = "INSERT INTO orders (customer_id,subtotal,tax,total) VALUES ('$customer','$Stot','$tax','$Stotwtax')";
        	$stmt = $conn->query($insert);
        	$order_id = $conn->insert_id;
        	// insert all the shopping cart items into the order_items table
        	foreach ($cart as $pid => $quantity) {
			$crecord = getSearchRecords($pid);
    			$sprice = $crecord[0][4];
			$mprice = $crecord[0][5];
			$lprice = $crecord[0][6];
			$pprice = $_SESSION['cartprice'][$pid];
			if($pprice == $sprice)
			{
				$size = "Small";
			}else if($pprice == $mprice)
			{
				$size = "Medium";
			}else if($pprice == $lprice)
			{
				$size = "Large";
			}  
            		$insert = "INSERT INTO order_items (order_id,food_id,quantity,Size) VALUES ('$order_id','$pid','$quantity','$size')";
            		$stmt = $conn->query($insert);
  		}
        
	unset($_SESSION['cartquan']);
	unset($_SESSION['cartprice']);


	header('Location: Rorder.php?orderid='.$order_id);

        }

if((empty($_SESSION['cartquan'])))
{
echo "
<div class='container'>
<center>
<p> The cart is currently empty. Check out the menu to place an order!</p>
</div>
</center>
<br><br>";
}


    }


?>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

<?php
include 'footer.php';
?>