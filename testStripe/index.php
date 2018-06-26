 <?php
	require_once "config.php"; // FOR THIS    "'.$stripeDetails['publishableKey'].'"
 ?>
<form action="stripeIPN.php" method="POST">
  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="pk_test_EH2XE0WQcaE485Ag8jlhIe4B"    
    data-amount="1000  	 "
    data-name="Rue2Aides By ADF"
    data-description="Widget"
    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
    data-locale="auto"
    data-currency="eur">
  </script>
</form>

 