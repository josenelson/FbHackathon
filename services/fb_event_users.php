<?php

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

require_once("../fb/facebook_api.php");
require_once("../conf/config.php");

$eid = isset($_GET["eventid"])? $_GET["eventid"]:"";

$users = getEventUsers($eid);

$current_user_info = getCurrentUserInfo();

$usersData = array();

$temp["imgurl"] = getUserImageUrl($current_user_info->{"id"});
$temp["userid"] = $current_user_info->{"id"};
$temp["username"] = $current_user_info->{"name"};
$temp["exists"] = checkExists($temp["userid"], $eid);

array_push($usersData, $temp);

$i = 0;
if($users)
{
	foreach($users->{"attending"} as $user) {
		$imgurl = "";
		if($i >= 10) break;
		$imgurl = getUserImageUrl($user);
		$temp = array();
		$temp["imgurl"] = $imgurl;
		$temp["userid"] = $user;
		$temp["username"] = getUserInfo($user)->{"name"};
		$temp["exists"] = checkExists($temp["userid"], $eid);
		array_push($usersData, $temp);
		$i++;

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

function checkExists($userid, $eventid)
{
	$result = mysql_query("SELECT COUNT(*) FROM images WHERE userid ='".$userid."'"."and eventid='".$eventid."'");
	$result = mysql_result($result, 0, 0);
	return $result;
}

//$user_events = getUserEvents();




