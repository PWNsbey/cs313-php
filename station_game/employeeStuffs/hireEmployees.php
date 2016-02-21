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
		<table>
			<tr>
				<td><b>Name</b></td>
				<td><b>Salary</b></td>
				<td><b>Profession</b></td>
				<td><b>Hire Cost</b></td>
			</tr>
			<form action="hirePHPhookup.php" method="post">
				<?php
					$sqlQuery = "SELECT * FROM employees WHERE station_id IS NULL";
					foreach ($db->query($sqlQuery) as $row)
					{
						echo "<tr>";
						echo "<td>" . $row['name'] . "</td>";
						echo "<td>" . $row['salary'] . "</td>";
						echo "<td>" . $row['profession'] . "</td>";
						echo "<td>" . $row['hirecost'] . "</td>";
						echo "<td><input type=\"checkbox\" name=\"hire[]\" value=\"" . $row['employee_id'] . "\" /></td>";
						echo "</tr>";
					}
				?>
				<input type="submit" value="Hire"><br><br>
			</form>
		</table>
	</body>
</html>