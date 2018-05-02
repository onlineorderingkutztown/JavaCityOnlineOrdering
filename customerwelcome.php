<head>
	<title> Welcome, KU Java City User </title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">
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
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>