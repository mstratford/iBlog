<html>
<head>
<title>Install Complete</title>
</head>
<body>
<?php
include("include.php");
//this script installs the table in your mysql database. You can delete this script if the database is created succesfully. 

$query3 =
"
CREATE TABLE IF NOT EXISTS `chatbox` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(25) NOT NULL,
  `body` varchar(200) NOT NULL,
  `time` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
";


$created3 = mysql_query($query3);
$error3 = mysql_error();
$query4 =
"
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post` int(11) NOT NULL,
  `user` varchar(20) NOT NULL,
  `time` varchar(15) NOT NULL,
  `detail` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

";


$created4 = mysql_query($query4);
$error4 = mysql_error();
$query5 =
"
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL,
  `date` varchar(15) NOT NULL,
  `news` varchar(500) NOT NULL,
  `title` varchar(45) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
";


$created5 = mysql_query($query5);
$error5 = mysql_error();

         $query6 =
"
INSERT INTO `news` (`id`, `date`, `news`, `title`) VALUES
(0, '04/03/10', 'iBlog 1.1 has been released!', 'New version!');
";


$created6 = mysql_query($query6);
$error6 = mysql_error();
$query7 =
"
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `topic` varchar(45) NOT NULL,
  `detail` varchar(5000) NOT NULL,
  `date` varchar(15) NOT NULL,
  `user` varchar(20) NOT NULL,
  `cat` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

";


$created7 = mysql_query($query7);
$error7 = mysql_error();
$query8 =
"
  INSERT INTO `posts` (`id`, `topic`, `detail`, `date`, `user`) VALUES
(12, 'Pagination!', 'Pagination and the time since post works!', '1270328830', 'Admin');

";


$created8 = mysql_query($query8);
$error8 = mysql_error();

    $query9 =
"
 CREATE TABLE IF NOT EXISTS `siteinfo` (
  `name` varchar(20) NOT NULL,
  `short` varchar(140) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
";


$created9 = mysql_query($query9);
$error9 = mysql_error();

$query10 =
"
 CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(15) NOT NULL,
  `Password` varchar(45) NOT NULL,
  `lvl` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;
";


$created10 = mysql_query($query10);
$error10 = mysql_error();

               $query11 =
"
  CREATE TABLE IF NOT EXISTS `cat` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(25) NOT NULL,
  `icon` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;";

      $created11 = mysql_query($query11);
$error11 = mysql_error();
                     $query12 =
"
   INSERT INTO `cat` (`id`, `title`, `icon`) VALUES
(0, 'Other', 'Warning');
 
 
 ";

      $created12 = mysql_query($query12);
$error12 = mysql_error();
          $query13 = "
 INSERT INTO  `$database`.`siteinfo` (
`name` ,
`short`
)
VALUES (
'iBlog',  'iBlog demo'
);";
$created13 = mysql_query($query13);
$error13 = mysql_error();
if ($created12) {
   echo "The data is <strong>succesfully</strong> added in : $database <br><br>";
   echo "If everything was added <strong>succesfully</strong>, please delete this page.";
} else {
 echo "There was a <strong>problem</strong> adding data to the content table<br>";
}

?>
</body>
</html>