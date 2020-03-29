<?php

DEFINE ('DB_user', 'mysqladmin');
DEFINE ('DB_password', 'Duke2022');
DEFINE ('DB_host', 'localhost');
DEFINE ("DB_name", 'UserLocation');


$dbc = mysqli_connect(DB_host,DB_user, DB_password,DB_name)
OR die('Could not connect'.
  mysql_connect_error());
//if($dbc){
//echo "connected" ;
//}
?>
