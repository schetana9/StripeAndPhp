 <?php
date_default_timezone_set("Asia/Kolkata");
include("../connection.php");
			
	?>
  <!-- /. NAV SIDE  -->
  <style>
.active a {
    background:rgba(0,0,0,0.3) none repeat scroll 0 0 !important;
    color: #000;
}
</style>
 <nav class="navbar-default navbar-side" role="navigation">
		<div id="sideNav" href="#"><i class="fa fa-caret-right"></i></div>
            <div class="sidebar-collapse">
                <ul class="mainmenu nav" >
	<li class="menuitem <?php if($page=='dashboard'){echo 'active';}?>" >
		<a href="dashboard.php"><span>Dashboard</span></a>
	</li>
	<li class="menuitem <?php if($page=='users'){echo 'active';}?>" >
		<a href="users.php"><span>Users</span></a>
	</li>  
	<li class="menuitem <?php if($page=='order'){echo 'active';}?>" >
		<a href="order.php"><span>Order</span></a>
	</li>  
	<li class="menuitem <?php if($page=='city'){echo 'active';}?>" >
		<a href="city.php"><span>City</span></a>
	</li>  
	<li class="menuitem <?php if($page=='services'){echo 'active';}?>" >
		<a href="services.php"><span>Services</span></a>
	</li> 
	<li class="menuitem <?php if($page=='services_sub'){echo 'active';}?>" >
		<a href="services_sub.php"><span>Services Sub category</span></a>
	</li> 
	<li class="menuitem <?php if($page=='cleaner'){echo 'active';}?>" >
		<a href="cleaner.php"><span>Become a Service Provider</span></a>
	</li> 
	<li class="menuitem <?php if($page=='pages'){echo 'active';}?>" >		
		<a href="pages.php"><span>Pages</span></a>			
	</li> 
	<li class="menuitem <?php if($page=='setting'){echo 'active';}?>" >		
		<a href="setting.php"><span>Setting</span></a>			
	</li> 
	<li class="menuitem <?php if($page=='change password'){echo 'active';}?>" >		
		<a href="change_pwd.php"><span>Change Password</span></a>			
	</li> 
	
	
</ul>
            </div>

  </nav>
      