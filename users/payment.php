<?php
@session_start();
include ('../connection.php');
require_once('../stripe-php-master/init.php');
$email=$_SESSION['email_id'];
$stripe_source=$_GET['stripeSource'];
$secure=$_GET['3dsecure'];
$signup_id=$_SESSION['signup_id'];
$order_id=$_SESSION['order_id'];
// echo '<pre>';
// print_r($_SESSION);die;


if(isset($secure)){
//echo $stripe_source;die;
//src_1CdiKyBpiqFh0qF19stFnjgB
//src_1CdiO5BpiqFh0qF1JIAggWks
	$results = mysqli_query($con,"select * from sv_admin_login");
	$row=mysql_fetch_array($results);
	$currency = $row['currency_mode'];
	$stripe_secret_key = $row['stripe_secret_key'];

	

	$results = mysqli_query($con,"select * from sv_user_profile where signup_id='$signup_id'");
	$row=mysql_fetch_array($results);
	$db_customer_token = $row['customer_token'];
	
	if($db_customer_token == ""){
		//echo $email;
		//echo $stripe_source;//die;
		\Stripe\Stripe::setApiKey($stripe_secret_key);
		$customer = \Stripe\Customer::create(array(
			"email" => $email,
			"source" => $stripe_source,
			));
			
			$customer_token = $customer->id;
			$db_customer_token = $customer_token;			
			
			mysqli_query($con,"update sv_user_profile set customer_token='$customer_token' where signup_id='$signup_id'");    
	}

	if($secure == "required" || $secure == "recommended")
	{
		
		$results = mysqli_query($con,"select * from sv_user_order where order_id='$order_id'");
		$row=mysql_fetch_array($results);
		$price=$row['price'];		
		$final_price = (int)$price*100;		
		
		
		//Create a 3D Secure source
		\Stripe\Stripe::setApiKey($stripe_secret_key);
		$source = \Stripe\Source::create(array(
			"amount" => $final_price,
			"currency" => $currency,
			"type" => "three_d_secure",
			"three_d_secure" => array(
			  "card" => $stripe_source,
			),
			"redirect" => array(
			  "return_url" => "http://rue2aides.com/users/3d_secure_validation.php"
			),
		  ));
		  //print_r($source);die;
//http://localhost/rue2aides.com/rue2aides/users/payment.php?stripeSource=src_1CdKK0BpiqFh0qF1xbIPmiKI&3dsecure=recommended
		  $redirect_url = $source->redirect['url'];
		  header('location:'.$redirect_url);

	}else{

			$results = mysqli_query($con,"select * from sv_user_profile where signup_id='$signup_id'");
			$row=mysql_fetch_array($results);
			$db_customer_token = $row['customer_token'];

		
			$results = mysqli_query($con,"select * from sv_user_order where order_id='$order_id'");
			$row=mysql_fetch_array($results);
			$price=$row['price'];		
			$final_price = (int)$price*100;

			//Make a charge request
			try{
				\Stripe\Stripe::setApiKey($stripe_secret_key);
				$charge = \Stripe\Charge::create(array(
					"amount" => $final_price,
					"currency" => $currency,
					"customer" => $db_customer_token,
					"source" => $stripe_source,
				));					
				$charge_token_id = $charge->id;
				$amount = $charge->amount;
				$customer_token_id = $charge->customer;
				$user_id = $signup_id;
				
				mysqli_query($con,"insert into sv_charge(charge_token_id,amount,customer_token_id,user_id)values('$charge_token_id','$amount','$customer_token_id','$user_id')");
				header('location:dashboard.php?msg=paymentsuccess');	

			}catch(error $e){

				echo $e;die;
			}

}

}

//print_r($customer);die;

include ('../header.php');


?>
<script src="https://js.stripe.com/v3/"></script>
<script src="../js/stripe_payment.js" data-rel-js></script>

<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Source+Code+Pro" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="../css/base.css" data-rel-css="" />


<link rel="stylesheet" type="text/css" href="../css/example2.css" data-rel-css="" />


