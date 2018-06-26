<body class="splash-index">
  <?php include("../header.php") ?>
  <section class="teaser main-teaser bg-top" >
    <div class="min-space">
    </div>
    <div class="min-space">
    </div>
    <div class="min-space">
    </div>
    <?php 
$query=mysql_fetch_array(mysql_query("select * from sv_pages where id=2"));
$content=$query['page_content'];
$page_name=$query['page_name'];
?>
    <h1 class="sub-Tittle">
      <?php echo $page_name; ?>
    </h1>
    <div class="min-space">
    </div>
    <div class="min-space">
    </div>
  </section>
  <?php echo $content;?>
  <?php include("../footer.php") ?>
  </html>
