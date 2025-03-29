<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Feedback</title>
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
        <i class="icofont-envelope"></i> <a href="mailto:contact@example.com">contact@example.com</a>
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
          <li><a href="notice.php">View Notice</a></li>
          <li class="active"><a href="feed.php">Feedback Section</a></li>
          <li><a href="about.php">About Us</a></li>
          <li><a href="contact.php">Contact Us</a></li>

        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
      <h1> <span>Feedback</spa>
      </h1>
 
      </div>
    </div>
  </section><!-- End Hero -->
 

 <html>
<head>
 <style>
.asch
{
border:4px solid #00c6ff; 
margin-left:30%;
margin-right:30%;
margin-bottom:12%;
padding-bottom:4%;
}
input[type=text]
{
border:1px outset grey;
border-bottom:2px solid blue;
border-radius:4px;
padding:12px 20px;
width:40%;
}
input[type=email]
{
border:1px outset grey;
border-bottom:2px solid blue;
border-radius:4px;
padding:12px 20px;
width:40%;
}
textarea
{
border:1px outset grey;
border-bottom:2px solid blue;
border-radius:4px;
padding:12px 20px;
width:40%;
}
input[type=submit]
{
background-color:blue;
color:white;
border:none;
border-radius:4px;
width:30%;
padding:10px;
}
body
{
margin-bottom:10%;
}
</style>
<br>
<div align="center">
 <div class="asch">
		<form method="POST">
		<div class='section-title'>
		 
		</div>
			<h6> Name :
			<input type="text" placeholder="Name *"  name="nm" required> 
<br/><br/>
			 Email :
			<input type="email" placeholder="Email *" name="em" required></h6>
			<br/><br/>
		 
		<h6>Want to rate with us for customer services?</h6>
			<span class="starRating">
				<input id="rating5" type="radio" name="rating" value="5" checked>
				<label for="rating5">5</label>
				<input id="rating4" type="radio" name="rating" value="4">
				<label for="rating4">4</label>
				<input id="rating3" type="radio" name="rating" value="3" >
				<label for="rating3">3</label>
				<input id="rating2" type="radio" name="rating" value="2">
				<label for="rating2">2</label>
				<input id="rating1" type="radio" name="rating" value="1">
				<label for="rating1">1</label>
			</span>
		<br/><br/>
			<h6>Is there anything you would like to tell us?</h6>	</br>
				<textarea name="feed" placeholder="Type Here" required> </textarea><br/><br/>
				<input type="submit" name="submit" value="Submit Feedback">
		</form>
	</div>
	</div>
	</div>
	  <?php
	  error_reporting(0);
	$con=mysqli_connect("127.0.0.1","root","","nms");

	if (isset($_POST['submit']))
	    {
			
		     $a=$_POST['nm'];
		 	 $b=$_POST['em'];
		 	 $c=$_POST['rating'];
			 $d=$_POST['feed'];

		 
			$q= "insert into feed values ('$a','$b',$c,'$d')";
			mysqli_query($con, $q);
 
			echo "<script>alert('Thanks for giving Feedback');window.location.href='index.php';</script>";
		}	
	?>

</div>
</div>
</body>
</html>
  
 
  
  
  

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