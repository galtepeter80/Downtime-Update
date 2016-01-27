<?php

	require("../includes/config.php");
	
	if (!empty($_POST["campname"]))
	{
		$_SESSION["campaign"] = $_POST["campname"];
	}
	
	if (!empty($_POST["storyname"]))
	{
		$_SESSION["storyline"] = $_POST["storyname"];
	}
	
	if (empty($_SESSION["campaign"]))
	{
		spawn("camp_select.php");
	}
	
	else if (empty($_SESSION["storyline"]))
	{
		spawn("camp_story_select.php");
	}
	
	else 
	{
		spawn("camp_display.php");
	}

?>
