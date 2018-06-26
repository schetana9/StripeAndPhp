<?php
include('../connection.php');
$type=mysqli_real_escape_string($con,$_REQUEST['action']);
if($type=='add')
{
	$cname=mysqli_real_escape_string($con,$_REQUEST['cname']);
  if(mysqli_query($con,"insert into sv_city(city_name)values('$cname')"))
	echo "Inserted";
 else
	echo "Server Error";
}
else if($type=='update')
{
	$cname=mysqli_real_escape_string($con,$_REQUEST['cname']);
	$hid=mysqli_real_escape_string($con,$_REQUEST['hid']);
	if(mysqli_query($con,"update sv_city set city_name='$cname' where city_id='$hid'")) 
		echo "Updated";
	else 
		echo "Error";				

}
else if($type=='delete')
{
	$hid=mysqli_real_escape_string($con,$_REQUEST["hid"]);		
	if(mysqli_query($con,"delete from sv_city where city_id='$hid'")) 
		echo "Deleted";
	else 
		echo "Error";
}  

?>