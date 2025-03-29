<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>View Feedback</title>
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
        <i class="icofont-envelope"></i> <a href="mailto:contact@example.com">prajval@gmail.com</a>
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
          <li><a href="Notice1.php">View Notice</a></li>
          <li class="active"><a href="feed1.php">View Feedback</a></li>
          <li><a href="ABout.php">About Us</a></li>
          <li><a href="contact.php">Contact Us</a></li>
        </ul>
      </nav>
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <h1>User <span>Feedback</span></h1>
      <p class="mt-3 text-dark">Review and manage user feedback submissions</p>
    </div>
  </section><!-- End Hero -->

  <main id="main">
    <section class="feedback-admin-section">
      <div class="container">
        <div class="row mb-4">
          <div class="col-md-6">
            <h2 class="admin-section-title">Feedback Management</h2>
          </div>
          <div class="col-md-6 text-md-right">
            <div class="feedback-stats">
              <?php
              error_reporting(0);
              $con = mysqli_connect("127.0.0.1", "root", "", "nms");
              if($con) {
                $countQuery = "SELECT COUNT(*) as total, AVG(Rating) as avg_rating FROM feed";
                $countResult = mysqli_query($con, $countQuery);
                $stats = mysqli_fetch_assoc($countResult);
                
                echo '<span class="badge badge-info mr-2">Total: ' . $stats['total'] . '</span>';
                echo '<span class="badge badge-success">Avg. Rating: ' . number_format($stats['avg_rating'], 1) . ' / 5</span>';
              }
              ?>
            </div>
          </div>
        </div>

        <div class="row mb-4">
          <div class="col-lg-12">
            <div class="card shadow-sm">
              <div class="card-body p-0">
                <div class="admin-filter-bar p-3 bg-light border-bottom">
                  <div class="row">
                    <div class="col-md-4 mb-2 mb-md-0">
                      <select class="form-control" id="ratingFilter" onchange="filterFeedback()">
                        <option value="all">All Ratings</option>
                        <option value="5">5 Stars</option>
                        <option value="4">4 Stars</option>
                        <option value="3">3 Stars</option>
                        <option value="2">2 Stars</option>
                        <option value="1">1 Star</option>
                      </select>
                    </div>
                    <div class="col-md-8">
                      <div class="input-group">
                        <input type="text" class="form-control" id="searchFeedback" placeholder="Search feedback..." onkeyup="searchFeedback()">
                        <div class="input-group-append">
                          <button class="btn btn-outline-secondary" type="button"><i class="icofont-search"></i></button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="table-responsive">
                  <table class="table table-hover admin-feedback-table mb-0" id="feedbackTable">
                    <thead class="thead-light">
                      <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Rating</th>
                        <th>Feedback</th>
                        <th class="text-center">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if($con) {
                        $query = "SELECT * FROM feed ORDER BY Rating DESC";
                        $res = mysqli_query($con, $query);
                        
                        if(mysqli_num_rows($res) > 0) {
                          while($feedback = mysqli_fetch_array($res)) {
                            $name = $feedback['Name'];
                            $email = $feedback['Email'];
                            $rating = $feedback['Rating'];
                            $feedback_text = $feedback['Text'];
                            
                            // Generate star rating HTML
                            $stars = '';
                            for($i = 1; $i <= 5; $i++) {
                              $starClass = ($i <= $rating) ? 'text-warning' : 'text-muted';
                              $stars .= '<i class="icofont-star ' . $starClass . '"></i>';
                            }
                            
                            echo '<tr class="feedback-row" data-rating="' . $rating . '">
                              <td>' . htmlspecialchars($name) . '</td>
                              <td>' . htmlspecialchars($email) . '</td>
                              <td class="star-rating">' . $stars . ' <span class="rating-text">(' . $rating . '/5)</span></td>
                              <td>' . htmlspecialchars($feedback_text) . '</td>
                              <td class="text-center">
                                <button onclick="confirmDelete(\'' . htmlspecialchars($email) . '\')" class="btn btn-sm btn-danger">
                                  <i class="icofont-trash mr-1"></i>Delete
                                </button>
                              </td>
                            </tr>';
                          }
                        } else {
                          echo '<tr><td colspan="5" class="text-center py-4">No feedback submissions found.</td></tr>';
                        }
                      } else {
                        echo '<tr><td colspan="5" class="text-center py-4">Failed to connect to database.</td></tr>';
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
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
    // Filter feedback by rating
    function filterFeedback() {
      const rating = document.getElementById('ratingFilter').value;
      const rows = document.querySelectorAll('#feedbackTable tbody tr.feedback-row');
      
      rows.forEach(row => {
        if (rating === 'all' || row.dataset.rating === rating) {
          row.style.display = '';
        } else {
          row.style.display = 'none';
        }
      });
    }
    
    // Search feedback
    function searchFeedback() {
      const input = document.getElementById('searchFeedback');
      const filter = input.value.toUpperCase();
      const rows = document.querySelectorAll('#feedbackTable tbody tr.feedback-row');
      
      rows.forEach(row => {
        const cells = row.getElementsByTagName('td');
        let found = false;
        
        // Skip the rating cell (index 2) and the action cell (last one)
        for (let i = 0; i < cells.length - 1; i++) {
          if (i !== 2) {  // Skip rating cell
            const text = cells[i].textContent || cells[i].innerText;
            if (text.toUpperCase().indexOf(filter) > -1) {
              found = true;
              break;
            }
          }
        }
        
        row.style.display = found ? '' : 'none';
      });
    }
    
    // Delete confirmation
    function confirmDelete(email) {
      if (confirm('Are you sure you want to delete this feedback?\nThis action cannot be undone.')) {
        window.location.href = 'Delete1.php?em=' + encodeURIComponent(email);
      }
    }
  </script>
</body>
</html>
