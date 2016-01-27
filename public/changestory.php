<?php
	require("../includes/config.php");

	// reset storyline 
	$_SESSION["storyline"] = [];
	
	// redirect to storyline selection
	redirect("/public/campaign.php");

?>