	<?php
	session_start();
	unset($_SESSION["cart"]);
	$_SESSION["isLoggedIn"] = False;
	header('Location: index.html');
?>
