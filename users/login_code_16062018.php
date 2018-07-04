<?php
include("../connection.php");
@session_start();
$phone_no=mysqli_real_escape_string($con,$_REQUEST['phone_no']);
$pwd=mysqli_real_escape_string($con,$_REQUEST['pwd']);
$pass=mysqli_real_escape_string($con,md5($pwd));
$result=mysqli_query($con,"select * from sv_user_profile where phone_no='$phone_no' and password='$pass'");
$row=mysql_num_rows($result);
if($row==0)
echo "Invalid";
else
{
$result=mysqli_query($con,"select * from sv_user_profile where phone_no='$phone_no' and password='$pass'");
$row=mysqli_fetch_array($result);
$_SESSION['phone_no']=$row['phone_no'];
echo "welcome"; 
}
?>