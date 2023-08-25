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
        $punctuation = ['!', '"', '#', '$', '%', '&', '\'', '(', ')', '*', '+', ',', '-', '.', '/', ':', ';', '<', '=', '>', '?', '@', '[', '\\', ']', '^', '_', '`', '{', '|', '}', '~'];
        $str = $_POST["value"]; 
        $str_lower = strtolower($str);
        $cleanedString = str_replace($punctuation, '', $str_lower);
        $cleanedString = preg_replace('/\s+/', '', $cleanedString);

        $str_reverse = strrev($cleanedString);
        
        if(strcmp($cleanedString,$str_reverse) === 0 && $str_reverse === $cleanedString)
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
    