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
        <?php 
            $error_msg="";
            $filename = "../../data/jobposts/jobs.txt"; 
           

          

            
            function apply_filters($resultArray){
                $filteredArray = $resultArray; //create a filter array

                // filter by position type if set 
                if (isset($_GET["positionType"])) {
                    $filterValue = $_GET["positionType"];
                    $filterValue = santize_data($filterValue);
                    $filteredArray = filter_by_position_type($filteredArray, $filterValue);
                }

                
                if (isset($_GET["contract"])) {
                    $filterValue = $_GET["contract"];
                    $filterValue = santize_data($filterValue);
                    $filteredArray = filter_by_contract($filteredArray, $filterValue);
                }

                
                if (isset($_GET["appMethod"])) {
                    $filterValue = $_GET["appMethod"];
                    $filterValue = implode("/", $filterValue);
                    $filterValue = santize_data($filterValue);
                    $filteredArray = filter_by_app_method($filteredArray, $filterValue);
                }

                
                if (isset($_GET["location"])) {
                    $filterValue = $_GET["location"];
                    $filterValue = santize_data($filterValue);
                    if ($filterValue != "---") {
                        $filteredArray = filter_by_location($filteredArray, $filterValue);
                    }
                }

                return $filteredArray;
            }

            //we are creating a new array with the values that match the filter, then returning them
            // we do this to ensure that filters can stack 
            function filter_by_position_type($array, $filterValue)
            {
                $filteredArray = [];
                foreach ($array as $value) {
                    if ($filterValue == $value[4]) {
                        $filteredArray[] = $value;
                    }
                }
                return $filteredArray;
            }

            function filter_by_contract($array, $filterValue)
            {
                $filteredArray = [];
                foreach ($array as $value) {
                    if ($filterValue == $value[5]) {
                        $filteredArray[] = $value;
                    }
                }
                return $filteredArray;
            }

            function filter_by_app_method($array, $filterValue)
            {
                $filteredArray = [];
                foreach ($array as $value) {
                    if ($filterValue == $value[7]) {
                        $filteredArray[] = $value;
                    }
                }
                return $filteredArray;
            }

            function filter_by_location($array, $filterValue)
            {
                $filteredArray = [];
                foreach ($array as $value) {
                    if ($filterValue == $value[6]) {
                        $filteredArray[] = $value;
                    }
                }
                return $filteredArray;
            }




            //santize_data
            function santize_data($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            
            }
            //sort by date
            function sortByDate($a, $b){
                //conversion of string date to timestamp for comparison 
                //we create a DateTime object with the inputs 'd/m/Y', $a[3], createfromformate --> is a method to create a DateTime object
                $dateA = DateTime::createFromFormat('d/m/Y', $a[3]);
                $dateB = DateTime::createFromFormat('d/m/Y', $b[3]);
                //calling the getTimeStamp method from our datetime object stored in dateb variable
                return $dateB->getTimestamp() - $dateA->getTimestamp();
            }
            //remove expired jobs
            function removeExpiredDate($resultArray){
                
                $i=0;
                foreach($resultArray as $value)
                {   
                    //conversion of string date to timestamp for comparison 
                    $dateTimestamp =  DateTime::createFromFormat('d/m/Y',$value[3]);
                    $todayTimestamp = DateTime::createFromFormat('d/m/Y',date("d/m/y"));
                    if($dateTimestamp < $todayTimestamp)
                    {
                        unset($resultArray[$i]);
                        
                    } 
                    $i = $i+1;
                }
                 return array_values($resultArray);
            }

            //check if file exists
            if(!file_exists($filename))
            {
                $error_msg .= "file does not exist";   
            }

            if (isset($_GET["search"])) {

                $searchValue=$_GET["search"]; 
                $searchValue = santize_data($searchValue);
            }
            else{
                $error_msg .= "<p>Please choose a searchvalue</p>";
            }


            //if no error message present then we print our text file into a multi-dimensional array 
            if($error_msg === "")
            {
                $handle = fopen($filename, "r");
                
                while (($line = fgets($handle)) !== false) 
                {
               
                    $pieces = explode("\t", $line);
                    
                    $resultArray[] = $pieces;
                }       
                fclose($handle);

               

                
                
                //call function to remove outdated job  
                $resultArray=removeExpiredDate($resultArray);
                //sort the array from furthest away closing date to closest closing date
                usort($resultArray, 'sortByDate');
                //call function to remove jobs that do not fit the filters users have entered
                $resultArray=apply_filters($resultArray);

                //will search for the title in the array 
                for($i =0; $i<sizeof($resultArray); $i++)
                {
                    if(stripos($resultArray[$i][2], $searchValue) !== false)
                    {
                        $foundIndex[] = $i;
                    }
                }
               if(empty($foundIndex))
               {
                echo"<p>Job is not found.</p><br/>";
                echo '<p> <a href="index.php">Return to Home Page</a></p><p><a href="searchjobform.php">Search for another job vacancy</a></p>';

               }

               else{

                    echo"<b><h1>Job Vacancy Information</h1></b><p>Job vacancy from the most future closing date
                            until today’s date (inclusive of today’s date):</p><br/>";
                    foreach($foundIndex as $index)
                    {
                        echo"<b><h1>Avaliable position: </h1></b>
                         <p>Title:&nbsp" . $resultArray[$index][2] . "</p><br>".
                        "<p>Position ID:&nbsp" . $resultArray[$index][0] . "</p><br>". 
                        "<p>Description:&nbsp" . $resultArray[$index][1] . "</p><br>". 
                        "<p>Date:&nbsp" . $resultArray[$index][3] . "</p><br>". 
                        "<p>Position Type:&nbsp" . $resultArray[$index][4] . "</p><br>". 
                        "<p>Contract:&nbsp" . $resultArray[$index][5] . "</p><br>". 
                        "<p>Location:&nbsp" . $resultArray[$index][6] . "</p><br>". 
                        "<p>Application method:&nbsp" . $resultArray[$index][7] . "</p><hr><br>";
                         
                    }
                    echo '<p> <a href="index.php">Return to Home Page</a></p><p><a href="searchjobform.php">Search for another job vacancy</a></p>';
                    

               }
            }
            else{
                echo "<p>$error_msg</p><br /><hr>";
                echo '<p> <a href="index.php">Return to Home Page</a></p><p><a href="searchjobform.php">Search for another job vacancy</a></p>';
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
