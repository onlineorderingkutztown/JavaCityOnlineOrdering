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
		var address = document.getElementById("address").value;
		var city = document.getElementById("city").value;
		var state = document.getElementById("state").value;
		var zip = document.getElementById("zip").value;
		var address2 = document.getElementById("2street").value;
		var phone = document.getElementById("phone").value;

		if (first == "" || last == "" || email == "" || password == "" || pconfirm ==""
			|| address == "" || city == "" || state == "" || zip == "")
			return alert("Please fill in all required fields properly");

		if (!email.includes("@"))
			return alert ("Email must contain an @ and a .");
		if (!email.includes("."))
			return alert ("Email must contain an @ and a .");

		if(isNaN(zip))
			return alert ("Zip must contain only numbers");

		if(isNaN(phone))
			return alert ("Phone must contain only numbers");

	  if (confirm ('Are you sure you want to create an account?'))
		{
			document.write('First Name: '+ first + " Last Name: " + last);
			document.write('email: '+ email + " password: " + password);
			document.write('password confirm: '+ pconfirm + " address: " + address);
			document.write('city: '+ city + " state: " + state);
			document.write('zip: '+ zip + " 2nd Street: " + address2);
			document.write('phone: '+ phone);
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
<form name="createaccount" action="" method="">
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
		<tr>
      <td align="right">Address:<font color=red>*</font></td>
      <td align="left"><input type="text" id="address" name="Address" required/></td>
			<td align="right">City<font color=red>*</font>:</td>
      <td align="left"><input type="text" id="city" name="City" required/></td>
    </tr>
		<tr>
      <td align="right">State:<font color=red>*</font></td>
      <td align="left"><select name="state" id="state" required>
			  <option value="">Options</option>
				<option value="AK">Alaska</option>
				<option value="AZ">Arizona</option>
				<option value="AR">Arkansas</option>
				<option value="CA">California</option>
				<option value="CO">Colorado</option>
				<option value="CT">Connecticut</option>
				<option value="DE">Delaware</option>
				<option value="DC">District of Columbia</option>
				<option value="FL">Florida</option>
				<option value="GA">Georgia</option>
				<option value="HI">Hawaii</option>
				<option value="ID">Idaho</option>
				<option value="IL">Illinois</option>
				<option value="IN">Indiana</option>
				<option value="IA">Iowa</option>
				<option value="KS">Kansas</option>
				<option value="KY">Kentucky</option>
				<option value="LA">Louisiana</option>
				<option value="ME">Maine</option>
				<option value="MD">Maryland</option>
				<option value="MA">Massachusetts</option>
				<option value="MI">Michigan</option>
				<option value="MN">Minnesota</option>
				<option value="MS">Mississippi</option>
				<option value="MO">Missouri</option>
				<option value="MT">Montana</option>
				<option value="NE">Nebraska</option>
				<option value="NV">Nevada</option>
				<option value="NH">New Hampshire</option>
				<option value="NJ">New Jersey</option>
				<option value="NM">New Mexico</option>
				<option value="NY">New York</option>
				<option value="NC">North Carolina</option>
				<option value="ND">North Dakota</option>
				<option value="OH">Ohio</option>
				<option value="OK">Oklahoma</option>
				<option value="OR">Oregon</option>
				<option value="PA">Pennsylvania</option>
				<option value="RI">Rhode Island</option>
				<option value="SC">South Carolina</option>
				<option value="SD">South Dakota</option>
				<option value="TN">Tennessee</option>
				<option value="TX">Texas</option>
				<option value="UT">Utah</option>
				<option value="VT">Vermont</option>
				<option value="VA">Virginia</option>
				<option value="WA">Washington</option>
				<option value="WV">West Virginia</option>
				<option value="WI">Wisconsin</option>
				<option value="WY">Wyoming</option>
			</select>
			</td>
			<td align="right">Zip:<font color=red>*</font></td>
      <td align="left"><input type="text" id="zip" name="zip" required/></td>
    </tr>
		<tr>
			<td align="right">2nd Street Address: </td>
			<td align="left"><input type="text" id="2street" name="2street"/> </td>
			<td align="right">Phone Number: </td>
			<td align="left"><input type="text" id="phone" name="phone" /></td>
	</table>
	<p><font color=red>*</font> denotes a required field </p>
	<input type="button" value="Create Account" onclick="output();">
	<input type="reset" value="Clear" onclick="return confirm('Are you sure you want to clear the form?');" style="width:100px">
	
</form>
</center>
</div>
</body>
