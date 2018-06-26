<?php
	include("../connection.php");
	@session_start();
	
	   $str=$_REQUEST['studid'];
	$sel=mysql_query("select * from sv_services_sub where sid='$str'");
	$row=mysql_fetch_array($sel);
	$price=$row['price'];
   echo $price;
	
?>