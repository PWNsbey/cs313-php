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
		<title></title>
	</head>
	<body>
		<table>
			<tr>
				<td><b>Ship Name</b></td>
				<td><b>Pilot</b></td>
				<td><b>Onboard Iron</b></td>
				<td><b>Onboard Helium-3</b></td>
				<td><b>Onboard Ice</b></td>
			</tr>
			<?php
				$sqlQuery = "SELECT * FROM ships AS s JOIN stations AS u ON s.station_id = u.user_id WHERE u.username='$username'";
				foreach ($db->query($sqlQuery) as $row)
				{
					echo "<tr>";
					echo "<td>" . $row['shipname'] . "</td>";
					echo "<td>" . $row['pilot_id'] . "</td>";
					echo "<td>" . $row['iron'] . "</td>";
					echo "<td>" . $row['heliumthree'] . "</td>";
					echo "<td>" . $row['ice'] . "</td>";
					echo "</tr>";
				}
			?>
		</table>
	</body>
</html>