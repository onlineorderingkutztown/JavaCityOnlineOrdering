<head>
	<title> Welcome, KU Java City User </title>
	<link rel="stylesheet" type="text/css" href="mystyles.css">
</head>
<?php
  session_start();
  if(!$_SESSION['isLogged'] || !$_SESSION['isCustomer'])
  {
    header("location:customerlogin.php");
    die();
  } 
  include 'links.php';
?>

<body>
<div>
<center>
	<h1> Welcome to Kutztown's Java City! </h1>
</center>
<center>
	<h2> Try one of our famous drinks by placing an order now!<h2>
	<img src="Images/welcome.jpg" alt="Hello user">
	
<br>
</div>
</center>
<?php
include 'footer.php';
?>
</body>