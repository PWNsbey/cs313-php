<?php
	session_start();

	if (!isset($_SESSION["hasLoggedin"]))
	{
		header("Location: station_gameLogin.php");
		exit();
	}

	require("dbConnecter.php");
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
				<td>Name</td>
				<td>Salary</td>
				<td>Profession</td>
				<td>Hire Cost</td>
			</tr>
			<?php
				$sqlQuery = "SELECT * FROM employees AS e JOIN stations AS s ON e.station_id = s.user_id WHERE s.username='$username'";
				foreach ($db->query($sqlQuery) as $row)
				{
					echo "<tr>";
					echo "<td>" . $row['name'] . "</td>";
					echo "<td>" . $row['salary'] . "</td>";
					echo "<td>" . $row['profession'] . "</td>";
					echo "<td>" . $row['hirecost'] . "</td>";
					echo "</tr>";
				}
			?>
		</table>
	</body>
</html>