<?php
require_once '../includes/session.php';

// Check if user is logged in, redirect to login if not
requireLogin();

// Get database connection
$conn = mysqli_connect("127.0.0.1", "root", "", "nms");

// Initialize variables
$id = '';
$title = '';
$description = '';
$file_path = '';
$date = '';
$success_message = '';
$error_message = '';

// Check if ID is provided
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    
    // Get notice data
    $query = "SELECT * FROM notice WHERE id = '$id'";
    $result = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($result) == 1) {
        $notice = mysqli_fetch_assoc($result);
        $title = $notice['Title'];
        $description = $notice['Desc'];
        $file_path = $notice['attachment'];
        $date = $notice['date'];
    } else {
        $error_message = "Notice not found";
    }
} else {
    $error_message = "Notice ID is required";
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_notice'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    
    // File upload handling
    $new_file_path = $file_path; // Default to existing file
    
    if (isset($_FILES['notice_file']) && $_FILES['notice_file']['error'] == 0) {
        $upload_dir = "../uploads/";
        $file_name = basename($_FILES["notice_file"]["name"]);
        $target_file = $upload_dir . $file_name;
        
        // Check if file already exists, rename if needed
        $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
        $base_name = pathinfo($file_name, PATHINFO_FILENAME);
        $counter = 1;
        
        while (file_exists($target_file)) {
            $file_name = $base_name . '_' . $counter . '.' . $file_ext;
            $target_file = $upload_dir . $file_name;
            $counter++;
        }
        
        if (move_uploaded_file($_FILES["notice_file"]["tmp_name"], $target_file)) {
            $new_file_path = "uploads/" . $file_name;
        } else {
            $error_message = "Sorry, there was an error uploading your file.";
        }
    }
    
    // Update the notice in database
    if (empty($error_message)) {
        $update_query = "UPDATE notice SET Title = '$title', `Desc` = '$description', attachment = '$new_file_path', date = '$date' WHERE id = '$id'";
        
        if (mysqli_query($conn, $update_query)) {
            $success_message = "Notice updated successfully!";
            // Redirect to manage notices page after a short delay
            echo '<script>setTimeout(function() { window.location.href = "manage_notices.php"; }, 1000);</script>';
        } else {
            $error_message = "Error updating notice: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Edit Notice - Notice Management System</title>
  
  <!-- Favicons -->
  <link href="../assets/img/gp.png" rel="icon">
  
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  
  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="../assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  
  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top" style="top: 0;">
    <div class="container d-flex align-items-center">
      <h1 class="logo mr-auto"><a href="../index.php"><span>NMS</span></a></h1>
      
      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li><a href="dashboard.php">Dashboard</a></li>
          <li class="active"><a href="manage_notices.php">Manage Notices</a></li>
          <li><a href="view_feedback.php">View Feedback</a></li>
          <li><a href="../logout.php">Logout</a></li>
        </ul>
      </nav><!-- .nav-menu -->
    </div>
  </header><!-- End Header -->

  <main id="main" data-aos="fade-up">
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center">
          <h2>Edit Notice</h2>
          <ol class="breadcrumb">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="manage_notices.php">Manage Notices</a></li>
            <li>Edit Notice</li>
          </ol>
        </div>
      </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
      <div class="container">
        <?php if (!empty($error_message)): ?>
          <div class="alert alert-danger">
            <?php echo $error_message; ?>
          </div>
        <?php endif; ?>
        
        <?php if (!empty($success_message)): ?>
          <div class="alert alert-success">
            <?php echo $success_message; ?>
          </div>
        <?php endif; ?>
        
        <div class="card">
          <div class="card-header">
            <h5>Edit Notice Details</h5>
          </div>
          <div class="card-body">
            <form method="post" action="edit.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
              <input type="hidden" name="id" value="<?php echo $id; ?>">
              
              <div class="form-group row">
                <label for="title" class="col-sm-2 col-form-label">Notice Title</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="title" name="title" value="<?php echo htmlspecialchars($title); ?>" required>
                </div>
              </div>
              
              <div class="form-group row">
                <label for="description" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                  <textarea class="form-control" id="description" name="description" rows="5" required><?php echo htmlspecialchars($description); ?></textarea>
                </div>
              </div>
              
              <div class="form-group row">
                <label for="date" class="col-sm-2 col-form-label">Date</label>
                <div class="col-sm-10">
                  <input type="date" class="form-control" id="date" name="date" value="<?php echo htmlspecialchars($date); ?>" required>
                </div>
              </div>
              
              <div class="form-group row">
                <label for="notice_file" class="col-sm-2 col-form-label">Attachment</label>
                <div class="col-sm-10">
                  <?php if (!empty($file_path)): ?>
                    <div class="border rounded p-3 mb-3 bg-light">
                      <p><strong>Current file:</strong> <?php echo basename($file_path); ?></p>
                      <?php 
                      $file_extension = strtolower(pathinfo($file_path, PATHINFO_EXTENSION));
                      if (in_array($file_extension, ['jpg', 'jpeg', 'png', 'gif'])): 
                      ?>
                        <img src="../<?php echo $file_path; ?>" class="img-fluid mb-2" style="max-height: 200px;" alt="Current file">
                      <?php elseif (in_array($file_extension, ['pdf'])): ?>
                        <p><a href="../<?php echo $file_path; ?>" target="_blank" class="btn btn-sm btn-info">
                          <i class="icofont-file-pdf"></i> View PDF
                        </a></p>
                      <?php else: ?>
                        <p><a href="../<?php echo $file_path; ?>" target="_blank" class="btn btn-sm btn-info">
                          <i class="icofont-download"></i> Download File
                        </a></p>
                      <?php endif; ?>
                    </div>
                  <?php endif; ?>
                  <input type="file" class="form-control-file" id="notice_file" name="notice_file">
                  <small class="form-text text-muted">Upload a new file to replace the current one. Leave empty to keep current file.</small>
                  <div id="imagePreview" class="mt-2"></div>
                </div>
              </div>
              
              <div class="form-group row">
                <div class="col-sm-10 offset-sm-2">
                  <button type="submit" name="update_notice" class="btn btn-primary">
                    <i class="icofont-save"></i> Update Notice
                  </button>
                  <a href="manage_notices.php" class="btn btn-secondary">
                    <i class="icofont-close"></i> Cancel
                  </a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </main><!-- End #main -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
  <script src="../assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="../assets/vendor/counterup/counterup.min.js"></script>
  <script src="../assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/venobox/venobox.min.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
  
  <script>
    // Preview uploaded images
    document.getElementById('notice_file').addEventListener('change', function(e) {
      const file = this.files[0];
      if (!file) return;
      
      const fileType = file.type;
      const validImageTypes = ['image/jpeg', 'image/png', 'image/gif'];
      
      if (!validImageTypes.includes(fileType)) return;
      
      const reader = new FileReader();
      reader.onload = function(e) {
        const imagePreview = document.getElementById('imagePreview');
        imagePreview.innerHTML = '';
        
        const img = document.createElement('img');
        img.src = e.target.result;
        img.classList.add('img-fluid', 'border', 'rounded');
        img.style.maxHeight = '200px';
        
        imagePreview.appendChild(img);
      }
      reader.readAsDataURL(file);
    });
  </script>
</body>
</html>
