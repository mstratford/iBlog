<?php
Session_start();
$userid = $_SESSION["id"];
$userlvl = $_SESSION["lvl"];
if($userlvl == 3){
echo "";
}
else
 die ('<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> <html xmlns="http://www.w3.org/1999/xhtml"> <head> <meta HTTP-EQUIV="REFRESH" content="0; url=denied.html"> </head> <body> </body> </html> ');
include("../include.php");
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
<title><?php echo $row9["name"];?>
</title>
<meta content="iPod,iPhone,Webkit,iWebkit,tech,anything" name="keywords" />
<meta content="Tech stuff " name="description" />
</head>

<body>

<div id="topbar" class="black">
<div id="title">
  <?php echo $row9["name"];?></div>
  <div id="leftnav">
		<a href="index.php"><img alt="home" src="../images/home.png" /></a><a href="allusers.php">Back</a></div>
</div>
<div id="content">
<?php
if (isset($_POST["lvl"])){
	
  
	
	if($_POST["lvl"] == 0){
	?>
	<ul class="pageitem">
		<li class="textbox"><span class="header">User changed!</span>They are now a regular user. Changes will take effect when they log out and log back in.</li>
         <li class="menu"><a href="index.php"> <img alt="list" src="../thumbs/safari.png" /><span class="name">Admin Home</span><span class="arrow"></span></a></li>
	</ul>
    <?php
	}
	if($_POST["lvl"] == 1){
	?>
	<ul class="pageitem">
		<li class="textbox"><span class="header">User changed!</span>They are now an Author. Changes will take effect when they log out and log back in.</li>
         <li class="menu"><a href="index.php"> <img alt="list" src="../thumbs/safari.png" /><span class="name">Admin Home</span><span class="arrow"></span></a></li>
	</ul>
    <?php
	}
	if($_POST["lvl"] == 2){
	?>
	<ul class="pageitem">
		<li class="textbox"><span class="header">User changed!</span>They are now a Moderator. Changes will take effect when they log out and log back in.</li> <li class="menu"><a href="index.php"> <img alt="list" src="../thumbs/safari.png" /><span class="name">Admin Home</span><span class="arrow"></span></a></li>
	</ul>
    <?php
	}
	if($_POST["lvl"] == 3){
	?>
	<ul class="pageitem">
		<li class="textbox"><span class="header">User changed!</span>They are now an Admin Changes will take effect when they log out and log back in.</li> <li class="menu"><a href="index.php"> <img alt="list" src="../thumbs/safari.png" /><span class="name">Admin Home</span><span class="arrow"></span></a></li>
	</ul>
    <?php
	}
	 include("../include.php");
	  
	   $lvl = $_POST["lvl"];
	    $id = $_GET["id"];
	$sql = "UPDATE users SET lvl='$lvl' WHERE id='$id'";

      $result = mysql_query($sql);
}

else{
	
	
	$id = $_GET["id"];
	$sql = "SELECT * FROM users WHERE id='$id'";
      $result = mysql_query($sql);        
      $row = mysql_fetch_array($result);
	
	?>


<ul class="pageitem">
		<li class="textbox"><span class="header">User info</span>You can currently change the user's level. Send me a message on the forum if you want more features.</li>
	</ul><span class="graytitle"><?php echo $row["Username"];?></span>
    
    <ul class="pageitem">
  
		<fieldset>
        <form action="useredit.php?id=<?php echo $_GET["id"];?>" method="post">
       <?php
       if($_GET["lvl"] == 3){
	?>
	 <li class="select">    
    <select name="lvl"><option value="3">Admin</option>
<option value="2">Moderator</option><option value="1">Author</option><option value="0">User</option></select><span class="arrow"></
span></li>
    <?php
	}
     
       if($_GET["lvl"] == 2){
	?>
	 <li class="select">    
    <select name="lvl"><option value="2">Moderator</option>
<option value="0">User</option><option value="1">Author</option><option value="3">Admin</option></select><span class="arrow"></
span></li>
    <?php
	}
      
       if($_GET["lvl"] == 1){
	?>
	 <li class="select">    
    <select name="lvl"><option value="1">Author</option>
<option value="0">User</option><option value="2">Moderator</option><option value="3">Admin</option></select><span class="arrow"></
span></li>
    <?php
	}
     
       if($_GET["lvl"] == 0){
	?>
	 <li class="select">    
    <select name="lvl"><option value="0">User</option><option value="1">Author</option>
<option value="2">Moderator</option><option value="3">Admin</option></select><span class="arrow"></
span></li>
    <?php
	}
      ?> 
       
       
      



        <li class="button"><input name="name" type="submit" value="Edit User"/></li>
        
        </form></fieldset></ul>
       
</div>
<div id="footer">
	<a href="http://iwebkit.net">Powered by iWebKit</a></div>

</body>

</html>
<?php
}
?>