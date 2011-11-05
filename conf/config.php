<?php

$host = 'localhost';
$password = 'root';
$database = 'memoriez';
$username = 'root';

$connection = mysql_connect($host, $username, $password)  or die(mysql_error()); 
mysql_select_db($database) or die(mysql_error());

 