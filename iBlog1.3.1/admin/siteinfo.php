<?php
Session_start();
$userid = $_SESSION["id"];
$userlvl = $_SESSION["lvl"];
if($userlvl == 3){
echo "";
}
else
 die ('<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> <html xmlns="http://www.w3.org/1999/xhtml"> <head> <meta HTTP-EQUIV="REFRESH" content="0; url=denied.html"> </head> <body> </body> </html> ');
include("../include.php");
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
<meta content="iPod,iPhone,Webkit,iWebkit,tech,anything" name="keywords" />
<meta content="Tech stuff " name="description" />
</head>

<body>

<div id="topbar" class="black">
<div id="title">
  <?php echo $row9["name"];?></div>
  <div id="leftnav">
	<a href="index.php">Account</a></div>
</div>
<div id="content">
<span class="graytitle">Site Info</span>
<ul class="pageitem">
		<li class="textbox"><p>You can edit site information here. So far there is just the site name.</p></li>
	</ul><span class="graytitle">Edit</span>
    <ul class="pageitem">
    <?php
	$sql = "SELECT * FROM siteinfo ";
      $result = mysql_query($sql);        
      $row = mysql_fetch_array($result);
	?>
		<fieldset>
        <form action="updatesiteinfo.php" method="post">
        <li class="bigfield"><input name="name" placeholder="Site Name" value ="<?php echo $row["name"];?>" type="text" /></li>
        <li class="bigfield"><input name="short" placeholder="Short Name" value ="<?php echo $row["short"];?>" type="text" /></li>
        <li class="button"><input name="submit" type="submit" value="Submit"/></li>
        
        </form></fieldset></ul>
       
</div>
<div id="footer">
	<a href="http://iwebkit.net">Powered by iWebKit</a></div>

</body>

</html>
