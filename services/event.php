<?php

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

include_once('../conf/config.php');

//Event variable
$eventid = isset($_GET["eventid"])? $_GET["eventid"]:"1";

//Connection handle and get data based on given event id
$result = mysql_query("SELECT lat, lng FROM eventlocations WHERE eventid ='".$eventid."'");

$eventData = array();
$eventData[]
while($row = mysql_fetch_array($result))
{
	
}

echo json_encode($row);
?>
