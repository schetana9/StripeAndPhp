<?php 
@session_start();
include ('../connection.php');
require_once('../stripe-php-master/init.php');



$order_id=$_SESSION['order_id'];
$signup_id=$_SESSION['signup_id'];
$results = mysqli_query($con,"select * from sv_admin_login");
$row=mysql_fetch_array($results);
$currency = $row['currency_mode'];
$stripe_secret_key = $row['stripe_secret_key'];
//print_r($_SESSION);die;

$results = mysqli_query($con,"select * from sv_user_order where order_id='$order_id'");
$row=mysql_fetch_array($results);
$price=$row['price'];		
$final_price = (int)$price*100;	

$results = mysqli_query($con,"select * from sv_user_profile where signup_id='$signup_id'");
$row=mysql_fetch_array($results);
$db_customer_token = $row['customer_token'];
$source_key = $_GET['source'];


// echo $final_price."<br>";
// echo $stripe_secret_key."<br>";  
// echo $db_customer_token."<br>"; 
// echo $source_key;//die; 

\Stripe\Stripe::setApiKey($stripe_secret_key);  
//if test Mode source="tok_visa" 
if($_GET['livemode']=="false")
{
    
    $source_key = "tok_visa";
    $charge = \Stripe\Charge::create(array(
        "amount" => $final_price,
        "currency" => $currency,
        "source" =>  "tok_visa"
        ));
}
else{
    $charge = \Stripe\Charge::create(array(
        "amount" => $final_price,
        "currency" => $currency,
        "customer" => $db_customer_token,
        "source" =>  $source_key
        ));
} 


// print_r($charge);die;

if($charge)
{
    $charge_token_id = $charge->id;
    $amount = $charge->amount;
    $customer_token_id = $charge->customer;
    $user_id = $signup_id;

    mysqli_query($con,"insert into sv_charge(charge_token_id,amount,customer_token_id,user_id)values('$charge_token_id','$amount','$customer_token_id','$user_id')");
    header('location:dashboard.php?msg=paymentsuccess');
    //echo "3d charge apply";

}else{
    echo "error";
}
 
//print_r($charge);

//$client_secret_key = $_GET['client_secret'];
//$source_key = $_GET['source'];
include('../header.php');                   
?>
<section class="teaser bg-top ">
 <div class="min-space"></div><div class="min-space"></div><div class="min-space"></div>
 <h3 class="sub-title">Your Payment is Processing</h3>
<div class="min-space"></div>
<div class="min-space"></div>
</section>
<div class="user-login-container" id="user_login_container">

<div class="container text-center">
    <div class="min-space"></div>
        <label> Processing .....</label>  <?php //echo $client_id; ?><br>
        
       
    </div>
        
</div>
    
</div>
</body>
<?php include('../footer.php')?>
</html>