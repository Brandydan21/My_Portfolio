
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="description" content="Creating Web Applications Lab10">
	<meta name="keywords" content="PHP, Mysql">
	<title>Retrieving Records to HTML</title>
</head>
<body>
<h1>Creating Web Applications - Lab10</h1>
<?php
	require_once ("settings.php");

	$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

	if (!$conn) {
		echo "<p>Database connection failure</p>";
	}
	else {
		$sql_table="cars";

		$query = "select make, model, price FROM cars ORDER BY make, model";

		$result = mysqli_query($conn, $query);

	if(!$result) {
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