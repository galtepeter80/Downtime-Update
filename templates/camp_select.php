<?php


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
	$stmt = $conn->prepare("SELECT campname FROM campaign GROUP BY campname");

	// set parameters and execute
	$stmt->execute();
	
	// bind result
	$stmt->bind_result($campname);
	
	echo ('<p>Make your selection from available campaigns:</p>');
	
	// render the selection radio boxes
	print('<form action="campaign.php" method="post">');
		while ($stmt->fetch())
			{
				print('<input type="radio" name="campname" value="' . $campname . '">' . $campname);
				print('<br>');
			}
		print('<br>');
		print('<button type="submit" class="btn btn-default">Load</button>');
	print('</form>');
	
	// close the statement
	$stmt->close();
	
	// close the connection
	$conn->close();
	
	// in the event we need to make a new storyline
	echo ("<p>Or create your own campaign</p>");
	
	print ('<form action="campaign.php" method="post">');
		print ('<input type="text" name="campname">');
		print ('</input>');
		print ('<button type="submit" class="btn btn-default">Create</button>');
	print ('</form>');
?>