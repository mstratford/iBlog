<?php
Session_start();
$id = $_GET["id"];
include ("../include.php");
  $sql="SELECT * FROM posts WHERE id='$id'";
$result=mysql_query($sql);
while($row=mysql_fetch_array($result)){
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
}

 $sql9="SELECT * FROM siteinfo";
$result9=mysql_query($sql9);

$row9=mysql_fetch_array($result9);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="yes" name="apple-mobile-web-app-capable" />
<meta content="index,follow" name="robots" />
<meta content="text/html; charset=iso-8859-1" http-equiv="Content-Type" />
<link href="../pics/homescreen.gif" rel="apple-touch-icon" />
<meta content="minimum-scale=1.0, width=device-width, maximum-scale=0.6667, user-scalable=no" name="viewport" />
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<script src="../javascript/functions.js" type="text/javascript"></script>
<title><?php echo $row9["name"];?></title>
<link href="../pics/startup.png" rel="apple-touch-startup-image" />
<meta content="iPod,iPhone,Webkit,iWebkit,Website,Create,mobile,Tutorial,free" name="keywords" />
<meta content="Try out all the new features of iWebKit 5 with a simple touch of a finger and a smooth screen rotation!" name="description" />
</head>

<body>
<div id="topbar" class="black">
<?php
if (isset($_GET["test"])){
	?>
  <div id="title">
		<?php echo $row9["name"];?></div>
         <div id="leftnav">
		<a href="index.php" class="noeffect">Account</a> </div>
	
</div>
<div id="content">
<?php
	include("../include.php");
	
	mysql_query("DELETE FROM comments WHERE id='$id'");
	?>
    
    <span class="graytitle">Deleted</span>
    <ul class="pageitem">
  <li class="textbox"><span class="header">Deleted Comment</span>
    <p>The Comment has been Deleted!</p></li>
  <li class="menu"><a href="comments.php"> <img alt="list" src="../thumbs/start.png" /><span class="name">Delete More</span><span class="arrow"></span></a></li>
<li class="menu"><a href="index.php"> <img alt="list" src="../thumbs/plugin.png" /><span class="name">Account</span><span class="arrow"></span></a></li>
<li class="menu"><a href="../index.php"> <img alt="list" src="../thumbs/safari.png" /><span class="name">Home</span><span class="arrow"></span></a></li>    
  </li>
  </ul>
    
    <?php

mysql_close($con);
	
}

else{
	
?>
<div id="title">
		<?php echo $row9["name"];?></div>
         <div id="leftbutton">
		<a href="comments.php" class="noeffect">Back</a> </div>
        </div>

	<span class="graytitle">Delete</span>
    <ul class="pageitem">
  <li class="textbox"><span class="header">Delete Comment</span>
    <p>Are you sure you want to delete it?</p>
  </li>
  <li class="menu"><a href="commentdel.php?id=<?php echo $_GET["id"];?>&test=1"> <img alt="list" src="../thumbs/help.png" /><span class="name">Yes</span><span class="arrow"></span></a></li>
  <li class="menu"><a href="comments.php"> <img alt="list" src="../thumbs/help.png" /><span class="name">No</span><span class="arrow"></span></a></li>
  
  </ul>
   
  <?php
}
  ?>
	
</div>
<div id="footer">
	<a href="http://iwebkit.net">Powered by iWebKit</a></div>

</body>

</html>