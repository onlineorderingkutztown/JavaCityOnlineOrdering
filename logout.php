<?php
	session_start();
	$_SESSION["isLogged"] = false;
	$_SESSION["isManager"] = false;
	$_SESSION["isEmployee"] = false;
	$_SESSION["isCustomer"] = false;
	header('Location: index.php');
?>
