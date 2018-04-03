<!DOCTYPE html>
<!--
Name: Bryce Andress
Prof: Hussain
-->
<?php
  session_start();
  if(!$_SESSION['isLogged'] && !$_SESSION('isManager'))
  {
    header("location:managementlogin.html");
    die();
  } 
?>
<head>
	<title> Java City Online Ordering </title>
	<link rel="stylesheet" type="text/css" href="mystyles.css">
</head>

<?php
include 'links.php'
?>

<body>
<div>
<h2 align="center"> Item Availability </h2>
<center>
	<?php
	$DB_HOST='localhost';
	$DB_USER='cscproject';
	$DB_PASS='csc354';
	$DB_NAME='project';


  	$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
	$query = "SELECT * FROM food";
	$res = $conn->query($query);
	echo "<table class= items><tr><th class= items>Food Name</th><th>Availability</th><th>Mark Unavailable</th><th>Remove Item Permanently</th></tr>";
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
<?php
echo "<br><br>";
include 'footer.php';
?>
</body>

