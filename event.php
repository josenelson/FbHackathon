<?php
	require_once("./header.php");
	
	$eventid = isset($_GET["eventid"])? $_GET["eventid"]:"";
?>
<!DOCTYPE HTML>
<html>
	<head>
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.2.min.js"></script>
		<link rel="stylesheet" href="css/style.css"/>
		<script text="text/javascript">
			
			function filterUsers(userid) {
				$("#left-side")[0].innerHTML = "";
				$.getJSON(
						"./services/get_images.php?eventid=<?php echo $eventid; ?>&userid=" + userid, 
						function(data) {

							var html = "";
							for(var i = 0; i < data.pictures.length; i++) {
								html = '<div><img src="@{location}"></img></div>';
								
								html = html.replace("@{location}", data.pictures[i]);
								
								$("#left-side")[0].innerHTML += html;
							
							}
							loadPictures();
      					});
			}
			
			$.getJSON(
						"./services/fb_event_users.php?eventid=<?php echo $eventid; ?>", 
						function(data) {
							$("#epage-eventname")[0].innerHTML = data.event.name;
							$("#epage-eventdate")[0].innerHTML = data.event.date;
							$("#epage-location")[0].innerHTML = data.event.location;
							$("#epage-event-image")[0].src = data.event.picture;
							var html = "";
							
							for(var i = 0; i < data.event.users.length; i++) {
								html = '<tr><td>@{userposted}</td><td><img src="@{url}"></td><td><p class="people-name" onClick="filterUsers(\'@{userid}\')">@{name}</p></td></tr>';
								
								html = html.replace("@{url}", data.event.users[i].imgurl);
								html = html.replace("@{name}", data.event.users[i].username);
								html = html.replace("@{userid}", data.event.users[i].userid);
								
								if(data.event.users[i].exists > 0) {
									//alert('user posted');
									html = html.replace("@{userposted}", '<div height="100%" width="5px" background="black">&nbsp;</div>');
								}
								else {
									//alert('data.event.users[i].exists');
									html = html.replace("@{userposted}", ' ');
								}
							
								$("#epgage-users-list")[0].innerHTML += html;
							}
							
      		});
      		
      		$.getJSON(
						"./services/get_images.php?eventid=<?php echo $eventid; ?>", 
						function(data) {

							var html = "";
							
							for(var i = 0; i < data.pictures.length; i++) {
								html = '<div><img src="@{location}"></img></div>';
								
								html = html.replace("@{location}", data.pictures[i]);
								
								$("#left-side")[0].innerHTML += html;
							
							}
							loadPictures();
      					});

			
			var newArray; 
    		  		
    		function loadPictures(){
    			newArray = [
   				["medium", 0, 0],
        		["small", 162, 0],
        		["small", 244, 0],
        		["small", 162, 62],
        		["small", 244, 62],
        		["medium", 326, 0],
        		["small", 0, 122],
        		["small", 82, 122],
        		["medium", 0, 184],
        		["medium", 0, 306],
        		["large", 166, 124],
        		["small", 162, 366],
        		["small", 244, 366],
        		["medium", 326, 366],
        		["small", 322, 488],
        		["small", 404, 488],
        		["medium", 322, 550],
        		["large", 0, 430]
    			]; 
    		  		

    			var num = $('div#left-side').children().length;
    			var divImages = $('div#left-side').children();
    			var counter=0;
    			for(var i=0;i<num;i++){
    				if(counter==18){
    					counter=0;
    					for(var j=0;j<18;j++){
    						newArray[j][2]=newArray[j][2]+672;
    					}
    				}
    				if(newArray[counter][0]=="small"){
    					$(divImages[i]).addClass("simg-container");
    					$(divImages[i]).find('img').addClass("size-small");
    					
    				}
    				if(newArray[counter][0]=="medium"){
    					$(divImages[i]).addClass("mimg-container");
    					$(divImages[i]).find('img').addClass("size-medium");
    				
    				}
    				if(newArray[counter][0]=="large"){
    					$(divImages[i]).addClass("limg-container");
    					$(divImages[i]).find('img').addClass("size-large");
    				}
    				$(divImages[i]).css({'left': newArray[counter][1]});
    				$(divImages[i]).css({'top': newArray[counter][2]});
    				counter++;
    			}
    			    
    						
    		}
    		
			function getAlbums(){
				$("div#album-select").load("album_selection.php", {}, function(){
				
				});
			
			}
		</script>
	</head>
	<body>
		<div id="page">
		<div id="event-top-page">
			<div id="event-image"><img id="epage-event-image" src=""></img></div>
			<div id="event-data">
				<div id="epage-topdata">
					<p id="epage-eventname"></p>
					<p id="epage-eventdate"></p>
				</div>
				<div id="epage-bdata">
					<p id="epage-location"></p>
				</div>
			</div>
			<div id="event-map"><img src="img/profile.jpg" style="width:200px;height:150px;"></img></div>
			<div style="clear:both;"></div>
		</div>
		<div id="bottom-page">
			<div id="right-side">
				<div id="add-album">
					<a href="javascript:getAlbums()"><img src="img/add-album-normal.png"></img></a>
				</div>
				
				<div id="album-select">	
				<table border="0" cellspacing="0">
					<tbody id="epgage-users-list">
					</tbody>
				</table>
				</div>
			</div>
			<div id="left-side">
										
			</div>
			<div style="clear:both;"/>
		</div>
		<div style="clear:both;"/>
		</div>
	</body>
</html>
