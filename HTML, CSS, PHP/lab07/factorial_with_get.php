<!DOCTYPE html>
<html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Factorial</title>
	<meta name="description" content="PHP variables arrays and operators">
	<meta name="keywords" content="PHP, arrays, operators">	
	<meta name="author" content="Brandy Dan">
</head>
<body>
<?php
	include ("mathfunctions.php")
?>
<h1> Factorial </h1>

<?php 
	if(isset($_GET['number'])) 
		$num = $_GET['number'];
		if (isPositiveInteger ($num)){
			echo "<p>", $num, "! is", factorial ($num), ".</p>";
		}
		else {
			echo "<p> Please enter a positive integer </p>";
		}
	echo "<p><a href='factorial.html'>Return to the entry page</a></p>";
 ?>
</body>
</html>