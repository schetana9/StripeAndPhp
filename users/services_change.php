<?php
	include("../connection.php");
	@session_start();
	
	   $type=mysqli_real_escape_string($con,$_REQUEST['type']);
		$sub_id=mysqli_real_escape_string($con,$_REQUEST['sub_id']);
		$name='';
		$id='';
		$res=mysqli_query($con,"select * from sv_services_sub where services_name='$sub_id'");
		while($row=mysql_fetch_array($res))
		{
			if($type=="name")
			{
				$name.=mysqli_real_escape_string($con,$row['services_sub_name']);
				$name.="#";
			}
			else 
			{
				$name.=mysqli_real_escape_string($con,$row['sid']);
				$name.="#";
			}
		}
			echo $name;
	
?>