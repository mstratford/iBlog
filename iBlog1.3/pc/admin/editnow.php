<?php
Session_start();
include ("../../include.php");
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
<link href="../style.css" rel="stylesheet" type="text/css" media="screen" />
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
            
				<h2 class="title"><a href="">Edited Post</a></h2>
				<p class="meta"><span class="date"></span><span class="posted"></span></p>
				<div style="clear: both;">&nbsp;</div>
				<div class="entry">
					<p>
           
           <?php
  
  $title = strip_tags($_POST["title"]);
  $body = $_POST["body"];
  $id = $_GET["id"];
  
  if (strlen($title) > 45){
  ?>

      <?php
  $errors = 1;
  echo "You made the title too long, 45 characters max.";
  
  ?>
     <a href="editblog.php?id=<?php echo $id;?>">Retry</a>
  
  <?php
  }
  if (strlen($body) > 5000){
  ?>
  <ul class="pageitem"><li class="textbox">
  <?php
  $errors = 1;
  
  echo "Your post body cannot be longer than 5,000 characters, please try again";
  
  ?>
  
 <a href="editblog.php?id=<?php echo $id;?>">Retry</a>
  
  <?php
 

  }
  
	  
  
   if (empty($errors)){
	   $time = date("m/d/y"); 
	   $user = $_SESSION["username"];
	   $cat= $_POST["cat"];
	$sql = "UPDATE posts SET topic='$title',detail='$body',cat=$cat WHERE id='$id'";

      $result = mysql_query($sql);

	  ?>
	
    <?php
  echo "Entry Updated!";
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
<h2>Account Panel</h2>
<ul>
<li><a href="index.php">Panel</a>
</li>
<li><a href="newpost.php">New Post</a>
</li>
<li><a href="choosepost.php">Edit Post</a>
</li><li><a href="editnews.php">Edit News</a>
</li></ul>
<li><h2>Links</h2><ul>
<li><a href="../index.php">Home</a></li>
<li><a href="../viewblog.php">Categories</a></li>
<?php  	 if(!isset($_SESSION["username"])){  	 ?>   <li><a href="../login.php">Login</a></li>                                                  <?php
} else{ ?>  	 
<li><a href="index.php">Account Panel</a></li>
<li><a href="../logout.php">Logout</a></li>                                                                 <?php  	 } ?>                           	 </ul>  	 </li>
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