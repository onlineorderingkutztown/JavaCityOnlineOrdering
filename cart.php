<?php SESSION_START(); ?>
<!DOCTYPE html>
<!--
Name: Bryce Andress
Prof: Hussain
-->
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

echo '<div><h1>' . print_r($_SESSION) . '</h1></div>';

require_once 'functions.php';

$exist = isset($_SESSION['user']);
    $total =0;
    if(!$exist)
    {
      echo "<div><p>Please Log In to save items to the cart.</p></div>";
    }else
    {

    	if(!isset($_SESSION['cart']))
    	{
    		$mycart = [];
    		$_SESSION['cart'] = $mycart;
    	}

	if(isset($_GET['food']))
    	{
    		$records = getSearchRecords($_GET['food']);

    		if(!isset($_SESSION['cart'][$_GET['food']]))
    		{
    			$_SESSION['cart'][$_GET['food']] = 1;
    		}

    	}
     }


?>
</body>

