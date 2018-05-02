<?php
	session_start();

	$time_am = $_GET['timeam'];
	$time_am = date("G:i", strtotime($time_am));
	$time_pm = $_GET['timepm'];
	$time_pm = date("G:i", strtotime($time_pm));

	require_once 'managerfunctions.php';
	setStoreHours($time_am, $time_pm);
?>
