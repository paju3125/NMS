 
<?php

$con=mysqli_connect("localhost","root","","nms"); 


	$a= $_GET['ti'];
	 
	
	
	$query2= "delete from notice where Title='$a'";
	mysqli_query($con, $query2);

	
	echo '<div class="position-fixed top-0 right-0 p-3" style="z-index: 9999; right: 0; top: 80px;">
	<div class="toast show bg-success text-white" role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000">
	  <div class="toast-header bg-success text-white">
		<strong class="mr-auto"><i class="icofont-check-circled mr-2"></i>Success</strong>
		<button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
		  <span aria-hidden="true">&times;</span>
		</button>
	  </div>
	  <div class="toast-body">
		Notice Deleted Successfully!
	  </div>
	</div>
  </div>
  <script>
	setTimeout(function() {
	  window.location.href="notice1.php";
	}, 3000);
  </script>';
	
	

?>


 