
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="description" content="Web application development" />
<meta name="keywords" content="PHP" />
<meta name="author" content="Brandy Dan" />
 <link rel="stylesheet" type="text/css" href="styles.css">



<title>Job Vacancy Posting System</title>
</head>
<body>
    <header>
        <article>
            <h1>Job Vacancy Posting System</h1>
        <article>
    </header>
    <main>
    <article>
        <div class="container">
        <form action="searchjobprocess.php" method="get">
            <table>
                <tr>
                    <td><label for="search">Search:</label><br></td>
                    <td><input type="text" id="search" name="search" required></td> 
                </tr>
                <tr>
                    <td><b><u><h2>Filters:</h2></u></b></td>
                   
                </tr>
                
                <tr>
                    <td><label for ="positionType">Position Type:</label></td>
                    <td>
                            <input type="radio" name="positionType" id="fullTime" value="Full Time">
                            Full Time
                        
                            <input type="radio" name="positionType" id="partTime"value="Part Time">
                            Part Time
                        
                    </td>
                </tr>
                <tr>
                    <td><label for ="contract">Contract:</label></td>
                    <td>
                        
                            <input type="radio" name="contract" id="onGoing" value="On Going">
                            On-going
                        
                            <input type="radio" name="contract" id="fixedTerm"value="Fixed Term">
                            Fixed Term
                    
                    </td>
                </tr>
                <tr>
                    <td><label for="appMethod[]">Application by:</label></td>
                    <td>
                        <input type="checkbox" name="appMethod[]" id="post" value="Post" > Post
                        <input type="checkbox" name="appMethod[]" id="email" value="Email"> Email
                    </td>

                </tr>
                <tr>
                    <td><label for ="location">Location:</label></td>
                    <td><select id="location" name="location">
                        <option >---</option>
                        <option value="ACT">ACT</option>
                        <option value="NSW">NSW</option>
                        <option value="NT">NT</option>
                        <option value="QLD">QLD</option>
                        <option value="SA">SA</option>
                        <option value="TAS">TAS</option>
                        <option value="VIC">VIC</option>
                        <option value="WA">WA</option>
                        </select>
                    </td>
                </tr>   




                <tr>
                    <td><br></td>
                </tr> 
                <tr>
            
                    <td><input type="submit" value="Search"><input type="reset" value="reset"></td>
                
                </tr>

                <tr>
                    <td><br><p> <a href="index.php">Return to Home Page</a></p></td>
                
                </tr>
                
                </table>

        </form>
   
        </div>
    </article>
    </main>
    <footer>
        <p>Brandy's COS30020 Project</p>
    </footer>
    
</body>

</html>
