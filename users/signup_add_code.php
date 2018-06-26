<?php
include('../connection.php');
$name=mysql_real_escape_string($_POST['name']);
$email_id=mysql_real_escape_string($_POST['email_id']);
$password=mysql_real_escape_string($_POST['pwd']);
$pwd = mysql_real_escape_string(md5($password));
$phone_no=mysql_real_escape_string($_POST['pho_no']);
$city=mysql_real_escape_string($_POST['city']);
$address=mysql_real_escape_string($_POST['address']);
$pin_code=mysql_real_escape_string($_POST['pin_code']);
$gender=mysql_real_escape_string($_POST['gender']);
$dat=mysql_real_escape_string(date("Y-m-d H:i:s")); 
$res=mysql_query("select * from sv_user_profile where phone_no='$phone_no'");
$numrow=mysql_num_rows($res);
if($numrow=="")
{
mysql_query("insert into sv_user_profile(name,email_id,password,phone_no,city,address,pin_code,gender,date)values('$name','$email_id','$pwd','$phone_no','$city','$address','$pin_code','$gender','$dat')");
//mysql_query("insert into sv_login(phone_no,password)values('$phone_no','$pwd')");
?>
<!---------Mail function ------------>
<?php 
//include('../header.php');
$query1=mysql_fetch_array(mysql_query("select * from sv_admin_login"));
$logo = mysql_real_escape_string($query1['logo']);
$imgSrc=$query1['site_url']."/admincp/admin-logo/$logo";
$site_name = mysql_real_escape_string($query1['site_name']);
//$imgSrc=$site_url."admincp/admin-logo/$logo";
$site_name = mysql_real_escape_string($site_name);
$subject = 'Your Account created Successfully'; 
$phone_no = mysql_real_escape_string($phone_no); 
$pwd = mysql_real_escape_string($password); 
$message = '<!DOCTYPE HTML>'. 
'<head>'. 
'<meta http-equiv="content-type" content="text/html">'. 
'</head>'. 
'<body>'. 
'<div id="header" style="width: 80%;height: 60px;margin: 0 auto;padding: 10px;color: #fff;text-align: center;background-color: #E0E0E0;font-family: Open Sans,Arial,sans-serif;">'. 
'<img height="50" width="220" style="border-width:0" src="'.$imgSrc.'" title="'.$site_name.'">'. 
'</div>'. 
'<div id="outer" style="width: 80%;margin: 0 auto;margin-top: 10px;">'.  
'<div id="inner" style="width: 78%;margin: 0 auto;background-color: #fff;font-family: Open Sans,Arial,sans-serif;font-size: 13px;font-weight: normal;line-height: 1.4em;color: #444;margin-top: 10px;">'. 
'<p>'.$site_name.' - '.$subject.'</p>'.
'<p> User Name - '.$phone_no.'</p>'. 
'<p> Password - '.$pwd.'</p>'. 	   
'</div>'.   
'</div>'. 
'<div id="footer" style="width: 80%;height: 40px;margin: 0 auto;text-align: center;padding: 10px;font-family: Verdena;background-color: #E2E2E2;">'. 
'All rights reserved @ '.$site_name. 
'</div>'. 
'</body>'; 
/*EMAIL TEMPLATE ENDS*/ 
$to      = mysql_real_escape_string($email_id);             // give to email address 
$subject = 'Account Details - '.$site_name;  //change subject of email 
$from    =  mysql_real_escape_string($query1['email_id']);                          // give from email address 
// mandatory headers for email message, change if you need something different in your setting. 
$headers  = "From: " . $from . "\r\n";
$headers .= "MIME-Version: 1.0\r\n"; 
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n"; 
// Remember, mail function may not work in PHP localhost setup but the email template can be used anywhere like (PHPmailer, swiftmailer, PHPMail classes etc.) 
// Sending mail 
if(mail($to, $subject, $message, $headers)) 
{ 
//echo 'Email sent successfully!'; 
} 
else 
{ 
//echo 'Problem sending email!'; 
} 
?>		
<script type="text/javascript">
  var msg="success";
  window.location="sign_in.php?msg="+msg;
</script>
<?php
}
else
{
?>
<script type="text/javascript">
  var msg="Exist";
  window.location="sign_in.php?msg="+msg;
</script>
<?php
}
?>
