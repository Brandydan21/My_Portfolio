<!DOCTYPE html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="description" content="Web Application Development :: Lab 1" />
<meta name="keywords" content="Web,programming" />
<title>Using if and while statements</title>

<h1>Lab03 Task2 - leap year</h1>

<?php
    
    
    function leapyear($n){
        if(is_numeric($n)){
            if ($n % 4==0)
            {
                echo "<p> the year you entered is ", $n, " is a leap year.</p>";
            } 
            else
            {
                echo "<p> the year you entered is ", $n, " is a standard year.</p>";
            }
        }
        else
        {
            echo "<p>Enter a number</p>";
        }
        
    }


    if (isset ($_GET["value"])) 
    { 
        $num = $_GET["value"]; // obtain the form data

        leapyear($num);

    } else { // no input
    echo "<p>Please enter an integer.</p>";
    }
?>