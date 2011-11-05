<?php

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

include_once('../conf/config.php');

//Picture variable
$picid = isset($_GET["picid"])? $_GET["picid"]:"";
$eventid = isset($_GET["eventid"])? $_GET["eventid"]:"";
echo $eventId;
$query = "INSERT INTO images (eventid, picid) VALUES ('".$eventid."', '".$picid."')";
$result = mysql_query($query);

//Return true or false
echo json_encode($result);

?>
