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
	h1 {
		font-family: 'Helvetica Neue', sans-serif;
		font-size: 40px;
		font-weight: bold;
		letter-spacing -1px;
		line-height: 1;
		text-align: center;
		text-decoration: underline;
	}
	</style>
   </head>
<?php
include 'links.php';
?>
   <body>
	  <div>	  
		<h1> About </h1>
		<p> Course: CSC 355 - Software Engineering II </p>
		<p> Project Members: Austin Bragg, Brent Heil, Bryce Andress, Robert Jacobs, Andrew Newman</p>	
		<p> Objective: Users can place an order at Java City before arrival to improve customer wait times and employee productivity</p>	  
		<a href="https://www.kutztown.edu/"><img src="Images/ku.jpg" alt="javalogo" style="width:300px;height 150px;"></a>
		<br>
		<h1> Contact Us </h1>
		<p> Email: bheil504@live.kutztown.edu </p>
		<p> Location: 15200 Kutztown Rd # 5, Kutztown, PA 19530</p><br>
	  
	  <form onsubmit="return formSubmit()" action="mailto:bheil504@live.kutztown.edu">
	  <input type="submit" value="Email Us">
	  </form>
	  <br>
	    
	  </div>
	  <p><small> This is a project and not an actual store. This website is only used for educational purposes.</small></p> 
   </body>
</html>