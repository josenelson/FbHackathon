<?php

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

include_once('../conf/config.php');

//Event variable
$eventid = isset($_GET["eventid"])? $_GET["eventid"]:"1";
$lat = isset($_GET["lat"])? $_GET["lat"]:"0";
$lng = isset($_GET["lng"])? $_GET["lng"]:"0";


//Connection handle and add event location for a given event
$query =  "INSERT INTO eventlocations (eventid, lat,lng) VALUES ('".$eventid."', '".$lat."', '".$lng."')";
$result = mysql_query($query);



//Return json data
echo json_encode($result);


?>
