<?php
$DB_HOST='localhost';
$DB_USER='cscproject';
$DB_PASS='csc354';
$DB_NAME='project';

$first = $_GET['first'];
$last = $_GET['last'];
$email = $_GET['email'];
$password = $_GET['password'];
$password = hash('sha512',$password);
$isManager = $_GET['isManger'];

if ($isManager=="No")
{
	$isManager = 0;
}
else
	$isManager = 1;

$conn = new mysqli($DB_HOST,$DB_USER, $DB_PASS,	$DB_NAME);
$query = "insert into employees (isManager, first_name, last_name, password, email) VALUES ('$isManager', '$first', '$last', '$password', '$email')" or die("cannot inset the row". mysql_error());
$conn -> query($query);
$conn->close();

header('Location: successfulmanagementorders.php');
?>
