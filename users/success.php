gr
<?php
include ('../connection.php');
 include("../header.php");
?>
<section class="teaser bg-top ">
 <div class="min-space"></div><div class="min-space"></div><div class="min-space"></div>
 <h3 class="sub-title">Payment Success</h3>
<div class="min-space"></div>
<div class="min-space"></div>
</section>
<?php
//Store transaction information from PayPal
$item_number = $_GET['item_number']; 
$txn_id = $_GET['tx'];
$payment_gross = $_GET['amt'];
$currency_code = $_GET['cc'];
$payment_status = $_GET['st'];

//$result=mysqli_fetch_array(mysqli_query($con,"select * from sv_user_order where order_id='$item_number'"));
//$productPrice = $result['price'];
//if(!empty($txn_id) && $payment_gross == $productPrice){
   	mysqli_query($con,"update sv_user_order set payment_status='completed',currency_code='$currency_code' where order_id='$item_number'");
?>
<div class="min-space"></div>
	<div class="container text-center">
	<h1>Your payment has been successful.</h1>
    <h1>Your Payment ID - <?php echo $item_number; ?>.</h1>
	</div>
	<div class="min-space"></div>

<?php include("../footer.php")?>