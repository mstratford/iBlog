<?php
Session_start();
include ("../include.php");
$userid = $_SESSION["id"];
$userlvl = $_SESSION["lvl"];
if($userlvl == 3){
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
<title>Account Panel - Users</title>
<link href="../pics/startup.png" rel="apple-touch-startup-image" />
<meta content="iPod,iPhone,Webkit,iWebkit,Website,Create,mobile,Tutorial,free" name="keywords" />
<meta content="Try out all the new features of iWebKit 5 with a simple touch of a finger and a smooth screen rotation!" name="description" />
</head>

<body>
<div id="topbar" class="black">
  <div id="title">
		Users
        </div>
	<div id="leftnav">
		<a href="../index.php"><img alt="home" src="../images/home.png" /></a><a href="index.php">Back</a></div>
</div>
    
        </div>
<div id="content">
	
  <ul class="pageitem">
  <?php
  if(isset($_GET["search"])){

	$id = $_GET["search"];
	$trim = trim($id);
	include ("../include.php");
 $sql = "SELECT * FROM `users`  WHERE `Username` LIKE \"%".$trim. "%\" ORDER BY id ASC;";
$result=mysql_query($sql);
if(mysql_num_rows($result)==0){
      echo("<li class=\"textbox\"><p>No search results matched your query</p></li>");
   }
 else {
      while($row = mysql_fetch_array($result)) {
	?>
	 <li class="menu"><a href="useredit.php?id=<?php echo $row["id"];?>&lvl=<?php echo $row["lvl"];?>"> <!--<img alt="list" src="thumbs/wordpress.png" />--><span class="name">
  
   
  <?php echo $row["Username"];?>
  
  </span><span class="comment"></span><span class="arrow"></span></a></li>
  
  
  
  
  
 <?php 
	  }
 }
  }
	else{
  include ("../include.php");
  $sql="SELECT * FROM users ORDER BY id DESC";
// OREDER BY id DESC is order result by descending 
$result=mysql_query($sql);

while($row=mysql_fetch_array($result)){


?>

  <li class="menu"><a href="useredit.php?id=<?php echo $row["id"];?>&lvl=<?php echo $row["lvl"];?>"> <!--<img alt="list" src="thumbs/wordpress.png" />--><span class="name">
  
   
  <?php echo $row["Username"];?>
  
  </span><span class="comment"></span><span class="arrow"></span></a></li>
  
  
  
  
  
 <?php 
}
	}
  ?>
  


  </ul>
    
    
	
</div>
<div id="footer">
	<a href="http://iwebkit.net">Powered by iWebKit</a></div>

</body>

</html>
