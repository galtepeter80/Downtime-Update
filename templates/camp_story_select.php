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
	$stmt = $conn->prepare("SELECT storyname FROM campaign WHERE campname = ? GROUP BY storyname");
	$stmt->bind_param("s", $campname);
	
	// set parameters and execute
	$campname = $_SESSION["campaign"];
	$stmt->execute();
	
	// bind result
	$stmt->bind_result($storyname);
	
	echo ('<p>Make your selection from available storylines within this campaign:</p>');
	
	// render the selection radio boxes
	print('<form action="campaign.php" method="post">');
		while ($stmt->fetch())
			{
				print('<input type="radio" name="storyname" value="' . $storyname . '">' . $storyname);
				print('<br>');
			}
		print('<br>');
		print('<button type="submit" class="btn btn-default">Load</button>');
	print('</form>');
	

	
	// close the statement
	$stmt->close();
	
	// close the connection
	$conn->close();
	
	echo ("<p>Or begin a new storyline</p>");
	
	print ('<form action="campaign.php" method="post">');
		print ('<input type="text" name="storyname">');
		print ('</input>');
		print ('<button type="submit" class="btn btn-default">Create</button>');
	print ('</form>');

?>