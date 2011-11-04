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
			    GEvent.addListener(map, "click", function() {
  					alert("You clicked the map.");
				});
	   		});
	   		
	   	</script>
	</head>
	<body>
		<?php 
			if(isLoggedin()) {
		?>
			<div id="page">
				<div id="my-map" style="width:100%;height:300px;"></div>
			</div>

		<?php
			}else echo $loginurl;
		?>
		
	</body>
</html>

