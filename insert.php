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
        <i class="icofont-phone"></i> +91 7666878546
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
          <li><a href="Notice.php">View Notice</a></li>
          <li><a href="feed.php">Feedback Section</a></li>
          <li><a href="about.php">About Us</a></li>
          <li><a href="contact.php">Contact Us</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <h1>Create New <span>Notice</span></h1>
      <p class="mt-3 text-dark">Fill in the details below to post a new notice</p>
    </div>
  </section>

  <main id="main">
    <section class="insert-notice-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 mx-auto">
            <div class="card shadow">
              <div class="card-header bg-primary text-white">
                <h4 class="mb-0">New Notice Form</h4>
              </div>
              <div class="card-body">
                <?php if(isset($error_message)): ?>
                <div class="alert alert-danger"><?php echo $error_message; ?></div>
                <?php endif; ?>
                
                <form method="POST" enctype="multipart/form-data" id="noticeForm">
                  <div class="form-group">
                    <label for="noticeTitle"><i class="icofont-paper mr-1"></i>Notice Title</label>
                    <input type="text" class="form-control" id="noticeTitle" name="a" placeholder="Enter notice title" required>
                  </div>
                  
                  <div class="form-group">
                    <label for="noticeDescription"><i class="icofont-ui-text-chat mr-1"></i>Description</label>
                    <textarea class="form-control" id="noticeDescription" name="b" rows="5" placeholder="Enter notice details" required></textarea>
                  </div>
                  
                  <div class="form-group">
                    <label for="noticeFrom"><i class="icofont-user mr-1"></i>From</label>
                    <input type="text" class="form-control" id="noticeFrom" name="c" placeholder="Enter department/name" required>
                  </div>
                  
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="noticeCategory"><i class="icofont-tag mr-1"></i>Category</label>
                      <select class="form-control" id="noticeCategory" name="category">
                        <option value="general">General</option>
                        <option value="academic">Academic</option>
                        <option value="administrative">Administrative</option>
                        <option value="events">Events</option>
                        <option value="examination">Examination</option>
                      </select>
                    </div>
                    
                    <div class="form-group col-md-6">
                      <label for="attachment"><i class="icofont-attachment mr-1"></i>Attachment</label>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="attachment" name="attachment" accept="image/*,.pdf" onchange="previewFile()">
                        <label class="custom-file-label" for="attachment">Choose file</label>
                      </div>
                      <small class="form-text text-muted">Upload image or PDF (Max: 5MB)</small>
                    </div>
                  </div>
                  
                  <div id="filePreviewContainer" class="d-none mb-3 p-3 bg-light rounded">
                    <div class="text-center" id="filePreview"></div>
                  </div>
                  
                  <div class="form-group">
                    <div class="custom-control custom-switch">
                      <input type="checkbox" class="custom-control-input" id="featuredSwitch" name="featured">
                      <label class="custom-control-label" for="featuredSwitch">Mark as Important/Featured Notice</label>
                    </div>
                  </div>
                  
                  <div class="form-group mb-0 text-center">
                    <button type="submit" name="submit" class="btn btn-primary btn-lg px-5">
                      <i class="icofont-paper-plane mr-2"></i>Post Notice
                    </button>
                  </div>
                </form>
              </div>
            </div>
            
            <div class="text-center mt-4">
              <a href="notice1.php" class="btn btn-outline-secondary">
                <i class="icofont-arrow-left mr-1"></i>Back to Notices
              </a>
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
    // Update custom file input label with selected file name
    document.querySelector('.custom-file-input').addEventListener('change', function(e) {
      var fileName = e.target.files[0]?.name || 'Choose file';
      var nextSibling = e.target.nextElementSibling;
      nextSibling.innerText = fileName;
    });
    
    // Preview function for uploaded files
    function previewFile() {
      const fileInput = document.getElementById('attachment');
      const previewContainer = document.getElementById('filePreviewContainer');
      const preview = document.getElementById('filePreview');
      
      if (fileInput.files && fileInput.files[0]) {
        const file = fileInput.files[0];
        const reader = new FileReader();
        
        previewContainer.classList.remove('d-none');
        
        // Clear previous preview
        preview.innerHTML = '';
        
        if (file.type.match('image.*')) {
          reader.onload = function(e) {
            const img = document.createElement('img');
            img.src = e.target.result;
            img.className = 'img-fluid mb-2';
            img.style.maxHeight = '200px';
            
            preview.appendChild(img);
            preview.appendChild(document.createElement('br'));
            preview.appendChild(document.createTextNode(file.name));
          }
          reader.readAsDataURL(file);
        } else if (file.type === 'application/pdf') {
          const icon = document.createElement('i');
          icon.className = 'icofont-file-pdf text-danger';
          icon.style.fontSize = '48px';
          
          preview.appendChild(icon);
          preview.appendChild(document.createElement('br'));
          preview.appendChild(document.createTextNode(file.name));
        } else {
          previewContainer.classList.add('d-none');
        }
      } else {
        previewContainer.classList.add('d-none');
      }
    }
  </script>

