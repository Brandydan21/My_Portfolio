<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="description" content="Web application development" />
<meta name="keywords" content="PHP" />
<meta name="author" content="Your Name" />
<link rel="stylesheet" type="text/css" href="styles.css">
<title>Job Post Process</title>
</head>
<body>
    <header>
        <article>
            <h1>Job Post Process</h1>
        <article>
    </header>
    <main>
    <article>
         <div class="container">
        <?php // read the comments for hints on how to answer each item
            
            $error_msg="";	//error message variable
            $filename = "../../data/jobposts/jobs.txt"; 
            $directory = "../../data/jobposts/";

            //creates directory
            if(!is_dir($directory))
            {
                mkdir($directory);
                
            }


            function santize_data($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            
            }

         
            
            if(isset($_POST["positionID"]))
            {   
                $positionID=$_POST["positionID"];
                $positionID=santize_data($positionID);
                
                if(file_exists($filename))
                {
                    $handle =fopen($filename,"r");
                    $contents = file_get_contents($filename);
                    $pattern = preg_quote($positionID, '/');
                    $pattern = "/^.*$pattern.*\$/m";
                    
                    if(preg_match_all($pattern, $contents)){
                        $error_msg .= "<p>Position ID is not unique.</p>";
                    }

                    fclose($handle);
                }
                
            
            }
            else{
                $error_msg .= "<p>Please enter the position ID.</p>";
            }

            if (isset($_POST["description"])) {
                $description=$_POST["description"];
                $description=santize_data($description);
                if ($description=="") {
                    $error_msg .= "<p>Please enter a description.</p>";
                }
                if (strlen($description) > 260) {
                    $error_msg .= "<p>Description must be less than 260 characters in length.</p>";
                }
                
            }
        
            if(isset($_POST["title"]))
            {
                $title=$_POST["title"];
                $title=santize_data($title);
                if ($title=="") {
                    $error_msg .= "<p>Please enter the job title.</p>";
                }
                if (!preg_match("/^[a-zA-Z0-9,.! ]{1,20}$/",$title)) {
                    $error_msg .= "<p>Title can only contain max 20 alphanumeric characters including spaces, comma, period (full stop), and exclamation
                    point. Other characters or symbols are not allowed.</p>";
                
                }
            }

            if (isset($_POST["closingDate"])) {
                $date=$_POST["closingDate"];
                $date = santize_data($date);
                $pattern = '/^(0[1-9]|[12][0-9]|3[01])\/(0[1-9]|1[0-2])\/\d{2}$/';
                if ($date=="") {
                    $error_msg .= "<p>Please enter a closing date.</p>";
                }
                if(!preg_match($pattern, $date))
                {
                    $error_msg .= "<p>invalid date form.</p>";
                }
            }
            
            if (isset($_POST["positionType"])) {
                $positionType=$_POST["positionType"]; 
            }
            else{
                $error_msg .= "<p>Please choose a position type.</p>";
            }


            if (isset($_POST["contract"])) {
                $contract=$_POST["contract"];
            }
            else{
                $error_msg .= "<p>Please choose a contract type.</p>";
            }


            if (isset($_POST["location"])) {
                $location=$_POST["location"];
            }
            else{
                $error_msg .= "<p>Please choose a location</p>";
            }

            if (isset($_POST["appMethod"])) {

                $appMethod=$_POST["appMethod"];
                $appMethodString=implode("/",$appMethod); 
                $appMethodString=santize_data($appMethodString);
                
            }
            else {
                $error_msg .= "<p>Please choose an application option.</p>";
            }

            if($error_msg ==="")
            {
                $positionID = addslashes($positionID);
                $description = addslashes($description);
                $title = addslashes($title);
                $date = addslashes($date);
                $handle = fopen($filename, "a"); // open the file in append mode
                $data = $positionID . "\t" . $description . "\t". $title . "\t" . $date . "\t" . $positionType . "\t" . $contract . "\t" . $location . "\t" . $appMethodString ."\t" ."\n"; 
                $dataForview = $positionID . ", " . $description . ", ". $title . ", " . $date . ", " . $positionType . ", " . $contract . ", " . $location . ", " . $appMethodString . "\n"; 

                if(fwrite($handle, $data) !== false){
                    echo '<p>Your Job: ' . $dataForview . 'has been posted </p><br><hr><p><a href="index.php">Return to Home Page</a></p><p><a href="postjobform.php">Return to Job Post Form</a></p>';
                }
                else{
                    echo '<p> Could not post your job</p><p><a href="index.php">Return to Home Page</a></p><p><a href="postjobform.php">Return to Job Post Form</a></p>';

                }
                fclose($handle); 
            }
            else{
                echo "<center><h1>Job processing unsucessful, Please fix these errors: </h1></center><br>";
                echo $error_msg;
                echo '<br><hr><p><a href="index.php">Return to Home Page</a></p><p><a href="postjobform.php">Return to Job Vacancy Posting System</a></p>';
            }

        ?>
    </div>
    </article>
     </main>
    <footer >
        <p>Brandy's COS30020 Project</p>
    </footer>
</body>
</html>
