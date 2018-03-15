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
include 'managementlinks.php'
?>

<body>
<div>
<h2 align="center"> Current Orders </h2>
<center>
	<?php
	$DB_HOST='localhost';
	$DB_USER='cscproject';
	$DB_PASS='csc354';
	$DB_NAME='project';


  	$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
	$query = "SELECT * FROM food ORDER BY category";
	$res = $conn->query($query);
	echo "<table border=1><tr><th>Food Name</th><th>Food Category</th><th>Availability</th><th>Mark Unavailable</th><td>Remove Item</td></tr>";
	$number = 1;
	while($row = mysqli_fetch_assoc($res))
	{
			$id = $row["food_id"];
			$name = $row["name"];
			$category = $row["category"];
			if ($category == 0)
				$category = "Coffee";
			else if ($category == 1)
				$category = "Donut";
			else if ($category == 2)
				$category = "Smoothie";
			else
				$category = "Bagel";
			$availability = $row["availability"];
			if ($availability == 0)
				$availability = "Unavailable";
			else
				$availability = "Available";

			echo "<tr><td>".$name."</td><td>".$category."</td><td>".$availability."</td><td><a href='./availability.php?foodid=".$id."'>Change Availablity</a></td><td><a href='./removeitem.php?foodid=".$id."'>Remove Item</a></td><tr>";
	}
	echo "</table>";
  $conn->close();
?>
	<br>
</center>
</div>
</body>

