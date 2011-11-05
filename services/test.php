<?php 

	require_once("../conf/config.php");
	require_once("../fb/facebook_api.php");

	$user_info = getCurrentUserInfo();

	$user_name = $user_info->{"name"};
	$user_id = $user_info->{"id"};
   	
?>
<html>
<head>
	<title></title>
</head>
<body>
	<div id="fb-root"></div>
	<script src="//connect.facebook.net/en_US/all.js"></script>
	<script>
  	FB.init({
    	appId      : '<?php echo $_SESSION["appId"];?>', // App ID
      	channelURL : '../fb/channel.html', // Channel File
      	status     : true, // check login status
      	cookie     : true, // enable cookies to allow the server to access the session
      	oauth      : true, // enable OAuth 2.0
      	xfbml      : true  // parse XFBML

  	});
  	
  	FB.api('/me', function(response) {
 			 alert('Your name is ' + response.name);
		});
</script>
</body>
</html>
      			
 
 
   