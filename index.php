 <?php 
/* Version : 3.0 (010418)  */
 include("header.php"); 
    include('connection.php');
    ?>

<script src="http://code.jquery.com/jquery-1.9.1.js"></script>

  <body class="index-index splash splash-video">

<section id="main-teaser" class="teaser">
  <div class="hv-video-container" >
   <img class="home-bg" src="img/home-img.jpg">
</div>


  <div class="main-teaser-content">
  <div class="container">
  <div class="min-space"></div>
  <div class="min-space"></div>
  <div class="min-space"></div>
    <div class="teaser-content">
    
      <h1 style="text-transform:uppercase;">VOTRE PROFESSIONNEL LOCAL <br /></h1>
      <br>
        <span class="mbl-cnt">Réservez tous vos services à domicile en un clic <br>
Les services à la personne est notre metier!<br /></span>
      
      <div class="container">

      <div class="signup inline-submit">
        <form class="new_bid" id="booking_form" action="users/order.php" accept-charset="UTF-8" data-remote="true" method="post"><input name="utf8" type="hidden" value="&#x2713;" />
            <div class="row home-form">
             <div class="min-space"></div>

                <div class="col-md-4  col-sm-4">				
                    <select required="required" id="City" name="City" class="service"> 
                        <option value="">Votre departement</option>
                            <?php        
                                $res=mysql_query("select * from sv_city order by city_id");
                                while($row=mysql_fetch_array($res))
                                {
                                    $city_id=mysql_real_escape_string($row['city_id']);
                                    $cname=mysql_real_escape_string($row['city_name']);            
                            ?>
                            <option value="<?php echo $row['city_name'];?>"><?php echo $cname;?></option>
                            <?php
                                }
                            ?>
                    </select>  
						<div class="err" id="city_err"></div>				
                </div>
                <div class="col-md-4  col-sm-4">				
                    <select required="required" id="services" name="services" class="service"> 
                        <option value="">Sélectionner votre service</option>
                        <?php        
                            $res=mysql_query("select * from sv_services order by services_id");
                            while($row=mysql_fetch_array($res))
                            {
                                $services_id=mysql_real_escape_string($row['services_id']);
                                $sname=mysql_real_escape_string($row['services_name']);            
                        ?>
                        <option value="<?php echo $row['services_id'];?>"><?php echo $row['services_name'];?></option>
                        <?php
                            }
                        ?>
                    </select>
						<div class="err" id="services_err"></div>
                </div>    
                <div class="col-md-4 col-sm-4">
                <!--<input type="submit" name="commit" value="Book Now" class="btn-primary signup__button booknow " data-checkpostcode="true" />-->
				<button type="button" class="btn-primary signup__button sv_booknow" onclick="javascript:booking_function(this.value);">Réservez</button>
                </div>
        </div>
    </form>
</div>
</div>
</div>
    
    
    <div class="min-space"></div>
    <div class="min-space"></div>
     <div class="min-space"></div>
  </div>
  </div>
</section>

<section id="benefit-teaser" class="teaser">
     <div class="min-space"></div>
<h2>Les services que nous offrons</h2>
<div class="container">
<div class="col-lg-12">
            <?php 
                $res1=mysql_query("select * from sv_services ORDER BY services_id ASC limit 0,4");
                $numrow=mysql_num_rows($res1);
                while($row1=mysql_fetch_array($res1))
                {
                    $services_name=mysql_real_escape_string($row1['services_name']);    
                    $service_img=mysql_real_escape_string($row1['service_img']);
            ?>
            <ul class="ser-img">
        <li class="col-md-3 col-sm-3"><img src="admincp/admin-logo/<?php echo $service_img;?>">
        <p class="ser-img-title"><?php echo $services_name; ?></p></li>
        </ul>
            <?php } ?>
        
    </div>
    
</div>    
 <div class="min-space"></div>
<?php 
$res2=mysql_query("select * from sv_services ORDER BY services_id ASC");
$numrow=mysql_num_rows($res2);
if($numrow>='5')
{
?>
<a href="users/all_services.php" target="_blank" style="background-color:#66bb6a;color:#fff;padding:10px;">Plus</a>
<?php } ?>
<div class="min-space"></div>
</section>



<?php 
$query=mysql_fetch_array(mysql_query("select * from sv_pages where id=1"));
$content=$query['page_content'];
$page_name=$query['page_name'];
?>
<?php echo $content;?>





<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>

   <?php include("footer.php") ?>
    
    <div id="no-support" class="modal fade">
 </div>
   
  </body>

</html>
