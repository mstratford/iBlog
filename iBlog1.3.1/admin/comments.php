<?php
Session_start();
include ("../include.php");
$userid = $_SESSION["id"];
$userlvl = $_SESSION["lvl"];
if($userlvl == 3 || $userlvl == 2){
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
<title>Edit Comments</title>
<link href="../pics/startup.png" rel="apple-touch-startup-image" />
<meta content="iPod,iPhone,Webkit,iWebkit,Website,Create,mobile,Tutorial,free" name="keywords" />
<meta content="Try out all the new features of iWebKit 5 with a simple touch of a finger and a smooth screen rotation!" name="description" />
</head>

<body>
<div id="topbar" class="black">
  <div id="title">
		Comments
        
        </div>
	<div id="leftnav">
		<a href="index.php" class="noeffect"><img src="../images/home.png" /></a></div>
</div>
    
        </div>
<div id="content">
  <?php
  if (isset($_GET["post"])){
	  ?>
<span class="graytitle">Delete Comments</span>
<ul class="pageitem">
<li class="textbox">
Now, select a comment to delete.
</li></ul>
       <ul class="pageitem">
      <?php
	  $id = $_GET["post"];
  include ("../include.php");
  $sql="SELECT * FROM comments WHERE post='$id'";
// OREDER BY id DESC is order result by descending 
$result=mysql_query($sql);

 function ShortenText($text) { 

        // Change to the number of characters you want to display 
        $chars = 35; 

        $text = $text." "; 
        $text = substr($text,0,$chars); 
        $text = substr($text,0,strrpos($text,' ')); 
        $text = $text."..."; 

        return $text; 

    } 
if(mysql_num_rows($result)==0){
      echo(" <li class=\"textbox\"><p>No comments on this post!</p></li>");
   }
   
   else {
while($row=mysql_fetch_array($result)){

?>

  <li class="menu"><a href="commentdel.php?id=<?php echo $row["id"];?>"> <!--<img alt="list" src="thumbs/wordpress.png" />--><span class="name">
  <?php 
 
   
   $text =$row["detail"];
  echo ShortenText($text);
  
  ?></span><span class="comment"><?php echo $row["user"];?></span><span class="arrow"></span></a></li>
  
  
  
  
  
 <?php 
}
   }
?>
</ul>
<?php
  }

  else{
	  
?>
<span class="graytitle">Delete Comments</span>
<ul class="pageitem">
<li class="textbox">
First, select a post to show it's comments. Also, you can turn into landscape mode.

</li>

<?php
  mysql_close($con);
  include ("../include.php");
  $sql="SELECT * FROM posts ORDER BY id DESC";
// OREDER BY id DESC is order result by descending 
$result=mysql_query($sql);
while($row=mysql_fetch_array($result)){

?>

  <li class="menu"><a href="comments.php?post=<?php echo $row["id"];?>"> <!--<img alt="list" src="thumbs/wordpress.png" />--><span class="name">
  <?php echo $row["topic"];?></span><span class="comment"><?php echo date("m/d/y",$row["date"]);?></span><span class="arrow"></span></a></li>
  
  
  
  
  
 <?php 
}
  
  }
  ?>

    
    
	
</div>
<div id="footer">
	<a href="http://iwebkit.net">Powered by iWebKit</a></div>

</body>

</html>
