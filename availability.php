<?php
	session_start();
	$foodid = $_GET['foodid'];
	require_once 'managerfunctions.php';
	setAvailablity($foodid);
?>
