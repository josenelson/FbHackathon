<?php

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

require_once("../fb/facebook_api.php");
require_once("../conf/config.php");
require_once("./get_locations.php");

$user_events = getUserEvents();

$eid = "";

$events = array();
$events["data"] = array();

foreach($user_events as $user_event) {
   $event_data = array();

   $event_data["id"] = number_format($user_event->{"eid"}, 0, '.','');
   $event_data["name"] = $user_event->{"name"};
   $event_data["picture"] = $user_event->{"pic"};
   $event_data["time"] = date("d F Y", $user_event->{"start_time"});
   
   
   $event_locations = array();
   
   $event_data_locations = get_locations($event_data["id"]);
      
   foreach($event_data_locations as $event_data_location) {
   		   		
   		array_push($event_locations, array(
   										"lat" => $event_data_location["lat"], 
   										"lng" => $event_data_location["lng"]
   										)
   									);
   }
   
   
   $event_data["locations"] = $event_locations;
   
   array_push($events["data"], $event_data);
}

echo json_encode($events);

//$user_events = getUserEvents();



