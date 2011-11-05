<?php
	include_once('facebook_api.php');

	$logouturl = $_SESSION["logoutUrl"];
	$loginurl = $_SESSION["loginUrl"];
	
	header('Location: ' . $loginurl);
	
	session_destroy();
	
	die();
