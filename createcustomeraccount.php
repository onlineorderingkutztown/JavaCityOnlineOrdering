<?php
include 'links.php'
?>

<head>
	<title> Create Account </title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
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
<div class="container">
<form name="createaccount" action="verifycreatecustomeraccount.php" method="GET">
<center>
  <img src="Images/javalogo.png" alt="" style="width:100px;height 200px;">
  <h1 class="h3 mb-3 font-weight-normal">Create Account</h1>
</center>
    <div class="row">
		<div class="col-md-6 mb-3">
			<label for="firstName">First Name:</label>
			<input type="text" class="form-control" id = "first" name="first" required/>
		</div>
		<div class="col-md-6 mb-3">
			<label for="lastName">Last Name:</label>
			<input type="text" class="form-control" id = "last" name="last" required/>
		</div>
		<div class="col-md-8 mb-3">
			<label for="Email">Email:</label>
			<input type="text" class="form-control" id = "email" name="email" required/>
		</div>
		<div class="col-md-6 mb-3">
			<label for="Pword">Password:</label>
			<input type="password" class="form-control" id = "password" name="password" required/>
		</div>
		<div class="col-md-6 mb-3">
			<label for="cPword">Confirm Password:</label>
			<input type="password" class="form-control" id = "pconfirm" name="confirmpassword" required/>
		</div>

				<!--<td align="right">Phone Number:</td>
				<td align="left"><input type="text" id="phone" name="phone" /></td>-->
			
			<!-- <input type="button" value="Create Account" onclick="output();"> -->
		<button class="btn btn-lg btn-primary btn-block" type="submit">Create Account</button>
	</div>
</form>
</div>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
