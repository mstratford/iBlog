<?php
Session_start();
$userid = $_SESSION["id"];
$userlvl = $_SESSION["lvl"];
if($userlvl == 3){
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
<title>Account Panel - Categories
</title>
<meta content="iPod,iPhone,Webkit,iWebkit,tech,anything" name="keywords" />
<meta content="Tech stuff " name="description" />
</head>

<body>

<div id="topbar" class="black">
<div id="title">
		Categories</div>
  <div id="leftnav">
		<a href="index.php"><img alt="home" src="../images/home.png" /></a></div>


</div>
<div id="content">
<?php
 if (isset($_POST["title"]) || isset($_POST["delete"])){
                   if (isset($_POST["title"])){
                       $title = $_POST["title"];
                  $icon = $_POST["icon"];
                        include("../include.php");
   $sql="SELECT * FROM cat ";
$result=mysql_query($sql);
while($row=mysql_fetch_array($result)){
if ($row["title"] ==$title){
	$errors = 1;
	  ?>
	<ul class="pageitem"><li class="textbox">
    <?php
  echo "You can't Re-post!";

  ?> <li class="menu"><a href="../index.php"> <img alt="list" src="thumbs/accessibility.png" /><span class="name">View Site</span><span class="arrow"></span></a></li>

	</li></ul>
    <?php
}
}

                 if ($_POST["title"] == ""){
	$errors = 1;
	  ?>
	<ul class="pageitem"><li class="textbox">
    <?php
  echo "Enter a title.";

  ?> <li class="menu"><a href="cat.php"> <img alt="list" src="../thumbs/accessibility.png" /><span class="name">Back</span><span class="arrow"></span></a></li>

	</li></ul>
    <?php
}
                 if (empty($errors)){
	   include("../include.php");
	  $sql="INSERT INTO cat (id,title,icon) VALUES ('null','$title','$icon')";
	  if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
                      ?>
                 <ul class="pageitem">
                 <li class="textbox">
                 Successly added category!</li>
                     <li class="menu"><a href="../index.php"> <img alt="list" src="../thumbs/wordpress.png" /><span class="name">View Site</span><span class="arrow"></span></a></li>

  </li>  </ul>
  <?php
                 }
                   }
                    if (isset($_POST["delete"])){
                             $id = $_POST["delete"];
	include("../include.php");
	mysql_query("DELETE FROM cat WHERE id='$id'");
	?>

    <span class="graytitle">Deleted</span>
    <ul class="pageitem">
  <li class="textbox"><span class="header">Deleted</span>
    <p>Category Deleted!</p>

  <li class="menu"><a href="../index.php"> <img alt="list" src="../thumbs/wordpress.png" /><span class="name">View Site</span><span class="arrow"></span></a></li>

  </li>
  </ul>

    <?php

mysql_close($con);

}
                   }
                   else{
                     ?>

                        <ul class="pageitem">
                        <li class="textbox">
              <span class="header">
              Add a category
              </span>
              put in a title and select an icon
              </li>
	<form action="cat.php" method="post">
		<fieldset>
	<li class="bigfield"><input name="title" placeholder="Title" type="text" /></li>
			<li class="select"><select name="icon">
<option value="Warning">Warning</option>
        <option value="Warning">Warning</option>
        <option value="rss">RSS</option>
        <option value="twitterfollow">Twitter (bird)</option>
        <option value="world">Globe</option>
        <option value="music">Music</option>


</select>  <span class="arrow"></span></li>
        <li class="button"><input name="submit" type="submit" value="Add Category"/></li>
                </form>
		</ul>

    <?php
    include ("../include.php");
    $sql="SELECT * FROM cat ORDER BY id DESC";
$result=mysql_query($sql);
if (mysql_num_rows($result) == 0){


				   }

				   else{
					   ?>

                       <ul class="pageitem">
    <li class="textbox">
    <span class="header">
    Delete Category
    </span>
    You can choose a category to delete here.
    </li>
    <form action="cat.php" method="post">
    <li class="select"><select name="delete">
                       <?php
while($row=mysql_fetch_array($result)){
	?>
    <option value="<?php echo $row["id"];?>"><?php echo $row["title"];?></option>

    <?php
}

?>

    </select><span class="arrow"></span></li>
    <li class="button"><input name="submit" type="submit" value="Delete"/></li>
    </form>
</ul>
<?php
				   }
				               }

?>


</div>
<div id="footer">
	<a href="http://iwebkit.net">Powered by iWebKit</a></div>

</body>

</html>
