<?php

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

require_once("../fb/facebook_api.php");
require_once("../conf/config.php");


$userid = isset($_GET["userid"])? $_GET["userid"]:"";
$eventid = isset($_GET["eventid"])? $_GET["eventid"]:"";

$albums = getUserAlbums($userid);
$albumData = array();
$albumData["albums"] = array();

foreach($albums as $album)
{
	foreach($album as $albumSingle)
	{

		if($albumSingle->{"id"})
		{
			if(!$albumSingle->{"cover_photo"}) continue;
			$albumDetail = array();
			$albumDetail["name"] = $albumSingle->{"name"};
			$albumDetail["picture"] = $albumSingle->{"cover_photo"};
			$albumDetail["id"] = $albumSingle->{"id"};
			$albumDetail["exists"] = checkExists($albumSingle->{"id"}, $eventid);
			$albumDetail["imageurl"] = getImageUrl($albumSingle->{"cover_photo"});
			array_push($albumData["albums"], $albumDetail);

		}
	}

}


echo json_encode($albumData);

function checkExists($id, $eventid)
{
	//echo "SELECT COUNT(*) FROM images WHERE albumid ='".$id."'"."and eventid='".$eventid."'";

	$result = mysql_query("SELECT COUNT(*) FROM images WHERE albumid ='".$id."'"."and eventid='".$eventid."'");
	$result = mysql_result($result, 0, 0);
	return $result;
}

?>
