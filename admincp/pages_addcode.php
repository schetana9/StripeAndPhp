<?php
include('../connection.php');
$pname=$_POST['pname'];

$type=$_POST['typ'];
if($type=='add')
{	
	/*if(mysqli_query($con,"insert into sv_pages(page_name)values('$pname')"))
		echo "Inserted";
	else
		echo "Server Error";
		header("Location:pages.php");*/

}
else if($type=='update')
{
	$page_content=mysqli_real_escape_string($con,$_POST['page_content']);
	$id=$_POST['id'];
		mysqli_query($con,"update sv_pages set page_name='$pname', page_content='$page_content' where id='$id'");
		//echo "Updated";
		?>
		<script type="text/javascript">
		var msg="Updated";
		window.location="pages.php?msg="+msg;				
		</script>
<?php		
}


?>