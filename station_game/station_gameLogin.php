<?php
	session_start();

	if (!isset($_SESSION["hasLoggedin"]))
	{
		$_SESSION["hasLoggedin"] = True;
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
			Username:<br>
			<input type="text" name="username"><br>
			<input type="submit" value="Submit">
		</form>
	</body>
</html>