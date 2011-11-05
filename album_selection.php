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
		<div id="albums" class="albums_div">
        	<table id="album-container" border="0" cellspacing="0">		
        	
        	</table>
        </div>
		<script type="text/javascript">
			
			function updateAlbum(control, id) {
				var url = "./services/";
				if(control.checked) {
					alert("should add");
					url += 'add_album.php?eventid=<?php echo $event_id;?>&albumid=' + id + "&userid=<?php echo $user_id;?>";;
					
				}
				else {
					url += 'remove_album.php?eventid=<?php echo $event_id;?>&albumid=' + id + "&userid=<?php echo $user_id;?>";
					alert("should remove");					
				}
				$.getJSON(url,function(data) {});
			}
		
			function loadAlbums() {
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
				
					("#album-container")[0].innerHTML += html; 
				}
       			
      			});
      		}
      		
		</script>