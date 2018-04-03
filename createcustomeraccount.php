<?php
include 'links.php'
?>

<head>
	<title> Create Account </title>
	<link rel="stylesheet" href="mystyles.css">
	<style type="text/css">
	</style>
	<!--
	Function output()
	Parameters: None
	Description: Make sure user entered data, and that it is valid. Ask the user if they want to submit data to "server". If they do output the data on a dom object. If they do not return to the form.
	Return: If any checks fail return an alert saying where they screwed up. If all checks
	pass return a dom object of what was entered
	-->
	<script type="text/javascript">
	<!--
	function output()
	{
		var first = document.getElementById("first").value;
		var last = document.getElementById("last").value;
		var email = document.getElementById("email").value;
		var password = document.getElementById("password").value;
		var pconfirm = document.getElementById("pconfirm").value;
		var phone = document.getElementById("phone").value;

		if (first == "" || last == "" || email == "" || password == "" || pconfirm =="")
			return alert("Please fill in all required fields properly");

		if (!email.includes("@"))
			return alert ("Email must contain an @ and a .");
		if (!email.includes("."))
			return alert ("Email must contain an @ and a .");

		if(isNaN(phone))
			return alert ("Phone must contain only numbers");

	  if (confirm ('Are you sure you want to create an account?'))
		{
			return;
		}
		else
			return;
	}
	-->
	</script>
</head>
<body>
<a href="./index.php"><img src="Images/javalogo.png" alt="javalogo" style="width:100px;height 200px;"></a>
<div>
<center>
<form name="createaccount" action="verifycreatecustomeraccount.php" method="GET">
  <h2> Create Account </h2>
  <table>
    <tr>
      <td align="right">First Name:<font color=red>*</font></td>
      <td align="left"><input type="text" id = "first" name="first" required/></td>
      <td align="right">Last Name:<font color=red>*</font></td>
      <td align="left"><input type="text" id = "last" name="last" required/></td>
    </tr>
    <tr>
      <td align="right">Email:<font color=red>*</font></td>
      <td align="left"><input type="text" id="email" name="email" required/></td>
    </tr>
		<tr>
      <td align="right">Password:<font color=red>*</font></td>
      <td align="left"><input type="password" id="password" name="password" required/></td>
			<td align="right">Confirm Password<font color=red>*</font>:</td>
      <td align="left"><input type="password" id="pconfirm" name="confirmpassword" required/></td>
    </tr>
			<!--<td align="right">Phone Number:</td>
			<td align="left"><input type="text" id="phone" name="phone" /></td>-->
	</table>
	<p><font color=red>*</font> denotes a required field </p>
	<!-- <input type="button" value="Create Account" onclick="output();"> -->
	<input type="submit" value = "Submit">
	<input type="reset" value="Clear" onclick="return confirm('Are you sure you want to clear the form?');" style="width:100px">
	
</form>
</center>
</div>
<?php
echo "<br><br>";
include 'footer.php';
?>
</body>
