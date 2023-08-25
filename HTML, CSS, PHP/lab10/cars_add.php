<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="description" content="sending data to database">
	<meta name="keywords" content="PHP, sqli">
	<title>Adding Cars</title>
</head>
<body>
<?php 
require_once ("settings.php");

	$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

	if (!$conn) {
		echo "<p>Database connection failure</p>";
	}

	else {

		$make = trim($_POST['carmake']);
		$model = trim($_POST['carmodel']);
		$price = trim($_POST['price']);
		$yom = trim($_POST['yom']);

		$make = htmlspecialchars($make);
		$model = htmlspecialchars($model);
		$price = htmlspecialchars($price);
		$yom = htmlspecialchars($yom);

		$sql_table = "cars";

		$query = "insert into $sql_table (make, model, price, yom) values ('$make', '$model', '$price', '$yom')";

		$result = mysqli_query($conn, $query);

		if(!$result){
			echo "<p class=\"wrong\">Something is wrong with", $query, "</p>";
		}

		else{
			echo "<p class=\"ok\">Successfully added car</p>";
		}
		mysqli_close($conn);
	}

 ?>
</body>
</html>