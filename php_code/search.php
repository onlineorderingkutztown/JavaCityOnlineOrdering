<head>
	<title> Search Bryce's Books Selection </title>
	<link rel="stylesheet" type="text/css" href="mystyles.css">
	<!--
	Function search()
	Parameters: None
	Description: Search DB for books
	-->
	<script type="text/javascript">
  <!--
	function Search()
	{
		if(confirm ('Are you sure you want to search?'))
		{
			document.forms["search"].submit();
			return true;
		}
		else
			return false;
	}
	function add(num)
	{
		if(confirm ('Are you sure you want to add this item to your cart?'))
		{
			var table = document.getElementById('books');
			var cell = table.rows.item(num).cells;
			var book = cell.item(0).innerHTML;
			book = "./add.php?title="book;
			document.location.href = './';

		}
		else
			return false;
	}
	-->
	</script>
</head>
<body>
<center>
	<h1> Search Bryce's Books</h1>
</center>
<center>
	<form name="search" id="search_form" action="search.php" method="POST">
		<div class="row">
			<label for="searchname">Search by ISBN or Title:</label>
			<input id="search" class="input" name="search" type="text" size="30">
		  <input id="button" type="button" value="Search" onclick="Search();">
		</div>
	</form>

</center>
	<?php
	session_start();
	$search = $_POST['search'];

	$DB_HOST='localhost';
	$DB_USER='bandr670';
	$DB_PASS='6erebEFr';
	$DB_NAME='bookstore_bandr670';

  $conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
	$query = "SELECT * FROM Products WHERE Title LIKE'%$search%'";
	$res = $conn->query($query);
	echo "<table border='1' id='books'>";
	echo "<tr><th>Title</th><th>Author</th><th>Co-Author</th><th>Co-Author</th><th>Quantity On Hand</th><th>Price</th><th>Buy</th></tr>";
	$number = 1;
	while($row = mysqli_fetch_assoc($res))
	{
			$title =  $row["Title"];
			$author = $row["Author1"];
			$author2 = $row["Author2"];
			$author3 = $row["Author3"];
			$quantity = $row["Quantity"];
			$price = number_format($row["Price"], 2);

			echo "<tr><td>".$title."</td><td>".$author."</td><td>".$author2."</td><td>".$author3."</td><td>".$quantity."</td><td>".$price."</td><td><a href='./add.php?title=".$title."'>Add to Cart</a></td>";

	}
	$query = "SELECT * FROM Products WHERE ProductID = '$search'";
	$res = $conn->query($query);
	while($row = mysqli_fetch_assoc($res))
	{
			$title =  $row["Title"];
			$author = $row["Author1"];
			$author2 = $row["Author2"];
			$author3 = $row["Author3"];
			$quantity = $row["Quantity"];
			$price = number_format($row["Price"], 2);

			echo "<tr><td>".$title."</td><td>".$author."</td><td>".$author2."</td><td>".$author3."</td><td>".$quantity."</td><td>".$price."</td><td><a href='./add.php?title=".$title."'>Add to cart</a></td>";
	}
	echo "</table>";
	$conn->close();
?>
</body>
