<?php include("../connection.php");
@session_start();
if(!isset($_SESSION['user_nam']))
	header("Location:index.php");
else
{		
	$user_name=mysqli_real_escape_string($con,$_SESSION['user_nam']);			
	$res=mysqli_fetch_array(mysqli_query($con,"select * from sv_admin_login where user_name='$user_name'"));
	$uname=mysqli_real_escape_string($con,$res['user_name']);
}	
$page = 'order';
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<body>
    <div id="wrapper">
        <?php include("top_menu.php") ?>
        <!--/. NAV TOP  -->
        <?php include("side_menu.php") ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
		  <div class="header"> 
                        <h1 class="page-header">
                            Order Details
                        </h1>
						<ol class="breadcrumb">
					  <li><a href="#">Home</a></li>
					  <li><a href="#">Order</a></li>
					</ol>		
		</div>
            <div id="page-inner">
<?php
if(isset($_REQUEST['msg']))
	$msg=$_REQUEST['msg'];
else
	$msg="";
?>
<div class="err" style="color:red" id="err_id"><?php echo $msg;?></div>	
		
            <div id="page-inner"> 
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Orders
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                           <th>Sno</th>										   
										   <th>User_Name</th>
											<th>Phone_No</th>
											<th>City</th>
											<th>Address</th>
											<th>Services</th>
											<th>Sub_Services</th>
											<th>Order_ID</th>
											<th>Order_Date</th>											
											<th>Order_Time</th>
											<th>Requirement</th>
											<th>Price</th>
											<th>Payment_mode</th>
											<th>Payment_status</th>
											<th>Currency_code</th>
                                        </tr>
                                    </thead>
									<tbody>
									<?php
									$sno=0;
									$res=mysqli_query($con,"select * from sv_user_order ORDER BY order_id DESC");
									while($row=mysqli_fetch_array($res))
									{
										$sno++;
										$phone_no=mysqli_real_escape_string($con,$row['phone_no']);
										$services_id=mysqli_real_escape_string($con,$row['services']);
										$sub_services_id=mysqli_real_escape_string($con,$row['sub_services']);
										$order_date=mysqli_real_escape_string($con,date("d-m-Y",strtotime($row['date'])));
										$query=mysqli_fetch_array(mysqli_query($con,"select * from sv_user_profile where phone_no='$phone_no'"));
										$services=mysqli_fetch_array(mysqli_query($con,"select * from sv_services where services_id='$services_id'"));
										$sub_services=mysqli_fetch_array(mysqli_query($con,"select * from sv_services_sub where sid='$sub_services_id'"));
										$city_id=mysqli_real_escape_string($con,$row['city_name']);
										$city=mysqli_fetch_array(mysqli_query($con,"select * from sv_city where city_id='$city_id'"));

									?>										
										<tr>
											<td><?php echo $sno; ?></td>
											<td><?php echo $query['name'];?></td>
											<td><?php echo $row['phone_no']; ?></td>
											<td><?php echo $city['city_name']; ?></td>
											<td><?php echo $row['address']; ?></td>
											<td><?php echo $services['services_name']; ?></td>
											<td><?php echo $sub_services['services_sub_name']; ?></td>
											<td><?php echo $row['order_id'];?></td>
											<td><?php echo $order_date; ?></td>
											<td><?php echo $row['order_time']; ?></td>
											<td><?php echo $row['requirement']; ?></td>
											<td><?php echo $row['price']; ?></td>
											<td><?php echo $row['payment_mode']; ?></td>
											<td><?php echo $row['payment_status']; ?></td>
											<td><?php echo $currency_code; ?></td>
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
