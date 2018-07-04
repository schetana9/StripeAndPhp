<?php
include('../connection.php');
require_once('../stripe-php-master/init.php');

	 print_r($_POST) ; die;
 
 	if($_POST['action'] == 'checkEmailalreadyexist') {
		$email = $_POST['email'];
		$email_exist =mysqli_query($con,"select * from sv_service_provider where email='$email'");
		$numrow_email_exist=mysqli_num_rows($email_exist);
		if($numrow_email_exist != 0)  echo 0; else echo 1;
 	}
	
	
	if($_POST['action'] == 'checkEmailalreadyexist') {
		$email = $_POST['email'];
	    $phone_exist	 =mysqli_query($con,"select * from sv_service_provider where mob_no='$mob_no'");
	    $numrow_phone_exist=mysqli_num_rows($phone_exist);
 
		if($numrow_email_exist != 0)  echo 0; else echo 1;
 	}



 if($numrow_phone_exist == 0)
 {
	  if($numrow_email_exist == 0)
	 {
		 
			}
			else  
				echo "EmailExist";
 		 }
		 else 
			echo "PhoneExist";
		 
 		echo "Inserted";	
	}
	
	else
		echo "Error";
?>
