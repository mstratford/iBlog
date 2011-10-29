<?php
Session_start();
include ("../include.php");
$userid = $_SESSION["id"];
$userlvl = $_SESSION["lvl"];
if($userlvl == 3 || $userlvl == 2){
echo "";
}
else
die ('<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta HTTP-EQUIV="REFRESH" content="0; url=denied.html">
</head>
<body>
</body>
</html>
');

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
<meta content="iPod,iPhone,Webkit,iWebkit,Website,Create,mobile,Tutorial,free" name="keywords" />
<meta content="now completly styles thanks to css these form elements are lighter and easier to use than ever before." name="description" />
</head>

<body>

<div id="topbar" class="black">
	<div id="leftnav">
		<a href="index.php"><img alt="home" src="../images/home.png" /></a><a href="editnews.php">Back</a></div>
</div>

	
</div>
<div id="content">

<?php
  
  $title = strip_tags($_POST["title"]);
  $body = $_POST["body"];
  $id = 0;
  
  if (strlen($title) > 45){
  ?>
  <ul class="pageitem">
    <li class="textbox">
      <?php
  $errors = 1;
  echo "You made the title too long, 45 characters max.";
  
  ?>
    </li>
    <li class="menu"><a href="editnews.php"> <img alt="list" src="../thumbs/accessibility.png" /><span class="name">Retry</span><span class="arrow"></span></a></li>
  </ul>
  
  <?php
  }
  if (strlen($body) > 500){
  ?>
  <ul class="pageitem"><li class="textbox">
  <?php
  $errors = 1;
  
  echo "Your news cannot be longer than 500 characters, please try again";
  
  ?>
  
  </li>
  <li class="menu"><a href="editnews.php"> <img alt="list" src="../thumbs/accessibility.png" /><span class="name">Retry</span><span class="arrow"></span></a></li>
  </ul>
  <?php
 

  }
  
	  
  
   if (empty($errors)){
	   include("../include.php");
	   $time = date("m/d/y"); 
	   $user = $_SESSION["username"];
	$sql = "UPDATE news SET date='$time', news='$body', title='$title'";

      $result = mysql_query($sql);

	  ?>
	<ul class="pageitem"><li class="textbox">
    <?php
  echo "News Updated!";
  
  ?>
  
  </li>
  <li class="menu"><a href="../index.php"> <img alt="list" src="../thumbs/accessibility.png" /><span class="name">View Blog</span><span class="arrow"></span></a></li>
  </ul>
  <?php
  }
  
   

?>

	
	
<div id="footer">
	<a href="http://iwebkit.net">Powered by iWebKit</a></div>

</body>

</html>