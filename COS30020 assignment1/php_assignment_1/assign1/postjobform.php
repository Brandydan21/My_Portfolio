
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
        <form action="postjobprocess.php" method="post">
            <table>
            <tr>
                <td><label for="positionID">Position ID:</label></td>
                <td><input type="text" id="positionID" name="positionID" pattern="PID\d{4}" required></td> 
            </tr>
            <tr>
               <td><label for="title">Title: </label></td>
                <td><input type="text" id="title" name="title" pattern="[A-Za-z0-9\s,.\!]{1,20}" required></td>
            </tr>
            <tr>
                <td><label for="description">Description:</label></td>
                <td><textarea id="description" name="description" rows="4" maxlength="250" required></textarea></td>
            </tr>
            <tr>
                <td> <label for="closingDate">Closing Date:</label></td>
                <td><input type="text" id="closingDate" name="closingDate" value="<?php echo date('d/m/y'); ?>" required></td>
            </tr>
            <tr>
                <td><label for ="positionType">Position Type:</label></td>
                <td>
                        <input type="radio" name="positionType" id="fullTime" value="Full Time" required>
                        Full Time
                    
                        <input type="radio" name="positionType" id="partTime"value="Part Time" required>
                        Part Time
                    
                </td>
            </tr>

             <tr>
                <td><label for ="contract">Contract:</label></td>
                <td>
                    
                        <input type="radio" name="contract" id="onGoing" value="On Going" required>
                        On-going
                    
                        <input type="radio" name="contract" id="fixedTerm"value="Fixed Term" required>
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
                <td><select id="location" name="location" required>
                    <option value="">---</option>
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
                <td><input type="submit" value="post"><input type="reset" value="reset"></td>
                
            </tr>
           <tr>
                <td><br><p>All fields are required <a href="index.php">Return to Home Page</a></p></td>
                
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
