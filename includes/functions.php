<?php

	/**
	functions.php
	
	adds necessary functions to all pages
	
	by Greg Altepeter
	*/

	// spawns a template file from stock
	function spawn($template)
	{
		// spawn header
		require("../templates/header.php");
		
		// spawn template
		require("../templates/$template");
		
		// spawn footer
		require("../templates/footer.php");
	}
	
	// redirects the user to another page
	function redirect($location)
	{
		header("Location: http://downtime.blasphemouse.net" . $location);
		exit;
	}
	
	// connects to RDS database, then returns a SQL query
	function connect($database, $query)
	{
		// set constants
			$host=SERVER;
			$port=3306;
			$socket="";
			$user=USERNAME;
			$password=PASSWORD;
			$dbname=$database;

			// open connection to mysql
			$con = new mysqli($host, $user, $password, $dbname, $port, $socket)
				or die ('Could not connect to the database server' . mysqli_connect_error());
			
			// test connection to MySQL		
			if (!$con) {
				die ('Connection failed: ' . mysqli_error());
			}
			
			else {
				echo "connected successfully" . "<br>";
			}
			
			// select a database	
			$con->select_db($database);

			// query the database	
			$results = $con->query($query);
			
			// check if query successful
			if (!$results) {
				echo "query failed" . "<br>";
			}
			
			else {
				echo "query successful" . "<br>";
			}
			
			// close the MySQl connection	
			$con->close();

			return $results;
	}
	
	function error($message)
	{
		// spawn header
		require("../templates/header.php");
		
		// spawn template
		echo ("There has been an error: " . $message);
		
		// spawn footer
		require("../templates/footer.php");
		exit;
	}
	
?>