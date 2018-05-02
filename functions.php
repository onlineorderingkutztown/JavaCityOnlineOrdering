<?php

function getMenu() {
	$DB_HOST='localhost';
	$DB_USER='cscproject';
	$DB_PASS='csc354';
	$DB_NAME='project';

  	$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
    	$query = "SELECT * FROM food WHERE availability = '1'";
    	$stmt = $conn->query($query);
    	return mysqli_fetch_all($stmt);
}

function getItemString($item) {

    $result = "
		<tbody>
		<tr>
		<td>$item[2]</td>
		<form onsubmit=false action=cart.php method=get>
		
		<td><input type='radio' name='price' value=$item[4]>$$item[4]</td>
		<td><input type='radio' name='price' value=$item[5]>$$item[5]</td>
		<td><input type='radio' name='price' value=$item[6]>$$item[6]</td>
		<td><input type='number' min='1' max='100' name='quan' value='$item[3]'></td>
		
		<td><input type='submit' value='Add To Cart'></td>
		<input type='hidden' name='pid' value='$item[0]'>
		</form>
		</tr>";
		
    return $result;
}

function getSearchRecords($search) {
	$DB_HOST='localhost';
	$DB_USER='cscproject';
	$DB_PASS='csc354';
	$DB_NAME='project';

  	$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
	$query = "SELECT * FROM food WHERE food_id = '$search'";
    $stmt = $conn->query($query);
    return mysqli_fetch_all($stmt);
}

?>
