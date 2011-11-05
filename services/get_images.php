<?php

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

include_once('../conf/config.php');

//Event variable
$eventid = isset($_GET["eventid"])? $_GET["eventid"]:"1";

function get_images($eventid)
{
	//Connection handle and get images based on eventid
	$result = mysql_query("SELECT picid FROM images WHERE eventid ='".$eventid."'");

	$eventData = array();
	$eventData["event_images"] = array();

	while($row = mysql_fetch_array($result))
	{
		$temp = array();
		$temp["picid"] = $row["picid"];
		array_push($eventData["event_images"], $temp);
	}

	//Return json data
	return $eventData;
}
