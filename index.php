<!DOCTYPE html>
<!--
Name: Bryce Andress, Brent Heil
Prof: Hussain

Slideshow - Bootstrap
-->

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
<?php
  include 'links.php';
?>
    <header>
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <!-- Slide One - Set the background image for this slide in the line below -->
          <div class="carousel-item active">
		  <img src="Images/coffee.jpg" style="height:100%; width:100%;">
            <div class="carousel-caption d-none d-md-block">
              <img src="Images/javalogo.png" alt="javalogo" style="width:150px;height 225px;">
			  <br><br><br><br><br><br><br><br><br>
			  <h3>Welcome to Kutztown University's</h3>
              <h3>Online Ordering System</h3>
            </div>
          </div>
          <!-- Slide Two - Set the background image for this slide in the line below -->
          <div class="carousel-item">
		  <img src="Images/scrollbar.jpg" style="height:100%; width:100%";>
            <div class="carousel-caption d-none d-md-block">
            </div>
          </div>
          <!-- Slide Three - Set the background image for this slide in the line below -->
          <div class="carousel-item">
		  <img src="Images/wallpaper.jpg" style="height:100%; width:100%;">
            <div class="carousel-caption d-none d-md-block">
			  <img src="Images/javalogo.png" alt="javalogo" style="width:150px;height 225px;">
			  <br><br><br><br><br><br><br><br><br>
			  <h3>Come on in and try one of our delicious new drinks!</h3>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </header>
<?php
include 'footer.php';
?>

<?php
/**
<body>
<!-- Slideshow container -->
<div class="slideshow-container">

  <!-- Full-width images with number and caption text -->
  <div class="mySlides fade">
    <div class="numbertext">1 / 3</div>
    <img src="Images/wallpaper.jpg" style="width:100%">
    <div class="text"><img src="Images/javalogo.png" alt="javalogo" style="width:200px;height 300px;">
	<h1> Online Ordering Platform </h1></div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">2 / 3</div>
    <img src="Images/scrollbar.jpg" style="width:100%">
    <div class="text"><img src="Images/javalogo.png" alt="javalogo" style="width:200px;height 300px;">
	<h1> Online Ordering Platform </h1></div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">3 / 3</div>
    <img src="Images/coffee.jpg" style="width:100%">
    <div class="text"><img src="Images/javalogo.png" alt="javalogo" style="width:200px;height 300px;">
	<h1> Online Ordering Platform </h1></div>
  </div>

  <!-- Next and previous buttons -->
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<!-- The dots/circles -->
<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>

<script>
var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1} 
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none"; 
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block"; 
  dots[slideIndex-1].className += " active";
}
</script>
*/
?>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>