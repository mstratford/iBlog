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
<title><?php echo $row["name"];?>
</title>
<meta content="iPod,iPhone,Webkit,iWebkit,Website,Create,mobile,Tutorial,free" name="keywords" />
<meta content="now completly styles thanks to css these form elements are lighter and easier to use than ever before." name="description" />
</head>

<body>

<div id="topbar" class="black">
	<div id="leftnav">
		<a href="index.php"><img alt="home" src="images/home.png" /></a></div>

	
</div>
<div id="content">

<?php
  
  $username = $_POST["user"];
  $userpass = $_POST["pass"];
  $userpass2 = $_POST["pass2"];
  
  if (strlen($username) > 15){
  ?>
  <ul class="pageitem">
    <li class="textbox">
      <?php
  $errors = 1;
  echo "You did not type in a username and / or a password";
  
  ?>
    </li>
    <li class="menu"> <a href="register.php"> <img alt="list" src="thumbs/accessibility.png" /> <span class="name">Retry</span><span class="arrow"></span></a></li>
<li class="menu"> <a href="index.php"> <img alt="list" src="thumbs/safari.png" /> <span class="name">Home</span><span class="arrow"></span></a></li>
  </ul>
  <ul class="pageitem"><li class="textbox">
<?php
  $errors = 1;
  echo "Your username cannot be longer than 15 characters, please try again";
  
  ?>
  
  </li>
  <li class="menu"><a href="register.php"> <img alt="list" src="thumbs/accessibility.png" /><span class="name">Retry</span><span class="arrow"></span></a></li>
<li class="menu"> <a href="index.php"> <img alt="list" src="thumbs/safari.png" /> <span class="name">Home</span><span class="arrow"></span></a></li>
  </ul>
  <?php
 
  }
  
  
  if (strlen($userpass) > 20){
  ?>
  <ul class="pageitem"><li class="textbox">
  <?php
  $errors = 1;
  
  echo "Your password cannot be longer than 20 characters, please try again";
  
  ?>
  
  </li>
  <li class="menu"><a href="register.php"> <img alt="list" src="thumbs/accessibility.png" /><span class="name">Retry</span><span class="arrow"></span></a></li>
<li class="menu"> <a href="index.php"> <img alt="list" src="thumbs/safari.png" /> <span class="name">Home</span><span class="arrow"></span></a></li>
  </ul>
  <?php
 

  }
  $errors = 0;
  if ($userpass != $userpass2){
  ?>
  <ul class="pageitem"><li class="textbox">
  <?php
  $errors = 1;
  
  echo "Your passwords do not match , please try again";
  
  ?>
  
  </li>
  <li class="menu"><a href="register.php"> <img alt="list" src="thumbs/accessibility.png" /><span class="name">Retry</span><span class="arrow"></span></a></li>
<li class="menu"> <a href="index.php"> <img alt="list" src="thumbs/safari.png" /> <span class="name">Home</span><span class="arrow"></span></a></li>
  </ul>
  <?php
 
  }
  
  if ( $username == "" || $userpass == ""){
	  
	  ?>
   <?php
   
  }
  include("include.php");
  
  
  $result = mysql_query("SELECT * FROM users ");

while($row = mysql_fetch_array($result))
  {
	  
	  
  if ($username == $row["Username"]){
	 
	   ?>
  <ul class="pageitem"><li class="textbox">
  <?php
  $errors = 1;
  echo "That username has been taken.";?>  
  </li>
  <li class="menu"><a href="register.php"> <img alt="list" src="thumbs/accessibility.png" /><span class="name">Retry</span><span class="arrow"></span></a></li>
<li class="menu"> <a href="index.php"> <img alt="list" src="thumbs/safari.png" /> <span class="name">Home</span><span class="arrow"></span></a></li>
  </ul>
  <?php
	 
	    
  }
  
	  
  }
  if ($row["Username"] != "Admin" && $username == "Admin" && $errors == 0 ){
	 
   include("include.php");
	 $usernamepass = $userpass;
	  $sql="INSERT INTO users (id,Username, Password, lvl) VALUES ('','$username','$usernamepass', '3')";
	  if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
	  ?>
	<ul class="pageitem"><li class="textbox">
    <?php
  echo "You are now registered as an Administrator!";
  ?>
  </li>
<li class="menu"> <a href="login.php"> <img alt="list" src="thumbs/safari.png" /> <span class="name">Login</span><span class="arrow"></span></a></li><li class="menu"> <a href="index.php"> <img alt="list" src="thumbs/safari.png" /> <span class="name">Home</span><span class="arrow"></span></a></li>
</ul>
  
	 <?php
	    
  }
   elseif (empty($errors)){
	   include("include.php");
	 $usernamepass = $userpass;
	  $sql="INSERT INTO users (id,Username, Password, lvl) VALUES ('','$username','$usernamepass', '4')";
	  if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
	  ?>
	<ul class="pageitem"><li class="textbox">
    <?php
  echo "You are now registered!";
  
  ?>
  
  </li>
  <li class="menu"><a href="login.php"> <img alt="list" src="thumbs/accessibility.png" /><span class="name">Login</span><span class="arrow"></span></a></li>
<li class="menu"> <a href="index.php"> <img alt="list" src="thumbs/safari.png" /> <span class="name">Home</span><span class="arrow"></span></a></li>
  </ul>
  <?php
  }
  
   
mysql_close($con);
?>

	
	
<div id="footer">
	<a href="http://iwebkit.net">Powered by iWebKit</a></div>

</body>

</html>