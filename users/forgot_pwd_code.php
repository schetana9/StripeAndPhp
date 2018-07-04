<?php	
include("../connection.php");
@session_start();
$phone_no = mysqli_real_escape_string($con,$_REQUEST['phone_no']);
$result=mysqli_query($con,"select * from sv_user_profile where phone_no = '$phone_no'");
$row = mysqli_fetch_array($result);
$email_id=mysqli_real_escape_string($con,$row['email_id']);
$rowcount = mysqli_num_rows($result);
//email id not match then.
if ($rowcount== 0)
{
echo "Invalid";
}	
/*Checking start*/
else
{			
//set the random id length 
$random_id_length = 8;
//generate a random id encrypt it and store it in $rnd_id 
$rnd_id = crypt(uniqid(rand(),1));
//to remove any slashes that might have come 
$rnd_id = strip_tags(stripslashes($rnd_id));
//Removing any . or / and reversing the string 
$rnd_id = str_replace(".","",$rnd_id); 
$rnd_id = strrev(str_replace("/","",$rnd_id));
//finally I take the first 8 characters from the $rnd_id 
$rnd_id = substr($rnd_id,0,$random_id_length);
$pas=md5($rnd_id);
if(mysqli_query($con,"update sv_user_profile set password='$pas' where phone_no='$phone_no'"))
{
if($email_id!='')
{
$query1=mysqli_fetch_array(mysqli_query($con,"select * from sv_admin_login"));
$site_url=mysqli_real_escape_string($con,$query1['site_url']);
$logo=mysqli_real_escape_string($con,$query1['logo']);
$imgSrc=$site_url."/admincp/admin-logo/$logo";
$site_name = mysqli_real_escape_string($con,$query1['site_name']);
$subject = 'Password Details'; 
$phone_no = mysqli_real_escape_string($con,$phone_no); 
$random_no = mysqli_real_escape_string($con,$rnd_id); 
$message = '<!DOCTYPE HTML>'. 
'<head>'. 
'<meta http-equiv="content-type" content="text/html">'. 
'<title>Cleaning - Email notification</title>'. 
'</head>'. 
'<body>'. 
'<div id="header" style="width: 80%;height: 60px;margin: 0 auto;padding: 10px;color: #fff;text-align: center;background-color: #E0E0E0;font-family: Open Sans,Arial,sans-serif;">'. 
'<img height="50" width="220" style="border-width:0" src="'.$imgSrc.'" title="'.$site_name.'">'. 
'</div>'. 
'<div id="outer" style="width: 80%;margin: 0 auto;margin-top: 10px;">'.  
'<div id="inner" style="width: 78%;margin: 0 auto;background-color: #fff;font-family: Open Sans,Arial,sans-serif;font-size: 13px;font-weight: normal;line-height: 1.4em;color: #444;margin-top: 10px;">'. 
'<p>'.$site_name.' - '.$subject.'</p>'.
'<p> Phone No - '.$phone_no.'</p>'. 
'<p> Password - '.$random_no.'</p>'. 
'</div>'.   
'</div>'. 
'<div id="footer" style="width: 80%;height: 40px;margin: 0 auto;text-align: center;padding: 10px;font-family: Verdena;background-color: #E2E2E2;">'. 
'All rights reserved @ '.$site_name. 
'</div>'. 
'</body>'; 
/*EMAIL TEMPLATE ENDS*/ 
$to      = mysqli_real_escape_string($con,$email_id);              // give to email address 
$subject = 'Cleaning - Account Details';  //change subject of email 
$from    = mysqli_real_escape_string($con,$query1['email_id']);                              // give from email address 
// mandatory headers for email message, change if you need something different in your setting. 
$headers  = "From: " . $from . "\r\n"; 
$headers .= "MIME-Version: 1.0\r\n"; 
$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n"; 
// Remember, mail function may not work in PHP localhost setup but the email template can be used anywhere like (PHPmailer, swiftmailer, PHPMail classes etc.) 
// Sending mail 
if(mail($to, $subject, $message, $headers)) 
{ 
echo 'success'; 
} 
}
}		
}
?>
