<?php

//https://www.facebook.com/dialog/oauth?client_id=212608815478069&redirect_uri=http://localhost/FbHackathon&scope=manage_pages&response_type=token

require_once('facebook_api.php');

//$user_profile = $_SESSION['facebook']->api('/me/events','GET');

print_r($_SESSION["access_token"]);