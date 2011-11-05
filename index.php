<?php
	include_once('conf/config.php');
	include_once('fb/facebook_api.php');
	//session_start();
	
	$user = getCurrentUserInfo();
	$logouturl = $_SESSION["logoutUrl"];
	$loginurl = $_SESSION["loginUrl"];
	$user_info = getCurrentUserInfo();

	$user_name = $user_info->{"name"};
	$user_id = $user_info->{"id"};
	
	if(isLoggedin()){
		$userImageUrl = getUserImageUrl(getLoggedUserId());
	} 
		
	else {
		echo('<a href="' . $loginurl.'">Login with Facebook</a>');
		die();
	}
		

?>


	

<!DOCTYPE HTML>
<html>
	<head>
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
	    <script type="text/javascript" src="http://code.jquery.com/jquery-1.4.2.min.js"></script>
	    <link rel="stylesheet" href="css/style.css"/>
	    <script type="text/javascript">
	    	var map;
            var markers = new Array();
	   		$(document).ready(function(){
	   			var latlng = new google.maps.LatLng(27.70287,85.31824);
			    var myOptions = {
				    zoom: 2,
				    center: latlng,
	   			    mapTypeId: google.maps.MapTypeId.ROADMAP
			    };
			    map = new google.maps.Map(document.getElementById("my-map"),myOptions);
			    google.maps.event.addListener(map, "click", function(event) {
  					var circleOptions = {
      					strokeColor: "#9e217e",
      					strokeOpacity: 0.8,
      					strokeWeight: 2,
      					fillColor: "#c51498",
      					fillOpacity: 0.35,
      					map: map,
      					center: event.latLng,
      					radius: 600000
    				};
    				var eventCircle = new google.maps.Circle(circleOptions);

				});
				
				changeEventHover();
	   		});
	   		
	   		function changeEventHover(){
	   			$('.event-wrapper').hover(
  					function () {
    					$(this).css({'background-color':'#a82d89'});
    					$(this).find('.event-text').css({'color':'#FFFFFF'});
  					},
  					function () {
    					$(this).css({'background-color':'#afb5b8'});
    					$(this).find('.event-text').css({'color':'#000000'});
  					}
				);
	   		}
	   	</script>
	</head>
	<body>
		<?php 
			if(isLoggedin()) {
		?>
			<div id="page">
				<div id="header-bar">
					<img src="<?php echo $userImageUrl;?>" style="width:30px;height:30px;"></img>
				</div>
				<div id="my-map" style="width:100%;height:350px;"></div>
				<div id="event-bar">
					<hr size="4"></hr>
					<div id="event-info">
						<div class="event-wrapper">
							<div class="event-image">
								<img src="img/pyramid.jpg" class="evt-img"></img>
							</div>
							<div class="event-text">
								<p class="event-name">Understanding Egyptian</p>
								<p class="event-date">Feb 1' 2001</p>
							</div>
						</div>
					</div>
					<div id="event-info">
						<div class="event-wrapper">
							<div class="event-image">
								<img src="img/pyramid.jpg" class="evt-img"></img>
							</div>
							<div class="event-text">
								<p class="event-name">Understanding Egyptian</p>
								<p class="event-date">Feb 1' 2001</p>
							</div>
						</div>
					</div>
					<div id="event-info">
						<div class="event-wrapper">
							<div class="event-image">
								<img src="img/pyramid.jpg" class="evt-img"></img>
							</div>
							<div class="event-text">
								<p class="event-name">Understanding Egyptian</p>
								<p class="event-date">Feb 1' 2001</p>
							</div>
						</div>
					</div>
					<div id="event-info">
						<div class="event-wrapper">
							<div class="event-image">
								<img src="img/pyramid.jpg" class="evt-img"></img>
							</div>
							<div class="event-text">
								<p class="event-name">Understanding Egyptian</p>
								<p class="event-date">Feb 1' 2001</p>
							</div>
						</div>
					</div>
					<div id="event-info">
						<div class="event-wrapper">
							<div class="event-image">
								<img src="img/pyramid.jpg" class="evt-img"></img>
							</div>
							<div class="event-text">
								<p class="event-name">Understanding Egyptian</p>
								<p class="event-date">Feb 1' 2001</p>
							</div>
						</div>
					</div>
					<div id="event-info">
						<div class="event-wrapper">
							<div class="event-image">
								<img src="img/pyramid.jpg" class="evt-img"></img>
							</div>
							<div class="event-text">
								<p class="event-name">Understanding Egyptian</p>
								<p class="event-date">Feb 1' 2001</p>
							</div>
						</div>
					</div>
					<div id="event-info">
						<div class="event-wrapper">
							<div class="event-image">
								<img src="img/pyramid.jpg" class="evt-img"></img>
							</div>
							<div class="event-text">
								<p class="event-name">Understanding Egyptian</p>
								<p class="event-date">Feb 1' 2001</p>
							</div>
						</div>
					</div>
					<div id="event-info">
						<div class="event-wrapper">
							<div class="event-image">
								<img src="img/pyramid.jpg" class="evt-img"></img>
							</div>
							<div class="event-text">
								<p class="event-name">Understanding Egyptian</p>
								<p class="event-date">Feb 1' 2001</p>
							</div>
						</div>
					</div>
					<div style="clear:both;"/>
				</div>
			</div>

		<?php
			}else echo $loginurl;
		?>
		
	</body>
</html>

