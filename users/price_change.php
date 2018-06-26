<?php
	include("../connection.php");
	@session_start();
	
	   $str=$_REQUEST['studid'];
	$sel=mysqli_query($con,"select * from sv_services_sub where sid='$str'");
	$row=mysql_fetch_array($sel);
	$price=$row['price'];
   echo $price;
	
?>