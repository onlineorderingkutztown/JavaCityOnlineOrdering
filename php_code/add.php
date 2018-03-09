<!--
Name: Bryce Andress
Prof: Hussain
Class: Web Programming I
Date: 2/27/17
URL: www.unixweb.kutztown.edu/~bandr670/Project/Phase2/login.php
Project Phase 2
Log into an account for Bryce's Books
-->
<?php
	session_start();
	$title = $_GET['title'];
	$cart = $_SESSION["cart"];
	if ($cart == NULL)
	{
		$cart = array();
	}
	array_push($cart, $title);
	$_SESSION["cart"] = $cart;
	header('Location: shoppingcart.php');
	//print_r($_SESSION);
?>
