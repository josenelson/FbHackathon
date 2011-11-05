<?php

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

include_once('../conf/config.php');

function add_image($eventid, $picid)
{
$query = "INSERT INTO images (eventid, picid) VALUES ('".$eventid."', '".$picid."')";
$result = mysql_query($query);
return $result;
}
?>
