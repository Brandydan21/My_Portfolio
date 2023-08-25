<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="description" content="Web application development" />
<meta name="keywords" content="PHP" />
<meta name="author" content="Your Name" />
<title>Perfect Palindrome</title>
</head>
<body>
<h1>Web Programming - Lab 4 - Perfect Palindrome</h1>
<?php 
    if (isset ($_POST["value"])){ // check if form data exists
        $str = $_POST["value"]; 
        $str_lower = strtolower($str);
        $str_reverse = strrev($str_lower);
        if(strcmp($str_lower,$str_reverse) === 0 && $str_reverse === $str_lower)
        {
            echo "<p>The text you enetered '" . "<b>" .$str. "</b>". "' is a perfect palindrome";
        }
        else{
            echo "<p>The text you enetered '".$str. "' is not a perfect palindrome";
        }
    }
    else{
        echo "<p>Please enter string from the input form.</p>";
    }
?>
</body>
</html>
    