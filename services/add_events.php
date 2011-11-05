<?php

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

include_once('../conf/config.php');

function add_events($eventid, $lat, $lng)
{
//Connection handle and add event location for a given event
$query =  "INSERT INTO eventlocations (eventid, lat,lng) VALUES ('".$eventid."', '".$lat."', '".$lng."')";
$result = mysql_query($query);
return $result;
}

?>
