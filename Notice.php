<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Notice Board | NMS</title>
  <meta content="Notice Management System - View all notices" name="descriptison">
  <meta content="notices, announcements, alerts, information" name="keywords">
  <!-- Favicons -->
  <link href="assets/img/gp.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

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
          <li class="active"><a href="Notice.php">View Notice</a></li>
          <li><a href="feed.php">Feedback Section</a></li>
          <li><a href="About.php">About Us</a></li>
          <li><a href="contact.php">Contact Us</a></li>
        </ul>
      </nav>
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center notice-hero">
    <div class="container">
      <h1>Campus <span>Notice Board</span></h1>
      <p class="mt-3 text-white">Stay updated with all important announcements and notices</p>
    </div>
  </section><!-- End Hero -->

  <main id="main">
    <!-- Notice Header Section -->
    <div class="notice-header">
      <div class="container">
        <h2>Latest Announcements</h2>
        <p>Check out the most recent notices and announcements from the campus administration</p>
      </div>
    </div>

    <!-- Notice Board Section -->
    <section class="notice-board">
      <div class="container">
      <div class="admin-filter-bar p-3 bg-light border-bottom">
                  <div class="row">
                    <div class="col-md-4 mb-2 mb-md-0">
                      <select class="form-control" id="noticeCategory" onchange="filterNotices()">
                        <option value="all">All Categories</option>
                        <option value="academic">Academic</option>
                        <option value="administrative">Administrative</option>
                        <option value="events">Events</option>
                        <option value="examination">Examination</option>
                        <option value="general">General</option>
                      </select>
                    </div>
                    <div class="col-md-8">
                      <div class="input-group">
                        <input type="text" class="form-control" id="noticeSearch" placeholder="Search notices..." onkeyup="searchNotices()">
                        <div class="input-group-append">
                          <button class="btn btn-outline-secondary" type="button"><i class="icofont-search"></i></button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

        <div class="row">
          <div class="col-lg-12">
            <div id="noticeList">
              <?php
              error_reporting(0);
              $con = mysqli_connect("127.0.0.1", "root", "", "nms");
              
              if (!$con) {
                echo '<div class="alert alert-danger">Failed to connect to database. Please try again later.</div>';
              } else {
                // Get all notices with order by featured (important) first, then by date
                $query = "SELECT * FROM notice ORDER BY featured DESC, id DESC";
                $result = mysqli_query($con, $query);
                $noticeCount = mysqli_num_rows($result);
                
                if ($noticeCount == 0) {
                  echo '<div class="alert alert-info">No notices available at the moment.</div>';
                } else {
                  echo '<div class="notice-stats mb-4">
                    <div class="d-flex justify-content-between">
                      <h5>Total Notices: <span class="badge badge-primary">' . $noticeCount . '</span></h5>
                      <button class="btn btn-sm btn-outline-primary" onclick="printAllNotices()"><i class="icofont-print mr-1"></i>Print All</button>
                    </div>
                  </div>';
                  
                  $counter = 1;
                  while ($notice = mysqli_fetch_array($result)) {
                    $noticeId = "notice-" . $counter;
                    $collapseId = "collapse-" . $counter;
                    $title = $notice['Title'];
                    $description = $notice['Desc'];
                    $from = $notice['From'];
                    
                    // Get additional fields if they exist
                    $category = isset($notice['category']) ? $notice['category'] : 'general';
                    $isFeatured = isset($notice['featured']) && $notice['featured'] == 1;
                    $date = isset($notice['date']) ? date('d M Y', strtotime($notice['date'])) : '';
                    $attachment = isset($notice['attachment']) && !empty($notice['attachment']) ? $notice['attachment'] : '';
                    
                    // Check if notice is recent (within last 3 days)
                    $isRecent = false;
                    if(!empty($date)) {
                      $noticeDate = strtotime($notice['date']);
                      $currentDate = time();
                      $daysDiff = floor(($currentDate - $noticeDate) / (60 * 60 * 24));
                      $isRecent = ($daysDiff <= 1);
                    }
                    
                    // Determine attachment type
                    $attachmentHtml = '';
                    if(!empty($attachment)) {
                      $fileExt = pathinfo($attachment, PATHINFO_EXTENSION);
                      if(in_array(strtolower($fileExt), ['jpg', 'jpeg', 'png', 'gif'])) {
                        // Image file
                        $attachmentHtml = '
                          <div class="notice-attachment">
                            <img src="' . $attachment . '" alt="Notice attachment" class="img-fluid mb-3">
                          </div>';
                      } else if(strtolower($fileExt) === 'pdf') {
                        // PDF file
                        $attachmentHtml = '
                          <div class="notice-attachment">
                            <div class="pdf-preview">
                              <i class="icofont-file-pdf"></i>
                              <p>PDF Document Attached</p>
                            </div>
                            <a href="' . $attachment . '" class="btn btn-sm btn-primary" target="_blank">
                              <i class="icofont-eye-alt mr-1"></i>View PDF
                            </a>
                            <a href="' . $attachment . '" class="btn btn-sm btn-secondary" download>
                              <i class="icofont-download mr-1"></i>Download
                            </a>
                          </div>';
                      }
                    }
                    
                    // Build class for card
                    $cardClass = 'notice-card';
                    if($isFeatured) {
                      $cardClass .= ' featured-notice';
                    }
                    
                    echo '
                    <div class="' . $cardClass . '" data-category="' . $category . '">
                      <div class="notice-title" onclick="toggleNotice(\'' . $collapseId . '\')">
                        <div class="d-flex align-items-center">
                          ' . ($isFeatured ? '<span class="badge badge-danger mr-2">IMPORTANT</span>' : '') . '
                          ' . ($isRecent ? '<span class="new-badge mr-2">NEW</span>' : '') . '
                          <h4>' . $title . '</h4>
                        </div>
                        <i class="icofont-simple-down"></i>
                      </div>
                      <div class="notice-content" id="' . $collapseId . '" style="opacity: 0; max-height: 0;">
                        <p>' . $description . '</p>
                        ' . $attachmentHtml . '
                        <div class="notice-meta">
                          <div class="notice-actions">
                            <button class="btn btn-sm btn-outline-secondary mr-2" onclick="shareNotice(\'' . $title . '\', event)">
                              <i class="icofont-share mr-1"></i>Share
                            </button>
                            <button class="btn btn-sm btn-outline-primary" onclick="printNotice(\'' . $collapseId . '\', event)">
                              <i class="icofont-print mr-1"></i>Print
                            </button>
                          </div>
                          <div>
                            ' . (!empty($date) ? '<span class="mr-3"><i class="icofont-calendar mr-1"></i>' . $date . '</span>' : '') . '
                            <span class="mr-3"><i class="icofont-tag mr-1"></i>' . ucfirst($category) . '</span>
                            <span><i class="icofont-user mr-1"></i>From: ' . $from . '</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    ';
                    $counter++;
                  }
                }
              }
              ?>
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
    // Complete rewrite of the toggle function to avoid CSS class issues
    function toggleNotice(id) {
      const content = document.getElementById(id);
      const allContents = document.querySelectorAll('.notice-content');
      
      // Close all other notices
      allContents.forEach(item => {
        if (item.id !== id && (item.style.maxHeight !== "0px" && item.style.maxHeight !== "")) {
          item.style.maxHeight = "0px";
          item.style.padding = "0 25px";
          item.style.opacity = "0";
          const icon = item.previousElementSibling.querySelector('i');
          if (icon) {
            icon.style.transform = 'rotate(0deg)';
          }
        }
      });
      
      // Toggle current notice with direct style manipulation
      if (content.style.maxHeight === "0px" || content.style.maxHeight === "") {
        content.style.maxHeight = "500px";
        content.style.padding = "20px 25px";
        content.style.opacity = "1";
        
        const icon = content.previousElementSibling.querySelector('i');
        if (icon) {
          icon.style.transform = 'rotate(180deg)';
        }
      } else {
        content.style.maxHeight = "0px";
        content.style.padding = "0 25px";
        content.style.opacity = "0";
        
        const icon = content.previousElementSibling.querySelector('i');
        if (icon) {
          icon.style.transform = 'rotate(0deg)';
        }
      }
    }
    
    // Search notices function - unchanged
    function searchNotices() {
      const input = document.getElementById('noticeSearch');
      const filter = input.value.toUpperCase();
      const noticeList = document.getElementById('noticeList');
      const notices = noticeList.getElementsByClassName('notice-card');
      
      for (let i = 0; i < notices.length; i++) {
        const title = notices[i].getElementsByTagName('h4')[0];
        const content = notices[i].getElementsByTagName('p')[0];
        const txtTitle = title.textContent || title.innerText;
        const txtContent = content.textContent || content.innerText;
        
        if (txtTitle.toUpperCase().indexOf(filter) > -1 || txtContent.toUpperCase().indexOf(filter) > -1) {
          notices[i].style.display = "";
        } else {
          notices[i].style.display = "none";
        }
      }
    }
    
    // Filter notices by category
    function filterNotices() {
      const category = document.getElementById('noticeCategory').value;
      const noticeList = document.getElementById('noticeList');
      const notices = noticeList.getElementsByClassName('notice-card');
      
      for (let i = 0; i < notices.length; i++) {
        if (category === 'all' || notices[i].dataset.category === category) {
          notices[i].style.display = "";
        } else {
          notices[i].style.display = "none";
        }
      }
    }
    
    // Print individual notice
    function printNotice(id, event) {
      if (event) {
        event.stopPropagation(); // Stop the click from toggling the notice
      }
      
      const content = document.getElementById(id);
      const title = content.previousElementSibling.querySelector('h4').innerText;
      const description = content.querySelector('p').innerText;
      const meta = content.querySelector('.notice-meta div:last-child').innerText;
      const attachment = content.querySelector('.notice-attachment img');
      
      const printWindow = window.open('', '', 'height=600,width=800');
      printWindow.document.write('<html><head><title>Print Notice</title>');
      printWindow.document.write('<link href="assets/css/style.css" rel="stylesheet">');
      printWindow.document.write('<style>body { font-family: Arial; padding: 20px; }</style>');
      printWindow.document.write('</head><body>');
      printWindow.document.write('<h2 style="color:#106eea;">' + title + '</h2>');
      printWindow.document.write('<div style="margin:20px 0; padding:15px; border-left:3px solid #106eea;">' + description + '</div>');
      
      // Add attachment if it exists
      if (attachment) {
        printWindow.document.write('<div style="margin:20px 0;"><img src="' + attachment.src + '" style="max-width:100%; max-height:300px;"></div>');
      }
      
      printWindow.document.write('<p style="text-align:right; font-style:italic;">' + meta + '</p>');
      printWindow.document.write('</body></html>');
      printWindow.document.close();
      
      printWindow.onload = function() {
        printWindow.focus();
        printWindow.print();
        printWindow.close();
      };
    }
    
    // Share notice function
    function shareNotice(title, event) {
      if (event) {
        event.stopPropagation(); // Stop the click from toggling the notice
      }
      
      if (navigator.share) {
        navigator.share({
          title: title,
          text: 'Check out this important notice: ' + title,
          url: window.location.href,
        })
        .catch(error => console.log('Error sharing:', error));
      } else {
        // Fallback for browsers that don't support the Web Share API
        const url = encodeURIComponent(window.location.href);
        const text = encodeURIComponent('Check out this important notice: ' + title);
        window.open('https://www.facebook.com/sharer/sharer.php?u=' + url, '_blank');
      }
    }
  </script>
</body>
</html>