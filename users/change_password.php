<?php $page = 'change password'; ?>
<?php 
@session_start();
if(isset($_SESSION['phone_no']))
{
?>
<body class="splash-index">
  <?php include("../header.php")?>
  <section class="teaser main-teaser bg-top">
    <div class="min-space">
    </div>
    <div class="min-space">
    </div>
    <div class="min-space">
    </div>
    <h1 class="sub-title">Changer le mot de passe
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
if($msg=="Success")
{
echo '<div class="succ-msg">Le mot de passe a été changé avec succès</div>';
}
else if($msg=="Invalid")
{
echo '<div class="err-msg">Enter valid current password</div>';
}		
}
else
$msg="";
?>
    </div>
    <div class="container">
      <div class="col-lg-3 col-md-3 col-sm-3">
        <h3>
        </h3>
        <?php include("side_menu.php") ?>
      </div>
      <div class="col-lg-9 col-md-9 col-sm-9">
        <div class="user-login">
          <h1 class="user-login__heading">Changer le mot de passe</h1>
         <!-- <form class="form-large" action="javascript:change_pwd();" accept-charset="UTF-8" method="post">-->
            <input placeholder="Enter Current Password" type="password" required="required" class="user-login__input user-login__input--password" name="cur_pwd" id="cur_pwd" >
			<div id="curpwd1" class="err" ></div>
            <input placeholder="Enter New Password"  required="required" class="user-login__input user-login__input--password" type="password" name="new_pwd" id="new_pwd">
            <div id="newpwd1" class="err" ></div>
            <input placeholder="Enter Confirm Password" required="required" class="user-login__input user-login__input--password" type="password" name="confirm_pwd" id="confirm_pwd" onblur="javascript:passcheck(this.value);" />
           	<div id="conpwd1" class="err" ></div>          
			<button type="submit" class="user-login__action" onclick="javascript:change_pwd()">Set New Password</button>
         <!--   <input type="submit" value="Set New Password" class="user-login__action" >
		 </form>-->
        </div>
      </div>
    </div>
  </div>
  </div>
<?php include("../footer.php") ?>
</body>
</html>
<?php } else { header('Location:sign_in.php'); }?>