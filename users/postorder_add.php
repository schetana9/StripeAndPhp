<?php
include('../connection.php');
@session_start();
$phone_no=$_SESSION['phone_no'];	
//include('top_menu.php');

$city_name=mysqli_real_escape_string($con,$_REQUEST['city_name']);
$address=mysqli_real_escape_string($con,$_REQUEST['address']);
//$city=$_REQUEST['city'];
$services=mysqli_real_escape_string($con,$_REQUEST['services']);
$sub_services=mysqli_real_escape_string($con,$_REQUEST['sub_services']);
$order_date=mysqli_real_escape_string($con,$_REQUEST['order_date']);
$date1 = mysqli_real_escape_string($con,date("Y-m-d", strtotime($order_date)));
$time=mysqli_real_escape_string($con,$_REQUEST['time']);
$req=mysqli_real_escape_string($con,$_REQUEST['req']);
$name=mysqli_real_escape_string($con,$_REQUEST['name']);
$order_pno=mysqli_real_escape_string($con,$_REQUEST['order_pno']);
$price = mysqli_real_escape_string($con,$_REQUEST['price']);
$payment_mode = mysqli_real_escape_string($con,$_REQUEST['payment_mode']);
$type=mysqli_real_escape_string($con,$_REQUEST['action']);
$type=$_REQUEST['action'];
/*$pcode=mysqli_query($con,"select * from sv_city where city_name='$city_name'");
$numrow=mysqli_num_rows($pcode);
if($numrow=="")
{
echo "Invalid";
}
else
{*/
mysqli_query($con,"insert into sv_user_order(name,address,services,sub_services,date,order_time,requirement,order_phone_no,phone_no,city_name,price,payment_mode,payment_status)values('$name','$address','$services','$sub_services','$date1','$time','$req','$order_pno','$phone_no','$city_name','$price','$payment_mode','pending')");
/*  ---------- mail function  ---------*/
$query=mysqli_fetch_array(mysqli_query($con,"select * from sv_user_profile where phone_no='$phone_no'"));
$email_id=mysqli_real_escape_string($con,$query['email_id']);
$query1=mysqli_fetch_array(mysqli_query($con,"select * from sv_admin_login"));
$site_url=mysqli_real_escape_string($con,$query1['site_url']);
$logo=mysqli_real_escape_string($con,$query1['logo']);
$imgSrc=$site_url."/admincp/admin-logo/$logo";
//$imgSrc   = $query1['logo'];
$site_name = mysqli_real_escape_string($con,$query1['site_name']);
$order=mysqli_fetch_array(mysqli_query($con,"select * from sv_user_order where phone_no='$phone_no' order by order_id DESC limit 1"));
$subject= 'Order has been created Successfully'; 
$city_name=mysqli_real_escape_string($con,$order['city_name']); 
$address= mysqli_real_escape_string($con,$order['address']); 
//$city=$order['city']; 
$service_id=mysqli_real_escape_string($con,$order['services']); 
$service=mysqli_fetch_array(mysqli_query($con,"select * from sv_services where services_id='$service_id'"));
$service_name=mysqli_real_escape_string($con,$service['services_name']);
$sub_services_id=mysqli_real_escape_string($con,$order['sub_services']);
$sub_services=mysqli_fetch_array(mysqli_query($con,"select * from sv_services_sub where sid='$sub_services_id'"));
$sub_services_name=$sub_services['services_sub_name'];
$date=mysqli_real_escape_string($con,$order['date']); 
$order_time=mysqli_real_escape_string($con,$order['order_time']); 
$requirement=mysqli_real_escape_string($con,$order['requirement']); 
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
'<p> City Name - '.$city_name.'</p>'. 
'<p> Address - '.$address.'</p>'.
//'<p>'.$city.'</p>'.
'<p> Service Name - '.$service_name.'</p>'.
'<p> Sub Service Name - '.$sub_services_name.'</p>'.
'<p> Order Date- '.$date.'</p>'.
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
$subject = 'Order Details - '.$site_name; //change subject of email 
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
/*---------------User email end-----------------*/
/*---------------Admin email start-----------------*/
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
'<p>'.$site_name.' - '.$subject.'</p>'.
'<p> City Name - '.$city_name.'</p>'. 
'<p> Address - '.$address.'</p>'.
//'<p>'.$city.'</p>'.
'<p> Service Name - '.$service_name.'</p>'.
'<p> Sub Service Name - '.$sub_services_name.'</p>'.
'<p> Order Date- '.$date.'</p>'.
'<p> Order Time - '.$order_time.'</p>'.
'<p> Requirement - '.$requirement.'</p>'.
'</div>'.   
'</div>'. 
'<div id="footer" style="width: 80%;height: 40px;margin: 0 auto;text-align: center;padding: 10px;font-family: Verdena;background-color: #E2E2E2;">'. 
'All rights reserved @ '.$site_name. 
'</div>'. 
'</body>'; 
/*EMAIL TEMPLATE ENDS*/ 
$to      =mysqli_real_escape_string($con,$query1['email_id']);             // give to email address 
$subject = 'Order Details - '.$site_name; //change subject of email 
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
		else if($payment_mode=='stripe')
		{
			echo "stripe";
		}
		
//echo "Inserted";
//}
?>
