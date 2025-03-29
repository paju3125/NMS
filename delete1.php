 
<?php

$con=mysqli_connect("localhost","root","","nms"); 


	$a= $_GET['em'];
	 
	
	
	$query2= "delete from feed where Email='$a'";
	mysqli_query($con, $query2);

	
	echo "
	<script>
	alert('Feedback is Deleted Successfully');
	window.location.href='feed1.php';
	</script>";
	
	

?>