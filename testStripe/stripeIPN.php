<?php
   
	require_once "config.php"; // FOR THIS    "'.$stripeDetails['publishableKey'].'"
 
 //	\Stripe\Stripe::setVerifySslCerts(verify:false );
 
$token = $_POST['stripeToken'];
$email = $_POST['stripeEmail'];
$tokenType = $_POST['stripeTokenType'];

 
 if(!isset($token)){
	 header( "Location: index.php");
	 exit();
 }
$charge = \Stripe\Charge::create([
    'amount' => 999,
    'currency' => 'eur',
    'description' => 'Example charge',
    'source' => $token,
    'statement_descriptor' => 'Custom descriptor',
]);

if(isset($charge )){
	 header( "Location: success.php");
	 exit();
}
?>
 
 