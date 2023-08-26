<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="description" content="Search car">
	<meta name="keywords" content="PHP, mysqli">
	<title>Car Search</title>
</head>
<body>
<h1>Car Search</h1>
<?php 
	require_once ("settings.php");

	$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

	if(!$conn){
		echo "<p>Database connection failure</p>";
	}
	else{

		$makecar =  trim($_POST['makecar']);

		$sql_tabl = "cars";

		$query = "select make, model, price FROM cars WHERE make = '%$makecar%'";

		$result = mysqli_query($conn, $query);

		if(!$result){
			echo "<p>Something is wrong with", $query, "</p>";
		}
		else {
		echo "<table border=\"1\">";
		echo "<tr>"
		."<th scope=\"col\">make</th>"
		."<th scope=\"col\">model</th>"
		."<th scope=\"col\">price</th>"
		."</tr>";	

while($row = mysqli_fetch_assoc($result)) {
	echo "<tr>";
	echo "<td>", $row["make"], "</td>";
	echo "<td>", $row["model"], "</td>";
	echo "<td>", $row["price"], "</td>";
	echo "</tr>";
}
echo "</table> ";

mysqli_free_result ($result);
}

mysqli_close($conn);
	}
 ?>
</body>
</html>