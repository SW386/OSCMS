<?php

//DEFINE ('DB_user', 'mysqladmin');
//DEFINE ('DB_password', 'Duke2022');
//DEFINE ('DB_host', 'localhost');
//DEFINE ("DB_name", 'UserLocation');

DEFINE ('DB_user', 'epiz_25422906');
DEFINE ('DB_password', '8mp2BvhPlqkAVdP');
DEFINE ('DB_host', 'sql210.epizy.com');
DEFINE ("DB_name", 'epiz_25422906_Users');


$dbc = mysqli_connect(DB_host,DB_user, DB_password,DB_name)
OR die('Could not connect'.
  mysql_connect_error());
//if($dbc){
//echo "connected" ;
//}
?>