<?php
if(isset($_SESSION['phone_no']))
{ 
$order_id=  mysqli_real_escape_string($con,$_SESSION[ "order_id"]);
//Set useful variables for paypal form  
//$query=mysql_fetch_array(mysqli_query($con,"select  * from sv_admin_login"));
//$site_mode=$query['paypal_site_mode'];
//$cur_code=$query['currency_mode'];

//$paypal_id = $query['paypal_id']; //Business Email

//if($site_mode=="test")
//	$paypal_url = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; //Test PayPal API URL
//else if($site_mode=="live")
//	$paypal_url = 'https://www.paypal.com/cgi-bin/webscr'; //Live PayPal API URL

?>
 <section class="teaser bg-top ">
 <div class="min-space"></div><div class="min-space"></div><div class="min-space"></div>
 <h3 class="sub-title">Payment Confirmation</h3>
<div class="min-space"></div>
<div class="min-space"></div>
</section>
<!--fetch products from the database-->
<?php
		$results = mysqli_query($con,"select * from sv_user_order where order_id='$order_id'");
		while($row=mysql_fetch_array($results))
		{
			$services_id=mysqli_real_escape_string($con,$row['services']);
			$sub_services_id=mysqli_real_escape_string($con,$row['sub_services']);
			$services=mysql_fetch_array(mysqli_query($con,"select * from sv_services where services_id='$services_id'"));
			$sname=$services['services_name'];
			$sub_services=mysql_fetch_array(mysqli_query($con,"select * from sv_services_sub where sid='$sub_services_id'"));
			$sub_sname=$sub_services['services_sub_name'];
			$price=$row['price'];
			$payment_mode=$row['payment_mode'];
?>


 
<div class="user-login-container" id="user_login_container">

	<div class="container text-center">
		<div class="min-space"></div>
			<label>Service Name </label> - <?php echo $services['services_name']; ?><br>
			<label>Sub Service Name</label> -  <?php echo $sub_services['services_sub_name']; ?><br>
			<label>Price</label> - <?php echo $row['price']; ?>
			<input type="button" name="button" value="Pay now" class="paynow" id="paynow">
		</div>
			
	</div>
		<?php } ?>
</div>

<!--stripe payment form-->
<div class="globalContent" id="stripe_form_div" style="display:none">
    <main>

		<section class="container-lg">
		
		
			<div class="cell example example2">
				
				<form id="stripe_payment_form">
				
				<div class="row">
					<div class="field">
					<div id="example2-card-number" class="input empty"></div>
					<label for="example2-card-number" data-tid="elements_examples.form.card_number_label">Card number</label>
					<div class="baseline"></div>
					</div>
				</div>
				<div class="row">
					<div class="field half-width">
					<div id="example2-card-expiry" class="input empty"></div>
					<label for="example2-card-expiry" data-tid="elements_examples.form.card_expiry_label">Expiration</label>
					<div class="baseline"></div>
					</div>
					<div class="field hafooter {
						position: relative;
						max-width: 750px;
						padding: 50px 20px;
						margin: 0 auto;
						}lf-width">
					<div id="example2-card-cvc" class="input empty"></div>
					<label for="example2-card-cvc" data-tid="elements_examples.form.card_cvc_label">CVC</label>
					<div class="baseline"></div>
					</div>
				</div>
				<button type="submit" data-tid="elements_examples.form.pay_button">Pay &euro;<?php echo $price ;?></button>
				<div class="error" role="alert"><svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17">
					<path class="base" fill="#000" d="M8.5,17 C3.80557963,17 0,13.1944204 0,8.5 C0,3.80557963 3.80557963,0 8.5,0 C13.1944204,0 17,3.80557963 17,8.5 C17,13.1944204 13.1944204,17 8.5,17 Z"></path>
					<path class="glyph" fill="#FFF" d="M8.5,7.29791847 L6.12604076,4.92395924 C5.79409512,4.59201359 5.25590488,4.59201359 4.92395924,4.92395924 C4.59201359,5.25590488 4.59201359,5.79409512 4.92395924,6.12604076 L7.29791847,8.5 L4.92395924,10.8739592 C4.59201359,11.2059049 4.59201359,11.7440951 4.92395924,12.0760408 C5.25590488,12.4079864 5.79409512,12.4079864 6.12604076,12.0760408 L8.5,9.70208153 L10.8739592,12.0760408 C11.2059049,12.4079864 11.7440951,12.4079864 12.0760408,12.0760408 C12.4079864,11.7440951 12.4079864,11.2059049 12.0760408,10.8739592 L9.70208153,8.5 L12.0760408,6.12604076 C12.4079864,5.79409512 12.4079864,5.25590488 12.0760408,4.92395924 C11.7440951,4.59201359 11.2059049,4.59201359 10.8739592,4.92395924 L8.5,7.29791847 L8.5,7.29791847 Z"></path>
					</svg>
					<span class="message"></span></div>
				</form>
				<div class="success">
					<div class="icon">
						<svg width="84px" height="84px" viewBox="0 0 84 84" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
						<circle class="border" cx="42" cy="42" r="40" stroke-linecap="round" stroke-width="4" stroke="#000" fill="none"></circle>
						<path class="checkmark" stroke-linecap="round" stroke-linejoin="round" d="M23.375 42.5488281 36.8840688 56.0578969 64.891932 28.0500338" stroke-width="4" stroke="#000" fill="none"></path>
						</svg>
					</div>
					<h3 class="title" data-tid="elements_examples.success.title">Payment successful</h3>
					<p class="message"><span data-tid="elements_examples.success.message">Thanks for trying Stripe Elements. No money was charged, but we generated a token: </span><span class="token">tok_189gMN2eZvKYlo2CwTBv9KKh</span></p>
					<a class="reset" href="#">
						<svg width="32px" height="32px" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
						<path fill="#000000" d="M15,7.05492878 C10.5000495,7.55237307 7,11.3674463 7,16 C7,20.9705627 11.0294373,25 16,25 C20.9705627,25 25,20.9705627 25,16 C25,15.3627484 24.4834055,14.8461538 23.8461538,14.8461538 C23.2089022,14.8461538 22.6923077,15.3627484 22.6923077,16 C22.6923077,19.6960595 19.6960595,22.6923077 16,22.6923077 C12.3039405,22.6923077 9.30769231,19.6960595 9.30769231,16 C9.30769231,12.3039405 12.3039405,9.30769231 16,9.30769231 L16,12.0841673 C16,12.1800431 16.0275652,12.2738974 16.0794108,12.354546 C16.2287368,12.5868311 16.5380938,12.6540826 16.7703788,12.5047565 L22.3457501,8.92058924 L22.3457501,8.92058924 C22.4060014,8.88185624 22.4572275,8.83063012 22.4959605,8.7703788 C22.6452866,8.53809377 22.5780351,8.22873685 22.3457501,8.07941076 L22.3457501,8.07941076 L16.7703788,4.49524351 C16.6897301,4.44339794 16.5958758,4.41583275 16.5,4.41583275 C16.2238576,4.41583275 16,4.63969037 16,4.91583275 L16,7 L15,7 L15,7.05492878 Z M16,32 C7.163444,32 0,24.836556 0,16 C0,7.163444 7.163444,0 16,0 C24.836556,0 32,7.163444 32,16 C32,24.836556 24.836556,32 16,32 Z"></path>
						</svg>
					</a>
				</div>

				
			</div>
		</section>
   

	</main>
</div> 
</body>
<script src="../js/example2.js" data-rel-js></script>
<script>
$(document).ready(function(){
    $("#paynow").click(function(){
		$("#user_login_container").css("display", "none");
		$("#stripe_form_div").css("display", "block");
    });
    
});	

</script>
<?php include('../footer.php'); ?>
</html>
<?php } else { header('Location:sign_in.php'); }?>
