<?php
Session_start();
include ("../include.php");
$userid = $_SESSION["id"];
$userlvl = $_SESSION["lvl"];
if($userlvl == 3 || $userlvl == 2){
echo "";
}
else
die ('<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta HTTP-EQUIV="REFRESH" content="0; url=denied.html">
</head>
<body>
</body>
</html>
');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="yes" name="apple-mobile-web-app-capable" />
<meta content="index,follow" name="robots" />
<meta content="text/html; charset=iso-8859-1" http-equiv="Content-Type" />
<link href="pics/homescreen.gif" rel="apple-touch-icon" />
<meta content="minimum-scale=1.0, width=device-width, maximum-scale=0.6667, user-scalable=no" name="viewport" />
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<script src="../javascript/functions.js" type="text/javascript"></script>
<title>Admin</title>
<link href="pics/startup.png" rel="apple-touch-startup-image" />
<meta content="iPod,iPhone,Webkit,iWebkit,Website,Create,mobile,Tutorial,free" name="keywords" />
<meta content="Try out all the new features of iWebKit 5 with a simple touch of a finger and a smooth screen rotation!" name="description" />
</head>

<body>
<div id="topbar" class="black">
  <div id="title">
		Admin Panel</div>
        
	<div id="leftbutton">
		<a href="index.php" class="noeffect">Admin</a> </div>
    
            <div id="rightbutton">
		<a href="../index.php" class="noeffect">Home</a> </div>
        
</div>
<div class="searchbox"><form action="allusers.php" method="get">
<fieldset><input id="search" placeholder="search" name="search" type="text" /><input id="submit" type="hidden" /></fieldset></form></div>
<div id="content">
	<span class="graytitle">Manage</span>
    <ul class="pageitem">
  <li class="textbox"><span class="header">Users</span>
    <p>You can manage user accounts here. You can also search up above!</p>
  </li>
  <li class="menu"><a href="allusers.php"> <img alt="list" src="../thumbs/contacts.png" /><span class="name">All Users</span><span class="arrow"></span></a></li>
  </ul>
    
	
</div>
<div id="footer">
	<a href="http://iwebkit.net">Powered by iWebKit</a></div>

</body>

</html>
