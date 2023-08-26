<!DOCTYPE html>
<html lang ="en">
<head>
    <meta charset="UTF-8"/>
    <meta name="description" content="Advance Web Development Lab 3" />
    <meta name="keywords" content="Web Programming" />
    <meta name="author" content="Henry Nguyen"/>
    <title>Lab 3 Prime Number</title>
</head>
<body>
    <h1>Lab03 Task - Prime Number</h1>
    <hr>
<?php
$num = $_GET["value"];


function is_prime($num)
{
    
    if ($num <= 1 )
    {
        $prime = false;
        return false;
        
    }
    else
    {
        for ($i = 2; $i <= $num / 2; $i++)
        {
            if ($num % $i == 0)
            {
                $prime = false; 
                return false;
                break;  
            }
        }
    }
    return true;
}

if (isset ($_GET["value"])) 
{ 
    if(is_numeric($num)){
        if (is_prime($num))
        {
            echo"<p>The number you entered $num is a prime number.</p>";
        }
        else
        {
            echo"<p>The number you entered $num is not a prime number.</p>";
        }
    }else{
        echo "<p>Please enter an integer.</p>";
    }
    

} else { // no input
echo "<p>Please enter an integer.</p>";
}



?>
</body>
</html>