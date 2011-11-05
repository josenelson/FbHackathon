<?php

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

require_once("../fb/facebook_api.php");
require_once("../conf/config.php");

$userid = isset($_GET["userid"])? $_GET["userid"]:"";

$albums = getUserAlbums($userid);
$albumData = array();
$albumData["albums"] = array();

foreach($albums as $album)
{
	foreach($album as $albumSingle)
	{

		if($albumSingle->{"id"})
		{
			$albumDetail = array();
			$albumDetail["name"] = $albumSingle->{"name"};
			$albumDetail["picture"] = $albumSingle->{"cover_photo"};
			$albumDetail["id"] = $albumSingle->{"id"};
			array_push($albumData["albums"], $albumDetail);

		}
	}

}


echo json_encode($albumData);
?>
