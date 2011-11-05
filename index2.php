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
		
?>
<!DOCTYPE HTML>
<html>
	<head>
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
	    <script type="text/javascript" src="http://code.jquery.com/jquery-1.4.2.min.js"></script>
	    <script src="js/jsCarousel-2.0.0.js" type="text/javascript"></script>
		<link href="css/jsCarousel-2.0.0.css" rel="stylesheet" type="text/css" />
	    <link rel="stylesheet" href="css/style2.css"/>
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
			    /*google.maps.event.addListener(map, "click", function(event) {
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

				});*/
			});
	   		
	   		function changeArrowHover(){
	   			$('.jscarousal-horizontal-back').hover(
  					function () {
    					$(this).css({'background-image':'url(img/back-arrow-selected.png)'});
  					},
  					function () {
    					$(this).css({'background-image':'url(img/back-arrow-unselected.png)'});
    					
  					}
				);
				$('.jscarousal-horizontal-forward').hover(
  					function () {
    					$(this).css({'background-image':'url(img/next-arrow-selected.png)'});
  					},
  					function () {
    					$(this).css({'background-image':'url(img/next-arrow-unselected.png)'});
    					
  					}
				);
	   		}
	   		
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
	   		
	   		function getEventPage(eventId){
	   			window.location="./event.php?eventid="+eventId;
	   		}
	   	</script>
	</head>
	<body>
			<script type="text/javascript">
      			var url = './services/fb_events.php';
       			$.getJSON(url, function(data) {
       				var circlePoints = new Array(); 
       				var counter=0;
       				for(var i = 0; i < data.data.length; i++) {
       						
       						//alert(data.data[i].name);
       						
       						var html = "<a href=\"javascript:getEventPage('"+data.data[i].id+"')\"><div><div class=\"event-wrapper\"><div class=\"event-image\"><img src=\"@{picture}\" class=\"evt-img\"/></div><div class=\"event-text\"><p class=\"event-name\">@{name}</p><p class=\"event-date\">@{time}</p></div></div></div></a>";
       						
       						html = html.replace("@{name}", data.data[i].name);
       						html = html.replace("@{picture}", data.data[i].picture);
       						html = html.replace("@{time}", data.data[i].time);
       						//time
       						
       						$("#carouselh")[0].innerHTML += html;  
       						
       						
       						for(var j=0; j < data.data[i].locations.length; j++) {       							
       							var myLatlng = new google.maps.LatLng(data.data[i].locations[j].lat,data.data[i].locations[j].lng);
    
 								//var marker = new google.maps.Marker({
      								//position: myLatlng,
      								//title: data.data[i].name
  								//});	
  								//console.log(data.data[i].id);
  								
  								//marker.setMap(map);  
  								var circleOptions = {
      								strokeColor: "#9e217e",
      								strokeOpacity: 0.8,
      								strokeWeight: 2,
      								fillColor: "#c51498",
      								fillOpacity: 0.35,
      								map: map,
      								center: myLatlng,
      								radius: 300000,
      								tag:data.data[i].id
    							};
    							
    							var eventCircle = new google.maps.Circle(circleOptions);
    							google.maps.event.addListener(eventCircle, "click", function(event){
    								console.log(this.getCenter());
    							});
    							
  								
       						
       						}							
					}
					  
					$('#carouselh').jsCarousel({ onthumbnailclick: function(src) { alert(src); }, autoscroll: false, circular: true, masked: false, itemstodisplay: 5, orientation: 'h' });
					changeEventHover();
					changeArrowHover();

       			
      			});
			</script>  
		
		
		
			<div id="page">
				<div id="header">
				</div>
				<div id="my-map" style="width:100%;height:350px;"></div>
				<div id="event-bar">
					<hr size="4"></hr>
					<div id="carouselh">
                    </div>
					<div style="clear:both;"/>
				</div>
			</div>
		     
	</body>
</html>

