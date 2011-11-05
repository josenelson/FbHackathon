<?php


header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

require_once("../fb/facebook_api.php");
require_once("../conf/config.php");

function getAlbumPictures($albumid)
{
$pictures = getAlbumPictures($albumid);

$pictureData = array();
$pictureData["pictures"] = array();
print_r($pictures);
foreach($pictures as $picture)
{
	foreach($picture as $singlePicture)
	{
		if($singlePicture->{"picture"})
		{
			array_push($pictureData["pictures"], $singlePicture->{"picture"});
		}
	}
}

return $pictureData;
}


?>
