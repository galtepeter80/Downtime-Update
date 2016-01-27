<?php
	require("../includes/config.php");


	if ($_SERVER["REQUEST_METHOD"] == "GET")
	{
		//echo $_SERVER["REQUEST_METHOD"];
		
		// spawn the log in template
		spawn("login_template.php");
	}
	
	else if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$check = 0;
		
		if (empty($_POST["username"]))
		{
			error("You must give your username");
		}
		else if (empty($_POST["userpass"]))
		{
			error("Did you forget your password? That sucks.");
		}
		else 
		{
			//echo "Good for you! You exist!";
			
			// connection settings based on w3schools' at http://www.w3schools.com/php/php_mysql_prepared_statements.asp
			// set parameters
			$servername = SERVER;
			$username = USERNAME;
			$password = PASSWORD;
			$dbname = "downtime";
			
			// establish connection to server
			$conn = new mysqli($servername, $username, $password, $dbname);

			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
			else {
				//echo ("successful connection");
			}
			
			// prepare and bind
			$stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
			$stmt->bind_param("s", $username);

			// set parameters and execute
			$username = htmlspecialchars($_POST["username"]);
			$stmt->execute();
			
			// bind result
			$stmt->bind_result($col1, $col2, $col3, $col4, $col5);
			
			
			// if username exists, check password
			while ($stmt->fetch())
			{
				// fetch the 
				
				// compare password on file to POST password
				if ($col5 == $_POST["userpass"])
				{
					// identified the user
					//echo "user found!";
					
					// remember the user in SESSION
					$_SESSION["id"] = $col1;
					
					// remember the username for later
					$_SESSION["username"] = $col3;
					
					$check = 1;
				}
				
				else
				{
					echo "could not log in user";
				}
			}
			
			// close the statement
			$stmt->close();
			
			// try to log in the new user
			
			// close the connection
			$conn->close();
		}
		
		if ($check == 1)
		{
			// spawn the log in complete template
			spawn("login_complete.php");
		}
		else {
			// spawn the log in failed templatew
			spawn("login_failed.php");
		}
		
	}

?>