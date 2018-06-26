<?php
include('../connection.php');
@session_start();
//$phone_no=$_SESSION['phone_no'];
$name=mysqli_real_escape_string($con,$_REQUEST['name']);
$email=mysqli_real_escape_string($con,$_REQUEST['email']);
$pho_no=mysqli_real_escape_string($con,$_REQUEST['pho_no']);
$msg=mysqli_real_escape_string($con,$_REQUEST['sv_msg']);
$type=mysqli_real_escape_string($con,$_REQUEST['action']);
if($type=='add')
{
mysqli_query($con,"insert into  sv_contact(name,email,contact_no,msg)values('$name','$email','$pho_no','$msg')");
$query1=mysql_fetch_array(mysqli_query($con,"select * from sv_admin_login"));
$site_url=mysqli_real_escape_string($con,$query1['site_url']);
$logo=mysqli_real_escape_string($con,$query1['logo']);
$imgSrc=$site_url."/admincp/admin-logo/$logo";
$contact=mysql_fetch_array(mysqli_query($con,"select * from sv_contact order by id DESC limit 1"));		
$site_name = mysqli_real_escape_string($con,$query1['site_name']);
$subject= 'New Enquiry Received'; 
$name=mysqli_real_escape_string($con,$contact['name']); 
$email= mysqli_real_escape_string($con,$contact['email']); 
$pho_no=mysqli_real_escape_string($con,$contact['contact_no']); 
$msg=mysqli_real_escape_string($con,$contact['msg']); 
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
'<p> Name - '.$name.'</p>'. 
'<p> Email - '.$email.'</p>'.
'<p> Phone No - '.$pho_no.'</p>'.
'<p> Message - '.$msg.'</p>'.
'</div>'.   
'</div>'. 
'<div id="footer" style="width: 80%;height: 40px;margin: 0 auto;text-align: center;padding: 10px;font-family: Verdena;background-color: #E2E2E2;">'. 
'All rights reserved @ '.$site_name. 
'</div>'. 
'</body>'; 
/*EMAIL TEMPLATE ENDS*/ 
$to      = mysqli_real_escape_string($con,$query1['email_id']);              // give to email address 
$subject = 'New Enquiry Received - '.$site_name; //change subject of email 
$from    = mysqli_real_escape_string($con,$query1['email_id']);                              // give from email address 
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
echo "Inserted";	
}
else
echo "Error";
?>
