<?php

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

include_once('../conf/config.php');

$eventid = isset($_GET["eventid"])? $_GET["eventid"]: "";
$lat = isset($_GET["lat"])? $_GET["lat"]: "";
$lng = isset($_GET["lng"])? $_GET["lng"]: "";

//Connection handle and add event location for a given event
$query =  "INSERT INTO eventlocations (eventid, lat,lng) VALUES ('".$eventid."', '".$lat."', '".$lng."')";
$result = mysql_query($query);
echo $result;

?>
