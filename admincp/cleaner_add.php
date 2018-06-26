<?php
include('../connection.php');

$type=mysqli_real_escape_string($con,$_REQUEST['action']);
$hid=mysqli_real_escape_string($con,$_REQUEST['hid']);

if($type=='add')
{
$email=mysqli_real_escape_string($con,$_REQUEST['email']);
$cemail=mysqli_real_escape_string($con,$_REQUEST['cemail']);
$fname=mysqli_real_escape_string($con,$_REQUEST['fname']);
$lname=mysqli_real_escape_string($con,$_REQUEST['lname']);
$mob_no=mysqli_real_escape_string($con,$_REQUEST['mob_no']);
$post_code=mysqli_real_escape_string($con,$_REQUEST['post_code']);
$exp=mysqli_real_escape_string($con,$_REQUEST['exp']);
$paid_work=mysqli_real_escape_string($con,$_REQUEST['paid_work']);
$gender=mysqli_real_escape_string($con,$_REQUEST['gender']);
$dob=mysqli_real_escape_string($con,$_REQUEST['dob']);
$dob1 = mysqli_real_escape_string($con,date("Y-m-d", strtotime($dob)));
$nation=mysqli_real_escape_string($con,$_REQUEST['nation']);
$address=mysqli_real_escape_string($con,$_REQUEST['address']);
$suburb=mysqli_real_escape_string($con,$_REQUEST['suburb']);
$abt=mysqli_real_escape_string($con,$_REQUEST['abt']);
$update_time=mysqli_real_escape_string($con,date("Y-m-d"));
	if(mysqli_query($con,"update sv_service_provider set email='$email',confirm_email='$cemail',first_name='$fname',last_name='$lname',mob_no='$mob_no',post_code='$post_code',exp='$exp',paid_work='$paid_work',gender='$gender',dob='$dob1',nationality='$nation',address='$address',suburb='$suburb',abt_us='$abt',update_time='$update_time' where id='$hid'")) 
		echo "Updated";
	else 
		echo "Error";
}
else if($type=='delete')
{
	if(mysqli_query($con,"delete from sv_service_provider where id='$hid'")) 
		echo "Deleted";
	else 
		echo "Error";
}  

 

?>