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
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" novalidate="novalidate">
	<fieldset>
		<legend>Search Database</legend>
			<p><label for="student">Student ID</label> 
				<input type="text" name= "student" id="student" pattern = "[0-9]+"/>
			</p>
			<p><label for="fname">Given Name</label> 
				<input type="text" name= "fname" id ="fname" pattern = "[A-Za-z ]+" maxlength = "30"/>
				<label for="lname">Family Name</label>
				<input type="text" name= "lname" id="lname" pattern = "[A-Za-z ]+" maxlength = "30"/>
			</p>
				<label for="marks">Marks</label>
				<input type="number" name= "marks" id="marks" min="1" max="6"/>
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
					echo "<table id='quiztable' class='content'>\n ";
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
				//if($delete= getPostValue("delete"));{
					//$query = "DELETE attempts FROM attempts WHERE studentid = 1";	
				//}
?>
		<!-- delete -->
	<form method="post" action=<?php echo $_SERVER['PHP_SELF'];?> novalidate="novalidate">
		<fieldset>
			<legend>Delete all Attempts for a Student</legend>
			<p><label for="student">Student ID: </label> 
				<input type="text" name= "studentDelete" id="studentDelete" pattern = "[0-9]+"/>
			</p>
			<input class = "button" type="submit" name="delete" value="Delete"/>
		
		<?php	
			if(isset($_POST["delete"])){
				$conn = @mysqli_connect($host,
				$user,
				$pwd,
				$sql_db
				);
				if (!$conn) {
					//display an error message
					echo "<p>Database connection failure</p>"; //not in production script
					} else {
						if(isset($_POST["delete"])){
							$studentDelete = getPostValue("studentDelete");
							$query = "DELETE FROM attempts WHERE studentid = '$studentDelete'";
							$result = mysqli_query($conn, $query);
						}
						if(!$result) {
							echo "<p>Something is wrong with ", $query, "</p>";
						} else {
							echo "<p class=\"ok\">Successfully Deleted Attempts of $studentDelete</p>";
						//frees up the memory, after using the result pointer
						}
						mysqli_close($conn);
					}
				}
		?>
		</fieldset>	
	</form>

	<form method="post" action=<?php echo $_SERVER['PHP_SELF'];?> novalidate="novalidate">
		<fieldset>
			<legend>Update Attempts for a Student</legend>
			<p>	<label for="studentUpdate">Student ID: </label> 
				<input type="text" name= "studentUpdate" id="studentUpdate" pattern = "[0-9]+" required="required"/>
				<label for="attemptUpdate">Attempts</label>
				<input type="number" name= "attemptUpdate" id="attemptUpdate" min="1" max="2" required="required"/>
			</p>
				<label for="scoreUpdate">New Score</label>
				<input type="number" name= "scoreUpdate" id="scoreUpdate" min="1" max="6" required="required"/>
			<input class = "button" type="submit" name="update" value="Update"/>
			
		
		<?php	
			if(isset($_POST["update"])){
				$conn = @mysqli_connect($host,
				$user,
				$pwd,
				$sql_db
				);
				if (!$conn) {
					//display an error message
					echo "<p>Database connection failure</p>"; //not in production script
					} else {
						if(isset($_POST["update"])){
							$studentUpdate = getPostValue("studentUpdate");
							$attemptUpdate = getPostValue("attemptUpdate");
							$scoreUpdate = getPostValue("scoreUpdate");
							$query = "UPDATE attempts SET score = $scoreUpdate WHERE studentid = $studentUpdate AND attempts = $attemptUpdate";
							$result = mysqli_query($conn, $query);
						}
						if($result == false) {
							echo "<p>Something is wrong with ", $query, "</p>";
						} else {
						//Display the retrived records
							echo "<p class=\"ok\">Successfully changed the score of Student $studentUpdate</p>";
						}
					} // if successful query operation
		
					//close database connection
					mysqli_close($conn);
				}
		?>
		</fieldset>
	</form>
			
</div>
        <?php
			include('footer.inc');
		?>
		
</body>
</html>