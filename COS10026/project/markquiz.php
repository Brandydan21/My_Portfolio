<!DOCTYPE html>
<html lang="en">
<?php
	include('header.inc');
?>
<body>
	<div id=quizcontents>
	<h1>Quiz Attempt</h1>
	<!-- cleaning up -->
	<?php 
		include('navbar.inc');
	?>
	<?php
		function sanitise_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
	?>
	<!-- Begin processing the form -->
	<?php
		// Keep track of correct marks
		$marks = 0;

		// checks if process was triggered by a form submit, if otherwise, displays an error message
		if (isset ($_POST["student"])){
			$student = $_POST["student"];
			$student = sanitise_input($student);
		}
		else {
			//error message when it hasn't been triggered by the form submit
			header ("location: quiz.php");
		}
		if (isset ($_POST["fname"])) {
			$fname = $_POST["fname"];
			$fname = sanitise_input($fname);
		} 
		else {
			//error message when it hasn't been triggered by the form submit
			header ("location: quiz.php");
		}
		
		if (isset ($_POST["lname"])) {
			$lname = $_POST["lname"];
			$lname = sanitise_input($lname);
		} 
		else {
			//error message when it hasn't been triggered by the form submit
			header ("location: quiz.php");
		}

		// Mark Question 1
		if (isset ($_POST["Q1"])) {
			$Q1 = $_POST["Q1"];
			$Q1 = sanitise_input($Q1);
			if ($Q1 == 'Dysons')
				$marks++;
		} else {
			header ("location: quiz.php");
		}

		// Mark Question 2
		if (isset ($_POST["Q2"])) {
			$Q2 = $_POST["Q2"];
			$Q2 = sanitise_input($Q2);
			if ($Q2 == 'Gulielmo')
				$marks++;
		}
		else {
			//error message when it hasn't been triggered by the form submit
			header ("location: quiz.php");
		}

		// Mark Question 3
		if (isset ($_POST["Q3"])) {
			$Q3 = array();
			foreach($_POST['Q3'] as $Q3checkbox){
				$Q3[] = sanitise_input($Q3checkbox);
			}
			if (sizeof($Q3) == 4 && $Q3[0] == 'Streaming Protocols' && $Q3[1] == 'Codecs' and $Q3[2] == "Video players" and $Q3[3] == 'CDN')
				$marks++;
		} else {
			header ("location: quiz.php");
		}

		// Mark Question 4
		if (isset ($_POST["Q4"])) {
			$Q4 = $_POST["Q4"]; 
			$Q4 = sanitise_input($Q4);
			if ($Q4 == '1993')
				$marks++;
		} else {
			header ("location: quiz.php");
		}

		// Mark Question 5 (four keywords/phrases worth one mark each, marks capped at 2 for this question)
		if (isset($_POST["Q5"])) {
			// Get and sanitise the input
			$Q5 = $_POST["Q5"]; 
			$Q5 = sanitise_input($Q5);

			// Check for keywords/phrases
			$Q5marks = 0;
			$Q5 = "text " . $Q5;
			if (strpos($Q5, "entertainment") || strpos($Q5, "entertain"))
				$Q5marks++;
			if (strpos($Q5, "consume media") || strpos($Q5, "consuming media") || strpos($Q5, "consumption of media") || strpos($Q5, "media consumption"))
				$Q5marks++;
			if (strpos($Q5, "communicating") || strpos($Q5, "communication") || strpos($Q5, "communicate"))
				$Q5marks++;
			
			// Add the marks
			$marks += min($Q5marks, 2);
		} else {
			header ("location: quiz.php");
		}

		// Check for errors
		$errMsg = "";
		if ($student=="") {
			$errMsg .= "<p>Please enter your Student ID. </p>";
		} elseif (!is_numeric($student)) { // Check that the student id matches the formatting
			$errMsg .= "<p>Student ID must be digits only</p>";
		} elseif (strlen($student) < 7 || strlen($student) > 10) {
			$errMsg .= "<p>Student ID must be between 7-10 digits</p>";
		} else if (!preg_match("/^[0-9]*$/", $student)) {
			$errMsg .= "<p>Only numbers are allowed in your student id.</p>";
		}

		// Check that the first name matches the formatting
		if ($fname=="") {
			$errMsg .= "<p>You must enter your first name. </p>";
		} elseif (!preg_match("/^[a-zA-Z- ]*$/",$fname)) {
			$errMsg .= "<p>Only alpha letters are allowed in your first name.</p>";
		} elseif (strlen($fname) > 30) {
			$errMsg .= "<p>First name cannot be more than 30 characters</p>";
		}

		// Check that the last name matches the formatting
		if ($lname=="") {
			$errMsg .= "<p>You must enter your last name. </p>";
		} elseif (!preg_match("/^[a-zA-Z- ]*$/",$lname)) {
			$errMsg .= "<p>Only alpha letters or hypens are allowed in your lastname.</p>";
		} elseif (strlen($lname) > 30) {
			$errMsg .= "<p>Last name cannot be more than 30 characters</p>";
		}

		// If there is an error, echo an error message
		if ($errMsg != "") {
			echo "<p>$errMsg</p>";
			echo "<a href=quiz.php class=button>Return to Quiz</a>";
			exit;
		}

		// Connect to the database
		require_once ("settings.php");
		$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

		// Echo an error if there is one, otherwise attempt to send the attempt to the table
        if (!$conn) {
            echo"<p>Database connection failure</p>";
        } else{
			// Make a query for any previous attempts
            $sql_table = "attempts";
			$attemptsQuery = "SELECT studentid, attempts FROM $sql_table WHERE studentid = $student ORDER BY attempts DESC";
			$attemptsResult = mysqli_query($conn, $attemptsQuery);

			// Get the previous attempt from the query, with 0 as the fallback for no attempts.
			$previousAttempt = 0;
			if (mysqli_num_rows($attemptsResult) > 0)
				$previousAttempt = max($previousAttempt, mysqli_fetch_assoc($attemptsResult)["attempts"]);
			
			// If the student has not used all of their attempts yet, send the current attempt
			if ($previousAttempt == 2) {
				echo "<p>You cannot submit any more attempts, you have already submitted twice</p>";
			} elseif ($marks == 0) {
				echo "<p>You cannot submit with a score of 0</p>
						<p>Name: $fname $lname <br />
						StudentID: $student <br />
						Score: $marks / 6<br />
						Attempts: $attempts / 2</p>";
			} else {
				// Add the current attempt to the table
				$date = date(DATE_ATOM);
				$attempts = $previousAttempt + 1;
				$insertquery = "insert into $sql_table (date, studentid, fname, lname, attempts, score) values ('$date', '$student', '$fname', '$lname', '$attempts', '$marks')";
				$insertResults = mysqli_query($conn, $insertquery);

				// Echo status message
				if (!$insertResults) {
				    echo "<p class='wrong'>Something is wrong with ", $insertquery, "</p>";
				} else {
					// Echo success message and marks
				    echo "<p class='ok'>Successfully added attempt</p>
							<p>Name: $fname $lname <br />
							StudentID: $student <br />
							Score: $marks / 6<br />
							Attempts: $attempts / 2</p>";
					if ($attempts == 1) {
						echo "<a href=quiz.php class='button'>Attempt again</a>";
					}
				}
			}

            mysqli_close($conn);
        }
		
    ?>
</div>
</body>
</html>
