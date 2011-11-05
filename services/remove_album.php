<?php

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

include_once('../conf/config.php');

$eventid = isset($_GET["eventid"])? $_GET["eventid"]:"";
$albumid = isset($_GET["albumid"])? $_GET["albumid"]:"";

$query = "DELETE FROM images WHERE eventid='".$eventid."' and albumid='".$albumid;
$result = mysql_query($query);
echo $result;

?>
