<?php
  session_start();
  include 'links.php';
?>
<!--
Key: AIzaSyBlWpsSVmvuaBQcGip7MFzkZnM0iQCXROw
-->
<!DOCTYPE html>
<html>
<style>
#map {
        height: 400px;
        width: 100%;
}
</style>
<head>
  	<title> Contact </title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">
</head>
<body>
	<!-- Page Content -->
    <div class="container">

      <!-- Page Heading/Breadcrumbs -->
      <h1 class="mt-4 mb-3">Contact
        <small> Kutztown Java City </small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Contact</li>
      </ol>

      <!-- Content Row -->
      <div class="row">
        <!-- Map Column -->
        <div class="col-lg-8 mb-4">
          <!-- Embedded Google Map -->
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
        </div>
        <!-- Contact Details Column -->
        <div class="col-lg-4 mb-4">
          <h3>Contact Details</h3>
          <p>
            15200 Kutztown Road
            <br>Kutztown, PA 19530
            <br>
          </p>
		  <p> 
			Location: Rohrbach Library, Kutztown University 
		  </p>
          <p>
            <abbr title="Email">Email</abbr>:
            <a href="mailto:kuonlineordering@gmail.com">kuonlineordering@gmail.com
            </a>
          </p>
<?php
	include 'dbconnect.php';
		$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
		$query = "SELECT * FROM store";
		$res = $conn->query($query);
		while($row = mysqli_fetch_assoc($res))
		{
			$open = $row["open_hour"];
			$open = date("g:i a", strtotime($open));
			$close = $row["close_hour"];
			$close = date("g:i a", strtotime($close));
			echo "<p> <abbr title='Hours'>Hours</abbr>: Monday - Friday: ".$open." to ".$close."</p>";
		}
		echo "</table></center>";
		$conn->close();
?> 
        </div>
      </div>
      <!-- /.row -->

      <!-- Contact Form -->
      <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
      <div class="row">
        <div class="col-lg-8 mb-4">
          <h3>Send us a Message</h3>
          <form name="sentMessage" id="contactForm" novalidate>
            <div class="control-group form-group">
              <div class="controls">
                <label>Full Name:</label>
                <input type="text" class="form-control" id="name" required data-validation-required-message="Please enter your name.">
                <p class="help-block"></p>
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Phone Number:</label>
                <input type="tel" class="form-control" id="phone" required data-validation-required-message="Please enter your phone number.">
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Email Address:</label>
                <input type="email" class="form-control" id="email" required data-validation-required-message="Please enter your email address.">
              </div>
            </div>
            <div class="control-group form-group">
              <div class="controls">
                <label>Message:</label>
                <textarea rows="10" cols="100" class="form-control" id="message" required data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
              </div>
            </div>
            <div id="success"></div>
            <!-- For success/fail messages -->
            <button type="submit" class="btn btn-primary" id="sendMessageButton">Send Message</button>
          </form>
        </div>

      </div>
      <!-- /.row -->

    </div>
<?php
include 'footer.php';
?>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Contact form JavaScript -->
    <!-- Do not edit these files! In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>
</body>