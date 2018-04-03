<?php
	$email = $_POST['email'];
	include 'links.php'
?>
<head>
	<title> Employee Login </title>
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
<a href="./index.php"><img src="Images/javalogo.png" alt="javalogo" style="width:100px;height 200px;"></a>
<div>
<center>
<form name="login" action="bademployeelogin.php" method="POST">
  <h2> Employee Login </h2>
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
	
	<br>
	<p> Don't have an account? Talk to your manager! </p>
	<br><br>
</center>
</form>
</div>
<?php
include 'footer.php';
?>
</body>
<?php
	$email = $_POST['email'];
  	$password = $_POST['password'];
	$password = hash('sha512',$password);


	$DB_HOST='localhost';
	$DB_USER='cscproject';
	$DB_PASS='csc354';
	$DB_NAME='project';

  $conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
	$query = "SELECT password FROM employees WHERE email = '$email'";
	$res = $conn->query($query);
	while($row = mysqli_fetch_assoc($res))
		if ($row["password"] == "$password") 
		{ echo "<h1>Logged in</h1>";
			session_start();
			$_SESSION["isLogged"] = true;
			$_SESSION["isManager"] = false;
			$_SESSION["isEmployee"] = true;
			$_SESSION["isCustomer"] = false;
			header('Location: employeeorders.php');
		}
	$conn->close();
?>
