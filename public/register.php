<?php
	require("../includes/config.php");

	// if we got her by clicking a link
	if ($_SERVER["REQUEST_METHOD"] == "GET")
	{
		// spawn the registration template
		spawn("register_template.php");
	}
	
	// or if we got here by filling out the form
	else if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		// verify input information
		if (empty($_POST["realname"]))
		{
			error("You must provide a reasonable approximation of your name");
		}
		else if (empty($_POST["username"]))
		{
			error("You're going to need a user name, Slim.");
		}
		else if (empty($_POST["email"]))
		{
			error("We won't use your email to bother you. We don't even like you.");
		}
		else if (empty($_POST["userpass"]))
		{
			error("Password... try to use something better than what you've got on your luggage.");
		}
		else if (($_POST["userpass"]) !== ($_POST["confirmation"]))
		{
			error("Matching is when two things are identical, in exactly the way that your passwords don't.");
		}
		else
		{
			echo("Thankyou");
			
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
				echo ("successful connection");
			}
			
			// prepare and bind
			$stmt = $conn->prepare("INSERT INTO users (realname, email, username, userpass) VALUES (?, ?, ?, ?)");
			$stmt->bind_param("ssss", $realname, $email, $username, $userpass);

			// set parameters and execute
			$realname = htmlspecialchars($_POST["realname"]);
			$email = htmlspecialchars($_POST["email"]);
			$username = htmlspecialchars($_POST["username"]);
			$userpass = $_POST["userpass"];
			$stmt->execute();
			
			// close the statement
			$stmt->close();
			
			// try to log in the new user
			
			// close the connection
			$conn->close();
			
			// spawn register_complete.php
			spawn("register_complete.php");
		}
	}
	

?>