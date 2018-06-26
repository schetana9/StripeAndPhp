<?php
include("../connection.php");
@session_start();
/*user not login and access this page it will going to index page*/
if(!isset($_SESSION['phone_no']))
header("Location: index.php");
/*user after login access this page*/
else
{
$curpwd=mysql_real_escape_string($_REQUEST['curpwd']);
$new=mysql_real_escape_string($_REQUEST['newpwd']);
$conpwd=mysql_real_escape_string($_REQUEST['conpwd']);
$phone_no =  mysql_real_escape_string($_SESSION["phone_no"]);
$genre = mysql_real_escape_string(md5($curpwd));
$new_pass = mysql_real_escape_string(md5($new));
$result = mysql_query("SELECT * FROM sv_user_profile where phone_no='$phone_no' and password='$genre'");
$row=mysql_fetch_array($result);
if($row=="")
echo "Invalid";
else
{
mysql_query("update sv_user_profile SET password='$new_pass' where phone_no='$phone_no'");			
//mysql_query("update sv_login set password='$new_pass' where phone_no='$phone_no'");
echo "success";
}
}
?>
