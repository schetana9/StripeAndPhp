  <body class="splash-index">
        <?php include("../header.php") ?>
    

<section class="teaser bg-top ">
<div class="min-space"></div>
<div class="min-space"></div>
<div class="min-space"></div>
<?php 
$query=mysql_fetch_array(mysqli_query($con,"select * from sv_pages where id=3"));
$content=$query['page_content'];
$page_name=$query['page_name'];
?>
<h1 class="sub-title"><?php echo $page_name; ?></h1>
<div class="min-space"></div>
<div class="min-space"></div>
</section>

<?php echo $content;?>

<div class="min-space"></div>
<?php include("../footer.php") ?>

         
  </body>

</html>
