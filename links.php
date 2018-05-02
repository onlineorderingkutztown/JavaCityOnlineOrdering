<!DOCTYPE html>
<!--
Name: Brent Heil
Prof: Hussain
-->
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">

  </head>
<body>
<?php
include ("dbconnect.php");
session_start();
if($_SESSION["isLogged"]){
	$manager= $_SESSION['isManager'];
	$employee=$_SESSION['isEmployee'];
	$customer=$_SESSION['isCustomer'];
	if($_SESSION["isManager"]){	
	echo 
	"
    <!-- Navigation -->
    <nav class='navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top'>
      <div class='container'>
        <a class='navbar-brand' href='index.php'>Manager</a>
        <button class='navbar-toggler navbar-toggler-right' type='button' data-toggle='collapse' data-target='#navbarResponsive' aria-controls='navbarResponsive' aria-expanded='false' aria-label='Toggle navigation'>
          <span class='navbar-toggler-icon'></span>
        </button>
        <div class='collapse navbar-collapse' id='navbarResponsive'>
          <ul class='navbar-nav ml-auto'>
            <li class='nav-item'>
              <a class='nav-link' href='managementorders.php'>Current Orders</a>
            </li>
            <li class='nav-item'>
              <a class='nav-link' href='pastorders.php'>Past Orders</a>
            </li>           
            <li class='nav-item'>
              <a class='nav-link' href='itemavailability.php'>Item Availability</a>
            </li>
			<li class='nav-item'>
              <a class='nav-link' href='settings.php'>Store Settings</a>
            </li>
            <li class='nav-item'>
              <a class='nav-link' href='createemployeeaccount.php'>Create Employee Account</a>
            </li>
			<li class='nav-item'>
              <a class='nav-link' href='managementsettings.php'>Account Settings</a>
            </li>
            <li class='nav-item'>
              <a class='nav-link' href='logout.php'>Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>	
	";
}

else if($_SESSION["isEmployee"]){
	echo
	"
    <!-- Navigation -->
    <nav class='navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top'>
      <div class='container'>
        <a class='navbar-brand' href='index.php'>Employee</a>
        <button class='navbar-toggler navbar-toggler-right' type='button' data-toggle='collapse' data-target='#navbarResponsive' aria-controls='navbarResponsive' aria-expanded='false' aria-label='Toggle navigation'>
          <span class='navbar-toggler-icon'></span>
        </button>
        <div class='collapse navbar-collapse' id='navbarResponsive'>
          <ul class='navbar-nav ml-auto'>
            <li class='nav-item'>
              <a class='nav-link' href='employeeorders.php'>Current Orders</a>
            </li>
            <li class='nav-item'>
              <a class='nav-link' href='pastorders.php'>Past Orders</a>
            </li>           
			<li class='nav-item'>
              <a class='nav-link' href='employeesettings.php'>Settings</a>
            </li>
            <li class='nav-item'>
              <a class='nav-link' href='logout.php'>Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>	
	";
}

else if($_SESSION["isCustomer"]){
	echo
	"
    <!-- Navigation -->
    <nav class='navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top'>
      <div class='container'>
        <a class='navbar-brand' href='index.php'>Customer</a>
        <button class='navbar-toggler navbar-toggler-right' type='button' data-toggle='collapse' data-target='#navbarResponsive' aria-controls='navbarResponsive' aria-expanded='false' aria-label='Toggle navigation'>
          <span class='navbar-toggler-icon'></span>
        </button>
        <div class='collapse navbar-collapse' id='navbarResponsive'>
          <ul class='navbar-nav ml-auto'>
            <li class='nav-item'>
              <a class='nav-link' href='menu.php'>Place Order</a>
            </li>
            <li class='nav-item'>
              <a class='nav-link' href='favorites.php'>Favorites</a>
            </li>
			<li class='nav-item'>
              <a class='nav-link' href='customerorders.php'>Orders</a>
            </li>
			<li class='nav-item'>
              <a class='nav-link' href='cart.php'>Cart</a>
            </li>
			<li class='nav-item'>
              <a class='nav-link' href='contact.php'>Store Information</a>
            </li>           
			<li class='nav-item'>
              <a class='nav-link' href='customersettings.php'>Settings</a>
            </li>
            <li class='nav-item'>
              <a class='nav-link' href='logout.php'>Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>";
  }

}
else
{
	echo
	"
    <!-- Navigation -->
    <nav class='navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top'>
      <div class='container'>
        <a class='navbar-brand' href='index.php'>Java City</a>
        <button class='navbar-toggler navbar-toggler-right' type='button' data-toggle='collapse' data-target='#navbarResponsive' aria-controls='navbarResponsive' aria-expanded='false' aria-label='Toggle navigation'>
          <span class='navbar-toggler-icon'></span>
        </button>
        <div class='collapse navbar-collapse' id='navbarResponsive'>
          <ul class='navbar-nav ml-auto'>
            <li class='nav-item'>
              <a class='nav-link' href='menu.php'>Menu</a>
            </li>
            <li class='nav-item'>
              <a class='nav-link' href='about.php'>About</a>
            </li>
            <li class='nav-item'>
              <a class='nav-link' href='contact.php'>Contact</a>
            </li>
            <li class='nav-item dropdown'>
              <a class='nav-link dropdown-toggle' href='#' id='navbarDropdownPortfolio' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                Login
              </a>
              <div class='dropdown-menu dropdown-menu-right' aria-labelledby='navbarDropdownPortfolio'>
                <a class='dropdown-item' href='customerlogin.php'>Customer Login</a>
                <a class='dropdown-item' href='employeelogin.php'>Employee Login</a>
                <a class='dropdown-item' href='managementlogin.php'>Manager Login</a>
              </div>
			</li>
          </ul>
        </div>
      </div>
    </nav>";

}
?>	
</body>