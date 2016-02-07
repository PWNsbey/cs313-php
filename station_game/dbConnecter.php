<?php
	function loadDatabase()
	{
		$dbHost     = "";
		$dbPort     = "";
		$dbUser     = "";
		$dbPassword = "";

		$dbName = "station_game_db";

		$openShiftVar = getenv('OPENSHIFT_MYSQL_DB_HOST'); 

		if ($openShiftVar === null || $openShiftVar == "")
		{
          // Not in the openshift environment
          require("setLocalDatabaseCreds.php");

        	try
			{
				$db = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPassword);
	    		return $db;
			} 
			catch (Exception $ex)
			{
				echo 'Error!: ' . $ex->getMessage();
				die(); 
			}
		}
		else 
		{
		    // In the openshift environment 
		    $dbHost     = getenv('OPENSHIFT_MYSQL_DB_HOST');
	   	    $dbPort     = getenv('OPENSHIFT_MYSQL_DB_PORT'); 
			$dbUser     = getenv('OPENSHIFT_MYSQL_DB_USERNAME'); 
			$dbPassword = getenv('OPENSHIFT_MYSQL_DB_PASSWORD');
		
			try
			{
				$db = new PDO("mysql:host=$dbHost:$dbPort;dbname=$dbName", $dbUser, $dbPassword);
    			return $db;
			} 
				catch (Exception $ex)
			{
				echo 'Error!: ' . $ex->getMessage();
				die(); 
			}
		}

	}
?>