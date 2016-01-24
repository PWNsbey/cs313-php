<?php
	session_start();

	if (!isset($_SESSION["hasTakenSurvey"]))
	{
		$_SESSION["hasTakenSurvey"] = false;
	}
	else
	{
		$_SESSION["hasTakenSurvey"] = true;
		header("Location: surveyResults.php");
		exit();
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="stylesheet.css"/>
	</head>

	<body>
		<p>This is a simplistic form. Will prettify soon.</p>
		<p>*Five hours later* HAHA NOPE!
		<form action="surveyResults.php" method="post">

			<p class="segmentedParagraph">Please select your favorite breakfast food:<br>
			<input type="radio" name="Breakfast_Food" value="Pankcakes">Pancakes<br>
			<input type="radio" name="Breakfast_Food" value="Waffles">Waffles<br>
			<input type="radio" name="Breakfast_Food" value="Eggs and Bacon">Eggs and bacon<br>
			<input type="radio" name="Breakfast_Food" value="Cereal">Cereal<br>
			</p>

			<p class="segmentedParagraph">Please select your favorite music genre:<br>
			<input type="radio" name="Music_Genre" value="Rock">Rock<br>
			<input type="radio" name="Music_Genre" value="Country">Country<br>
			<input type="radio" name="Music_Genre" value="Electronic">Electronic<br>
			<input type="radio" name="Music_Genre" value="Hip Hop">Hip Hop<br>
			</p>

			<p class="segmentedParagraph">Please select your favorite ethnic food:<br>
			<input type="radio" name="Ethnic_Food" value="Chinese">Chinese<br>
			<input type="radio" name="Ethnic_Food" value="Mexican">Mexican<br>
			<input type="radio" name="Ethnic_Food" value="Italian">Italian<br>
			<input type="radio" name="Ethnic_Food" value="American">American<br>
			</p>

			<p class="segmentedParagraph">Please select your favorite pastime:<br>
			<input type="radio" name="Pastime" value="Sports">Sports<br>
			<input type="radio" name="Pastime" value="Video Games">Video Games<br>
			<input type="radio" name="Pastime" value="Art">Art<br>
			<input type="radio" name="Pastime" value="Music">Music<br>
			<input type="radio" name="Pastime" value="Hobby Building">Hobby Building<br>
			</p>

			<input type="submit">
		</form>
	</body>
</html>