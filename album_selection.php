<?php
	include_once('conf/config.php');
	include_once('fb/facebook_api.php');
	//session_start();
	$logouturl = $_SESSION["logoutUrl"];
	$loginurl = $_SESSION["loginUrl"];
		
	if(isLoggedin()){
		$user = getCurrentUserInfo();
		$user_info = getCurrentUserInfo();

		$user_name = $user_info->{"name"};
		$user_id = $user_info->{"id"};

		$userImageUrl = getUserImageUrl($user_id);
	
	} 
		
	else {
		echo "It's not logged in";
		echo $loginurl;
		die();
	}

	$event_id = 0;
		
?>

<html>
	<head>
		<title></title>
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.2.min.js"></script>
	</head>
	<body>
		<div id="album-container">
			
		</div>
		<script type="text/javascript">
		
			$.getJSON(
						"./services/get_user_albums.php?userid=<?php echo $user_id; ?>", 
						function(data) {
						
			var html = '';
			for(var i = 0; i < data.albums.length; i++)
			{
				html = "<div>@{name}</div>"; 
				
				html = html.replace("@{name}", data.albums[i].name);
				
				$("#album-container")[0].innerHTML += html; 
			}
       			
      		});
      		
		</script>
	</body>
</html>
