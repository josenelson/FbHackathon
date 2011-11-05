<?php

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

include_once('../conf/config.php');

function get_locations($eventid)
{
//Connection handle and get data based on given event id
$result = mysql_query("SELECT lat, lng FROM eventlocations WHERE eventid ='".$eventid."'");

$eventData = array();

while($row = mysql_fetch_array($result))
{
	$temp = array();
	$temp["lat"] = $row["lat"];
	$temp["lng"] = $row["lng"];
	array_push($eventData, $temp);
}

//Return json data
return $eventData;
}
