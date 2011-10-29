<?php

Session_start();

include ("../include.php");

    $sql="SELECT * FROM siteinfo";

$result=mysql_query($sql);



$row=mysql_fetch_array($result);

 if (isset($_COOKIE["remember"])){

 if ($_COOKIE["remember"] == "on"){

		  

		  $_SESSION["logged"] = $_COOKIE["logged"];

		  $_SESSION["Username"] = $_COOKIE["Username"];

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

            

				<h2 class="title"><a href="">Register</a></h2>

				<p class="meta"><span class="date"></span><span class="posted"></span></p>

				<div style="clear: both;">&nbsp;</div>

				<div class="entry">
<?php
                                $username = $_POST["user"];
                                $userpass = md5($_POST["pass"]);
                                $userpass2 = md5($_POST["pass2"]);
                                if (strlen($username) > 15){
                                ?>
                                <?php
                                $errors = 1;
                                echo "You did not type in a username and / or a password";
                                ?>
<?php
  $errors = 1;
  echo "Your username cannot be longer than 15 characters, please try again";
  
  ?>
  <?php
 
  }
  
  
  if (strlen($userpass) > 32){
  ?>
  <?php
  $errors = 1;
  
  echo "Your password cannot be longer than 32 characters, please try again.<br /><br />";
  
  ?>
  <?php
 

  }
  $errors = 0;
  if ($userpass != $userpass2){
  ?>
  <?php
  $errors = 1;
  echo "Your passwords do not match , please try again. <br /><br />"; 
  ?>
  <?php
  }
  if ( $username == "" || $userpass == ""){  
  ?>
 <?php
  }
  include("../include.php");
  
  
  $result = mysql_query("SELECT * FROM users ");

while($row = mysql_fetch_array($result))
  {
	  
	  
  if ($username == $row["Username"]){
	 
	   ?>
  <?php
  $errors = 1;
  echo "That username has been taken.";
  ?>  
  <?php
	 
	    
  }
  
	  
  }
  if ($row["Username"] != "Admin" && $username == "Admin" && $errors == 0 ){
	 
   include("../include.php");
	 $usernamepass = $userpass;
	  $sql="INSERT INTO users (id,Username, Password, lvl) VALUES ('','$username','$usernamepass', '3')";
	  if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
	  ?>
    <?php
  echo "You are now registered as an Administrator!";
  ?>
  <?php
	    
  }
   elseif (empty($errors)){
	   include("../include.php");
	 $usernamepass = $userpass;
	  $sql="INSERT INTO users (id,Username, Password, lvl) VALUES ('','$username','$usernamepass', '4')";
	  if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
	  ?>
    <?php
  echo "You are now registered!<br /><br />";
  echo "Please log in <a href='login.php'>here</a>";
  
  ?>
  <?php
  }
  
   
mysql_close($con);
?>
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

<?php  	 if(!isset($_SESSION["username"])){  	 ?>   <li><a href="login.php">Login</a> or <a href="register.php">Register</a></li>                                                  <?php

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
