<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="description" content="Streaming Media Quiz"/>
	<meta name="keywords" content="HTML, CSS" />
	<meta name="author" content="Amber Biezen, Storm Howard, NAMES PLEASE," />
	<title>Streaming Media Quiz</title>
	<!-- other meta stuff -->
	<link href= "styles/style.css" rel="stylesheet"/>
	<link rel="icon" type="image/x-icon" href="images/favicon.ico"/>
</head>
<body>
<div class="content">
<h1> Streaming Media Quiz </h1>
	<div class="navbar">
		<a href="index.php">Home</a>
		<a href="topic.php">Topic</a>
		<a href="quiz.php">Quiz</a>
		<a href="manage.php">Manage</a>
	 	<a href="enhancements.php">Enhancements</a>    
	</div>  


<form method="post" action="markquiz.php">
	<fieldset>
		<legend>Student details</legend>
	<p><label for="student">Student ID</label> 
		<input type="text" name= "student" id="student" pattern = "[0-9]{7,10}" required="required"/>
	</p>
	<p><label for="fname">Given Name</label> 
		<input type="text" name= "fname" id="fname" pattern = "[A-Za-z ]+" required="required" maxlength = "30"/>
		<label for="lname">Family Name</label> 
		<input type="text" name= "lname" id="lname" pattern = "[A-Za-z ]+" required="required" maxlength = "30"/>
	</p>
	</fieldset>
	
	<fieldset>
		<legend>Quiz</legend>
		<p>	<label for="Q1">Q1. Which group is <strong>not</strong> responsible for streaming media?</label></p>
			<p><input type= "radio" name="Q1" value="Netflix" required="required">Netflix</p>
			<p><input type= "radio" name="Q1" value="Youtube">Youtube</p>
			<p><input type= "radio" name="Q1" value="Dysons">Dysons</p>
		
		<p>	<label for="Q2">Q2. Who developed the first ever streaming device?</label> </p>
			<select name="Q2" id="Q2">
				<option value="Gulielmo">Guglielmo Marconi</option>			
				<option value="majorGeneral">U.S. Major General Goerge O. Squier</option>
				<option value="michelangelo">Michelangelo</option>
				<option value="storm">Storm Howard</option>
			</select>
		
		<p>	<label for="Q3">Q3. What technologies are used to transmit video content from point A to point B? (choose all that apply)</label> </p>
			<p><input type= "checkbox" name="Q3[]" value="Streaming Protocols" checked="checked">Streaming Protocols</p>
			<p><input type= "checkbox" name="Q3[]" value="Codecs">Codecs (coder-decoder)</p>
			<p><input type= "checkbox" name="Q3[]" value="Video players">Video Players</p>
			<p><input type= "checkbox" name="Q3[]" value="CDN">Content Delivery Networks</p>
			<p><input type= "checkbox" name="Q3[]" value="Service-orientated Architecture">Service-orientated Architecture</p>
			
		
		<p>
			<label for="Q4">Q4. When was the first ever live streamed video streamed on the internet?</label>
			<br>
			<input type="text" id="Q4" name="Q4" pattern = "[0-9]+" required="required" maxlength = "4" />
		</p>
        <p>
			<label for="Q5">Q5. What are some of the main purposes of streaming media?</label>
			<br>
			<input type="text" id="Q5" name="Q5" placeholder="write answer here..." pattern = "^[a-zA-Z .,]+$" required="required" maxlength = "200" size = 100px/>
		</p>
	</fieldset>

	<input class="button" type="submit" value="Submit"/>
	<input class="button" type= "reset" value="Clear Answers"/>

</form>
	</div>
        <footer>
            <hr>
		
            <a href="http://www.swinburne.edu.au"><img src="images/logo.png" alt="Swinburne University Technology"></a>&emsp;&emsp;
            <p id="contactus">	Message our Team: <br>				
			<a href="mailto:104002288@student.swin.edu.au">Winston Li</a>
			<a href="mailto:103989487@student.swin.edu.au">Amber Biezen</a>
			<a href="mailto:104002288@student.swin.edu.au">Storm Howard</a>
			<a href="mailto:103864526@student.swin.edu.au">Brandy Dan</a>
			<a href="mailto:103643291@student.swin.edu.au">Doris Feng</a></p>
        </footer>
    </body>
</html>