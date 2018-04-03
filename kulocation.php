<?php
  session_start();
  include 'links.php';
?>
<!--
Key: AIzaSyBlWpsSVmvuaBQcGip7MFzkZnM0iQCXROw
-->
<!DOCTYPE html>
<html>
  <head>
	<style>
a{
	text-decoration: none;
	font: 15px Helvetica Neue, sans-serif;
}

body{
	border: 0;
    margin: 0;
    padding: 0;
	text-align: center;             
	background-repeat:   no-repeat;
}



.grid-container {
  display: grid;
  grid-template-columns: auto;
  grid-gap: 10px;
  background-color: #ffffff;
  padding: 10px;
}
.grid-container > div {
  background-color: #f7f7f7;
  text-align: center;
  padding: 10px 0;
  font-size: 30px;
}

h1 {
	font-family: 'Helvetica Neue', sans-serif;
	font-size: 40px;
	font-weight: bold;
	letter-spacing -1px;
	line-height: 1;
	text-align: center;
	text-decoration: underline;
}
	
h2{
	font: bold 25px arial, sans-serif;
}

h3{
	font: bold 20px arial, sans-serif;	
}

p{
	font: 15px arial, sans-serif;
}

l{
	font: 18px arial, sans-serif;
}

td{
	text-align: center;
}

th{
	text-align: center;	
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #c19d67;
    min-width: 120px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: white;
    padding: 15px 30px;
    text-decoration: none;
    display: block;
    text-align: center;
}

.dropdown-content a:hover {
	background-color: #8d7147;
}

.dropdown:hover .dropdown-content {
    display: block;
}

#map {
        height: 400px;
        width: 800px;
}
    </style>
  </head>
  <body>

<div class="grid-container">
	<div>
    <h1>Store Information</h1>

<?php
	include 'dbconnect.php';
		$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
		$query = "SELECT * FROM store";
		$res = $conn->query($query);
		echo "<h2>Store Hours</h2>";
		echo "<center><table class= hours><tr><th>Open</th><th>Close</th></tr>";
		while($row = mysqli_fetch_assoc($res))
		{
			$open = $row["open_hour"];
			$open = date("g:i a", strtotime($open));
			$close = $row["close_hour"];
			$close = date("g:i a", strtotime($close));
			echo "<tr><td>".$open."</td><td>".$close."</td></tr>";
		}
		echo "</table></center>";
		$conn->close();
?>
	<p> Location: Rohrbach Library, Kutztown University </p>
	<p> (Shown on the map below as Starbucks between the McFarland Student Union and Chick-fil-A) </p>
	</div>
</div>
<br>
<center>
    <div id="map"> </div>
    <script>
      function initMap() {
        var uluru = {lat: 40.513236, lng: -75.785450};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 16,
          center: uluru,
		  mapTypeId: 'hybrid'
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBlWpsSVmvuaBQcGip7MFzkZnM0iQCXROw&callback=initMap">
    </script>
	<br><br>
<?php
include 'footer.php';
?>
</center>
  </body>
</html>
