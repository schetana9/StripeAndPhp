<?php
@session_start();
$phone_no=$_SESSION['phone_no'];
include('../connection.php');
$name=mysql_real_escape_string($_REQUEST['name']);
$pno=$_REQUEST['pno'];
$city=mysql_real_escape_string($_REQUEST['city']);
$address=mysql_real_escape_string($_REQUEST['address']);
$pin_code=mysql_real_escape_string($_REQUEST['pin_code']);
$gender=mysql_real_escape_string($_REQUEST['gender']);
$type=mysql_real_escape_string($_REQUEST['action']);
$dat=mysql_real_escape_string(date('Y-m-d H:i:s'));
if($phone_no==$pno)
{
mysql_query("update sv_user_profile set name='$name',phone_no='$pno',city='$city',address='$address',pin_code='$pin_code',gender='$gender',updat_time='$dat' where phone_no='$phone_no'");	
mysql_query("update sv_user_order set name='$name' where phone_no='$phone_no'");
echo "Updated";		
}
else
{
$res=mysql_query("select * from sv_user_profile where phone_no='$pno'");
$numrow=mysql_num_rows($res);
if($numrow=="")
{
if($type=='add')
{
if(mysql_query("update sv_user_profile set name='$name',phone_no='$pno',city='$city',address='$address',pin_code='$pin_code',gender='$gender',updat_time='$dat' where phone_no='$phone_no'"))
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
