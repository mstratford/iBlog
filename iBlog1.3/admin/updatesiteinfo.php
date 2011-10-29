<?php
Session_start();
include ("../include.php");
$userid = $_SESSION["id"];
$userlvl = $_SESSION["lvl"];
if($userlvl == 3){
echo "";
}
else
 die ('<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> <html xmlns="http://www.w3.org/1999/xhtml"> <head> <meta HTTP-EQUIV="REFRESH" content="0; url=denied.html"> </head> <body> </body> </html> ');

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
<title><?php echo $row9["name"];?>
</title>
<meta content="iPod,iPhone,Webkit,iWebkit,Website,Create,mobile,Tutorial,free" name="keywords" />
<meta content="now completly styles thanks to css these form elements are lighter and easier to use than ever before." name="description" />
</head>

<body>

<div id="topbar" class="black">
<div id="title">
  <?php echo $row9["name"];?></div>
	<div id="leftnav">
		<a href="index.php">Account</a></div>
</div>

	
</div>
<div id="content">

<?php
  
  $name = strip_tags($_POST["name"]);
  $short = $_POST["short"];

  if (strlen($name) > 20){
  ?>
  <ul class="pageitem">
    <li class="textbox">
      <?php
  $errors = 1;
  echo "The title is too long, it should be 20 characters max.";
  
  ?>
    </li>
    <li class="menu"><a href="siteinfo.php"> <img alt="list" src="../thumbs/safari.png" /><span class="name">Retry</span><span class="arrow"></span></a></li>
  </ul>
  
  <?php
  }
  if (strlen($short) > 140){
  ?>
  <ul class="pageitem">
    <li class="textbox">
      <?php
  $errors = 1;
  echo "The Short Name is too long, 140 characters max.";
  
  ?>
    </li>
    <li class="menu"><a href="siteinfo.php"> <img alt="list" src="../thumbs/safari.png" /><span class="name">Retry</span><span class="arrow"></span></a></li>
  </ul>
  
  <?php
  }
   if (empty($errors)){
	   include("../include.php");
	$sql = "UPDATE siteinfo SET name='$name'";
	$sql2 = "UPDATE siteinfo SET short='$short'";
      $result = mysql_query($sql);
	  $result2 = mysql_query($sql2);

	  ?>
	<ul class="pageitem"><li class="textbox">
    <?php
  echo "The site Information has been Updated!";
  
  ?>
  
  </li>
  <li class="menu"><a href="siteinfo.php"> <img alt="list" src="../thumbs/settings.png" /><span class="name">Edit Again</span><span class="arrow"></span></a></li>
  <li class="menu"><a href="index.php"> <img alt="list" src="../thumbs/plugin.png" /><span class="name">Account</span><span class="arrow"></span></a></li>
  <li class="menu"><a href="../index.php"> <img alt="list" src="../thumbs/safari.png" /><span class="name">Home</span><span class="arrow"></span></a></li>
  </ul>
  <?php
  }
  
   

?>

	
	
<div id="footer">
	<a href="http://iwebkit.net">Powered by iWebKit</a></div>

</body>

</html>