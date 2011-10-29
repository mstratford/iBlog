<?php
$database ="DB Name";
$mysql_server = "DB Server";
$dbuser= "DB Username";
$dbpass ="DB Password";
$con = mysql_connect($mysql_server,$dbuser,$dbpass);
mysql_select_db($database, $con);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
  ?>