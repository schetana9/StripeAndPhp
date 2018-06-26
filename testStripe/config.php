<?php

	require_once "stripe/init.php"; 
	$stripeDetails = array("secretKey" => "sk_test_hZTVGBzRhV9z4ZdVazj8Lm5L",
							"publishableKey"=>"pk_test_EH2XE0WQcaE485Ag8jlhIe4B");
	/*/*						
	$stripeDetails = array("secretKey" => "sk_live_5IauxvOfHdP8yEFT6XAiQXyL",
							"publishableKey"=>"pk_live_aHSf15pvgPihwPqGOP2sDFS8");						
			*/				
	
 	\Stripe\Stripe::setApiKey($stripeDetails['secretKey']);
	
 

?>