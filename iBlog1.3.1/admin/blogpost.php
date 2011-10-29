<?php
Session_start();
include ("../include.php");
$userid = $_SESSION["id"];
$userlvl = $_SESSION["lvl"];
if($userlvl == 3 || $userlvl == 2 || $userlvl == 1){
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
<link href="../pics/homescreen.gif" rel="apple-touch-icon" />
<meta content="minimum-scale=1.0, width=device-width, maximum-scale=0.6667, user-scalable=no" name="viewport" />
<link href="../css/style.css" rel="stylesheet" type="text/css" />
<script src="../javascript/functions.js" type="text/javascript"></script>
<title>Account Panel - New Post
</title>
<meta content="iPod,iPhone,Webkit,iWebkit,Website,Create,mobile,Tutorial,free" name="keywords" />
<meta content="now completly styles thanks to css these form elements are lighter and easier to use than ever before." name="description" />
</head>

<body>

<div id="topbar" class="black">
	<div id="leftnav">
		<a href="index.php"><img alt="home" src="../images/home.png" /></a></div>
	
</div>

	
</div>
<div id="content">

<?php
  
  $title = strip_tags($_POST["title"]);
  $body = $_POST["body"];
      $cat = $_POST["cat"];

  if (strlen($title) > 45){
  ?>
  <ul class="pageitem">
    <li class="textbox">
      <?php
  $errors = 1;
  echo "You made the title too long, 45 characters max.";

  ?>
    </li>
    <li class="menu"><a href="postblog.php"> <img alt="list" src="../thumbs/accessibility.png" /><span class="name">Retry</span><span class="arrow"></span></a></li>
    <li class="menu"><a href="index.php"> <img alt="list" src="../thumbs/plugin.png" /><span class="name">Account</span><span class="arrow"></span></a></li>
    <li class="menu"><a href="../index.php"> <img alt="list" src="../thumbs/safari.png" /><span class="name">Home</span><span class="arrow"></span></a></li>
  </ul>

  <?php
  }
  if (strlen($body) > 5000){
  ?>
  <ul class="pageitem"><li class="textbox">
  <?php
  $errors = 1;

  echo "Your post body cannot be longer than 5000 characters, please try again";

  ?>

  </li>
  <li class="menu"><a href="postblog.php"> <img alt="list" src="../thumbs/accessibility.png" /><span class="name">Retry</span><span class="arrow"></span></a></li>
   <li class="menu"><a href="index.php"> <img alt="list" src="../thumbs/plugin.png" /><span class="name">Account</span><span class="arrow"></span></a></li>
    <li class="menu"><a href="../index.php"> <img alt="list" src="../thumbs/safari.png" /><span class="name">Home</span><span class="arrow"></span></a></li>
  </ul>
  <?php


  }



   if (empty($errors)){
	   include("../include.php");
	   $time = time();
	   $user = $_SESSION["username"];
	  $sql="INSERT INTO posts (id,topic,detail,date,user,cat) VALUES ('null','$title','$body','$time','$user','$cat')";
	  if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
	  ?>
	<ul class="pageitem"><li class="textbox">
    <?php
  echo "Added Entry!";
  
  ?>
  
  </li>
  <li class="menu"><a href="../index.php"> <img alt="list" src="../thumbs/accessibility.png" /><span class="name">Blog</span><span class="arrow"></span></a></li>   <li class="menu"><a href="index.php"> <img alt="list" src="../thumbs/plugin.png" /><span class="name">Account</span><span class="arrow"></span></a></li>
    <li class="menu"><a href="../index.php"> <img alt="list" src="../thumbs/safari.png" /><span class="name">Home</span><span class="arrow"></span></a></li>
  
  </ul>
  <?php
  }
  
   

?>

	
	
<div id="footer">
	<a href="http://iwebkit.net">Powered by iWebKit</a></div>

</body>

</html>