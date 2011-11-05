<?php

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');


//Get the address passed in
//Defaults to USA
$address = isset($_GET["address"])? $_GET["address"]: "USA";

//Geocode given address
$geocodeaddress = geocode($address);

function geocode($country)
{
define("MAPS_HOST", "maps.googleapis.com");
define("KEY", "ABQIAAAARWVeFhNhrPu-BpalRmnZ8xT8PMUw5z7_OLJoE1lh2VQyfb-WOxRwtidV4R85jpQmmcUmMj6Peuz3Yw
ABQIAAAARWVeFhNhrPu-BpalRmnZ8xT8PMUw5z7_OLJoE1lh2VQyfb-WOxRwtidV4R85jpQmmcUmMj6Peuz3Yw");

// Iterate through the rows, geocoding each address
$geocode_pending = true;
// Initialize delay in geocode speed
$delay = 0;
$base_url = "http://" . MAPS_HOST . "/maps/api/geocode/json?address=";

  while ($geocode_pending) {
	  $request_url = $base_url. urlencode($country)."&sensor=false";
	  
	  $json = file_get_contents($request_url, 0, null, null);

	  $jsonData = json_decode($json);
	  $status = $jsonData->{"status"};

    if (strcmp($status, "OK") == 0) {

	    // Successful geocode
      $geocode_pending = false;
      // Format: Longitude, Latitude, Altitude
      $lat = $jsonData->{"results"}[0]->{"geometry"}->{"location"}->{"lat"};
      $lng = $jsonData->{"results"}[0]->{"geometry"}->{"location"}->{"lng"};
      $coordinates = array();
      $coordinates["coordinates"] = array();
      $temp = array();
      $temp["lat"] = $lat;
      $temp["lng"] = $lng;
      array_push($coordinates["coordinates"], $temp);
     echo json_encode($coordinates);
      return $coordinates;
    }
    else if (strcmp($status, "REQUEST_DENIED") == 0) {
      // sent geocodes too fast
      $delay += 100000;
    } else {
      // failure to geocode
      $geocode_pending = false;
      echo "Address " . $country . " failed to geocoded. ";
      echo "Received status " . $status . "\n";
    }
    usleep($delay);
    
  }
	return "boom";
}

?>
