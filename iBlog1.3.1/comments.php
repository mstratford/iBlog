<?php
$id = $_GET["post"];
include ("include.php");
    $sql="SELECT * FROM siteinfo";
$result=mysql_query($sql);

$row=mysql_fetch_array($result);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="yes" name="apple-mobile-web-app-capable" />
<meta content="index,follow" name="robots" />
<meta content="text/html; charset=iso-8859-1" http-equiv="Content-Type" />
<link href="pics/homescreen.gif" rel="apple-touch-icon" />
<meta content="minimum-scale=1.0, width=device-width, maximum-scale=0.6667, user-scalable=no" name="viewport" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script src="javascript/functions.js" type="text/javascript"></script>
<title><?php echo $row["name"];?>
</title>
<meta content="iPod,iPhone,Webkit,iWebkit,tech,anything" name="keywords" />
<meta content="Tech stuff " name="description" />
</head>

<body>

<div id="topbar" class="black">
<div id="title">
		<?php echo $row["name"];
		 
		
		?>
        
        </div>
  <div id="leftnav">
		<a href="index.php"><img alt="home" src="images/home.png" /></a><a href="blog.php?id=<?php echo $id;?>" class="noeffect">Back</a></div>
         
</div>
<div id="content">
  <span class="graytitle">All comments</span>
   <ul class="pageitem">
 
 <?php
  include ("include.php");
  $sql3="SELECT * FROM comments WHERE post='$id' ORDER BY id DESC";
$result3=mysql_query($sql3);
$reply = 1;
while($row3=mysql_fetch_array($result3)){
$reply ++;
	 if ($reply > 7){
?>
  
   
    <li class="textbox">
    <span class="header">
    <?php echo $row3["user"];?> on <?php echo $row3["time"];?>
    </span>
    <?php echo $row3["detail"];?>
     </li>
  
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
