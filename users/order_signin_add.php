<?php
include('../connection.php');
session_start();
$city_name=mysql_real_escape_string($_REQUEST['city_name']);
$address=mysql_real_escape_string($_REQUEST['address']);
//$city=$_REQUEST['city'];
$services = mysql_real_escape_string($_REQUEST['services']);
$sub_services =mysql_real_escape_string($_REQUEST['sub_services']);
$date = mysql_real_escape_string(date("Y-m-d", strtotime($_REQUEST['date'])));
$time = mysql_real_escape_string($_REQUEST['time']);
$req =mysql_real_escape_string($_REQUEST['req']);
$name = mysql_real_escape_string($_REQUEST['name']);
$email_id = mysql_real_escape_string($_REQUEST['email_id']);
$phone_no = mysql_real_escape_string($_REQUEST['phone_no']);
$pwd = mysql_real_escape_string($_REQUEST['pwd']);
$price = mysql_real_escape_string($_REQUEST['price']);
$payment_mode = mysql_real_escape_string($_REQUEST['payment_mode']);
$pass = mysql_real_escape_string(md5($pwd));
$type = mysql_real_escape_string($_REQUEST['action']);
/*$cname=mysql_query("select * from sv_city where city_name='$city_name'");
$numrow=mysql_num_rows($cname);
if($numrow=="")
{
echo "Invalid City";
}
else
{*/
$res=mysql_query("select * from sv_user_profile where phone_no='$phone_no'");
$numrow=mysql_num_rows($res);
if($numrow=="")
{
mysql_query("insert into sv_user_profile(name,password,phone_no,email_id,date)values('$name','$pass','$phone_no','$email_id','$date')");
mysql_query("insert into sv_user_order(name,address,services,sub_services,date,order_time,requirement,phone_no,city_name,price,payment_mode,payment_status)values('$name','$address','$services','$sub_services','$date','$time','$req','$phone_no','$city_name','$price','$payment_mode','pending')");
$query1=mysql_fetch_array(mysql_query("select * from sv_admin_login"));
$logo = mysql_real_escape_string($query1['logo']);
$imgSrc=$query1['site_url']."/admincp/admin-logo/$logo";
$site_name = mysql_real_escape_string($query1['site_name']);
/*----------------------User email start-------------------*/
$subject= 'Your Account & Order has been created Successfully'; 
$phone_no = mysql_real_escape_string($phone_no);
$pwd = mysql_real_escape_string($pwd);
$subtitle = $site_name . '- Order Details';
$order = mysql_fetch_array(mysql_query("select * from sv_user_order where phone_no='$phone_no' order by order_id DESC limit 1"));
$city_name=mysql_real_escape_string($order['city_name']); 
$address= mysql_real_escape_string($order['address']); 
//$city=$order['city']; 
$service_id=mysql_real_escape_string($order['services']); 
$service=mysql_fetch_array(mysql_query("select * from sv_services where services_id='$service_id'"));
$service_name=mysql_real_escape_string($service['services_name']);
$sub_services_id=mysql_real_escape_string($order['sub_services']);
$sub_services=mysql_fetch_array(mysql_query("select * from sv_services_sub where sid='$sub_services_id'"));
$sub_services_name=$sub_services['services_sub_name'];
$date = mysql_real_escape_string($order['date']);
$order_time =mysql_real_escape_string($order['order_time']);
$requirement = mysql_real_escape_string($order['requirement']);
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
$to      = mysql_real_escape_string($email_id);              // give to email address 
$subject = 'Account & Order Details - ' . $site_name;  //change subject of email 
$from    = mysql_real_escape_string($query1['email_id']);                         // give from email address 
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
$from    = mysql_real_escape_string($query1['email_id']);              // give to email address 
$subject = 'Account & Order Details - ' . $site_name;  //change subject of email 
$from    = mysql_real_escape_string($query1['email_id']);                         // give from email address 
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
			mysql_query("update sv_user_order set payment_status='completed' where order_id='$last_order_id'");
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
