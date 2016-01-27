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
	$stmt = $conn->prepare("SELECT * FROM campaign WHERE campname = ? AND storyname = ?");
	$stmt->bind_param("ss", $campaign, $storyline);
	
	// set parameters and execute
	$campaign = $_SESSION["campaign"];
	$storyline = $_SESSION["storyline"];
	$stmt->execute();
	
	// bind result
	$stmt->bind_result($num, $username, $charname, $campname, $storyname, $IC_comment, $OOC_comment);
	
	// print results to screen
	while ($stmt->fetch())
	{
		echo '<p class="character"><u>' . $charname . '</u></p>';
		echo '<p class="username"> by ' . $username . '</p>';
		
		// add edit buttons if comments belongs to username
		if (!empty($_SESSION["username"]))
		{
			if ($username == $_SESSION["username"])
			{
				print('<form action="edit.php" method="post">');
				print('<button type="submit" name="comment" value="' . $num . '_' . htmlspecialchars($charname) . '_' . htmlspecialchars($IC_comment) . '_' . htmlspecialchars($OOC_comment) . '" class="btn btn-default">Edit</button>');
				print('</form>');
			}
		}
		
		// print in-character comment
		if (!empty($IC_comment)) {
			echo '<p class="ic">' . $IC_comment . '</p>';
		}
		
		// print out-of-character comment
		if (!empty($OOC_comment)) {
			echo '<p class="ooc">' . $OOC_comment . '</p>';
		}
		echo '<div><img alt="Divider" class="div_middle" src="../public/images/divider.png"/></div>';
		
	}
				
	// close the statement
	$stmt->close();
	
	// close the connection
	$conn->close();
	
	print('<a href="comment.php">Write a new entry into the story</a>');

?>