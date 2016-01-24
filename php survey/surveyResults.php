<?php
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="stylesheet.css"/>
	</head>

	<body>
		<?php
			$surveyResultsFile = fopen("surveyResults.txt", "r") or die("Unable to open file!");

			$breakfastResults  = array(0, 0, 0, 0);
			$musicGenreResults = array(0, 0, 0, 0);
			$ethnicFoodResults = array(0, 0, 0, 0);
			$pastimeResults    = array(0, 0, 0, 0, 0);

			$currline;

			//breakfast food line
			$currline = str_split(fgets($surveyResultsFile));
			for ($i = 0; $i < 4; $i++) {
				$breakfastResults[$i] = $currline[$i];
			}
			
			//music genre line
			$currline = str_split(fgets($surveyResultsFile));
			for ($i = 0; $i < 4; $i++) {
				$musicGenreResults[$i] = $currline[$i];
			}
			
			//ethnic food line
			$currline = str_split(fgets($surveyResultsFile));
			for ($i = 0; $i < 4; $i++) {
				$ethnicFoodResults[$i] = $currline[$i];
			}
			
			//pastime line
			$currline = str_split(fgets($surveyResultsFile));
			for ($i = 0; $i < 5; $i++) {
				$pastimeResults[$i] = $currline[$i];
			}

			fclose($surveyResultsFile);

			if (!$_SESSION["hasTakenSurvey"]) {

				$breakfastChoice  = $_POST["Breakfast_Food"];
				$musicGenreChoice = $_POST["Music_Genre"];
				$ethnicFoodChoice = $_POST["Ethnic_Food"];
				$pastimeChoice    = $_POST["Pastime"];

				//update breakfast totals
				if ($breakfastChoice == "Pancakes") {
					$breakfastResults[0] += 1;
				} elseif($breakfastChoice == "Waffles") {
					$breakfastResults[1] += 1;
				} elseif($breakfastChoice == "Eggs and Bacon") {
					$breakfastResults[2] += 1;
				} else {
					$breakfastResults[3] += 1;
				}

				//update music totals
				if ($musicGenreChoice == "Rock") {
					$musicGenreResults[0] += 1;
				} elseif ($musicGenreChoice == "Country") {
					$musicGenreResults[1] += 1;
				} elseif ($musicGenreChoice == "Electronic") {
					$musicGenreResults[2] += 1;
				} else {
					$musicGenreResults[3] += 1;
				}

				//update ethnic food totals
				if ($ethnicFoodChoice == "Chinese") {
					$ethnicFoodResults[0] += 1;
				} elseif ($ethnicFoodChoice == "Mexican") {
					$ethnicFoodResults[1] += 1;
				} elseif ($ethnicFoodChoice == "Italian") {
					$ethnicFoodResults[2] += 1;
				} else {
					$ethnicFoodResults[3] += 1;
				}

				//update pastime totals
				if ($pastimeChoice == "Sports") {
					$pastimeResults[0] += 1;
				} elseif($pastimeChoice == "Video Games") {
					$pastimeResults[1] += 1;
				} elseif($pastimeChoice == "Art") {
					$pastimeResults[2] += 1;
				} elseif($pastimeChoice == "Music") {
					$pastimeResults[3] += 1;
				} else {
					$pastimeResults[4] += 1;
				}

				//create a txt variable to be saved to the file
				$surveyResultsFile = fopen("surveyResults.txt", "w") or die("Unable to open file!");
				$txt = "";

				//breakfast
				for ($i = 0; $i < 4; $i++) {
					$txt = $txt . (string)$breakfastResults[$i];
				}
				$txt = $txt . PHP_EOL;

				//music
				for ($i = 0; $i < 4; $i++) {
					$txt = $txt . (string)$musicGenreResults[$i];
				}
				$txt = $txt . PHP_EOL;

				//ethnic food
				for ($i = 0; $i < 4; $i++) {
					$txt = $txt . (string)$ethnicFoodResults[$i];
				}
				$txt = $txt . PHP_EOL;

				//pastime
				for ($i = 0; $i < 5; $i++) {
					$txt = $txt . (string)$pastimeResults[$i];
				}

				//now save it.
				fwrite($surveyResultsFile, $txt);
			}

			//now let's display all the results to the user.
		?>

		<p class="segmentedParagraph"><b>BREAKFAST RESULTS:</b><br><br>
		Pancakes:       <?php echo $breakfastResults[0]; ?> <br>
		Waffles:        <?php echo $breakfastResults[1]; ?> <br>
		Eggs and Bacon: <?php echo $breakfastResults[2]; ?> <br>
		Cereal:         <?php echo $breakfastResults[3]; ?> <br>
		</p>

		<p class="segmentedParagraph"><b>MUSIC GENRE RESULTS:</b><br><br>
		Rock:       <?php echo $musicGenreResults[0]; ?> <br>
		Country:    <?php echo $musicGenreResults[1]; ?> <br>
		Electronic: <?php echo $musicGenreResults[2]; ?> <br>
		Hip Hop:    <?php echo $musicGenreResults[3]; ?> <br>
		</p>

		<p class="segmentedParagraph"><b>ETHNIC FOOD RESULTS:</b><br><br>
		Chinese:  <?php echo $ethnicFoodResults[0]; ?> <br>
		Mexican:  <?php echo $ethnicFoodResults[1]; ?> <br>
		Italian:  <?php echo $ethnicFoodResults[2]; ?> <br>
		American: <?php echo $ethnicFoodResults[3]; ?> <br>
		</p>

		<p class="segmentedParagraph"><b>PASTIME RESULTS:</b><br><br>
		Sports:         <?php echo $pastimeResults[0]; ?> <br>
		Video Games:    <?php echo $pastimeResults[1]; ?> <br>
		Art:            <?php echo $pastimeResults[2]; ?> <br>
		Music:          <?php echo $pastimeResults[3]; ?> <br>
		Hobby Building: <?php echo $pastimeResults[4]; ?> <br>
		</p>

	</body>
</html>