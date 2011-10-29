<?php
Session_start();
if (!$_SESSION["logged"])
header( 'Location: login.php' ) ;
include ("include.php");
    $sql="SELECT * FROM siteinfo";
$result=mysql_query($sql);

$row=mysql_fetch_array($result);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<META HTTP-EQUIV="Refresh" CONTENT="10; URL=chatbox.php">
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
<div id="title"><?php echo $row["name"];?></div>
<div id="leftnav">
<a href="../"><img src="images/home.png" /></a> </div>
<div id="rightbutton">
		<a href="admin" class="noeffect">Account</a> </div>
</div>
 <div id="tributton"><div class="links">
<a href="index.php">Blog</a><a id="pressed" href="#">Chat</a><a
href="viewblog.php">Categories</a>
</div></div>
<div id="content">
<?php
if(isset($_GET["post"])){
if($_GET["post"] == 1){
	?>
<ul class="pageitem"><li class="textbox">
Added message.
</li></ul>
<?php
}
}
?>
   <form action="chatbox.php" method="post">
		<fieldset><span class="graytitle">Chat</span>
<ul class="pageitem">
			<li class="bigfield"><input name="message" placeholder="Chat here" type="text" /></li>
		
		</ul>
</fieldset></form>
       <?php
if (isset($_POST["message"])){
	$message = addslashes($_POST["message"]);
	
 $reply = strip_tags($_POST["message"]);
if (strlen($message) > 200){
  ?>
  <ul class="pageitem"><li class="textbox">
  <?php
  $errors = 1;
  
  echo "Your message cannot be longer than 200 characters, please try again";
  
?>
</li>
  <li class="menu"><a href="chatbox.php"> <img alt="list" src="thumbs/accessibility.png" /><span class="name">Retry</span><span class="arrow"></span></a></li>
  </ul>

<?php
}
  include ("include.php");
	 
	 $sql="SELECT * FROM chatbox ";
$result=mysql_query($sql);
while($row=mysql_fetch_array($result)){
if ($message == $row["body"] && $_SESSION["username"] == $row["username"]){
	$errors = 1;
	  ?>
	<ul class="pageitem"><li class="textbox">
    <?php
  echo "You can't Re-post!";
  
  ?> <li class="menu"><a href="chaboxt.php"> <img alt="list" src="thumbs/accessibility.png" /><span class="name">Chatbox</span><span class="arrow"></span></a></li>
  
	</li></ul>  
    <?php 
}
}


if (empty($errors)){
	   include("include.php");
	   $time = time(); 
	   $user = $_SESSION["username"];
	  $sql="INSERT INTO chatbox (id,user,body,time) VALUES ('null','$user','$message','$time')";
	  if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
	  ?>
	<ul class="pageitem"><li class="textbox">
     <script type="text/javascript">
<!--
window.location = "chatbox.php?post=1"
//-->
</script>
    <?php
  echo "Posted comment!";
  Mysql_close($con);
  }
  }
