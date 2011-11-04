<?php
	include_once('conf/config.php');
	include_once('fb/facebook_api.php');
	session_start();
	
	$user = getCurrentUserInfo();
	$logouturl = $_SESSION["logoutUrl"];
	$loginurl = $_SESSION["loginUrl"];
	
	if(isLoggedin()) 
		echo ('Facebook login');
	else {
		echo('<a href="' . $loginurl.'">Login with Facebook</a>');
		die();
	}
		

?>

<body>
	Let the hackathon begin!
	
	<?php 
		if(isLoggedin()) echo ('Facebook login');
		else echo $loginurl;
	?>
</body>