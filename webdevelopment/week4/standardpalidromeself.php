




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="description" content="Web application development" />
    <meta name="keywords" content="PHP" />
    <meta name="author" content="Your Name" />
    <title>Form</title>
</head>
<body>
    <h1>Web Programming Form - Lab 4</h1>
    <form action = "" method = "post" >
        <input type = "text" name ="value"></br>
        <input type="submit" value="Submit">
    </form>

    <?php 
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset ($_POST["value"])){ // check if form data exists
            $punctuation = ['!', '"', '#', '$', '%', '&', '\'', '(', ')', '*', '+', ',', '-', '.', '/', ':', ';', '<', '=', '>', '?', '@', '[', '\\', ']', '^', '_', '`', '{', '|', '}', '~'];
            $str = htmlspecialchars($_POST["value"]);

            $str_lower = strtolower($str);
            $cleanedString = str_replace($punctuation, '', $str_lower);
            $cleanedString = preg_replace('/\s+/', '', $cleanedString);

            $str_reverse = strrev($cleanedString);
            
            if(strcmp($cleanedString,$str_reverse) === 0 && $str_reverse === $cleanedString)
            {
                echo "<p>The text you enetered '" . "<b>" .$str. "</b>". "' is a standard palindrome";
            }
            else{
                echo "<p>The text you enetered '".$str. "' is not a standard palindrome";
            }
        }
        else{
            echo "<p>Please enter string from the input form.</p>";
        }
    }
?>
    
</body>
</html>