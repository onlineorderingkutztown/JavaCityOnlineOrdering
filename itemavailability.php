<!DOCTYPE html>
<!--
Name: Bryce Andress
Prof: Hussain
-->
<?php
  session_start();
  require_once 'managerfunctions.php';
  isManager();
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

<body>
    <div class="container">
      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Item Availability
        <small> Kutztown Java City </small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Item Availability</li>
      </ol>
<center>
	<?php
	$DB_HOST='localhost';
	$DB_USER='cscproject';
	$DB_PASS='csc354';
	$DB_NAME='project';


  	$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
	$query = "SELECT * FROM food";
	$res = $conn->query($query);
	echo "<table class= table><tr><th>Food Name</th><th>Availability</th><th>Mark Unavailable</th><th>Remove Item Permanently</th></tr>";
	while($row = mysqli_fetch_assoc($res))
	{
			$id = $row["food_id"];
			$name = $row["name"];
			$small = $row["price_s"];
			$medium = $row["price_m"];
			$large = $row["price_l"];
			$availability = $row["availability"];
			if ($availability == 0)
				$availability = "Unavailable";
			else
				$availability = "Available";

			echo "<tr><td class= items>".$name."</td><td>".$availability."</td><td><a href='./availability.php?foodid=".$id."'>Change Availablity</a></td><td><a href='./removeitem.php?foodid=".$id."'><center>Remove Item</center></a></td><tr>";
	}
	echo "</table><br<br>";
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
include 'footer.php';
?>