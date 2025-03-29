
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Insert Notice</title>
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
        <i class="icofont-phone"></i> +91 7666878546
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

      <h1 class="logo mr-auto"><a href="index.php"><span>NMS</span></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt=""></a>-->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="Notice.php">View Notice</a></li>
          <li><a href="feed.php">Feedback Section</a></li>
          <li><a href="about.php">About Us</a></li>
          <li><a href="contact.php">Contact Us</a></li>

        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->
 
 

  
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
      <h1> <span>Notice Insert</spa>
      </h1>
 
      </div>
    </div>
  </section><!-- End Hero -->
  
  
  
   <html>
   <head>
 <html>
<head>
<style>
 .asch
{
border:4px solid #00c6ff; 
margin-left:30%;
margin-right:30%;
margin-bottom:10%;
padding-bottom:5%;
}
textarea
{
border:1px outset grey;
border-bottom:2px solid blue;
border-radius:4px;
padding:10px 10px;
width:40%;	
}
input[type=text]
{
border:1px outset grey;
border-bottom:2px solid blue;
border-radius:4px;
padding:12px 20px;
width:40%;
}
input[type=label]
{
border:none;
width:20%;
} 
input[type=submit]
{
background-color:blue;
color:white;"
border:none;
border-radius:4px;
width:60%;
padding:10px;
}
body
{
margin-bottom:10%;
}
input[type=label]{
	outline:none;
}
</style> 

</br>
<div align="center">
 <div class="asch"><br/><br/>
<form method="POST">
 <input type="label" value="Title :" readonly><input type="text" name="a" placeholder="TItle *" required> <br/><br/>
<input type="label" value="Description :" readonly> <input type="text" name="b" placeholder="Description *" required> </textarea><br/><br/>
<input type="label" value="From :" readonly><input type="text" name="c" placeholder="From *" required><br/><br/>
 <br>
<input type="submit" name="submit" value="Insert Notice">
</form>
</div>
</div>
 

    <?php
	error_reporting(0);
		$con=mysqli_connect("127.0.0.1","root","","nms");
		 
		//Insert Code
			 
		if (isset($_POST['submit']))
	    {
		
			 
		     $a=$_POST['c'];
		 	 $b=$_POST['a'];
             $c=$_POST['b'];		 
			 
			$query1= "insert into notice values ('$a','$b','$c')";
			mysqli_query($con,$query1);
			
			echo "
			<script>
			alert('Notice is Inserted');
			window.location.href='Notice1.php';
			</script>";
		}
			
			 
	  
    ?>
	</div>
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
