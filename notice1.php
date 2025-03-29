
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Notice Board</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/gp.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: BizLand - v1.0.1
  * Template URL: https://bootstrapmade.com/bizland-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-none d-lg-flex align-items-center fixed-top">
    <div class="container d-flex">
      <div class="contact-info mr-auto">
        <i class="icofont-envelope"></i> <a href="mailto:contact@example.com">prajval@gmail.com</a>
		 <i class="icofont-login"></i> <a href="login.php">Admin Login</a>
        <i class="icofont-phone"></i> +91 9665656267
      </div>
      <div class="social-links">
        <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
        <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
        <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
        <a href="#" class="skype"><i class="icofont-skype"></i></a>
        <a href="#" class="linkedin"><i class="icofont-linkedin"></i></i></a>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="index.html"><span>NMS</span></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt=""></a>-->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="Notice2.php">View Notice</a></li>
          <li><a href="feed1.php"> View Feedback</a></li>
          <li><a href="about.php">About Us</a></li>
          <li><a href="Contact.php">Contact Us</a></li>

        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
      <h1> <span>Notice Board</spa>
      </h1>
 
      </div>
    </div>
  </section><!-- End Hero -->
  
  <html>
  <div style="margin-right:10%;margin-left:10%">
  <style>
 
input[type=submit]
{
background-color:blue;
color:white;
border:none;
width:100%;
}
body
{
margin-bottom:10%;
}
table
{
width: 100%;
}
th
{
text-align:center;
height: 50px;
color:blue;
background-color:lightblue;
}
table, td, th 
{
border: 1px solid blue;
}
td
{
padding-left:5px;
}
</style>
<title>Notices</title>
 
<body >

<div align="center">
<br/><br/>

<br/> 
	
	<a href="Insert.php"><input type='submit' Style='width:20%;'s value='Insert New Notice' name='insert'></a>

 

<br/><br/>
<?php
 error_reporting(0);
$con=mysqli_connect("127.0.0.1","root","","nms"); 



if(1)
{
	$query2= "select * from notice";
	$res=mysqli_query($con, $query2);


	echo "
	
	<table border='1'>
	 
	<th>Title</th>
	<th>Description</th>
	<th>From</th>
	<th>EDIT</th>
	<th>DELETE</th>
	";
	
	
	
	

	while($rony=mysqli_fetch_array($res))
	{
		
 
    $a=$rony['Title'];
	$b=$rony['Desc'];
	$c=$rony['From'];
 
	
	echo "
	
	<tr>
	<td>$a</td>
	<td>$b</td>
	<td>$c</td>
	 
	";
	
	echo "<td><a href='Edit.php?ti=$a'> <input type='submit' value='Edit' name='edit'></a></td>";
	echo "<td><a href='Delete.php?ti=$a'><input type='submit' value='Delete' name='delete'></a></td>";
	
	echo "</tr>";

	
	}
		
	echo "</table></br>";	
}
else
echo "no record found";															


?>

</div>
</body>
</html>
  
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
 
</body>

</html>
 