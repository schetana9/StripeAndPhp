<?php
	include("../connection.php");
	@session_start();
	
	   $type=mysql_real_escape_string($_REQUEST['type']);
		$sub_id=mysql_real_escape_string($_REQUEST['sub_id']);
		$name='';
		$id='';
		$res=mysql_query("select * from sv_services_sub where services_name='$sub_id'");
		while($row=mysql_fetch_array($res))
		{
			if($type=="name")
			{
				$name.=mysql_real_escape_string($row['services_sub_name']);
				$name.="#";
			}
			else 
			{
				$name.=mysql_real_escape_string($row['sid']);
				$name.="#";
			}
		}
			echo $name;
	
?>