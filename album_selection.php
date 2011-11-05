<?php
	$event_id = isset($_GET["eventid"])? $_GET["eventid"]:"";

	include_once('conf/config.php');
	include_once('fb/facebook_api.php');
	
	//session_start();
	$logouturl = $_SESSION["logoutUrl"];
	$loginurl = $_SESSION["loginUrl"];
	
	$user = getCurrentUserInfo();
	$user_info = getCurrentUserInfo();

	$user_name = $user_info->{"name"};
	$user_id = $user_info->{"id"};

	$userImageUrl = getUserImageUrl($user_id);
		
?>
<html>
<head>
	<style type="text/css">

.albums_div{
	width:200px;
	text-align:justify;
	padding:5px;
	border:1px solid #E98DCF;
}

.table_text{
	font-family:Arial, Helvetica, sans-serif;
	font-size:12px;
}

.album_container{	
	width: 50px;
	height: 50px;
	overflow:auto;
}


</style>
</head>
<body>
	
	<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.2.min.js"></script>
	<div id="maindiv" class="albums_div">
        	<table id="album-container" border="0" cellspacing="0">		
        	
        	</table>
        </div>
		<script type="text/javascript">
			
			function updateAlbum(control, id) {
				var url = "./services/";
				if(control.checked) {
					url += 'add_album.php?eventid=<?php echo $event_id;?>&albumid=' + id + "&userid=<?php echo $user_id;?>";;
				}
				else {
					url += 'remove_album.php?eventid=<?php echo $event_id;?>&albumid=' + id + "&userid=<?php echo $user_id;?>";			
				}
				$.getJSON(url,function(data) {});
			}
		
			//function loadAlbums() {
				$.getJSON(
						"./services/get_user_albums.php?userid=<?php echo $user_id; ?>&eventid=<?php echo $event_id;?>", 
						function(data) {
						
				var html = '';
				var alternate = true;
				for(var i = 0; i < data.albums.length; i++)
				{
					html = '<tr bgcolor="@{rowcolor}"><td><input onClick="updateAlbum(this, \'@{id}\')" value="@{id}" @{checked} type="checkbox"></td><td><img  class="album_container" src="@{img}"></td><td class="table_text">@{name}</td></tr>';
			
		
					//		html = "<div><input type=\"checkbox\" onclick=\"updateAlbum(this, '@{id}')\" value=\"@{id}\" @{checked}/><img src=\"@{img}\"/>@{name}</div>"; 
				
					html = html.replace("@{name}", data.albums[i].name);
					html = html.replace("@{img}", data.albums[i].imageurl);
					html = html.replace("@{id}", data.albums[i].id);
					if(alternate)
						html = html.replace("@{rowcolor}", "#FECBEC");
					else
						html = html.replace("@{rowcolor}", "white");

					alternate = !alternate;
				
					if(data.albums[i].exists >= 1) {
						html = html.replace("@{checked}", 'checked');
					}
					else {
						html = html.replace("@{checked}", '');
					}
				
					$("#album-container")[0].innerHTML += html; 
				}
       			
      			});
      		//}
      		
		</script>
</body>
</html>
		