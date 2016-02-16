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
	
	$username_id = $db->query("SELECT user_id FROM stations WHERE username=\"" . $username . "\";");
	$username_id = $username_id->fetch(PDO::FETCH_ASSOC);
	foreach($username_id as $id)
	{
		$username_id = $id;
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title></title>
	</head>
	<body>
		<?php
			if (!empty($_POST['hire'])) 
			{
				foreach($_POST['hire'] as $employee)
				{
					$sqlQuery = "UPDATE employees SET station_id=" . $username_id . " WHERE employee_id=" . $employee;
					$db->query($sqlQuery);
				}
			}

			header("Location: ../station_game.php");
			exit();
		?>
	</body>
</html>