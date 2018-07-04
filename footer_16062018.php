<?php
include("connection.php");
$res         = mysqli_fetch_array(mysqli_query($con,"select * from sv_admin_login"));
$admin_email = mysqli_real_escape_string($con,$res['email_id']);
$site_name   = mysqli_real_escape_string($con,$res['site_name']);
$logo        = mysqli_real_escape_string($con,$res['logo']);
$favicon     = mysqli_real_escape_string($con,$res['favicon']);
$site_desc   = mysqli_real_escape_string($con,$res['site_desc']);
$keyword     = mysqli_real_escape_string($con,$res['keyword']);
$site_url    = mysqli_real_escape_string($con,$res['site_url']);
?>

<footer class="footer">

  <div class="container">

    <div class="footer-content col-lg-3 col-md-3 col-sm-3 col-sm-4 col-lg-4">
      <h5 class="footer-content__title">Quick Links</h5>

      <ul class="footer-content__list">
        <li><a href="<?php
echo $res['site_url'];
?>">Accueil</a></li>
        <li><a href="<?php
echo $res['site_url'];
?>/users/howitworks.php">Comment ça marche</a></li>
        <li><a href="<?php
echo $res['site_url'];
?>/users/pricing.php">Tarifs</a></li>
        <li><a href="<?php
echo $res['site_url'];
?>/users/help.php">Support</a></li>
        <li><a href="<?php
echo $res['site_url'];
?>/users/order.php">Réservation</a></li>
      </ul>
    </div>

    <div class="footer-content col-lg-3 col-md-3 col-sm-3 col-sm-4 col-lg-4">
      <h5 class="footer-content__title">Services</h5>
      <ul class="footer-content__list">
        <li><a href="#">Services de la vie quotidienne</a></li>
        <li><a href="#">Services aux personnes</a></li>
        <li><a href="#">Services à la famille</a></li>
        <li><a href="#">Les metiers des aides à domicile</a></li>
        <li><a href="#">Les metiers de la vie quotienne</a></li>

      </ul>
    </div>
    
    
     <div class="footer-content col-lg-3 col-md-3 col-sm-3 col-sm-4 col-lg-4">
      <h5 class="footer-content__title">Mobile app</h5>
      <ul class="footer-content__list">
     <a href="#"><img style="margin-bottom:10px;" src="<?php
echo $res['site_url'];
?>/img/app1.png"></a>
          <a href="#"><img src="<?php
echo $res['site_url'];
?>/img/app2.png"></a>

        </ul>
    </div>
    

    <div class="footer-content col-lg-3 col-md-3 col-sm-3 col-sm-4 col-lg-4">
      <div class="footer-content__social social">
          <h5 class="footer-content__title">Find us online</h5>

          <a class="social__action" href="#">
            <i class="fa fa-facebook" aria-hidden="true"></i></a>
          <a class="social__action" href="#">
           <i class="fa fa-google-plus" aria-hidden="true"></i></a>
           <a class="social__action" href="#">
           <i class="fa fa-twitter" aria-hidden="true"></i></a>
         </div>

      <div class="mobile-app">
          <h5 class="footer-content__title">Mode de paiement:</h5>
          <img src="<?php
echo $res['site_url'];
?>/img/visa.png" alt="Visa" />
          <img src="<?php
echo $res['site_url'];
?>/img/mastercard.png" alt="Mastercard" />
          <img src="<?php
echo $res['site_url'];
?>/img/american_express.png" alt="American express" />
          <img src="<?php
echo $res['site_url'];
?>/img/paypal.png" alt="Paypal" />
      </div>
    </div>
  </div>

  <div class="footer__copyright container">
    <p>
Copyright &#169; 2018 Rue2Aides. Designed By <a href="http://sangvish.com/" target="_blank">Aide à Domicile à la Famille (ADF)</a>
    </p>
  </div>
</footer>
 