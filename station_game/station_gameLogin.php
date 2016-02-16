<?php
	session_start();

	if (!isset($_SESSION["hasLoggedin"]))
	{
		$_SESSION["hasLoggedin"] = True;
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
		<title></title>
	</head>
	<body>
		<form action="station_game.php" method="post">
			<b>Returning user?</b><br>
			Username:<br>
			<input type="text" name="username"><br>
			<input type="submit" value="Submit">
		</form>
		<br>
		<br>
		<form action="new_user.php" method="post">
			<b>New user?</b><br>
			New Username:<br>
			<input type="text" name="username"><br>
			Station name:<br>
			<input type="text" name="stationname"><br>
			<input type="submit" value="Submit">
		</form>
	</body>
</html>