<?php
	$email = $_POST['email'];
	include 'links.php';
?>

<head>
	<title> Customer Login </title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
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
<body class="text-center">
<div class="container">
<form class="form-signin" name="login" action="badcustomerlogin.php" method="POST">
  <img class="mb-4" src="Images/javalogo.png" alt="" width="72" height="72">
  <h1 class="h3 mb-3 font-weight-normal">Kutztown University Customer Login</h1>
      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" name="email" id="email" class="form-control" placeholder="Email address" required autofocus>
      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
	  <br><br>
	<p> Don't have an account? Create one here! </p>
	<a href="createcustomeraccount.php"> Create Account </a>
	<br><br>
</form>
</div>
</body>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<?php
	$email = $_POST['email'];
  	$password = $_POST['password'];
	$password = hash('sha512',$password);

	$DB_HOST='localhost';
	$DB_USER='cscproject';
	$DB_PASS='csc354';
	$DB_NAME='project';

  $conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
	$query = "SELECT password FROM customer WHERE email = '$email'";
	$res = $conn->query($query);
	while($row = mysqli_fetch_assoc($res))
		if ($row["password"] == "$password")
		{ echo "<h1>Logged in</h1>";
			session_start();
			$_SESSION["isLogged"] = true;
			$_SESSION["user"] = $email;
			$_SESSION["isManager"] = false;
			$_SESSION["isEmployee"] = false;
			$_SESSION["isCustomer"] = true;
			header('Location: index.php');
		}
	$conn->close();
?>
