<!DOCTYPE html>
<!--
Name: Bryce Andress, Brent Heil
Prof: Hussain

Slideshow - w3schools.com
-->

<head>
	<title> Java City Online Ordering </title>
<style>
h1 {
		font-family: 'Helvetica Neue', sans-serif;
		font-size: 35px;
		font-weight: bold;
		letter-spacing -1px;
		line-height: 1;
		text-align: center;
		color: white;
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
	text-align: justify;
}

th{
	text-align: left;	
}

body{
	border: 0;
	margin: 0;
	padding: 0;             
}
a{
	text-decoration: none;
	font: 15px Helvetica Neue, sans-serif;
}

ul {
    list-style-type: none;
	border: 0;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #c19d67;
}
li {
    float: left;
}
li a, .dropbtn {
    display: inline-block;
    color: white;
    text-align: center;
    padding: 15px 50px;
    text-decoration: none;
}

li a:hover, .dropdown:hover .dropbtn {
    background-color: #8d7147;
}

li.dropdown {
    display: inline-block;
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
    padding: 6px 6px;
    text-decoration: none;
    display: block;
    text-align: center;
}

.dropdown-content a:hover {
	background-color: #8d7147
}

.dropdown:hover .dropdown-content {
    display: block;
}


* {box-sizing:border-box}

/* Slideshow container */
.slideshow-container {
  max-width: 1920px;
  max-height: 350px;
  position: relative;
  margin: auto;
}

/* Hide the images by default */
.mySlides {
    display: none;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  margin-top: -22px;
  padding: 16px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #070707;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  -webkit-animation-name: fade;
  -webkit-animation-duration: 1.5s;
  animation-name: fade;
  animation-duration: 1.5s;
}

@-webkit-keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}
</style>

</head>
<?php
  include 'links.php';
?>
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
	
<!--	
	  <img src="Images/javalogo.png" alt="javalogo" style="width:200px;height 300px;">
	  <h1> Online Ordering Platform </h1>
	  <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	  
	  <p><small> This is a project and not an actual store. This website is only used for educational purposes. </small></p>
-->	
</body>
