<script src="js/jquery.js"></script>
<script src="js/moment.min.js"></script>
<script src="js/combodate.js"></script>
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
      <h1 class="mt-4 mb-3">Store Settings
        <small> Kutztown Java City </small>
      </h1>

      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Store Settings</li>
      </ol>
	 </div> 
	 
	<center>
		<?php
		require_once 'managerfunctions.php';
  		getStoreHours();
		?>
	<div class="col-md-6">
		<h2>Set Store Hours</h2>
		<p> Configure the order platform to best suit your needs <p>
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
		</div>
	</center>
<?php
echo"<br><br>";
include 'footer.php';
?>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