<?php
error_reporting(0);
$con = mysqli_connect("127.0.0.1", "root", "", "nms");

// Create the uploads directory if it doesn't exist
$uploadDir = "uploads/notices/";
if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

// Insert Code
if (isset($_POST['submit'])) {
    $a = $_POST['c']; // From
    $b = $_POST['a']; // Title
    $c = $_POST['b']; // Description
    $category = $_POST['category'];
    $featured = isset($_POST['featured']) ? 1 : 0;
    $attachment = ""; // Default empty value
    
    // Handle file upload
    if(isset($_FILES['attachment']) && $_FILES['attachment']['error'] == 0) {
        $allowed = array('jpg' => 'image/jpeg', 'jpeg' => 'image/jpeg', 'png' => 'image/png', 'pdf' => 'application/pdf');
        $filename = $_FILES['attachment']['name'];
        $filetype = $_FILES['attachment']['type'];
        $filesize = $_FILES['attachment']['size'];
        
        // Validate file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) {
            echo "<script>alert('Error: Please select a valid file format (JPEG, PNG, or PDF).');</script>";
        } else if($filesize > 5242880) { // 5MB in bytes
            echo "<script>alert('Error: File size is too large. Maximum size is 5MB.');</script>";
        } else {
            // Generate unique file name to prevent overwriting
            $newFilename = uniqid() . '_' . $filename;
            $destination = $uploadDir . $newFilename;
            
            // Move the uploaded file to the upload directory
            if(move_uploaded_file($_FILES['attachment']['tmp_name'], $destination)) {
                $attachment = $destination;
            } else {
                echo "<script>alert('Error: There was an issue uploading the file.');</script>";
            }
        }
    }
    
    // Update the SQL query to include new fields
    $currentDate = date('Y-m-d H:i:s');
    $query1= "INSERT INTO notice (Title, `Desc`, `From`, attachment, category, featured, `date`) 
              VALUES ('$b', '$c', '$a', '$attachment', '$category', '$featured', '$currentDate')";
    
    if(mysqli_query($con, $query1)) {
      echo '<div class="position-fixed top-0 right-0 p-3" style="z-index: 9999; right: 0; top: 80px;">
      <div class="toast show bg-success text-white" role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000">
        <div class="toast-header bg-success text-white">
          <strong class="mr-auto"><i class="icofont-check-circled mr-2"></i>Success</strong>
          <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="toast-body">
         Notice posted successfully! Redirecting to the notice page...
        </div>
      </div>
    </div>
    <script>
      setTimeout(function() {
        window.location.href="notice1.php";
      }, 3000);
    </script>';
    } else {
        echo "<script>alert('Error: " . mysqli_error($con) . "');</script>";
    }
}
?>
</body>
</html>
