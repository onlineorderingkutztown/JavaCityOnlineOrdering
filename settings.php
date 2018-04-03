<script src="js/jquery.js"></script>
<script src="js/moment.min.js"></script>
<script src="js/combodate.js"></script>
<?php
  session_start();
  include 'links.php';
  if(!$_SESSION['isLogged'])
  {
    header("location:managementlogin.html");
    die();
  } 
?>

<head>
	<title> Java City Online Ordering </title>
	<link rel="stylesheet" type="text/css" href="mystyles.css">
</head>
<body>
<div>
	<center>
		<?php
		$DB_HOST='localhost';
		$DB_USER='cscproject';
		$DB_PASS='csc354';
		$DB_NAME='project';

		$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
		$query = "SELECT * FROM store";
		$res = $conn->query($query);
		echo "<h2>Store Hours</h2>";
		echo "<p> Configure the order platform to best suit your needs <p> <br>";
		echo "<table class= hours><tr><th>Open</th><th>Close</th></tr>";
		while($row = mysqli_fetch_assoc($res))
		{
			$open = $row["open_hour"];
			$open = date("g:i a", strtotime($open));
			$close = $row["close_hour"];
			$close = date("g:i a", strtotime($close));
			echo "<tr><td>".$open."</td><td>".$close."</td></tr>";
		}
		echo "</table>";
		$conn->close();
		?>

		<h2>Set Store Hours</h2>
		<form action = "updatehours.php" method="get">
		Open:
		<input type="text" id="timeopen" data-format="h:mm a" data-template="hh : mm a" name="timeam" value="7:00 am">
		<script>
		$(function(){
    		$('#timeopen').combodate();  
		});
		</script>

		Close:
		<input type="text" id="timeclose" data-format="h:mm a" data-template="hh : mm a" name="timepm" value="7:00 pm">
		<script>
		$(function(){
    		$('#timeclose').combodate();  
		});
		</script><br><br>
		<input type="submit" value="Update Hours">
		</form>
		</center>
</div>
<?php
echo"<br><br>";
include 'footer.php';
?>
</body>

