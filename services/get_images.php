<?php

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

include_once('../conf/config.php');


function get_images($eventid)
{
	//Connection handle and get images based on eventid
	$result = mysql_query("SELECT picid FROM images WHERE eventid ='".$eventid."'");

	$eventData = array();

	while($row = mysql_fetch_array($result))
	{
		$temp = array();
		$temp["picid"] = $row["picid"];
		array_push($eventData, $temp);
	}

	//Return json data
	return $eventData;
}
