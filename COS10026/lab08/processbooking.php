<!DOCTYPE html>
<html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Booking Confirmation</title>
	<meta name="description" content="Processing booking">
	<meta name="keywords" content="form, php">	
	<meta name="author" content="Brandy Dan">
</head>
<body>
	<h1>Rohirrim Tour Booking Confirmation</h1>

<?php
function sanitise_input ($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	
	if (isset ($_POST["firstname"])) {
		$firstname = $_POST["firstname"];

	}
	else {
		header("location: register.html");
	}

	if (isset ($_POST["lastname"])) {
		$lastname = $_POST["lastname"];

	}
	else {
		header("location: register.html");

	}

	if (isset ($_POST["age"])) {
		$age = $_POST["age"];

	}
	else {
		header("location: register.html");

	}

	if (isset ($_POST["food"])) {
		$food = $_POST["food"];

	}
	else {
		header("location: register.html");

	}

	if (isset ($_POST["partySize"])) {
		$partySize = $_POST["partySize"];

	}
	else {
		header("location: register.html");

	}
	if (isset ($_POST["species"]))
		$species = $_POST["species"];
	else
		$species = "Unknown species";

$tour = " ";
if (isset ($_POST["1day"])) $tour = $tour. "One-day tour ";
if (isset ($_POST["4day"]))	$tour = $tour. "Four-day tour";
if (isset ($_POST["10day"])) $tour = $tour. "Ten-day tour";

$firstname = sanitise_input($firstname);
$lastname = sanitise_input($lastname);
$species = sanitise_input($species);
$age = sanitise_input($age);
$food = sanitise_input($food);
$partySize = sanitise_input($partySize);


$errMsg = "";

if ($firstname==""){
	$errMsg .= "<p>You must enter your first name </p>";
}
elseif (!preg_match("/^[a-zA-Z]*$/", $firstname)){
	$errMsg .= "<p>Only alpha letters allowed in your first name.</p>";
}
if ($lastname==""){
	$errMsg .= "<p>You must enter your last name </p>";
}
elseif (!preg_match("/^[a-zA-Z-]*$/", $lastname)){
	$errMsg .="<p>Only Alpha letters and hyphens allowed in your last name</p>";
}
if (!is_numeric($age)){
	$errMsg .= "<p>Enter a number</p>";
}
if ($age < 10 or $age > 10000){
	$errMsg .= "<p>Enter an age between 10 and 10000 </p>";
}

if ($errMsg !=""){
	echo "<p>$errMsg</p>";
}

else{
	echo "<p> Welcome $firstname $lastname ! <br/>
	you are now booked on the $tour <br/>
	species: $species <br/>
	age: $age <br/>
	meal preference: $food <br/>
	number of travellers: $partySize </p>";
}

?>
</body>
</html>