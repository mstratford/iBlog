<?php

Session_start();

include ("include.php");

    $sql="SELECT * FROM siteinfo";

$result=mysql_query($sql);



$row=mysql_fetch_array($result);

 if (isset($_COOKIE["remember"])){

 if ($_COOKIE["remember"] == "on"){

		  

		  $_SESSION["logged"] = $_COOKIE["logged"];

		  $_SESSION["username"] = $_COOKIE["username"];

		  $_SESSION["id"] = $_COOKIE["id"];

		  $_SESSION["lvl"] = $_COOKIE["lvl"];

		  

	  }

 }



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

<title><?php echo $row["name"];?></title>

<link href="pics/startup.png" rel="apple-touch-startup-image" />

<meta content="iPod,iPhone,Webkit,iWebkit,Website,Create,mobile,Tutorial,free" name="keywords" />

<meta content="Try out all the new features of iWebKit 5 with a simple touch of a finger and a smooth screen rotation!" name="description" />

</head>



<body>

<div id="topbar" class="black">

  <div id="title">

		<?php echo $row["name"];?></div>



	<div id="leftnav">

		<a href="../"> <img src="images/home.png" /></a></div>

<?php

	if (isset($_SESSION["logged"])){

		?>

        <div id="rightbutton">

		<a href="admin" class="noeffect">Account</a> </div>

		<?php

        }

    if (!isset($_SESSION["logged"])){

		?>

        <div id="rightbutton">

		<a href="login.php" class="noeffect">Login/Register</a> </div>

        <?php

        }

		if (isset($_SESSION["lvl"])){

        if ($_SESSION["lvl"] == 3){

			?>

        <?php

        } if ($_SESSION["lvl"] == 2){

			?>

            

        <?php

        }

		if ($_SESSION["lvl"] == 1){

			?>

            

       <?php

        }

		if ($_SESSION["lvl"] == 4){

			?>       

<?php

        }





		}

		?>





</div>

 <div id="tributton"><div class="links">

<a href="index.php">Blog</a><a href="chatbox.php">Chat</a><a id="pressed"

href="#">Categories</a>

</div></div>

<div id="content">

	<span class="graytitle">Categories</span>

    <ul class="pageitem">



    </li>



  <?php

  include ("include.php");

  $sql= "SELECT * FROM cat";

// OREDER BY id DESC is order result by descending

$result=mysql_query($sql);



while($row=mysql_fetch_array($result)){



?>



  <li class="menu"><a href="catview.php?id=<?php echo $row["id"];?>"> <img alt="list" src="thumbs/<?php echo $row["icon"];?>.png" /><span class="name">

  <?php echo $row["title"];?></span><span class="comment">

  <?php

  $id = $row["id"];

  $result2 = mysql_query("SELECT * FROM posts WHERE cat='$id'");

  $rows = mysql_num_rows($result2);

  if ($rows == 1  ){

echo  "{$rows} Post";

  }

  else{

	 echo "{$rows} Posts";



  }

  ?>

  </span><span class="arrow"></span></a></li>

  

  

  

  

  

 <?php 

}

  ?>

  





  </ul>

    

    

	

</div>

<div id="footer">

	<a href="http://iwebkit.net">Powered by iWebKit</a></div>



</body>



</html>

