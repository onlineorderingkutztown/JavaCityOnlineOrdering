<?php
$DB_HOST='localhost';
$DB_USER='cscproject';
$DB_PASS='csc354';
$DB_NAME='project';

$first = $_GET['first'];
$last = $_GET['last'];
$email = $_GET['email'];
$password = $_GET['password'];
$password = hash('sha512', $password);
$phonenumber = $_GET['phone'];

$conn = new mysqli($DB_HOST,$DB_USER, $DB_PASS,	$DB_NAME);
$query = "insert into customer (first_name, last_name, email, password, phone) VALUES ('$first', '$last', '$email', '$password', '$phonenumber')";
if(!$conn -> query($query))
{
	echo(mysqli_error($conn));
}
$conn->close();

header('Location: successfulcustomeraccountcreation.php');
?>
