<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php include("../connection.php"); ?>
<?php 
if(isset($_REQUEST['uid']))
	{		
		$uid=$_REQUEST['uid'];
		$res=mysqli_query($con,"select * from sv_user_profile where signup_id='$uid'");
		$row=mysqli_num_rows($res);
		if($row==0)
	 	{
		  $signup_id="";
		  $name="";
		  $phone_no="";
		  $city="";
		  $address="";		  
		  $email="";
		  $pin_code="";	 
			$gender="";
		}
		else
		{			
			$fet=mysqli_fetch_array($res);	
			$name=mysqli_real_escape_string($con,$fet['name']);	
			$phone_no=mysqli_real_escape_string($con,$fet['phone_no']);	
			$city=mysqli_real_escape_string($con,$fet['city']);	
			$address=mysqli_real_escape_string($con,$fet['address']);	
			$email=mysqli_real_escape_string($con,$fet['email_id']);	
			$pin_code=mysqli_real_escape_string($con,$fet['pin_code']);	
			$gender=mysqli_real_escape_string($con,$fet['gender']);	
		}		
	}
	else
	{
		$signup_id="";
		$name="";
		$phone_no="";
		$city="";
		$address="";		  
		$email="";
		$pin_code="";
		$gender="";
	}
	$page = 'users';

?>

<body>
    <div id="wrapper">
        <?php include("top_menu.php") ?>
        <!--/. NAV TOP  -->
		      
        <?php include("side_menu.php") ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
		
		  <div class="header"> 
                        <h1 class="page-header">
                            User Details
                        </h1>
						<ol class="breadcrumb">
					  <li><a href="#">Home</a></li>
					  <li><a href="#">User</a></li>
					  
					</ol>		
		</div>
              <input type="hidden" id="hid" name="hid" value="<?php echo $uid;?>">
            <div id="page-inner">
			    <div class="panel-body">
				<div class="text-center">
				<?php
if(isset($_REQUEST['msg']))
{
	$msg=$_REQUEST['msg'];
		if($msg=="Updated")
		{
		      echo '<div class="succ-msg">Updated Successfully.</div>';
		}
		else if($msg=="Deleted")
			{
		      echo '<div class="succ-msg">Deleted Successfully</div>';		
			}
}
else
	$msg="";
?>
				<!--	<div class="err-msg" id="err_id"><?php echo $msg;?></div>	</div>-->
							<?php if(isset($_REQUEST['uid'])) { ?>
			<form class="form-large" action="javascript:user_funct('update')" accept-charset="UTF-8" method="post">
				<div class="col-lg-2 col-md-2 col-sm-2"></div>
				<div class="col-lg-8 col-md-8 col-sm-8 table-bg">
                <input type="hidden" id="hid" name="hid" value="<?php echo $uid;?>">

				<div class="col-lg-4 col-md-4 col-sm-4" >
					<div class="form-group">
						<label>User Name</label>				
					</div>
					<input type="text" id="name" required="required" class="form-control" name="name" value="<?php echo $name;?>">
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4">
					<div class="form-group">
					<label>Email Id</label>	
				</div>					
					<input type="email" id="email_id" required="required" class="form-control" name="email_id" value="<?php echo $email;?>">
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4">
					<div class="form-group">
					<label>Phone No</label>	
				</div>					
					<input type="text" id="phone_no" required="required" class="form-control" name="phone_no" value="<?php echo $phone_no;?>">
				</div>
				
				<div class="col-lg-4 col-md-6 col-sm-4" >
					<div class="form-group">
					<label>City</label>	
				</div>					
					<input type="text" id="city" required="required" class="form-control" name="city" value="<?php echo $city;?>">
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4" >
					<div class="form-group">
					<label>Address</label>	
				</div>					
					<input type="text" id="address" required="required" class="form-control" name="address" value="<?php echo $address;?>">
				</div>
				<div class="col-lg-4 col-md-4 col-sm-4" >
					<div class="form-group">
					<label>Pin Code</label>	
				</div>					
					<input type="text" id="pin_code" required="required" class="form-control" name="pin_code" value="<?php echo $pin_code;?>">
				</div>	
				<div class="col-lg-4 col-md-4 col-sm-4">
					<div class="form-group">
					<label>Gender</label>	
				</div>				
				<select id="gender" class="form-control" required="required" > 
					<option value="">select gender</option>	
					<option value="1" <?php { if($gender=="1") echo "selected='selected'"; }?>>male</option>
					<option value="2" <?php { if($gender=="2") echo "selected='selected'"; }?>>female</option>
				</select>
				</div>	
				<div class="col-lg-4 col-md-4 col-sm-4">
					<button type="submit" class="btn btn-primary user" onclick="">Update</button>
					</div>
					</div>
					</form>
					<?php } ?>
				</div>
				<div class="col-lg-2 col-md-2 col-sm-2"></div>
				</div>
			

            <div id="page-inner"> 
               
			  
			   
			   
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Users
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover"  id="dataTables-example">
                                    <thead>
                                        <tr>
                                           <th>Sno</th>
											<th>User Name</th>
											<th>Email Id</th>
											<th>Phone No</th>
											<th>City</th>
											<th>Address</th>
											<th>Pin code</th>
											<th>Gender</th>
											<th>Update</th>
											<th>Delete</th>
                                        </tr>
                                    </thead>
									<tbody>
									<?php		
									$sno=0;
									$res=mysqli_query($con,"select * from sv_user_profile ORDER BY signup_id DESC");
									while($row=mysqli_fetch_array($res))
									{
										$sno++;
										$signup_id=$row['signup_id'];
										$name=$row['name'];
										$gender=mysqli_real_escape_string($con,$row['gender']);
										if($gender==1)
											$gender="male";
										else if($gender==2)
											$gender="female";										
									?>
									
										<tr>
											<td><?php echo $sno; ?></td>
											<td><?php echo $name; ?></td>
											<td><?php echo $row['email_id']; ?></td>
											<td><?php echo $row['phone_no']; ?></td>
											<td><?php echo $row['city']; ?></td>
											<td><?php echo $row['address']; ?></td>
											<td><?php echo $row['pin_code']; ?></td>
											<td><?php echo $gender; ?></td>
											<td><a href="users.php?uid=<?php echo $signup_id;?>"><img src="images/file_edit.png"  alt="update" title="update" ></a></td>
											<td><a href="javascript:user_del('<?php echo $signup_id;?>');"><img src="images/delete.png" alt="" title="delete"></a></td>
										</tr>
										<?php } ?>		
									</tbody>
															
                                </table>
                            </div>
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
                <!-- /. ROW  -->
                   </div>
				   				<?php include("footer.php") ?>

    </div>
             <!-- /. PAGE INNER  -->
            </div>
 
</body>


</html>
