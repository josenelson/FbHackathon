<?php 

	require_once("../conf/config.php");
	require_once("../fb/facebook_api.php");

	$user_info = getCurrentUserInfo();

	$user_name = $user_info->{"name"};
	$user_id = $user_info->{"id"};

   	var_dump($user_info->{"name"});
   