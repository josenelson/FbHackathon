<?php
	$event_id = isset($_GET["eventid"])? $_GET["eventid"]:"";

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
			
			function updateAlbum(control, id) {
				var url = "./services/";
				if(control.checked) {
					
					url += 'add_album.php?eventid=<?php echo $event_id;?>&albumid=' + id;
					
				}
				else {
					url += 'remove_album.php?eventid=<?php echo $event_id;?>&albumid=' + id + "?userid=<?php echo $user_id;?>";
					
				}
				$.getJSON(url,function(data) {});
			}
		
			$.getJSON(
						"./services/get_user_albums.php?userid=<?php echo $user_id; ?>&eventid=<?php echo $event_id;?>", 
						function(data) {
						
			var html = '';
			for(var i = 0; i < data.albums.length; i++)
			{
				html = "<div><input type=\"checkbox\" onclick=\"updateAlbum(this, '@{id}')\" value=\"@{id}\" @{checked}/><img src=\"@{img}\"/>@{name}</div>"; 
				
				html = html.replace("@{name}", data.albums[i].name);
				html = html.replace("@{img}", data.albums[i].imageurl);
				html = html.replace("@{id}", data.albums[i].id);
				
				if(data.albums[i].exists >= 1) {
					html = html.replace("@{checked}", 'checked');
				}
				else {
					html = html.replace("@{checked}", '');
				}
				
				$("#album-container")[0].innerHTML += html; 
			}
       			
      		});
      		
		</script>
	</body>
</html>
