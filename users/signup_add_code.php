<?php
include('../connection.php');
$name=mysqli_real_escape_string($con,$_POST['name']);
$email_id=mysqli_real_escape_string($con,$_POST['email_id']);
$password=mysqli_real_escape_string($con,$_POST['pwd']);
$pwd = mysqli_real_escape_string($con,md5($password));
$phone_no=mysqli_real_escape_string($con,$_POST['pho_no']);
$city=mysqli_real_escape_string($con,$_POST['city']);
$address=mysqli_real_escape_string($con,$_POST['address']);
$pin_code=mysqli_real_escape_string($con,$_POST['pin_code']);
$gender=mysqli_real_escape_string($con,$_POST['gender']);
$dat=mysqli_real_escape_string($con,date("Y-m-d H:i:s")); 
$res=mysqli_query($con,"select * from sv_user_profile where phone_no='$phone_no'");
$numrow=mysql_num_rows($res);
if($numrow=="")
{
mysqli_query($con,"insert into sv_user_profile(name,email_id,password,phone_no,city,address,pin_code,gender,date)values('$name','$email_id','$pwd','$phone_no','$city','$address','$pin_code','$gender','$dat')");
//mysqli_query($con,"insert into sv_login(phone_no,password)values('$phone_no','$pwd')");
?>
<!---------Mail function ------------>
<?php 
//include('../header.php');
$query1=mysql_fetch_array(mysqli_query($con,"select * from sv_admin_login"));
$logo = mysqli_real_escape_string($con,$query1['logo']);
$imgSrc=$query1['site_url']."/admincp/admin-logo/$logo";
$site_name = mysqli_real_escape_string($con,$query1['site_name']);
//$imgSrc=$site_url."admincp/admin-logo/$logo";
$site_name = mysqli_real_escape_string($con,$site_name);
$subject = 'Your Account created Successfully'; 
$phone_no = mysqli_real_escape_string($con,$phone_no); 
$pwd = mysqli_real_escape_string($con,$password); 
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
$to      = mysqli_real_escape_string($con,$email_id);             // give to email address 
$subject = 'Account Details - '.$site_name;  //change subject of email 
$from    =  mysqli_real_escape_string($con,$query1['email_id']);                          // give from email address 
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
