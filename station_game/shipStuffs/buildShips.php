<?php
	session_start();

	if (!isset($_SESSION["hasLoggedin"]))
	{
		header("Location: station_gameLogin.php");
		exit();
	}

	require("../dbConnecter.php");
	$db = loadDatabase();

	$username = $_SESSION["username"];
?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../stylesheet.css"/>
	</head>
	<body>
	<form action="buildPHPhookup.php", method="post">
		Number of ships to build:<br>
		<select name="number">
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="4">4</option>
			<option value="8">8</option>
		</select>

		<br><br><input type="submit" value="Build">
	</form>
	</body>
</html>