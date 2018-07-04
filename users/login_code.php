<?php
include("../connection.php");
@session_start();
$phone_no=mysqli_real_escape_string($con,$_REQUEST['phone_no']);
$pwd=mysqli_real_escape_string($con,$_REQUEST['pwd']);
$pass=mysqli_real_escape_string($con,md5($pwd));
$result=mysqli_query($con,"select * from sv_user_profile where phone_no='$phone_no' and password='$pass'");
$row=mysqli_num_rows($result);
if($row==0)
echo "Invalid";
else
{
$result=mysqli_query($con,"select * from sv_user_profile where phone_no='$phone_no' and password='$pass'");
$row=mysqli_fetch_array($result);
//print_r($row);die;
$_SESSION['phone_no']=$row['phone_no'];
$_SESSION['email_id'] =$row['email_id'];
$_SESSION['signup_id'] =$row['signup_id'];
//print_r($_SESSION['signup_id']);die;
echo "welcome"; 
}
?>