


<nav class="navbar navbar-default sidebar" role="navigation">
    <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>      
    </div>
    <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
      <ul class="nav navbar-nav side-bar">
        	<li class="menuitem <?php if($page=='dashboard'){echo 'active';}?>" >
				<a href="dashboard.php">Dashboard<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>
		
        <li class="menuitem <?php if($page=='post your order'){echo 'active';}?>">
		<a href="order.php">Post your Order<span style="font-size:16px;" class=""></span></a></li>
		
        <li class="menuitem <?php if($page=='edit profile'){echo 'active';}?>">
		<a href="edit-profile.php">Edit Profile<span style="font-size:16px;" class=""></span></a></li>
		
        <li class="menuitem <?php if($page=='change password'){echo 'active';}?>">
		<a href="change_password.php">Change password<span style="font-size:16px;" class=""></span></a></li>
		
		<li class="menuitem <?php if($page=='service provider'){echo 'active';}?>">
		<a href="apply.php">Become a Service Provider<span style="font-size:16px;" class=""></span></a></li>
		
        <li class="menuitem <?php if($page=='sign out'){echo 'active';}?>">
		<a href="logout.php">Sign out<span style="font-size:16px;" class=""></span></a></li>

	 </ul>
    </div>
  </div>
</nav>

