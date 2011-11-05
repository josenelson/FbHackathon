<?php

require_once("../fb/facebook_api.php");
require_once("../conf/config.php");

$user_events = getUserEvents();

foreach($user_events as $user_event) {
   print_r($user_event->{"eid"});
   print_r($user_event);
   echo "<br/>";
}

print_r($user_events->{"data"});

//$user_events = getUserEvents();



