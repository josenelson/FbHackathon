<?php
require 'facebook.php';

$appId = '212608815478069';
$secret = 'ab11a960a632e4b3c26d5682f9861109';
$url = 'http://localhost/FbHackaton';

$facebook = new Facebook(array(
  //'appId'  => '191149314281714',
  //'secret' => '73b67bf1c825fa47efae70a46c18906b',
  'appId'  => '212608815478069',
  'secret' => 'ab11a960a632e4b3c26d5682f9861109',
));
// Get User ID
$user = $facebook->getUser();
$access_token = $facebook->getAccessToken();
$code = $_REQUEST["code"];

$_SESSION["user"] = $user;
$_SESSION["facebook"] = $facebook;
$_SESSION["access_token"] = $facebook->getAccessToken();

       
//'AAAAAAITEghMBAIVb8ShZCiu1RlOypQgh8ij6QdRnycXxBsbdtrhU0TDoJNA0hwJdHzYKqequpszXYdYg2P9L2zAocSG4aJoBAWg0UBKRDgKymnbRZA';
// We may or may not have this data based on whether the user is logged in.
//
// If we have a $user id here, it means we know the user is logged into
// Facebook, but we don't know if the access token is valid. An access
// token is invalid if the user logged out of Facebook.

if ($user) {
  try {
    // Proceed knowing you have a logged in user who's authenticated.
    $user_profile = $facebook->api('/me');
  } catch (FacebookApiException $e) {
    error_log($e);
    $user = null;
  }
}

// Login or logout url will be needed depending on current user state.
if ($user) {
  	$_SESSION["logoutUrl"] = $facebook->getLogoutUrl();
  	$_SESSION["isfacebooklogin"] = true;
} else {
  	$_SESSION["loginUrl"] = $facebook->getLoginUrl();
  	$_SESSION["isfacebooklogin"] = false;
}

function isLoggedin() {
	return $_SESSION["isfacebooklogin"];
}

function getLoggedUserId() {
    return $_SESSION["user"]; 
}

function getCurrentUserInfo() {
	return getUserInfo($_SESSION["user"]); 
}

function getUserInfo($userid) {
	$jsonurl = "https://graph.facebook.com/" . $userid;
	$json = file_get_contents($jsonurl,0,null,null);
	$json_output = json_decode($json);
	return $json_output;
}

function getUserEvents() {	
	$jsonurl = "https://api.facebook.com/method/events.get";
	$jsonurl = $jsonurl . "?access_token=" . $_SESSION["access_token"];
	$jsonurl = $jsonurl . "&format=json";
		
	$json = file_get_contents($jsonurl,0,null,null);
	$json_output = json_decode($json);
	
	return $json_output;
}

function printUser() {
	print_r($_SESSION["access_token"]);
}

function getUserImageUrl($userid) {
	return "https://graph.facebook.com/" . $userid . "/picture/";
}
