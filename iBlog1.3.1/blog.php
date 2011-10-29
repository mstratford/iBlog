<?php
Session_start();
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
<title><?php echo $row["name"];?></title>
<link href="pics/startup.png" rel="apple-touch-startup-image" />
<meta content="iPod,iPhone,Webkit,iWebkit,Website,Create,mobile,Tutorial,free" name="keywords" />
<meta content="Try out all the new features of iWebKit 5 with a simple touch of a finger and a smooth screen rotation!" name="description" />
</head>

<body>
<?php
include ("include.php");
    $sql="SELECT * FROM siteinfo";
$result=mysql_query($sql);

$row=mysql_fetch_array($result);
?>
<div id="topbar" class="black">
  <div id="title">
		<?php echo $row["name"];?>
        </div>
	<div id="leftnav">
<a href="index.php"> <img src="images/home.png" /></a></div>
<?php
	if (isset($_SESSION["logged"])){
		?>
        <div id="rightbutton">
		<a href="admin" class="noeffect">Account</a> </div></div>
		<?php
        }
    if (!isset($_SESSION["logged"])){
		?>
        <div id="rightbutton">
		<a href="login.php" class="noeffect">Login/Register</a> </div></div>
<div id="content">
<?php
}
    mysql_close($con);
    $id = $_GET["id"];
	include ("include.php");
    $sql="SELECT * FROM posts WHERE id='$id'";
$result=mysql_query($sql);

$row=mysql_fetch_array($result);
    ?>
<?php

if (isset($_SESSION["lvl"])){
if($_SESSION["lvl"] == "2" || $_SESSION["lvl"] == "3" ){
	
	?>
    
    <div id="duobutton"><div class="links"><a href="editblog.php?id=<?php echo $id;?>&user=<?php echo $row["user"];?>">Edit</a><a href="deleteblog.php?id=<?php echo $id;?>&user=<?php echo $row["user"];?>">Delete</a></div></div>
    <?php
	
}
if($_SESSION["lvl"] == "1" && $_SESSION["username"] == $row["user"] ){
	
	?>

    <div id="duobutton"><div class="links"><a href="editblog.php?id=<?php echo $id;?>&user=<?php echo $row["user"];?>">Edit</a><a href="deleteblog.php?id=<?php echo $id;?>&user=<?php echo $row["user"];?>">Delete</a></div></div>
    <?php

}
}
  ?>





    <?php
    if (!isset($_GET["currentpage"]) || $_GET["currentpage"] == 1){
      ?>
          <span class="graytitle">
      <?php
$get = mysql_query("SELECT * FROM posts WHERE id='$id'");
$get_row = mysql_fetch_array($get);

      // data
      $get_time = $get_row['date'];

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

      echo " Posted ".$count." ".$suffix." ago by ".$row["user"]."";
                          ?>
                               </span>
                          <?php
if (isset($_GET["posted"])){
if ($_GET["posted"] == 1){
	 ?>
	  <ul class="pageitem">
    <li class="textbox">
	Comment added!
	 </li></ul>
	 <?php
}
}

	?>


    <ul class="pageitem">
    <li class="textbox">
    <span class="header">
    <?php echo $row["topic"];?>
    </span>
    <?php echo $row["detail"];?>
     </li>

  </ul>    

  <?php
    }
mysql_close($con);
	 include ("include.php");
  $sql3="SELECT * FROM comments WHERE post='$id' ORDER BY id DESC";
$result3=mysql_query($sql3);
$reply = 1;
if(mysql_num_rows($result3)==0){
     ?>
     <span class="graytitle">Comments</span>
     <ul class="pageitem">
     <li class="menu"><a href="blogreply.php?id=<?php echo $id;?>"> <img alt="list" src="thumbs/notepad.png" /><span class="name">Leave a Comment</span><span class="arrow"></span></a></li>
     <li class="textbox"><p>No comments yet, its quiet here!</p></li></ul>

     <?php
   }

   else {
	   ?>

       <span class="graytitle">Comments</span>
   <ul class="pageitem">
   <?php
        // database connection info
include("include.php");

// find out how many rows are in the table
$sql = "SELECT COUNT(*) FROM comments WHERE post='$id'";
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
$sql = "SELECT * FROM comments WHERE post='$id' ORDER BY id DESC LIMIT $offset, $rowsperpage";
$result = mysql_query($sql, $con) or trigger_error("SQL", E_USER_ERROR);
?>
 <li class="menu"><a href="blogreply.php?id=<?php echo $id;?>"> <img alt="list" src="thumbs/notepad.png" /><span class="name">Leave a Comment</span><span class="arrow"></span></a></li>


<?php

while ($row = mysql_fetch_assoc($result)) {

?>

    <li class="textbox">
     <span class="header">
    <?php

      // data
      $get_time = $row['time'];

      $time = time();
      $diff = $time - $get_time; // seconds

      switch(1)
      {
         case ($diff < 60):
         $count = $diff;
         if ($count==0){
            $count = "a moment";
			$suffix= "";
		 }
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

      echo " Posted ".$count." ".$suffix." ago by ".$row["user"]."";

?>





    </span>






    <?php
    include("include.php");
	$user = $row["user"];

$sql2="SELECT * FROM users WHERE Username='$user'";
$result2=mysql_query($sql2);

$users=mysql_fetch_array($result2);
    ?>



    </span>
    <?php echo $row["detail"];





}
?>
</li></ul>
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
   }
?>
</center></li></ul>
</div>
<div id="footer">
	<a href="http://iwebkit.net">Powered by iWebKit</a></div>

</body>

</html>
