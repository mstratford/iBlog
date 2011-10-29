<?php
Session_start();
include ("../include.php");
$userid = $_SESSION["id"];
$userlvl = $_SESSION["lvl"];
if($userlvl == 3 || $userlvl == 2 || $userlvl == 1 || $userlvl == 4){
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
		Account Panel</div>
        
	<div id="leftnav">
		<a href="../index.php" class="noeffect"> <img src="../images/home.png" /></a> </div>
    
            <div id="rightbutton">
		<a href="../logout.php" class="noeffect">Logout</a> </div>
        
</div>
<div id="content">
	<span class="graytitle">Welcome</span>
    <ul class="pageitem">
    <?php
  if($userlvl == 3){
	  ?>
  <li class="textbox"><span class="header">The Admin Panel</span>
    <p>From here you can manage your blog.</p>
  </li>
  <?php
  }
  ?>
      <?php
  if($userlvl == 2){
	  ?>
  <li class="textbox"><span class="header">The Moderation Panel</span>
    <p>From here you can post an entry or edit comments</p>
  </li><li class="menu"><a href="postblog.php"> <img alt="list" src="../thumbs/notepad.png" /><span class="name">New Post</span><span class="arrow"></span></a></li>
  <?php
  }
  ?>
      <?php
  if($userlvl == 1){
	  ?>
  <li class="textbox"><span class="header">Author Panel</span>
    <p>As an author you can Create posts, edit, and delete them.</p>
  </li>
<li class="menu"><a href="postblog.php"> <img alt="list" src="../thumbs/notepad.png" /><span class="name">New Post</span><span class="arrow"></span></a></li>
  <?php
  }
  ?>
  <?php
  if($userlvl == 4){
	  ?>
  <li class="textbox"><span class="header">The Account Panel</span>
    <p>From here you can manage your account.</p>
  </li>
  <?php
  }
  ?>
  <?php
  if($userlvl == 3){
	  ?>
  <li class="menu"><a href="postblog.php"> <img alt="list" src="../thumbs/notepad.png" /><span class="name">New Post</span><span class="arrow"></span></a></li>
<li class="menu"><a href="editnews.php"> <img alt="list" src="../thumbs/news.png" /><span class="name">News</span><span class="arrow"></span></a></li>
    <li class="menu"><a href="cat.php"> <img alt="list" src="../thumbs/world.png" /><span class="name">Categories</span><span class="arrow"></span></a></li>

  </ul>
    
    
    <span class="graytitle">Settings</span>
		<ul class="pageitem">
		<li class="menu"><a href="siteinfo.php"> <img alt="list" src="../thumbs/settings.png" /><span class="name">Site Info</span><span class="arrow"></span></a></li>
        <?php
  }
  ?>
  <?php
  if($userlvl == 3 || $userlvl == 2){
	  ?>
     <li class="menu"><a href="comments.php"> <img alt="list" src="../thumbs/start.png" /><span class="name">Comments</span><span class="arrow"></span></a></li>
      <li class="menu"><a href="chats.php"> <img alt="list" src="../thumbs/messages.png" /><span class="name">Chat</span><span class="arrow"></span></a></li>
       <?php
  }
  if($userlvl == 3){
	  ?>
     <li class="menu"><a href="usermanage.php"> <img alt="list" src="../thumbs/basics.png" /><span class="name">Users</span><span class="arrow"></span></a></li>
     <?php
  }
  ?>
</ul>
<span class="graytitle">Account Settings</span>
<ul class="pageitem">
<li class="menu"><a href="../logout.php"> <img alt="list" src="../thumbs/start.png" /><span class="name">Logout</span><span class="arrow"></span></a></li>     
       </ul>
	
</div>
<div id="footer">
	<a href="http://iwebkit.net">Powered by iWebKit</a></div>

</body>

</html>
