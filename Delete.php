 
<?php

$con=mysqli_connect("localhost","root","","nms"); 


	$a= $_GET['ti'];
	 
	
	
	$query2= "delete from notice where Title='$a'";
	mysqli_query($con, $query2);

	
	echo "
	<script>
	alert('Notice is Deleted Successfully');
	window.location.href='Notice1.php';
	</script>";
	
	

?>


 