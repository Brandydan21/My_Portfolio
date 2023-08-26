<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="description" content="Web Programming :: Lab 2" />
<meta name="keywords" content="Web,programming" />
<title>Using variables, arrays and operators</title>
</head>
<body>
<h1>Days array</h1>
<?php
$days = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
echo "<p>The days of the week in English are: <br>";

foreach($days as $value){
    
    if($value == "Sunday"){
        echo $value . ". ";

    }
    else{ 
        echo $value . ", ";
    } 

    
}        

$days[0] = "Lundi"; 
$days[1] = "Mardi";                                                                                     // modify elements
$days[2] = "Mercredi";
$days[3] = "Jeudi";
$days[4] = "Vendredi";
$days[5] = "Samedi";
$days[6] = "Dimanche";

echo "<p>The days of the week in French are: <br>";
foreach($days as $value){
    
    if($value == "Dimanche"){
        echo $value . ". ";

    }
    else{ 
        echo $value . ", ";
    } 

    
}        

?>
</body>
</html>