else {
	
	
	
	
// database connection info
include("include.php");
// find out how many rows are in the table 
$sql = "SELECT COUNT(*) FROM chatbox";
$result = mysql_query($sql, $con) or trigger_error("SQL", E_USER_ERROR);
$r = mysql_fetch_row($result);
$numrows = $r[0];

// number of rows to show per page
$rowsperpage = 5;
// find out total pages
$totalpages = ceil($numrows / $rowsperpage);

// get the current page or set a default
if (isset($_GET['currentpage']) && is_numeric($_GET['currentpage'])) {
   // cast var as int
   $currentpage = (int) $_GET['currentpage'];
} else {
   // default page num
   $currentpage = 1;
} // end if

// if current page is greater than total pages...
if ($currentpage > $totalpages) {
   // set current page to last page
   $currentpage = $totalpages;
} // end if
// if current page is less than first page...
if ($currentpage < 1) {
   // set current page to first page
   $currentpage = 1;
} // end if

// the offset of the list, based on current page 
$offset = ($currentpage - 1) * $rowsperpage;

// get the info from the db 
include ("include.php");
$sql = "SELECT * FROM chatbox ORDER BY id DESC LIMIT $offset, $rowsperpage";
$result = mysql_query($sql, $con) or trigger_error("SQL", E_USER_ERROR);

if(mysql_num_rows($result)==0){
      echo(" <ul class=\"pageitem\"><li class=\"textbox\"><p>No chats going on yet, Start it up!!</p></li>");
   }
else{
	
// while there are rows to be fetched...
?>
<span class="graytitle">Chatbox</span>
   <ul class="pageitem">
       

<?php
while ($row7 = mysql_fetch_assoc($result)) {
	
	   ?>
       
  
   
    <li class="textbox">
    <span class="header">
    <?php

      // data
      $get_time = $row7['time'];
     
      $time = time();
      $diff = $time - $get_time; // seconds
      
      switch(1)
      {
         case ($diff < 60):
         $count = $diff;
         if ($count==0)
            $count = "a moment";
         else if ($count==1)
            $suffix = "second";
         else
            $suffix = "seconds";
         break;
         
         case ($diff > 60 && $diff < 3600):
         $count = floor($diff/60);
         if ($count==1)
            $suffix = "minute";
         else
            $suffix = "minutes";
         break;

         case ($diff > 3600 && $diff < 86400):
         $count = floor($diff/3600);
         if ($count==1)
            $suffix = "hour";
         else
            $suffix = "hours";
         break;
         
         case ($diff > 86400 && $diff < 604800):
         $count = floor($diff/86400);
         if ($count==1)
            $suffix = "day";
         else
            $suffix = "days";
         break;
         
         case ($diff > 604800 && $diff < 2629743):
         $count = floor($diff/604800);
         if ($count==1)
            $suffix = "week";
         else
            $suffix = "weeks";
         break;
         
         case ($diff > 2629743 && $diff < 31556926):
         $count = floor($diff/2629743);
         if ($count==1)
            $suffix = "month";
         else
            $suffix = "months";
         break;
         
         case ($diff > 31556926):
         $count = floor($diff/31556926);
         if ($count==1)
            $suffix = "year";
         else
            $suffix = "years";
         break;

      }
      
      echo " Posted ".$count." ".@$suffix." ago by ".$row7["user"]."";

?>
    
    
    
    
    
    </span>
    
    
    
    
    
    
    
    
    <?php echo stripslashes($row7["body"]);?>
     </li>
  
    
    
   <?php

}
} 

?>
</ul>
<ul class="pageitem"><li class="textbox"><center>
<?php
// end while

/******  build the pagination links ******/
// range of num links to show
$range = 3;

// if not on page 1, don't show back links
if ($currentpage > 1) {
   // show << link to go back to page 1
   echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=1'><<</a> ";
   // get previous page num
   $prevpage = $currentpage - 1;
   // show < link to go back to 1 page
   echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$prevpage'><</a> ";
} // end if 

// loop to show links to range of pages around current page
for ($x = ($currentpage - $range); $x < (($currentpage + $range) + 1); $x++) {
   // if it's a valid page number...
   if (($x > 0) && ($x <= $totalpages)) {
      // if we're on current page...
      if ($x == $currentpage) {
         // 'highlight' it but don't make a link
         echo " [<b>$x</b>] ";
      // if not current page...
      } else {
         // make it a link
         echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$x'>$x</a> ";
      } // end else
   } // end if 
} // end for
                 
// if not on last page, show forward and last page links        
if ($currentpage != $totalpages) {
   // get next page
   $nextpage = $currentpage + 1;
    // echo forward link for next page 
   echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$nextpage'>></a> ";
   // echo forward link for lastpage
   echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$totalpages'>>></a> ";
} // end if
/****** end build pagination links ******/
}
?>
</center>
</li>
</ul>
</div>
<div id="footer">
	<a href="http://iwebkit.net">Powered by iWebKit</a></div>

</body>

</html>