<?php

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

require_once("../fb/facebook_api.php");
require_once("../conf/config.php");

$eid = isset($_GET["eventid"])? $_GET["eventid"]:"";

$users = getEventUsers($eid);

$usersData = array();
$i = 0;
if($users)
{
	foreach($users->{"attending"} as $user) {
		$imgurl = "";
		if($i < 10)
		{
			$imgurl = getUserImageUrl($user);
			$temp = array();
			$temp["imgurl"] = $imgurl;
			$temp["userid"] = $user;
			array_push($usersData, $temp);
			$i++;
		}

	}
}

$eventData["event"] = array();

$event = getEventInfo($eid);
$eventpic = getEventPicture($eid);

$eventData["event"]["name"] = $event->{"name"};
$eventData["event"]["description"] = $event->{"description"};
$eventData["event"]["date"] = $event->{"start_time"};
$eventData["event"]["location"] = $event->{"location"};
$eventData["event"]["picture"] = $eventpic;
$eventData["event"]["users"] = $usersData;



echo json_encode($eventData);

//$user_events = getUserEvents();




