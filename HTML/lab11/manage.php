<!DOCTYPE html>
<html lang='en'>
<?php
	include('header.inc');
?>
<body>
    <div class="content">
        <h1>Marking Attempts</h1>
    <?php
		include('navbar.inc');
	?>
<form method="post" actions="<?php echo $_SERVER['PHP_SELF'];?>" novalidate="novalidate">
	<fieldset>
		<legend>Search Database</legend>
			<p><label for="student">Student ID: </label> 
				<input type="text" name= "student" id="student" pattern = "[0-9]{7,10}"/>
			</p>
			<p><label for="fname">Given Name</label> 
				<input type="text" name= "fname" id ="fname" pattern = "[A-Za-z ]+" maxlength = "30"/>
				<label for="lname">Family Name</label>
				<input type="text" name= "lname" id="lname" pattern = "[A-Za-z ]+" maxlength = "30"/>
			</p>
				<label for="marks">Marks</label>
				<input type="number" name= "marks" id="marks" min="1" max="5"/>
				<label for="attempts">Attempts</label>
				<input type="number" name= "attempts" id="attempts" min="1" max="2"/>
	</fieldset>
		<input class="button" type="submit" value="Search"/>

</form>
<?php
        require_once ("settings.php");
		function getPostValue($var) {  return isset($_POST[$var]) ? trim($_POST[$var]) : null; }
		function sanitise_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

        $conn = @mysqli_connect($host,
            $user,
            $pwd,
            $sql_db
        );
        //checks if connection is successful
        if (!$conn) {
            //display an error message
            echo "<p>Database connection failure</p>"; //not in production script
        } else {
			if ($_SERVER['PHP_SELF']) {
				
				//upon successful connection
				
				$sql_table="attempts";
				
				$studentid = getPostValue("student");
				$fname = getPostValue("fname");
				$lname = getPostValue("lname");
				$marks = getPostValue("marks");
				$attempts = getPostValue("attempts");
				$query ="";
				if (!$studentid && !$fname && !$lname && !$marks && !$attempts){
					$query = "SELECT * FROM attempts";
				} else {
				$conditions = "";
				$conditions .= $studentid? " studentid like '$studentid%'":"";
				$conditions .= $fname?(strlen($conditions)>0? " and":"") ." fname like '$fname%'":"";
				$conditions .= $lname?(strlen($conditions)>0? " and":"") ." lname like '$lname%'":"";
				$conditions .= $marks?(strlen($conditions)>0? " and":"") ." score = $marks":"";
				$conditions .= $attempts?(strlen($conditions)>0? " and":"") ." attempts = $attempts":"";
				
            //set up the SQL command to query or add data into the table
				$query = "SELECT * FROM attempts WHERE $conditions";
			}
            //$query = "select id, date, studentid, fname, lname, attempts, score FROM attempts ORDER BY id";
            //execute the query and store results into the result pointer
				$result = mysqli_query($conn, $query);
            //checks if the execution was successful
				if($result == false) {
					echo "<p>Something is wrong with ", $query, "</p>";
				} else {
                //Display the retrived records
					echo "<table id=quiztable border=\"1\">\n ";
					echo "<tr>\n "
						."<th scope=\"col\">ID</th>\n "
						."<th scope=\"col\">Attempted at</th>\n "
						."<th scope=\"col\">Student ID</th>\n "
						."<th scope=\"col\">Firstname</th>\n "
						."<th scope=\"col\">Lastname</th>\n "
						."<th scope=\"col\">Attempts</th>\n "
						."<th scope=\"col\">Score</th>\n "
						."</tr>\n ";
					//$row = mysql_fetch_assoc($result);
                //retrieve current record pointed by the result pointer
					while ($row = mysqli_fetch_assoc($result)){
						echo "<tr>\n ";
						echo "<td>", $row["id"],"</td>\n ";
						echo "<td>", $row["date"],"</td>\n ";
						echo "<td>", $row["studentid"],"</td>\n ";
						echo "<td>", $row["fname"],"</td>\n ";
						echo "<td>", $row["lname"],"</td>\n ";
						echo "<td>", $row["attempts"],"</td>\n ";
						echo "<td>", $row["score"],"</td>\n ";
						echo "</tr>\n ";
					}
				echo "</table>\n ";
                //frees up the memory, after using the result pointer
				mysqli_free_result($result);
				} // if successful query operation

            //close database connection
			}   //if successful database connection
			mysqli_close($conn);
		}
    ?>
    
</div>
        <?php
			include('footer.inc');
		?>
		
</body>
</html>