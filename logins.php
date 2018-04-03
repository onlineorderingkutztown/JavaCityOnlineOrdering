<?php
  session_start();
  include 'links.php';
?>
<!DOCTYPE html>
<!--
Name: Bryce Andress
Prof: Hussain
-->
<head>
	<title> Java City Online Ordering </title>
	<link rel="stylesheet" type="text/css" href="mystyles.css">
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
    padding: 15px 40px;
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
    padding: 15px 30px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.dropdown-content a:hover {
	background-color: #8d7147
}

.dropdown:hover .dropdown-content {
    display: block;
}
.btn {
  border: 2px solid black;
  background-color: white;
  color: black;
  padding: 14px 26px;
  font-size: 16px;
  cursor: pointer;
}

/* Login Button */
.login {
  border-color: #c19d67;
  color: black;
}

.login:hover {
  background: #c19d67;
  color: black;
}

</style>
</head>
<body>

</style>

</head>
<body>

	<h1 align="center"> Log In Portal </h1>
	<center>
		<button class="btn login"><a href="customerlogin.php"> Customer Login </a></button>
		<button class="btn login"><a href="employeelogin.php"> Employee Login </a></button>
		<button class="btn login"><a href="managementlogin.php"> Management Login </a></button>

	</center>
	<br><br>
	
 <!--	<div class="footer">
		<a href="./index.html"> Home </a> &nbsp;
		<a href="./login.html"> Login </a>&nbsp;
		<a href="./createaccount.html">Create Account </a> &nbsp;
		<a href="./contact.html"> Contact Us </a>
		</div> 
 -->
<?php
include 'footer.php';
?>
</body>

