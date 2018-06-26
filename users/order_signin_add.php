<?php
include('../connection.php');
session_start();
$city_name=mysqli_real_escape_string($con,$_REQUEST['city_name']);
$address=mysqli_real_escape_string($con,$_REQUEST['address']);
//$city=$_REQUEST['city'];
$services = mysqli_real_escape_string($con,$_REQUEST['services']);
$sub_services =mysqli_real_escape_string($con,$_REQUEST['sub_services']);
$date = mysqli_real_escape_string($con,date("Y-m-d", strtotime($_REQUEST['date'])));
$time = mysqli_real_escape_string($con,$_REQUEST['time']);
$req =mysqli_real_escape_string($con,$_REQUEST['req']);
$name = mysqli_real_escape_string($con,$_REQUEST['name']);
$email_id = mysqli_real_escape_string($con,$_REQUEST['email_id']);
$phone_no = mysqli_real_escape_string($con,$_REQUEST['phone_no']);
$pwd = mysqli_real_escape_string($con,$_REQUEST['pwd']);
$price = mysqli_real_escape_string($con,$_REQUEST['price']);
$payment_mode = mysqli_real_escape_string($con,$_REQUEST['payment_mode']);
$pass = mysqli_real_escape_string($con,md5($pwd));
$type = mysqli_real_escape_string($con,$_REQUEST['action']);
/*$cname=mysqli_query($con,"select * from sv_city where city_name='$city_name'");
$numrow=mysql_num_rows($cname);
if($numrow=="")
{
echo "Invalid City";
}
else
{*/
$res=mysqli_query($con,"select * from sv_user_profile where phone_no='$phone_no'");
$numrow=mysql_num_rows($res);
if($numrow=="")
{
mysqli_query($con,"insert into sv_user_profile(name,password,phone_no,email_id,date)values('$name','$pass','$phone_no','$email_id','$date')");
mysqli_query($con,"insert into sv_user_order(name,address,services,sub_services,date,order_time,requirement,phone_no,city_name,price,payment_mode,payment_status)values('$name','$address','$services','$sub_services','$date','$time','$req','$phone_no','$city_name','$price','$payment_mode','pending')");
$query1=mysql_fetch_array(mysqli_query($con,"select * from sv_admin_login"));
$logo = mysqli_real_escape_string($con,$query1['logo']);
$imgSrc=$query1['site_url']."/admincp/admin-logo/$logo";
$site_name = mysqli_real_escape_string($con,$query1['site_name']);
/*----------------------User email start-------------------*/
$subject= 'Your Account & Order has been created Successfully'; 
$phone_no = mysqli_real_escape_string($con,$phone_no);
$pwd = mysqli_real_escape_string($con,$pwd);
$subtitle = $site_name . '- Order Details';
$order = mysql_fetch_array(mysqli_query($con,"select * from sv_user_order where phone_no='$phone_no' order by order_id DESC limit 1"));
$city_name=mysqli_real_escape_string($con,$order['city_name']); 
$address= mysqli_real_escape_string($con,$order['address']); 
//$city=$order['city']; 
$service_id=mysqli_real_escape_string($con,$order['services']); 
$service=mysql_fetch_array(mysqli_query($con,"select * from sv_services where services_id='$service_id'"));
$service_name=mysqli_real_escape_string($con,$service['services_name']);
$sub_services_id=mysqli_real_escape_string($con,$order['sub_services']);
$sub_services=mysql_fetch_array(mysqli_query($con,"select * from sv_services_sub where sid='$sub_services_id'"));
$sub_services_name=$sub_services['services_sub_name'];
$date = mysqli_real_escape_string($con,$order['date']);
$order_time =mysqli_real_escape_string($con,$order['order_time']);
$requirement = mysqli_real_escape_string($con,$order['requirement']);
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
'<p>' . $site_name . ' - ' . $subject . '</p>' .
'<p> Phone No - '.$phone_no.'</p>'. 
'<p> Password - '.$pwd.'</p>'. 
'<p>'.$subtitle.'</p>'. 
'<p> City Name - '.$city_name .'</p>'. 
'<p> Address - '.$address.'</p>'.
//'<p>'.$city.'</p>'.
'<p> Services - '.$service_name.'</p>'.
'<p> Sub Services - '.$sub_services_name.'</p>'.
'<p> Order Date - '.$date.'</p>'.
'<p> Order Time - '.$order_time.'</p>'.
'<p> Requirement - '.$requirement.'</p>'.
'</div>'.   
'</div>'. 
'<div id="footer" style="width: 80%;height: 40px;margin: 0 auto;text-align: center;padding: 10px;font-family: Verdena;background-color: #E2E2E2;">'. 
'All rights reserved @ '.$site_name. 
'</div>'. 
'</body>'; 
/*EMAIL TEMPLATE ENDS*/ 
$to      = mysqli_real_escape_string($con,$email_id);              // give to email address 
$subject = 'Account & Order Details - ' . $site_name;  //change subject of email 
$from    = mysqli_real_escape_string($con,$query1['email_id']);                         // give from email address 
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
/*--------------------------user email end----------------------*/
/*--------------------------Admin email start----------------------*/
$subject= 'New Order Received'; 
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
'<p>' . $site_name . ' - ' . $subject . '</p>' .
'<p> Phone No - '.$phone_no.'</p>'. 
'<p> Password - '.$pwd.'</p>'. 
'<p>'.$subtitle.'</p>'. 
'<p> City Name - '.$city_name .'</p>'. 
'<p> Address - '.$address.'</p>'.
//'<p>'.$city.'</p>'.
'<p> Services - '.$service_name.'</p>'.
'<p> Sub Services - '.$sub_services_name.'</p>'.
'<p> Order Date - '.$date.'</p>'.
'<p> Order Time - '.$order_time.'</p>'.
'<p> Requirement - '.$requirement.'</p>'.
'</div>'.   
'</div>'. 
'<div id="footer" style="width: 80%;height: 40px;margin: 0 auto;text-align: center;padding: 10px;font-family: Verdena;background-color: #E2E2E2;">'. 
'All rights reserved @ '.$site_name. 
'</div>'. 
'</body>'; 
/*EMAIL TEMPLATE ENDS*/ 
$from    = mysqli_real_escape_string($con,$query1['email_id']);              // give to email address 
$subject = 'Account & Order Details - ' . $site_name;  //change subject of email 
$from    = mysqli_real_escape_string($con,$query1['email_id']);                         // give from email address 
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
$_SESSION['phone_no']=$phone_no;
$last_order_id=$order['order_id'];
		$_SESSION['order_id'] = $last_order_id;
		$payment_mode=$order['payment_mode'];
		if($payment_mode=='cash')
		{
			mysqli_query($con,"update sv_user_order set payment_status='completed' where order_id='$last_order_id'");
				echo "Inserted";
		}		
		else if($payment_mode=='paypal')
		{
			echo "paypal";
		}
		
//echo "Inserted";
?>
<?php								
}
else
{
echo "Exist";
}
//}
?>
