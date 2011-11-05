<?php

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

require_once("../fb/facebook_api.php");
require_once("../conf/config.php");
require_once("./get_images.php");

$eventid = isset($_GET["eventid"])? $_GET["eventid"]:"";

$images = get_images($eventid);

$event_images = array();
$event_images["picid"] = array();

foreach($images as $image) {
	array_push($event_images["picid"], $image["picid"]);
   }

echo json_encode($event_images);

//$user_events = getUserEvents();




