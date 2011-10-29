  <html>
<head>
<title>Upgrade iBlog</title>
</head>
<body>
<?php
include("include.php");
//this script installs the table in your mysql database. You can delete this script if the database is created succesfully. 



$query7 =
"
ALTER TABLE  `posts` ADD  `cat` INT NOT NULL

";


$created7 = mysql_query($query7);
$error7 = mysql_error();

         $query11 =
"
  CREATE TABLE IF NOT EXISTS `cat` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(25) NOT NULL,
  `icon` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=0 ;";

      $created11 = mysql_query($query11);
$error11 = mysql_error();
                     $query12 =
"
 INSERT INTO `$database`.`cat` (`id`, `title`, `icon`) VALUES (NULL, 'Other', 'Questions');


 ";

      $created12 = mysql_query($query12);

$error12 = mysql_error();
  $query1  "
 INSERT INTO  `$database`.`siteinfo` (
`name` ,
`short`
)
VALUES (
'iBlog',  'iBlog demo'
);";
$created1 = mysql_query($query1);
$error1 = mysql_error();

if ($created12) {
   echo "The data is <strong>succesfully</strong> added in : $database <br><br>";
   echo "If everything was added <strong>succesfully</strong>, please delete this page.";
} else {
 echo "There was a <strong>problem</strong> adding data to the content table<br>";
}

?>
</body>
</html>
