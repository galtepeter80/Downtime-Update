<?php
	// required files
	require("../includes/config.php");
	
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
	$stmt = $conn->prepare("UPDATE campaign SET charname=?, IC_comment=?, OOC_comment=? WHERE num=?");
	$stmt->bind_param("sssi", $char, $IC, $OOC, $num);
	
	// set parameters 
	$num = $_SESSION["num"];
	$char = htmlspecialchars($_POST["character"]);
	$IC = htmlspecialchars($_POST["ic_comment"]);
	$OOC = htmlspecialchars($_POST["ooc_comment"]);
	
	// execute
	$stmt->execute();
	
	// close the statement
	$stmt->close();
	
	// close the connection
	$conn->close();
	
	// redirect back to the campaign
	redirect("/public/campaign.php");

?>