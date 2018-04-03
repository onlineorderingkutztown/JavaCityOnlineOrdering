<!DOCTYPE html>
<!--
Name: Brent Heil
Prof: Hussain
-->

<?php
include ("dbconnect.php");
session_start();
if($_SESSION["isLogged"]){
	$manager= $_SESSION['isManager'];
	$employee=$_SESSION['isEmployee'];
	$customer=$_SESSION['isCustomer'];
	if($_SESSION["isManager"]){	
	echo 
	"<ul>
	<li><a href='./index.php'><l>Manager</l></a></li>
	<li style='float:right'><a href='logout.php'><l> Logout </l></a></li>	
	<li style='float:right'><a href='createemployeeaccount.php'><l> Create Employee Account </l></a></li>
	<li style='float:right'><a href='settings.php'><l> Store Settings </l></a></li>
	<li style='float:right'><a href='itemavailability.php'><l> Item Availability </l></a></li>
	<li style='float:right'><a href='pastorders.php'><l> Past Orders </l></a></li>
	<li style='float:right'><a href='managementorders.php'><l> Current Orders </l></a></li>
	</ul>";
}

else if($_SESSION["isEmployee"]){
	echo
	"<ul>
	<li><a href='./index.php'><l>Employee</l></a></li>		
	<li style='float:right'><a href='logout.php'><l> Logout </l></a></li>
	<li style='float:right'><a href='pastorders.php'><l> Past Orders </l></a></li>
	<li style='float:right'><a href='employeeorders.php'><l> Current Orders </l></a></li>
	</ul>";
}

else if($_SESSION["isCustomer"]){
	echo
	"<ul>
	<li><a href='./index.php'><l>Customer</l></a></li>			
	<li style='float:right'><a href='logout.php'><l>Logout</l></a></li>
	<li style='float:right'><a href='customersettings.php'><l>Settings</l></a></li>
	<li style='float:right'><a href='kulocation.php'><l>Store Information</l></a></li>	
	<li style='float:right'><a href='cart.php'><l>Cart</l></a></li>
	<li style='float:right'><a href='customerorders.php'><l>Orders</l></a></li>
	<li style='float:right'><a href='favorites.php'><l>Favorites</l></a></li>
	<li style='float:right'><a href='menu.php'><l>Place Order</l></a></li>
	</ul>";
  }

}
else
{
	echo
	"<ul>
	<li><a href='./index.php'><l>Java City</l></a></li>		
	<li style='float:right' class='dropdown'><a href= 'logins.php' class='dropbtn'><l>Login</l></a>
		<div class='dropdown-content'>
		<a href='customerlogin.php'>Customer</a>
		<a href='employeelogin.php'>Employee</a>
		<a href='managementlogin.php'>Manager</a>
		</div>
	 </li>
	<li style='float:right'><a href='kulocation.php'><l> Store Information </l></a></li>
	<li style='float:right'><a href='about.php'><l> About </l></a></li>
	<li style='float:right'><a href='menu.php'><l> Menu </l></a></li>
	</ul>";

}
?>	

<head>
<style>
ul {
    list-style-type: none;
	border: 0;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #c19d67;
	text-align: center;
}
li {
    float: left
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
    text-align: center;
}

.dropdown-content a:hover {
	background-color: #8d7147;
}

.dropdown:hover .dropdown-content {
    display: block;
}

</style>
</head>


