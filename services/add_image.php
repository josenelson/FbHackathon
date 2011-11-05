<?php

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

include_once('../conf/config.php');

$eventid = isset($_GET["eventid"])? $_GET["eventid"]:"";
$picid = isset($_GET["picid"])? $_GET["picid"]:"";
$userid = isset($_GET["userid"])? $_GET["userid"]:"";

$query = "INSERT INTO images (eventid, picid, userid) VALUES ('".$eventid."', '".$picid."', '".$userid."')";
$result = mysql_query($query);
echo $result;
?>
