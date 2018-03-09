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
	$email = $_POST['email'];
?>
<head>
	<title> Login </title>
	<link rel="stylesheet" href="mystyles.css">
	<style type="text/css">
	.container {
		width: 500px;
		clear: both;
	}
	.container input {
		width: 100%;
		clear: both;
	}
	</style>
	<!--
	Function output()
	Parameters: None
	Description: Check the data the user enterd. If it pass checks ask the user if they want to submit data to "server". If they do output
	the data on a dom object. If they do not return to the form.
	-->
	<script type="text/javascript">
	<!--
	function output()
	{
		var email = document.getElementById("email").value;
		if (!email.includes("@"))
		{
			alert ("Email must contain an @ and a .");
			return false;
		}
		if (!email.includes("."))
		{
			alert ("Email must contain an @ and a .");
			return false;
		}

		if(document.getElementById("email").value == "" || document.getElementById("password").value == "")
		{
			alert("Please fill in all required fields");
			return false
		}

		if(confirm ('Are you sure you want to login?'))
		{
			document.forms["login"].submit();
			return true;
		}
		else
			return false;
	}
	-->
	</script>
</head>
<body>
<h3> Incorrect E-Mail or Password </h3>
<center>
<form name="login" action="login.php" method="POST">
  <h3> Login </h3>
  <table>
    <tr>
      <td align="right">E-Mail:<font color=red>*</font></td>
      <td align="left"><input type="text" id="email" name="email" value="<?php echo $email;?>" required/></td>
		</tr>
		<tr>
      <td align="right">Password:<font color=red>*</font></td>
      <td align="left"><input type="password" id="password" name="password" required/></td>
    </tr>
	</table>
	&emsp; &emsp; &emsp; &emsp;<font color=red>*</font> denotes required field. <br>
	&emsp; &emsp; &emsp; &emsp;<input type="button" value="Login" onclick="output();">
	<input type="reset" value="Clear" onclick="return confirm ('Are you sure you want to clear?');">
</center>
</form>
		<div class="footer">
			<a href="./index.html"> Home </a> &nbsp;
			<a href="./search.html"> Search </a> &nbsp;
			<a href="./browse.php"> Browse Categories </a> &nbsp;
			<a href="./login.html"> Login </a>&nbsp;
			<a href="./createaccount.html">Create Account </a> &nbsp;
			<a href="./orders.php"> Orders </a> &nbsp;
			<a href="./contact.html"> Contact Us </a>
		</div>
</body>
<?php
	$email = $_POST['email'];
  $password = $_POST['password'];

	$DB_HOST='localhost';
	$DB_USER='bandr670';
	$DB_PASS='6erebEFr';
	$DB_NAME='bookstore_bandr670';

  $conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
	$query = "SELECT Passwd, CustomerID FROM Customers WHERE Email = '$email'";
	$res = $conn->query($query);
	while($row = mysqli_fetch_assoc($res))
		if ($row["Passwd"] == "$password")
		{ echo "<h1>Logged in</h1>";
			session_start();
			$_SESSION["isLoggedIn"] = "True";
			$_SESSION["CustomerID"] = $row["CustomerID"];
			header('Location: successindex.html');
		}
	$conn->close();
?>
