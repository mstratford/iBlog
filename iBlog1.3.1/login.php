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
<meta content="iPod,iPhone,Webkit,iWebkit,tech,anything" name="keywords" />
<meta content="Tech stuff " name="description" />
</head>
<body>

<div id="topbar" class="black">
<div id="title">
		<?php echo $row["name"];?></div>
  <div id="leftnav">
		<a href="index.php"><img alt="home" src="images/home.png" /></a></div>
<?php
	if (isset($_SESSION["logged"])){
		?>
        <div id="rightbutton">
		<a href="admin" class="noeffect">Account</a> </div>
<?php
}
	if (!isset($_SESSION["logged"])){
		?>
<?php
}
?>
</div>
<div id="duobutton"><div class="links"><a  id="pressed" href="#">Login</a><a href="register.php">Register</a></div></div>
<div id="content">
<form action="log.php" method="post">
		<fieldset><span class="graytitle">Login</span>
<ul class="pageitem">
<li class="textbox"><p>To comment on posts and chat, you have to login/register.</p><p><b>Please Note:</b> This form is case sensitive!</p></li>
			<li class="bigfield"><input name="user" placeholder="Username" type="text" /></li>
			<li class="bigfield">
			<input name ="pass" placeholder="Password" type="password" />
            <li class="checkbox"><span class="name">Remember Me</span><input name="remember" type="checkbox" /> </li>
            <li class="button"><input name="name" type="submit" value="Login"/></li>
            
            </li>
		</ul>
        
       
</div>
<div id="footer">
	<a href="http://iwebkit.net">Powered by iWebKit</a></div>

</body>

</html>
