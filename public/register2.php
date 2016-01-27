<?php

    // configuration
    require("../includes/config.php");

	echo("you are here");
    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
		echo("you have come via GET");
        spawn("register_template.php");
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
       
		// validate submission
		if (empty($_POST["realname"]))
		{
			error("You must provide your real name");
		}
		else if (empty($_POST["username"]))
		{
			error("You must provide your username.");
		}
		else if (empty($_POST["userpass"]))
		{
			error("You must provide your password.");
		}
		else if (($_POST["userpass"]) !== ($_POST["confirmation"]))
		{
			error("Passwords do not match.");
		}
    
		else
		{
			// select database
			$database = "downtime";
			
			// create query
			$query = ""INSERT INTO users (realname, username, userpass) VALUES (?, ?, ?)", $_POST["realname"], $_POST["username"], $_POST["userpass"]";
			
    		// attempt to add user to the database
    		$result = connect($database, $query);
			
    		// if username already exists
    		if ($result === false)
    		{
        		error("Username already exists.");
    		}

			redirect("/public/index.html");
		}
		
    }
?>