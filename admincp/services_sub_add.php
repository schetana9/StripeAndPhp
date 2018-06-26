<?php
include('../connection.php');
$type=mysqli_real_escape_string($con,$_REQUEST['action']);
if($type=='add')
{
	$sname=mysqli_real_escape_string($con,$_REQUEST['sname']);
	$sub_sname=mysqli_real_escape_string($con,$_REQUEST['sub_sname']);
	$price=mysqli_real_escape_string($con,$_REQUEST['price']);
	if(mysqli_query($con,"insert into sv_services_sub(services_name,services_sub_name,price)values('$sname','$sub_sname','$price')"))
	echo "Inserted";
 else
	echo "Server Error";
}
else if($type=='update')
{
	$sname=mysqli_real_escape_string($con,$_REQUEST['sname']);
	$sub_sname=mysqli_real_escape_string($con,$_REQUEST['sub_sname']);
	$price=mysqli_real_escape_string($con,$_REQUEST['price']);
	$hid=mysqli_real_escape_string($con,$_REQUEST['hid']);
	if(mysqli_query($con,"update sv_services_sub set services_name='$sname',services_sub_name='$sub_sname',price='$price' where sid='$hid'")) 
		echo "Updated";
	else 
		echo "Error";				

}
else if($type=='delete')
{
	$hid=mysqli_real_escape_string($con,$_REQUEST["hid"]);		
	if(mysqli_query($con,"delete from sv_services_sub where sid='$hid'")) 
		echo "Deleted";
	else 
		echo "Error";
}  

?>