<?php
Session_start();
include ("../include.php");
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
			<h1><a href="#"><?php echo $row["name"];?>  </a></h1>
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
            
				<h2 class="title"><a href="">Loggin in...</a></h2>
				<p class="meta"><span class="date"></span><span class="posted"></span></p>
				<div style="clear: both;">&nbsp;</div>
				<div class="entry">
					<p>
                    <?php
include("../include.php");
  
  
  $result = mysql_query("SELECT * FROM users ");

while($row = mysql_fetch_array($result))
  {
	  ?>
	  
        <?php
  if ($_POST["user"] == $row["Username"] && ($_POST["pass"]) == $row["Password"]){
	  $_SESSION["logged"]= 1;
	  $_SESSION["username"] = $row["Username"];
	  $_SESSION["id"] = $row["id"];
	  $_SESSION["lvl"] = $row["lvl"];
	  if (isset($_POST["remember"])){
	  if ($_POST["remember"] == "on"){
		  setcookie("remember", "on", time()+60*60*24*30);
		  setcookie("logged", 1, time()+60*60*24*30);
		  setcookie("username", $row["Username"], time()+60*60*24*30);
		  setcookie("id", $row["id"], time()+60*60*24*30);
		  setcookie("lvl", $row["lvl"], time()+60*60*24*30);
		  
	  }
	  }
  }
  }
	  if (!isset($_SESSION["logged"])){
	 ?>
	 <ul class="pageitem">
		<li class="textbox">
	 
	 You have typed in a wrong username and/or password
	 
	 </li>
     <li class="menu"><a href="login.php"> <img alt="list" src="thumbs/plugin.png" /><span class="name">Retry</span><span class="arrow"></span></a></li></ul>
	
     <?php
	 
 }
  else{
	  ?>
            <script type="text/javascript">
<!--
window.location = "index.php?logged=1"
//-->
</script>
              <?php
  }
  ?>
                    </p>
					<p class="links"></p>
				</div>
			</div>
		<div style="clear: both;">&nbsp;</div>
		</div>
		<!-- end #content -->
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