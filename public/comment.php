<?php

	require("../includes/config.php");
	
	if (empty($_SESSION["username"]))
	{
		redirect("/public/login.php");
	}
	
	else if (empty($_SESSION["campaign"]))
	{
		redirect("/public/campaign.php");
	}
	
	else if (empty($_SESSION["storyline"]))
	{
		redirect("/public/campaign.php");
	}
	
	else 
	{
		spawn("comment_template.php");
	}

?>
