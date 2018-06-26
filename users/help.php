<body class="splash-index">
  <?php include("../header.php") ?>
  <section class="teaser main-teaser bg-top">
    <div class="min-space">
    </div>
    <div class="min-space">
    </div>
    <?php 
$query=mysql_fetch_array(mysql_query("select * from sv_pages where id=4"));
$content=$query['page_content'];
$page_name=$query['page_name'];
?>
    <div class="min-space">
    </div>
    <h1 class="sub-title">Support
    </h1>
    <div class="min-space">
    </div>
    <div class="min-space">
    </div>
  </section>
  <link href="http://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
  <script src="http://code.jquery.com/jquery-1.10.2.js">
  </script>
  <script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js">
  </script>
  <script>
    $(function() {
      $( "#accordion-1" ).accordion();
    }
     );
  </script>
  <style>
    #accordion-1{
      font-size: 14px;
    }
  </style>
  <?php echo $content;?>
  <div class="min-space">
  </div>
  <?php include("../footer.php") ?>
  </html>
