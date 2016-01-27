<!DOCTYPE html>

<html>

	<head>
	
		<link href="../public/css/styles.css" rel="stylesheet"/>
		<script type="text/javascript" src="../public/js/scripts.js"></script>
		
		<title>Downtime, a Resource for Online Gaming</title>
	
	</head>
	
<body>

	<div id="index">
		<a href="/"><img alt="Downtime Logo" src="../public/images/downtime.gif"/></a>
	</div>
	
	<script>
		// adds a clickable version history
		function version() {
			var version_tracker = "DOWNTIME VERSION HISTORY\n";
			version_tracker += "1.0 - Downtime version 1.0 successfully created!\n";
			version_tracker += "1.1 - Added dice rolling buttons to OOC, and a version tracker\n";
			version_tracker += "1.2 - Added external JS, and upgraded to dynamic dice roller\n";
			alert(version_tracker);
		}
	</script>
	
	<div id="sitenav">
		<a href="../public/index.html">Home</a>
		&nbsp; | &nbsp;
		<a href="../public/register.php">Register</a>
		&nbsp; | &nbsp;
		<a href="../public/login.php">Log In</a>
		&nbsp; | &nbsp;
		<a href="../public/campaign.php">My Campaign</a>
		&nbsp; | &nbsp;
		<a href="../public/logout.php">Logout</a>
		
	</div>
	
	<div>
		<button onclick="version()">Version History</button>
	</div>
	
	<?php
		
		// show the current user
		if (empty($_SESSION["username"]))
		{
			echo '<p class="syst">You are not currently logged in.</p>';
			//echo "<br>";
		}
		else
		{
			echo '<p class="syst">You are currently logged in as: ';
			echo $_SESSION['username'];
			echo "</p>";
		}
		
		// show campaign
		if (empty($_SESSION["campaign"]))
		{
			echo '<p class="syst">Campaign: None.</p>';
			//echo "<br>";
		}
		else
		{
			echo '<p class="syst">Campaign: ';
			echo $_SESSION['campaign'];
			echo ' ' . '<a href="../public/changecampaign.php">change</a>';
			echo "</p>";
		}
		
		// show storyline
		if (empty($_SESSION["storyline"]))
		{
			echo '<p class="syst">Storyline: None.</p>';
			//echo "<br>";
		}
		else
		{
			echo '<p class="syst">Storyline: ';
			echo $_SESSION['storyline'];
			echo ' ' . '<a href="../public/changestory.php">change</a>';
			echo "</p>";
		}
	
	?>
	
	
	<div>
		<img alt="Divider" class="div_middle" src="../public/images/divider.png"/>
	</div>
	
	<div id="pages">
	