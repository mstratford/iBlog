<?php
Session_start();
$id = $_GET["id"];
if (!$_SESSION["logged"])
header( 'Location: login.php' ) ;
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
       <script type="text/javascript" language="javascript">
            function bold()
{
   var MyElement = document.getElementById("body");
   MyElement.value += "<b>  </b>";

   return true;
}

function center()
{
   var MyElement = document.getElementById("body");
   MyElement.value += "<center>  </center>";

   return true;
}
function italic()
{
   var MyElement = document.getElementById("body");
   MyElement.value += "<i>  </i>";

   return true;
}

</script>
<div id="topbar" class="black">
<div id="title"><?php echo $row["name"];?></div>
  <div id="leftnav">
		<a href="index.php"><img alt="home" src="images/home.png" /></a><a href="blog.php?id=<?php echo $_GET["id"];?>">Back</a></div>
<div id="rightbutton">
		<a href="admin">Account</a></div>
</div>
<div id="content">
  <ul class="pageitem">
		<li class="textbox"><span class="header">Post Comment</span>500 characters max.</li>
	</ul><span class="graytitle">New comment</span>

    <ul class="pageitem">
		<fieldset>
        <form action="blogreplynow.php?id=<?php echo $id;?>" method="post">
                                                                       <img src="thumbs/bold.png" alt="bold" onclick="bold()" />
        <img src="thumbs/italic.png" alt="italic" onclick="italic()" />

               <img src="thumbs/align_center.png" alt="align center" onclick="center()" />




        <li class="bigfield"><input id="body"name="reply" placeholder="Reply" type="text" /></li>
        </form></fieldset></ul>
       
</div>
<div id="footer">
	<a href="http://iwebkit.net">Powered by iWebKit</a></div>

</body>

</html>