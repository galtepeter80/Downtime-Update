<?php

	/**
	config.php
	
	configures pages using global constants, required functions, and stylesheet
	
	by Greg Altepeter
	
	based on config.php at /harvard/cs50x
	*/
	
	// tell me what's messed up
    ini_set("display_errors", true);
    error_reporting(E_ALL);
	
	// required files
	require("constants.php");
	require("functions.php");
	
	// enable sessions
	session_start();
	
?>