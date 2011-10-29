<?php
Session_start();
if (!$_SESSION["logged"])
header( 'Location: login.php' ) ;
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
<title>Reply
</title>
<meta content="iPod,iPhone,Webkit,iWebkit,Website,Create,mobile,Tutorial,free" name="keywords" />
<meta content="now completly styles thanks to css these form elements are lighter and easier to use than ever before." name="description" />
</head>

<body>

<div id="topbar" class="black">
	<div id="leftnav">
		<a href="../index.php"><img alt="home" src="images/home.png" /></a><a href="index.php">Back</a></div>
	
</div>

	
</div>
<div id="content">

<?php
  
  $reply = strip_tags($_POST["reply"]);
  $id = $_GET["id"];
  
  
  if (strlen($reply) > 500){
  ?>
  <ul class="pageitem"><li class="textbox">
  <?php
  $errors = 1;
  
  echo "Your comment cannot be longer than 500 characters, please try again";
  
  ?>
  
  </li>
  <li class="menu"><a href="blogreply.php?id=<?php echo $id;?>"> <img alt="list" src="thumbs/accessibility.png" /><span class="name">Retry</span><span class="arrow"></span></a></li>
<li class="menu"><a href="index.php"> <img alt="list" src="thumbs/safari.png" /><span class="name">Home</span><span class="arrow"></span></a></li>
  </ul>
  <?php
 

  }
  include ("include.php");
	 
	 $sql="SELECT * FROM comments WHERE post=$id ";
$result=mysql_query($sql);
while($row=mysql_fetch_array($result)){
if ($reply == $row["detail"]){
	$errors = 1;
	  ?>
	<ul class="pageitem"><li class="textbox">
    <?php
  echo "You can't Re-post!";
  
  ?> <li class="menu"><a href="blog.php?id=<?php echo $id;?>"> <img alt="list" src="thumbs/accessibility.png" /><span class="name">View Post</span><span class="arrow"></span></a></li>
<li class="menu"><a href="index.php"> <img alt="list" src="thumbs/safari.png" /><span class="name">Home</span><span class="arrow"></span></a></li>
  
	</li></ul>  
    <?php 
}
}
   if (empty($errors)){
	   include("include.php");
	   $time =time(); 
	   $user = $_SESSION["username"];
	  $sql="INSERT INTO comments (id,post,user,detail,time) VALUES ('','$id','$user','$reply','$time')";
	  if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
	  ?>
       <script type="text/javascript">
<!--
window.location = "blog.php?id=<?php echo $id;?>&posted=1"
//-->
</script>

  <?php
  }
  
   
mysql_close($con);
?>

	
	
<div id="footer">
	<a href="http://iwebkit.net">Powered by iWebKit</a></div>

</body>

</html>