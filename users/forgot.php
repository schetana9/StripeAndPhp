<body class="splash-index">
  <?php include("../header.php")?>
  <section class="teaser main-teaser bg-top">
    <div class="min-space">
    </div>
    <div class="min-space">
    </div>
    <div class="min-space">
    </div>
    <h1 class="sub-title">Reset Your Password
    </h1>
    <div class="min-space">
    </div>
    <div class="min-space">
    </div>
  </section>
  <div class="user-login-container">
    <div class="user-login-errors">
    </div>
    <div class="container">
      <?php
if(isset($_REQUEST['msg']))
{
$msg=$_REQUEST['msg'];
if($msg=="Invalid")
{
echo '<div class="err-msg">Please Enter the registered phone No</div>';
}
else if($msg=="success")
{
echo '<div class="succ-msg">Your Password details has send your Email</div>';		
}
}
else
$msg="";
?>
      <!--<div class="err-msg" id="err_id"><?php echo $msg;?></div>-->
    </div>
    <div class="container">
      <div class="min-space">
      </div>
      <div class="col-md-3">
      </div>
      <div class="col-lg-6 col-md-6 col-sm-6">
        <div class="container user-login">
          <h1 class="user-login__heading">Reset Your Password
          </h1>
          <p class="user-login__longform">Enter your registered phone no you signed up with and we&#39;ll send you password to your registered email.
          </p>
          <form class="form-large" action="javascript:forgot();" accept-charset="UTF-8" method="post">
            <input placeholder="Phone No" type="tel"   required="required" class="user-login__input user-login__input" name="phone_no" id="phone_no" />
            <input type="submit" value="Reset Password" class="user-login__action" />
          </form>
        </div>
      </div>
      <div class="col-md-3">
      </div>
    </div>
  </div>
  <?php include("../footer.php") ?>
  </html>
