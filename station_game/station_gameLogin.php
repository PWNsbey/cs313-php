<?php
	session_start();

	if (!isset($_SESSION["hasLoggedin"]))
	{
		$_SESSION["hasLoggedin"] = False;
		$_SESSION["isNewUser"]   = False;
	}
	else
	{
		header("Location: station_game.php");
		exit();
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="stylesheet.css"/>
	</head>
	<body>
		<div id="loginForm">
			<form action="station_game.php" method="post">
				<b>Returning user?</b><br><br>
				Username:<br>
				<input type="text" name="username"><br><br>
				<input type="submit" value="Submit">
			</form>
			<br>
			<br>
			<br>
			<br>
			<form action="new_user.php" method="post">
				<b>New user?</b><br><br>
				New Username:<br>
				<input type="text" name="username"><br><br>
				Station name:<br>
				<input type="text" name="stationname"><br><br>
				<input type="submit" value="Submit"><br>
			</form>
		</div>
	</body>
</html>