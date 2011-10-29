<?php
Session_start();
$id = $_GET["id"];
include ("include.php");
  $sql="SELECT * FROM posts WHERE id='$id'";
$result=mysql_query($sql);
while($row=mysql_fetch_array($result)){
$userid = $_SESSION["id"];
$userlvl = $_SESSION["lvl"];
if($userlvl == 3 || $userlvl == 2 || $userlvl == 1){
echo "";
}
else
	die ("hacking attempt");
}

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
<link href="pics/homescreen.gif" rel="apple-touch-icon" />
<meta content="minimum-scale=1.0, width=device-width, maximum-scale=0.6667, user-scalable=no" name="viewport" />
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script src="javascript/functions.js" type="text/javascript"></script>
<title><?php echo $row9["name"];?>
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
<div id="title">
  <?php echo $row9["name"];?></div>
  <div id="leftnav">
		<a href="index.php">Blog</a><a href="blog.php?id=<?php echo $id;?>">Back</a></div>
</div>
<div id="content">
  <ul class="pageitem">
		<li class="textbox"><span class="header">Edit Post</span>Use two fingers to scroll, It might have weird tags if you posted from the pc version, ignore them please.</li>
	</ul><span class="graytitle">New Post</span>

    <ul class="pageitem">
    <?php
	$sql = "SELECT * FROM posts WHERE id='$id'";
      $result = mysql_query($sql);
      $row = mysql_fetch_array($result);
	?>
		<fieldset>
        <form action="editblognow.php?id=<?php echo $id;  ?>" method="post">
                                                            <img src="thumbs/bold.png" alt="bold" onclick="bold()" />
        <img src="thumbs/italic.png" alt="italic" onclick="italic()" />

              <img src="thumbs/align_center.png" alt="align center" onclick="center()" />




        <li class="bigfield"><input name="title" value ="<?php echo $row["topic"];?>" type="text" /></li>
        <li class="textbox"><textarea id ="body" name="body"  rows="10"><?php echo $row["detail"];?></textarea></li>
           <?php

                      include ("include.php");
    $sql="SELECT * FROM cat ORDER BY id DESC";
$result=mysql_query($sql);
?>
    <li class="textbox">
    <center><span class="header">
   Select Category
    </span></center>
    </li>
    <li class="select"><select name="cat">
    <option value="<?php echo $row["cat"];?>">Current Category</option>

                       <?php
while($row=mysql_fetch_array($result)){
	?>
    <option value="<?php echo $row["id"];?>"><?php echo $row["title"];?></option>

    <?php
}

?>

    </select><span class="arrow"></span></li>
        
        <li class="button"><input name="name" type="submit" value="Edit Post"/></li>

        </form></fieldset></ul>
       
</div>
<div id="footer">
	<a href="http://iwebkit.net">Powered by iWebKit</a></div>

</body>

</html>
