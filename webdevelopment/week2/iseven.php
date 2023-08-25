<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="description" content="Web Programming :: Lab 2" />
<meta name="keywords" content="Web,programming" />
<title>Using variables, arrays and operators</title>
</head>
<body>
<h1>I Seven</h1>
<?php


 $value = $_GET["value"];
 
 
 
 if(is_numeric($value)){ 
    
    $value = round($value);
    if($value % 2 == 0){
        echo "<p>The variable $value contains an even number </p>";
    }
    else{
        echo "<p>The variable $value contains an odd number</p>";
    }
}
else{ 
    echo "<p> not number</p>";
} 
 

?>
</body>
</html>