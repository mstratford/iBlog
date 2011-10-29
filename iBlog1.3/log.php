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

	
</div>
<div id="content">

<?php
include("include.php");
  
  
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
	  
	  ?>

  <ul class="pageitem">
		<li class="textbox">
		<?php
  echo "Logged in!";
  
  ?>
  </li>
  <li class="menu"><a href="chatbox.php"> <img alt="list" src="thumbs/messages.png" /><span class="name">Chat</span><span class="arrow"></span></a></li>
  <li class="menu"><a href="admin/index.php"> <img alt="list" src="thumbs/plugin.png" /><span class="name">Account</span><span class="arrow"></span></a></li>
  <li class="menu"><a href="index.php"> <img alt="list" src="thumbs/safari.png" /><span class="name">Home</span><span class="arrow"></span></a></li>
</ul>
  <?php
  }
  }
  
  if (!isset($_SESSION["logged"])){
	 ?>
	 <ul class="pageitem">
		<li class="textbox">
You have typed in a wrong username and/or password.
</li>
     <li class="menu"><a href="login.php"> <img alt="list" src="thumbs/safari.png" /><span class="name">Retry</span><span class="arrow"></span></a></li>
  <li class="menu"><a href="index.php"> <img alt="list" src="thumbs/safari.png" /><span class="name">Home</span><span class="arrow"></span></a></li>
</ul>
	
     <?php
	 
 }
  
  
  
  

mysql_close($con);
?>

	
	
<div id="footer">
	<a href="http://iwebkit.net">Powered by iWebKit</a></div>

</body>

</html>