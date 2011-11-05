<?php

require_once("../fb/facebook_api.php");
require_once("../conf/config.php");

$user_events = getUserEvents();

print_r($user_events);

//var_dump($user_events->{"data"});

//$user_events = getUserEvents();



