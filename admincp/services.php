<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php include("../connection.php"); ?>
<?php 
if(isset($_REQUEST['services_id']))
	{		
		$services_id=$_REQUEST['services_id'];
		$res=mysqli_query($con,"select * from sv_services where services_id='$services_id'");
		$row=mysqli_num_rows($res);
		if($row==0)
	 	{
		  $services_id="";
		  $services_name="";
		  $service_img="";
		  $typ="add";
		  
		}
		else
		{			
			$fet=mysqli_fetch_array($res);	
			$services_name=mysqli_real_escape_string($con,$fet['services_name']);	
			$service_img=mysqli_real_escape_string($con,$fet['service_img']);			
			$typ="update";
		}		
	}
	else
	{
		$services_id="";
		$services_name="";
		$service_img="";
		$typ="add";
	}
	$page = 'services';
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
                            Services 
                        </h1>
						<ol class="breadcrumb">
					  <li><a href="#">Home</a></li>
					  <li><a href="#">Services</a></li>
					</ol>		
		</div>
		
            <div id="page-inner">
			    <div class="panel-body">
				<div class="text-center">
				<?php
if(isset($_REQUEST['msg']))
{
	$msg=$_REQUEST['msg'];
		if($msg=="Inserted")
		{
		      echo '<div class="succ-msg">Inserted Successfully.</div>';
		}
		else if($msg=="Updated")
		{
		    echo '<div class="succ-msg">Updated Successfully</div>';		
		}	
		else if($msg=="Deleted")
		{
		    echo '<div class="succ-msg">Deleted Successfully</div>';		
		}
}
else
	$msg="";
?>

<!--<div class="err-msg" id="err_id"><?php echo $msg;?></div>-->
	</div>
			<form class="" name="service_s" id="service_s" method="post" enctype="multipart/form-data" action="services_add.php">
			<input type="hidden" id="typ" name="typ" value="<?php echo $typ;?>">
			<input type="hidden" id="hid" name="hid" value="<?php echo $services_id;?>">
					<div class="col-lg-3 col-md-3 col-sm-3"></div>
				<div class="col-lg-6 col-md-6 col-sm-6 table-bg">
                <div class="col-lg-6 col-md-6 col-sm-6">
					<div class="form-group">
					<label>services Name</label>	
				</div>					
					<input type="text" required="required" id="sname" class="form-control" name="sname" value="<?php echo $services_name;?>">
					<div class="err" id="sname_err"></div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6">					
					<div class="form-group">
						<label>Services Image</label>	
					</div>
						
						<input type="file" id="service_img" class="form-control" name="service_img" value="<?php echo $service_img;?>">
						<?php if(isset($_REQUEST['services_id'])) { ?>
						<?php
						if($service_img=="") { } else { ?>						
						<img class="img-responsive sv_service_img" src="admin-logo/<?php echo $service_img;?>" >
						<?php } }?>
						<div class="err"  id="service_img_err"></div>
				</div>
				</div>
				
				<div class="col-lg-12 col-md-12 col-sm-12 text-center" >
					<?php if(isset($_REQUEST['services_id'])) { ?>
					<button type="button" class="btn btn-primary" onclick="javascript:services_funct()">Update</button>
					<?php } else { ?>
					<button type="button"  class="btn btn-primary" onclick="javascript:services_funct()">Add</button>
					<?php } ?>
				</div>
				
					
					<div class="col-lg-3 col-md-3 col-sm-3"></div>
					</div>
			</form>
		
            <div id="page-inner"> 
               
            <div class="row">
                <div class="col-md-12">
				
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Services
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>SNo</th>
											<th>services Name</th>
											<th>Services Image</th>
											<th>Update</th>
											<th>Delete</th>	
                                        </tr>
                                    </thead>
									<tbody>
									<?php
										$sno=0;
										$res=mysqli_query($con,"select * from sv_services ORDER BY services_id DESC");
										while($row=mysqli_fetch_array($res))
										{
											$sno++;
											$services_id=mysqli_real_escape_string($con,$row['services_id']);				
											$services_name=mysqli_real_escape_string($con,$row['services_name']);	
											$service_img=mysqli_real_escape_string($con,$row['service_img']);
									?> 
									
										<tr>
											<td><?php echo $sno; ?></td>
											<td><?php echo $services_name; ?></td>
											<td><img class="img-responsive sv_service_img" src="admin-logo/<?php echo $service_img;?>" ></td>
											<td><a href="services.php?services_id=<?php echo $services_id;?>"><img src="images/file_edit.png"  alt="update" title="update" ></a></td>
											<td><a href="javascript:services_del('<?php echo $services_id;?>');"><img src="images/delete.png" alt="" title="delete"></a></td>
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
