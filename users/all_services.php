  <body class="splash-index">
        <?php include("../header.php") ?>
    

<section class="teaser bg-top ">
<div class="min-space"></div>
<div class="min-space"></div>
<div class="min-space"></div>
<h1 class="sub-title">Tous nos services</h1>
<div class="min-space"></div>
<div class="min-space"></div>
</section>


<section id="trustandsecurity-teaser" class="teaser" style="background:url(img/slide.jpg);padding:50px;">
<div class="container">
<?php 
 include("../connection.php");
    $res1=mysql_query("select * from sv_services");
    while($row1=mysql_fetch_array($res1))
    {
                    $services_name=mysql_real_escape_string($row1['services_name']);    
                    $service_img=mysql_real_escape_string($row1['service_img']);
            ?>
            <ul class="ser-img">
        <li class="col-md-3 col-sm-3 col-lg-3 home_icon" ><img src="../admincp/admin-logo/<?php echo $service_img;?>">
        <p class="ser-img-title"><?php echo $services_name; ?></p></li>
        </ul>
            <?php } ?>
 </div>
</section>

<?php include("../footer.php") ?>

     
  </body>

</html>
