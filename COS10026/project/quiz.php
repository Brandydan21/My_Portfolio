<!DOCTYPE html>
<html lang="en">
<?php
	include('header.inc');
?>
<body>
<div class="content">
<h1> Streaming Media Quiz </h1>
<?php
	include('navbar.inc');
?>


<form method="post" action="markquiz.php" novalidate="novalidate">
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
        <?php
			include('footer.inc');
		?>
		
    </body>
    </body>
</html>