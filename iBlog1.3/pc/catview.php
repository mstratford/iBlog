<?php
Session_start();
 $id = $_GET["id"];
include ("../include.php");
    $sql="SELECT * FROM siteinfo";
$result=mysql_query($sql);

$row=mysql_fetch_array($result);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by Free CSS Templates
http://www.freecsstemplates.org
Released for free under a Creative Commons Attribution 2.5 License

Name       : Indicator  
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20100121

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title><?php echo $row["name"];?></title>
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
</head>
<body>
<div id="wrapper">
	<div id="header-wrapper">
	<div id="header">
		<div id="logo">
			<h1><a href="index.php"><?php echo $row["name"];?>  </a></h1>
			<p><?php echo $row["short"];?></p>
		</div>
	</div>
	</div>
	<!-- end #header -->
	<div id="page">
	<div id="page-bgtop">
	<div id="page-bgbtm">
		<div id="content">

<div class="post">
<h2 class="title">Posts</h2>
 <p class="meta">
<span class="date">View the posts in this category.</span>
<a href="viewblog.php">
<span class="posted">
Back to Categories
</span></a></p>
</div>
<div class="post">
  <?php

// database connection info
include("../include.php");

// find out how many rows are in the table
$sql = "SELECT COUNT(*) FROM posts WHERE cat='$id'";
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
$sql = "SELECT * FROM posts WHERE cat='$id' ORDER BY id DESC LIMIT $offset, $rowsperpage";
$result = mysql_query($sql, $con) or trigger_error("SQL", E_USER_ERROR);


while ($list = mysql_fetch_assoc($result)) {


?>
<ul class="pageitem">
<li class="menu"><a href="blog.php?id=<?php echo $list["id"];?>&cat=<?php echo $id;?>"><span class="name">
  <?php echo $list["topic"];?></span><span class="comment"><?php
  $time = $list["date"];
  echo date("m/d/y",$time);
?></span><span class="arrow"></span></a></li></ul>
<?php

}
?>
</div>
<ul>
<center>
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
?>
</center>
</ul>

<div style="clear: both;">&nbsp</div>
		</div></div>
<div id="sidebar">
			<ul>
				<li>
					<!--<div id="search" >
					<form method="get" action="#">
						<div>
							<input type="text" name="s" id="search-text" value="" />
							<input type="submit" id="search-submit" value="GO" />
						</div>
					</form>
					</div>-->
					<div style="clear: both;">&nbsp;</div>
				</li>
				<li>
                <?php
                include ("../include.php");
    $sql2="SELECT * FROM news WHERE id='0'";
$result2=mysql_query($sql2);

$news=mysql_fetch_array($result2);
?>
<h2>News: <?php echo $news["title"];?></h2><h2><?php echo $news["date"];?></h2>
					<p>
<?php echo $news["news"];?></p>
				</li>
<li>
<h2>Links</h2>
<ul>
<li><a href="index.php">Home</a></li>
<li><a href="viewblog.php">Categories</a></li>
<?php  	 if(!isset($_SESSION["username"])){  	 ?>   <li><a href="login.php">Login</a></li>                                                  <?php
} else{ ?>  	 
<li><a href="admin">Account Panel</a></li>
<li><a href="logout.php">Logout</a></li>                                                                 <?php  	 } ?>                           	 </ul>  	 </li> 
				<li>
					<h2>Latest Posts</h2>
					<ul>
                    <?php
                    mysql_close($con);

	include ("../include.php");
    $sql="SELECT * FROM posts ORDER BY id DESC";
$result=mysql_query($sql);
while($row=mysql_fetch_array($result)){
	?>
						<li><a href="blog.php?id=<?php echo $row["id"];?>"><?php echo $row["topic"];?></a></li>
						<?php
}
?>
					</ul>
				</li>
			</ul>
		</div>
		<!-- end #sidebar -->
		<div style="clear: both;">&nbsp;</div>
	</div>
	</div>
	</div>
	<!-- end #page -->
</div>
	<div id="footer">
		<p>Copyright (c) All rights reserved.</p>
	</div>
	<!-- end #footer -->
</body>
</html>
