<?php
$database ="iblog";
$mysql_server = "localhost";
$dbuser= "root";
$dbpass ="";
$con = mysql_connect($mysql_server,$dbuser,$dbpass);
mysql_select_db($database, $con);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
  ?>
