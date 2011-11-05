<?php

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

include_once('../conf/config.php');
include_once('../fb/facebook_api.php');



$eventid = isset($_GET["eventid"]) ? $_GET["eventid"]:"";

if(isset($_GET["userid"]))
{
	$query = "SELECT albumid FROM images WHERE eventid ='".$eventid."' and userid='".$_GET["userid"]."'";
}
else
{
	$query = "SELECT albumid FROM images WHERE eventid ='".$eventid."'";

}

	//Connection handle and get images based on eventid
	$result = mysql_query($query);
	$albumPictures = array();
	$albumPictures["pictures"] = array();
	while($row = mysql_fetch_assoc($result))
	{
		foreach(getAlbumPictures($row["albumid"])->{"data"} as $pictureInAlbum)
		{
			array_push($albumPictures["pictures"], $pictureInAlbum->{"picture"});
		}
	}

	//Return json data
	echo json_encode($albumPictures);
