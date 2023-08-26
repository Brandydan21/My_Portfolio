<!DOCTYPE html>


<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Using PHP Variables, Arrays and operators</title>
	<meta name="description" content="PHP variables arrays and operators">
	<meta name="keywords" content="PHP, arrays, operators">	
	<meta name="author" content="Brandy Dan">

</head>
<body>
	
<h1>PHP Variables, Arrays and operations</h1>
<?php 
	$marks = array(85, 85, 95);
	$marks[1] = 90;
	$ave = ($marks [0] + $marks [1] + $marks[2]) / 3; 
	if ($ave >= 50)
		$status = "passed";
	else
		$status = "failed";
	echo "<p>The average score is $ave. You $status.</p>";
?>

<?php 
	$days = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
	echo "<p> The days in the week in english are <br> $days[0], $days[1], $days[2], $days[3], $days[4], $days[5], $days[6] </p>";
	$days[0] = "Dimanche";
	$days[1] = "Lundi";
	$days[2] = "Mardi";
	$days[3] = "Mercredi";
	$days[4] = "Jeudi";
	$days[5] = "Vendredi";
	$days[6] = "Samedi";
	echo "The days in the week in French are: <br> $days[0], $days[1], $days[2], $days[3], $days[4], $days[5], $days[6]";

?>
</body>
</html>