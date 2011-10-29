<script language=javascript>
<!--
if((navigator.userAgent.match(/iPhone/i)) || (navigator.userAgent.match(/iPod/i)))
{}
else{
	location.replace("pc");
}
-->
</script>
<?php
Session_start();
include ("include.php");
    $sql="SELECT * FROM siteinfo";
$result=mysql_query($sql);

$row=mysql_fetch_array($result);
 if (isset($_COOKIE["remember"])){
 if ($_COOKIE["remember"] == "on"){
		  
		  $_SESSION["logged"] = $_COOKIE["logged"];
		  $_SESSION["username"] = $_COOKIE["username"];
		  $_SESSION["id"] = $_COOKIE["id"];
		  $_SESSION["lvl"] = $_COOKIE["lvl"];
		  
	  }
 }

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
<title><?php echo $row["name"];?></title>
<link href="pics/startup.png" rel="apple-touch-startup-image" />
<meta content="iPod,iPhone,Webkit,iWebkit,Website,Create,mobile,Tutorial,free" name="keywords" />
<meta content="Try out all the new features of iWebKit 5 with a simple touch of a finger and a smooth screen rotation!" name="description" />
  </head>

<body>
<div id="topbar" class="black">
  <div id="title">
		<?php echo $row["name"];?></div>

	<div id="leftnav">
		<a href="../index.html"> <img src="images/home.png" /></a></div>
<?php
	if (isset($_SESSION["logged"])){
		?>
        <div id="rightbutton">
		<a href="admin" class="noeffect">Account</a> </div>
		<?php
        }
    if (!isset($_SESSION["logged"])){
		?>
        <div id="rightbutton">
		<a href="login.php" class="noeffect">Login/Register</a> </div>
        <?php
        }
		if (isset($_SESSION["lvl"])){
        if ($_SESSION["lvl"] == 3){
			?>
        <?php
        } if ($_SESSION["lvl"] == 2){
			?>
            
        <?php
        }
		if ($_SESSION["lvl"] == 1){
			?>
            
        <?php
        }


		}
		?>


</div>

                  <div id="tributton"><div class="links">
<a id ="pressed" href="#">Blog</a><a href="chatbox.php">Chat</a><a
href="viewblog.php">Categories</a>
</div></div>
<div id="content">
	 <?php

   include ("include.php");
    $sql2="SELECT * FROM news WHERE id='0'";
$result2=mysql_query($sql2);

$news=mysql_fetch_array($result2);


   ?>
    <span class="graytitle">News</span>
    <ul class="pageitem">
    <li class="textbox">
    <span class="header">
<?php echo $news["title"];?></span>
<?php echo $news["news"];?>
</li></ul>

<span class="graytitle">Posts</span>
<ul class="pageitem">
<?php
  mysql_close($con);
  include ("include.php");
  // find out how many rows are in the table
$sql = "SELECT COUNT(*) FROM posts";
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
$sql = "SELECT * FROM posts ORDER BY id DESC LIMIT $offset, $rowsperpage";
$result = mysql_query($sql, $con) or trigger_error("SQL", E_USER_ERROR);


while ($row = mysql_fetch_assoc($result)) {


?>

  <li class="menu"><a href="blog.php?id=<?php echo $row["id"];?>"> <!--<img alt="list" src="thumbs/wordpress.png" />--><span class="name">
  <?php echo $row["topic"];?></span><span class="comment">


       <?php
    $id = $row["cat"];
    $sql3 ="SELECT title FROM cat WHERE id='$id'";
  $result2 = mysql_query($sql3);
  $rows = mysql_fetch_array($result2);

          echo $rows["title"];
?>
  </span><span class="arrow"></span></a></li>





 <?php

}
  ?>

        </ul>
<ul class="pageitem">
<li class="textbox">
<center>
<?php
// end while

/******  build the pagination links ******/
// range of num links to show
$range = 3;

// if not on page 1, don't show back links
if ($currentpage > 1) {
   // show << link to go back to page 1
   echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=1&id=$id'><<</a> ";
   // get previous page num
   $prevpage = $currentpage - 1;
   // show < link to go back to 1 page
   echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$prevpage&id=$id'><</a> ";
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
         echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$x&id=$id'>$x</a> ";
      } // end else
   } // end if
} // end for

// if not on last page, show forward and last page links
if ($currentpage != $totalpages) {
   // get next page
   $nextpage = $currentpage + 1;
    // echo forward link for next page
   echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$nextpage&id=$id'>></a> ";
   // echo forward link for lastpage
   echo " <a href='{$_SERVER['PHP_SELF']}?currentpage=$totalpages&id=$id'>>></a> ";
} // end if
/****** end build pagination links ******/
?></li>
</ul>
</div>
<div id="footer">
	<a href="http://iwebkit.net">Powered by iWebKit</a></div>

		
</body>

</html>
