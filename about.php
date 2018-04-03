<!DOCTYPE html>
<!--
     Name: Brent Heil
-->
<html>
   <head>
      <title> About </title>
	  <meta charset="utf-8">
	  <link rel= "stylesheet" type="text/css" href="mystyles.css">
	<style>
.grid-container {
  display: grid;
  grid-template-columns: auto auto;
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
	</style>
   </head>
<?php
include 'links.php';
?>
   <body>
	  <div class="grid-container">
		<div>
		<h1> About </h1>
		<p> Course: CSC 355 - Software Engineering II </p>
		<p> Project Members: Austin Bragg, Brent Heil, Bryce Andress, Robert Jacobs, Andrew Newman</p>	
		<p> Objective: Users can place an order at Java City before arrival to improve customer wait times and employee productivity</p>	  
		<a href="https://www.kutztown.edu/"><img src="Images/ku.jpg" alt="javalogo" style="width:300px;height 150px;"></a>
		</div>
		<div>
		<h1> Contact Us </h1>
		<p> Email: kuonlineordering@gmail.com </p>
		<p> Location: 15200 Kutztown Rd # 5, Kutztown, PA 19530</p><br>
		 
		<form onsubmit="return formSubmit()" action="mailto:kuonlineordering@gmail.com">
		<input type="submit" value="Email Us">
		</form>
		</div>
	  <br>
	  </div>
<?php
include 'footer.php';
?> 
   </body>
</html>