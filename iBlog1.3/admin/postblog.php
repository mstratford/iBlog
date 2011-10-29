<?php
Session_start();
include ("../include.php");
$userid = $_SESSION["id"];
$userlvl = $_SESSION["lvl"];
if($userlvl == 3 || $userlvl == 2 || $userlvl == 1){
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
<title>New Entry
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
   MyElement.value += "<center">  </center>";

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
  Blog Entry</div>
  <div id="leftnav">
		<a href="index.php"><img alt="home" src="../images/home.png" /></a></div>
</div>
<div id="content">
  <ul class="pageitem">
		<li class="textbox"><span class="header">Entry</span>45 characters max on the title and 5,000 on the body.</li>
	</ul><span class="graytitle">New Entry</span>

    <ul class="pageitem">
		<fieldset>
        <form action="blogpost.php" method="post">
        <img src="../thumbs/bold.png" alt="bold" onclick="bold()" />
        <img src="../thumbs/italic.png" alt="italic" onclick="italic()" />

              <img src="../thumbs/align_center.png" alt="align center" onclick="center()" />

        <li class="bigfield"><input name="title" placeholder="Title" type="text" /></li>
        <li class="textbox"><textarea id ="body" name="body" rows="4"></textarea></li>
                      <?php

                      include ("../include.php");
    $sql="SELECT * FROM cat ORDER BY id DESC";
$result=mysql_query($sql);
?>
    <li class="textbox">
    <center><span class="header">
   Select Category
    </span></center>
    </li>
    <li class="select"><select name="cat">
                       <?php
while($row=mysql_fetch_array($result)){
	?>
    <option value="<?php echo $row["id"];?>"><?php echo $row["title"];?></option>

    <?php
}

?>

    </select><span class="arrow"></span></li>
        <li class="button"><input name="name" type="submit" value="Post"
/></li>

        </form></fieldset></ul>

</div>
<div id="footer">
	<a href="http://iwebkit.net">Powered by iWebKit</a></div>

</body>

</html>
