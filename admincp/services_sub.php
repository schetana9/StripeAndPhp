<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php include("../connection.php"); ?>
<?php 
if(isset($_REQUEST['sub_id']))
	{		
		$sub_id=$_REQUEST['sub_id'];
		$res=mysqli_query($con,"select * from sv_services_sub where sid='$sub_id'");
		$row=mysqli_num_rows($res);
		if($row==0)
	 	{
		  $services_id="";
		  $services_name="";
		  $sub_sname="";
		   $price="";
		}
		else
		{			
			$fet=mysqli_fetch_array($res);	
			$sname=mysqli_real_escape_string($con,$fet['services_name']);	
			$services_id=mysqli_real_escape_string($con,$fet['sid']);
			$query=mysqli_fetch_array(mysqli_query($con,"select * from sv_services where services_id='$sname'"));
			$services_name=mysqli_real_escape_string($con,$query['services_name']);
			$sub_sname=mysqli_real_escape_string($con,$fet['services_sub_name']);
			$price=mysqli_real_escape_string($con,$fet['price']);
		}		
	}
	else
	{
		$services_id="";
		$services_name="";
		$sub_sname="";
		 $price="";
	}
	$page = 'services_sub';

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
                            Sub Services
                        </h1>
						<ol class="breadcrumb">
					  <li><a href="#">Home</a></li>
					  <li><a href="#">Sub Services</a></li>
					</ol>		
		</div>
		<input type="hidden" id="hid" name="hid" value="<?php echo $sub_id;?>">
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

					<div class="col-lg-3 col-md-3 col-sm-3"></div>
				<div class="col-lg-6 col-md-6 col-sm-6 table-bg">
                <div class="col-lg-6 col-md-6 col-sm-6">
					<div class="form-group">
					<label>services Name</label>	
				</div>					
				<select id="sname" class="form-control" required>
					<option value="">select services</option>
					<?php		
						$res=mysqli_query($con,"select * from sv_services");
						while($row=mysqli_fetch_array($res))
						{
					?>
					<option value="<?php echo $row['services_id'];?>" <?php if(isset($_REQUEST['sub_id'])) {if($sname==$row['services_id']) echo "selected='selected'";} ?>> <?php echo $row['services_name'];?> </option>
					<?php
						}
					?>
				</select>
				<div class="err" id="sname_err"></div>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6">
					<div class="form-group">
					<label>Sub Services</label>	
				</div>					
					<input type="text" id="sub_sname" required="required" class="form-control" name="sub_sname" value="<?php echo $sub_sname; ?>">
				<div class="err" id="sub_name_err"></div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6">
					<div class="form-group">
					<label>Price</label>	
				</div>					
					<input type="text" id="price" required="required" class="form-control" name="price" value="<?php echo $price; ?>">
					<div class="err" id="price_err"></div>
				</div>
				</div>

				<div class="col-lg-12 col-md-12 col-sm-12 text-center" >
					<?php if(isset($_REQUEST['sub_id'])) { ?>
					<button type="button" class="btn btn-primary" onclick="javascript:services_sub_funct('update')">Update</button>
					<?php } else { ?>
					<button type="button"  class="btn btn-primary" onclick="javascript:services_sub_funct('add')">Add</button>
					<?php } ?>
				</div>
					<div class="col-lg-3 col-md-3 col-sm-3"></div>
					</div>
		
		
            <div id="page-inner"> 
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Sub Services
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>SNo</th>
											<th>services Name</th>
											<th>Sub services Name</th> 
											<th>Price</th>
											<th>Update</th>
											<th>Delete</th>	
                                        </tr>
                                    </thead>
									<tbody>
									<?php
										$sno=0;
										$res=mysqli_query($con,"select * from sv_services_sub order by sid DESC");
										while($row=mysqli_fetch_array($res))
										{
											$sno++;
											$services_id=mysqli_real_escape_string($con,$row['sid']);				
											$sname=mysqli_real_escape_string($con,$row['services_name']);	
											$query=mysqli_fetch_array(mysqli_query($con,"select * from sv_services where services_id='$sname'"));
											$services_name=mysqli_real_escape_string($con,$query['services_name']);	
											$sub_sname=mysqli_real_escape_string($con,$row['services_sub_name']);
									?> 
									
										<tr>
											<td><?php echo $sno; ?></td>
											<td><?php echo $services_name; ?></td>
											<td><?php echo $sub_sname; ?></td>
											<td><?php echo $row['price']; ?></td>
											<td><a href="services_sub.php?sub_id=<?php echo $services_id;?>"><img src="images/file_edit.png"  alt="update" title="update" ></a></td>
											<td><a href="javascript:services_sub_del('<?php echo $services_id;?>');"><img src="images/delete.png" alt="" title="delete"></a></td>
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
         
</body>


</html>
