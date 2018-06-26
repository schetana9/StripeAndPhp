<?php
include('../connection.php');
require_once('../stripe-php-master/init.php');

@session_start();
$phone_no=mysqli_real_escape_string($con,$_SESSION['phone_no']);
$email=mysqli_real_escape_string($con,$_REQUEST['email']);
$cemail=mysqli_real_escape_string($con,$_REQUEST['cemail']);
$fname=mysqli_real_escape_string($con,$_REQUEST['fname']);
$lname=mysqli_real_escape_string($con,$_REQUEST['lname']);
$mob_no=mysqli_real_escape_string($con,$_REQUEST['mob_no']);
$post_code=mysqli_real_escape_string($con,$_REQUEST['post_code']);
$exp=mysqli_real_escape_string($con,$_REQUEST['exp']);
$paid_work=mysqli_real_escape_string($con,$_REQUEST['paid_work']);
$gender=mysqli_real_escape_string($con,$_REQUEST['gender']);
$dob=mysqli_real_escape_string($con,$_REQUEST['dob']);
$dob1 = mysqli_real_escape_string($con,date("Y-m-d", strtotime($dob)));
$nation=mysqli_real_escape_string($con,$_REQUEST['nation']);
$address=mysqli_real_escape_string($con,$_REQUEST['address']);
$suburb=mysqli_real_escape_string($con,$_REQUEST['suburb']);
$abt=mysqli_real_escape_string($con,$_REQUEST['abt']);
$creat_time=mysqli_real_escape_string($con,date("Y-m-d"));
$type=mysqli_real_escape_string($con,$_REQUEST['action']);
$token = mysqli_real_escape_string($con,$_REQUEST['token']);
if($type=='add')
{
mysqli_query($con,"insert into  sv_service_provider(email,confirm_email,first_name,last_name,mob_no,post_code,exp,paid_work,gender,dob,nationality,address,suburb,abt_us,phone_no,creat_time)values('$email','$cemail','$fname','$lname','$mob_no','$post_code','$exp','$paid_work','$gender','$dob1','$nation','$address','$suburb','$abt','$phone_no','$creat_time')");
$query1=mysql_fetch_array(mysqli_query($con,"select * from sv_admin_login"));
$site_url=mysqli_real_escape_string($con,$query1['site_url']);
$logo=mysqli_real_escape_string($con,$query1['logo']);
$imgSrc=$site_url."/admincp/admin-logo/".$logo;
$site_name = mysqli_real_escape_string($con,$query1['site_name']);
$stripe_secret_key = mysqli_real_escape_string($con,$query1['stripe_secret_key']);


// stripe integration 


    \Stripe\Stripe::setApiKey($stripe_secret_key);

    $acct = \Stripe\Account::create(array(
        "country" => "FR",
        "type" => "custom",
        "account_token" => $token,
        
    ));
    //echo $acct;die;
$account_id = $acct->id;

if($acct){
    $last_id = mysql_insert_id($con);
    mysqli_query($con,"update sv_service_provider set stripe_token='$account_id' where id='$last_id'");
    
    
}

//echo "<pre>";print_r($acct);die;

/*----------admin email---------------*/
$subject= 'New Service Provider Request'; 
$cleaner=mysql_fetch_array(mysqli_query($con,"select * from sv_service_provider where phone_no='$phone_no' order by id DESC limit 1 "));		
$email=mysqli_real_escape_string($con,$cleaner['email']); 
$first_name= mysqli_real_escape_string($con,$cleaner['first_name']); 
$last_name=mysqli_real_escape_string($con,$cleaner['last_name']); 
$mob_no=mysqli_real_escape_string($con,$cleaner['mob_no']); 
$post_code= mysqli_real_escape_string($con,$cleaner['post_code']); 
$exp=mysqli_real_escape_string($con,$cleaner['exp']); 
if($exp==1)
$exp="i have never cleaned professionally before";
else if($exp==2)
$exp="1-5 months";
else if($exp==3)
$exp="6-12 months";
else if($exp==4)
$exp="1-3 years";
else if($exp==5)
$exp="I am running a household";
$paid_work=$cleaner['paid_work']; 
if($paid_work==1)
$paid_work="no,none at the moment";
else if($paid_work==2)
$paid_work="1-10 hours/week";
else if($paid_work==3)
$paid_work="10-20 hours/week";
else if($paid_work==4)
$paid_work="+20 hours per week";	
$gender=$cleaner['gender']; 
if($gender==1)
$gender="male";
else if($gender==2)
$gender="female";
$dob=mysqli_real_escape_string($con,$cleaner['dob']); 
$nationality=mysqli_real_escape_string($con,$cleaner['nationality']); 
$address=mysqli_real_escape_string($con,$cleaner['address']); 
$suburb=mysqli_real_escape_string($con,$cleaner['suburb']); 
$abt_us=mysqli_real_escape_string($con,$cleaner['abt_us']); 
if($abt_us==1)
$abt_us="Events";
else if($abt_us==2)
$abt_us="Advert";
else if($abt_us==3)
$abt_us="Friend";
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
'<p> Email - '.$email.'</p>'. 
'<p> First Name - '.$first_name.'</p>'.
'<p> Last Name - '.$last_name.'</p>'.
'<p> Mobile No - '.$mob_no.'</p>'.
'<p> Postal Code - '.$post_code.'</p>'.
'<p> Experience - '.$exp.'</p>'.
'<p> Any Paid work - '.$paid_work.'</p>'.
'<p> Gender - '.$gender.'</p>'.
'<p> DOB - '.$dob.'</p>'. 
'<p> Nationality - '.$nationality.'</p>'.
'<p> Address - '.$address.'</p>'.
'<p> Location - '.$suburb.'</p>'.
'<p> About - '.$abt_us.'</p>'.
'</div>'.   
'</div>'. 
'<div id="footer" style="width: 80%;height: 40px;margin: 0 auto;text-align: center;padding: 10px;font-family: Verdena;background-color: #E2E2E2;">'. 
'All rights reserved @ '.$site_name. 
'</div>'. 
'</body>'; 
/*EMAIL TEMPLATE ENDS*/ 
$to      = $query1['email_id'];            // give to email address 
$subject ='New Service Provider Request - '.$site_name;  //change subject of email 
$from    = $query1['email_id'];                              // give from email address 
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
/*----------------------------Admin email end-------------------*/
/*---------------------------User email start ---------------------*/
$subject= 'Service Provider Request Sent'; 
$message = '<!DOCTYPE HTML>'. 
'<head>'. 
'<meta http-equiv="content-type" content="text/html">'. 
'<title>'.$site_name. '- Email notification</title>'. 
'</head>'. 
'<body>'. 
'<div id="header" style="width: 80%;height: 60px;margin: 0 auto;padding: 10px;color: #fff;text-align: center;background-color: #E0E0E0;font-family: Open Sans,Arial,sans-serif;">'. 
'<img height="50" width="220" style="border-width:0" src="'.$imgSrc.'" title="'.$site_name.'">'. 
'</div>'. 
'<div id="outer" style="width: 80%;margin: 0 auto;margin-top: 10px;">'.  
'<div id="inner" style="width: 78%;margin: 0 auto;background-color: #fff;font-family: Open Sans,Arial,sans-serif;font-size: 13px;font-weight: normal;line-height: 1.4em;color: #444;margin-top: 10px;">'. 
'<p>'.$site_name.' - '.$subject.'</p>'. 
'<p> Email - '.$email.'</p>'. 
'<p> First Name - '.$first_name.'</p>'.
'<p> Last Name - '.$last_name.'</p>'.
'<p> Mobile No - '.$mob_no.'</p>'.
'<p> Postal Code - '.$post_code.'</p>'.
'<p> Experience - '.$exp.'</p>'.
'<p> Any Paid work - '.$paid_work.'</p>'.
'<p> Gender - '.$gender.'</p>'.
'<p> DOB - '.$dob.'</p>'. 
'<p> Nationality - '.$nationality.'</p>'.
'<p> Address - '.$address.'</p>'.
'<p> Location - '.$suburb.'</p>'.
'<p> About - '.$abt_us.'</p>'.
'</div>'.   
'</div>'. 
'<div id="footer" style="width: 80%;height: 40px;margin: 0 auto;text-align: center;padding: 10px;font-family: Verdena;background-color: #E2E2E2;">'. 
'All rights reserved @ '.$site_name. 
'</div>'. 
'</body>'; 
/*EMAIL TEMPLATE ENDS*/ 
$to      = mysqli_real_escape_string($con,$email);            // give to email address 
$subject = 'Service Provider Request Sent - '.$site_name;  //change subject of email 
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
/*----------------------------User email end-------------------*/

echo "Inserted";	
}
else
echo "Error";
?>
