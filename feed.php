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
        <a href="#" class="linkedin"><i class="icofont-linkedin"></i></a>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">
      <h1 class="logo mr-auto"><a href="index.php"><span>NMS</span></a></h1>
      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="notice.php">View Notice</a></li>
          <li class="active"><a href="feed.php">Feedback Section</a></li>
          <li><a href="about.php">About Us</a></li>
          <li><a href="contact.php">Contact Us</a></li>
        </ul>
      </nav>
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <h1>Share Your <span>Feedback</span></h1>
      <p class="mt-3 text-dark">We value your opinion and are committed to continuously improving our services</p>
    </div>
  </section><!-- End Hero -->
  
  <main id="main">
    <section class="feedback-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <div class="card shadow">
              <div class="card-header bg-primary text-white">
                <h4 class="mb-0 text-center">Feedback Form</h4>
              </div>
              <div class="card-body">
                <form method="POST" id="feedbackForm">
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="feedbackName"><i class="icofont-user mr-1"></i>Name</label>
                      <input type="text" class="form-control" id="feedbackName" name="nm" placeholder="Enter your name" required>
                    </div>
                    
                    <div class="form-group col-md-6">
                      <label for="feedbackEmail"><i class="icofont-envelope mr-1"></i>Email Address</label>
                      <input type="email" class="form-control" id="feedbackEmail" name="em" placeholder="Enter your email" required>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label><i class="icofont-star mr-1"></i>Rate our service</label>
                    <div class="star-rating">
                      <div class="stars">
                        <input type="radio" id="star5" name="rating" value="5" checked />
                        <label for="star5" title="5 stars"><i class="icofont-star"></i></label>
                        
                        <input type="radio" id="star4" name="rating" value="4" />
                        <label for="star4" title="4 stars"><i class="icofont-star"></i></label>
                        
                        <input type="radio" id="star3" name="rating" value="3" />
                        <label for="star3" title="3 stars"><i class="icofont-star"></i></label>
                        
                        <input type="radio" id="star2" name="rating" value="2" />
                        <label for="star2" title="2 stars"><i class="icofont-star"></i></label>
                        
                        <input type="radio" id="star1" name="rating" value="1" />
                        <label for="star1" title="1 star"><i class="icofont-star"></i></label>
                      </div>
                      <div class="rating-value mt-2" id="ratingValue">5 Stars</div>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label for="feedbackText"><i class="icofont-comment mr-1"></i>Your Feedback</label>
                    <textarea class="form-control" id="feedbackText" name="feed" rows="5" placeholder="Please share your thoughts, suggestions, or experiences with us" required></textarea>
                  </div>
                  
                  <div class="form-group mb-0 text-center">
                    <button type="submit" name="submit" class="btn btn-primary btn-lg px-5">
                      <i class="icofont-paper-plane mr-2"></i>Submit Feedback
                    </button>
                  </div>
                </form>
              </div>
            </div>
            
            <div class="text-center mt-4 testimonial-note">
              <p><i class="icofont-quote-left text-primary"></i> Your feedback helps us improve our services <i class="icofont-quote-right text-primary"></i></p>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>

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
  
  <script>
    // Update rating value display when user selects a star
    document.querySelectorAll('input[name="rating"]').forEach(radio => {
      radio.addEventListener('change', function() {
        document.getElementById('ratingValue').textContent = this.value + ' Star' + (this.value > 1 ? 's' : '');
      });
    });
  </script>

  <?php
  error_reporting(0);
  $con = mysqli_connect("127.0.0.1", "root", "", "nms");

  if (isset($_POST['submit'])) {
    $a = $_POST['nm'];
    $b = $_POST['em'];
    $c = $_POST['rating'];
    $d = $_POST['feed'];

    $q = "insert into feed values ('$a','$b',$c,'$d')";
    
    if(mysqli_query($con, $q)) {
      // Show a more stylish success message
      echo '<div class="position-fixed top-0 right-0 p-3" style="z-index: 9999; right: 0; top: 80px;">
        <div class="toast show bg-success text-white" role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000">
          <div class="toast-header bg-success text-white">
            <strong class="mr-auto"><i class="icofont-check-circled mr-2"></i>Success</strong>
            <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="toast-body">
            Thank you for your valuable feedback!
          </div>
        </div>
      </div>
      <script>
        setTimeout(function() {
          window.location.href="index.php";
        }, 3000);
      </script>';
    }
  }
  ?>
</body>
</html>