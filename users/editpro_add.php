<?php
@session_start();
$phone_no=$_SESSION['phone_no'];
include('../connection.php');
$name=mysqli_real_escape_string($con,$_REQUEST['name']);
$pno=$_REQUEST['pno'];
$city=mysqli_real_escape_string($con,$_REQUEST['city']);
$address=mysqli_real_escape_string($con,$_REQUEST['address']);
$pin_code=mysqli_real_escape_string($con,$_REQUEST['pin_code']);
$gender=mysqli_real_escape_string($con,$_REQUEST['gender']);
$type=mysqli_real_escape_string($con,$_REQUEST['action']);
$dat=mysqli_real_escape_string($con,date('Y-m-d H:i:s'));
if($phone_no==$pno)
{
mysqli_query($con,"update sv_user_profile set name='$name',phone_no='$pno',city='$city',address='$address',pin_code='$pin_code',gender='$gender',updat_time='$dat' where phone_no='$phone_no'");	
mysqli_query($con,"update sv_user_order set name='$name' where phone_no='$phone_no'");
echo "Updated";		
}
else
{
$res=mysqli_query($con,"select * from sv_user_profile where phone_no='$pno'");
$numrow=mysql_num_rows($res);
if($numrow=="")
{
if($type=='add')
{
if(mysqli_query($con,"update sv_user_profile set name='$name',phone_no='$pno',city='$city',address='$address',pin_code='$pin_code',gender='$gender',updat_time='$dat' where phone_no='$phone_no'"))
{
$_SESSION['phone_no']=$pno;
echo "Updated";
}
else
echo "Error";	
}
}
else
echo "Exist";
}
?>
