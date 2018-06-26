<?php


//if you got any deprecated error in above php 5.5 version just uncomment below line to hide those warnings
//error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
/*date_default_timezone_set('Europe/Brussels');
$con = mysql_connect("localhost", "tommelvin06", "Jalord24@");
if (!$con)
    die('Could not connect: ' . mysql_error());
mysql_select_db("Rue2aides", $con);
*/
 
 
  $con = mysqli_connect("localhost","root","","rue2aides");

// Check connection
//if (mysqli_connect_errno())
	if (!$con)
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
 
 


?>