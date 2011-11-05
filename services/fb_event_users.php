<?php

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

require_once("../fb/facebook_api.php");
require_once("../conf/config.php");

$eid = isset($_GET["eventid"])? $_GET["eventid"]:"";

$users = getEventUsers($eid);

$usersData = array();

if($users)
{
	foreach($users->{"attending"} as $user) {
		array_push($usersData, $user);
	}
}

$eventData["event"] = array();

$event = getEventInfo($eid);
$eventpic = getEventPicture($eid);

$eventData["event"]["name"] = $event->{"name"};
$eventData["event"]["description"] = $event->{"description"};
$eventData["event"]["picture"] = $eventpic;
$eventData["event"]["users"] = $usersData;



echo json_encode($eventData);

//$user_events = getUserEvents();




