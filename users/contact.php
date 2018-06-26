<body class="splash-index">
  <?php include("../header.php") ?>
  <section class="teaser bg-top">
    <div class="min-space">
    </div>
    <div class="min-space">
    </div>
    <div class="min-space">
    </div>
    <?php 
$query=mysql_fetch_array(mysql_query("select * from sv_pages where id=5"));
$content=$query['page_content'];
$page_name=$query['page_name'];
?>
    <h1 class="sub-title">
      <?php echo $page_name; ?>
    </h1>
    <div class="min-space">
    </div>
    <div class="min-space">
    </div>
  </section>
  <div class="container">
    <?php
if(isset($_REQUEST['msg']))
{
$msg=$_REQUEST['msg'];
if($msg=="Inserted")
{
echo '<div class="succ-msg">Your Application send successfully. We will get back to you soon..</div>';
}
else if($msg=="Error")
{
echo '<div class="err-msg">Server Error</div>';		
}
}
else
$msg="";
?>
    <!--<div class="err-msg" id="err_id"><?php echo $msg;?></div>-->
  </div>
  <section class="teaser" style="margin-top:30px;">
    <form class="form-large" action="javascript:contact('add')" accept-charset="UTF-8" method="post">
      <div class="container apply_form">
        <div class="min-space">
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6">
          <div class="col-lg-12 col-md-12 col-sm-12">
            <span class="title">Votre nom
            </span>
            <input type="text" value="" required="required" class="user-login__input user-login__input" id="name" >
			<div class="err" id="name_err"></div>
          </div>
          <div class="col-lg-12 col-md-12 col-sm-12">
            <span class="title">Email
            </span>
            <input type="email" value="" required="required" class="user-login__input user-login__input" id="email" >
			<div class="err" id="email_err"></div>
          </div>
          <div class="col-lg-12 col-md-12 col-sm-12">
            <span class="title">Numéro de téléphone
            </span>
            <input type="text" value="" required="required" class="user-login__input user-login__input" id="pho_no" >
			<div class="err" id="pho_no_err"></div>
          </div>
          <div class="col-lg-12 col-md-12 col-sm-12">
            <span class="title">Message
            </span>
            <input type="text"  required="required" class="user-login__input user-login__input" id="msg">
			<div class="err" id="msg_err"></div>
          </div>
          <div class="col-lg-12 col-md-12 col-sm-12">
            <input type="submit" class="user-login__action" value="Envoyer">
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 address_map">
          <?php echo $content; ?>
        </div>
      </div>
    </form>
    <div class="min-space">
    </div>
  </section>
  <?php include("../footer.php") ?>
  <script src="../js/jquery-1.9.1.js">
  </script>
  <script src="../js/jquery-ui.js">
  </script>
  <link rel="stylesheet" href="../css/jquery-ui.css">
  <script>
    $(function(){
      $( "#datepicker" ).datepicker({
        dateFormat: 'dd-mm-yy'}
                                   );
    }
     );
  </script>
</body>
</html>
