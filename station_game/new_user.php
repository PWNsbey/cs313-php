<?php
	session_start();

	if (!isset($_SESSION["hasLoggedin"]))
	{
		header("Location: station_gameLogin.php");
		exit();
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="stylesheet.css"/>
		<?php 
			//set the database variable
			require("dbConnecter.php");
			$db = loadDatabase();
		?>
	</head>

	<body>
		<?php
			$_SESSION["username"] = $_POST["username"];
			$username = $_SESSION["username"];
			$_SESSION["stationname"] = $_POST["stationname"];
			$stationname = $_SESSION["stationname"];

			$sqlQuery = "INSERT INTO stations (username, stationname) VALUES ('$username','$stationname');";
			$result = $db->query($sqlQuery)->fetch(PDO::FETCH_ASSOC);

			$_SESSION["isNewUser"] = True;

			header("Location: station_game.php");
		?>
	</body>
</html>