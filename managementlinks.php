<!DOCTYPE html>
<!--
Name: Brent Heil
Prof: Hussain
-->

<head>
<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #c19d67;
}
li {
    float: left;
}
li a, .dropbtn {
    display: inline-block;
    color: white;
    text-align: center;
    padding: 15px 50px;
    text-decoration: none;
}

li a:hover, .dropdown:hover .dropbtn {
    background-color: #8d7147;
}

li.dropdown {
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #000;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.dropdown-content a:hover {
	background-color: #48c455
}

.dropdown:hover .dropdown-content {
    display: block;
}
</style>
</head>

<body>
<ul>
	<li><a href="managementorders.php"><l> Current Orders </l></a></li>
	<li><a href="pastorders.php"><l> Past Orders </l></a></li>
	<li><a href="settings.php"><l> Settings </l></a></li>
	<li style='float:right'><a href="logout.php"><l> Logout </l></a></li>
	<li style='float:right'><a href="createemployeeaccount.php"><l> Create Employee Account </l></a></li>
</ul>


</body>

