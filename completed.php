<?php
	session_start();
	$orderid = $_GET['orderid'];

	require_once 'managerfunctions.php';
	markComplete($orderid);
?>
