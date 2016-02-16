<?php
	session_start();

	if (!isset($_SESSION["hasLoggedin"]))
	{
		header("Location: station_gameLogin.php");
		exit();
	}
	if (!isset($_SESSION["justLoggedIn"]))
	{
		$_SESSION["justLoggedIn"] = True;
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
			if ($_SESSION["isNewUser"] == False && $_SESSION["justLoggedIn"])
			{
				$_SESSION["username"] = $_POST["username"];
				$_SESSION["justLoggedIn"] = False;
			}
			$username = $_SESSION["username"];

			$sqlQuery = "SELECT * FROM stations WHERE username='$username' LIMIT 1";
			$result = $db->query($sqlQuery)->fetch(PDO::FETCH_ASSOC);
		?>

		<br>Welcome back to <b><?php echo $result['stationname'] ?></b>, <?php echo $result['username']; ?><br><br>

		<table>
			<tr>
				<td>
					<b>STATION RESOURCES</b><br>
					Credits: <?php echo $result['credits']; ?><br>
					Iron: <?php echo $result['iron']; ?><br>
					Helium-3: <?php echo $result['heliumthree']; ?><br>
					Ice: <?php echo $result['ice']; ?>
				</td>
				<td>
					<b><a href="employeeStuffs\myEmployeesIndex.php">EMPLOYEES</a></b><br>
					<?php
						$sqlQuery = "SELECT name FROM employees AS e JOIN stations AS s ON e.station_id = s.user_id WHERE s.username='$username'";
						foreach ($db->query($sqlQuery) as $row)
						{
							echo $row['name'] . "<br>";
						}
					?>
					<br><a href="employeeStuffs\hireEmployees.php">hire more employees</a>
				</td>

				<td>
					<b><a href="shipStuffs\shipsIndex.php">SHIPS</a></b><br>
					<?php
						$sqlQuery = "SELECT shipname FROM ships AS s JOIN stations AS u ON s.station_id = u.user_id WHERE u.username='$username'";
						foreach ($db->query($sqlQuery) as $row)
						{
							echo $row['shipname'] . "<br>";
						}
					?>
					<br><a href="shipStuffs\buildShips.php">build more ships</a>
				</td>
			</tr>
		</table>

	</body>
</html>