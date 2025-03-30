<?php
require_once '../includes/session.php';

// Check if user is logged in, redirect to login if not
requireLogin();

// Rest of your admin dashboard code
// ...
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Notice Board</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/gp.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

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
  <header id="header" class="fixed-top " style="top: 0;">
    <div class="container d-flex align-items-center">
      <h1 class="logo mr-auto"><a href="dashboard.php"><span>NMS</span></a></h1>
      <nav class="nav-menu d-none d-lg-block">
        <ul>
        <li><a href="dashboard.php">Dashboard</a></li>
          <li  class="active"><a href="manage_notices.php">Manage Notice</a></li>
          <li><a href="view_feedback.php">View Feedback</a></li>
          <li><a href="../logout.php">Logout</a></li>
        </ul>
      </nav>
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center"  style="height: fit-content;">
    <div class="container">
      <h1><span>Notice Board</span> Management</h1>
      <p class="mt-3 text-dark">Manage all notices from this admin dashboard</p>
    </div>
  </section><!-- End Hero -->

  <main id="main">
    <section class="admin-notice-section">
      <div class="container">
        <div class="row mb-4">
          <div class="col-md-6">
            <h2 class="admin-section-title">Manage Notices</h2>
          </div>
          <div class="col-md-6 text-md-right">
            <a href="Insert.php" class="btn btn-primary"><i class="icofont-plus-circle mr-2"></i>Add New Notice</a>
          </div>
        </div>
        
        <div class="row mb-4">
          <div class="col-lg-12">
            <div class="card shadow-sm">
              <div class="card-body p-0">
                <div class="admin-filter-bar p-3 bg-light border-bottom">
                  <div class="row">
                    <div class="col-md-4 mb-2 mb-md-0">
                      <select class="form-control" id="noticeFilter" onchange="filterNotices()">
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
                        <input type="text" class="form-control" id="searchNotice" placeholder="Search notices..." onkeyup="searchNotices()">
                        <div class="input-group-append">
                          <button class="btn btn-outline-secondary" type="button"><i class="icofont-search"></i></button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="table-responsive">
                  <table class="table table-hover admin-notice-table mb-0" id="noticesTable">
                    <thead class="thead-light">
                      <tr>
                        <th width="20%">Title</th>
                        <th width="35%">Description</th>
                        <th width="15%">From</th>
                        <th width="10%">Category</th>
                        <th width="10%">Date</th>
                        <th width="10%" class="text-center">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      error_reporting(0);
                      $con=mysqli_connect("127.0.0.1","root","","nms");

                      if($con) {
                        $query = "SELECT * FROM notice ORDER BY featured DESC, date DESC";
                        $res = mysqli_query($con, $query);

                        if(mysqli_num_rows($res) > 0) {
                          while($notice = mysqli_fetch_array($res)) {
                            $id = $notice['id'];
                            $title = $notice['Title'];
                            $description = substr($notice['Desc'], 0, 100) . (strlen($notice['Desc']) > 100 ? '...' : '');
                            $from = $notice['From'];
                            $category = isset($notice['category']) ? $notice['category'] : 'general';
                            $date = isset($notice['date']) ? date('d M Y', strtotime($notice['date'])) : '-';
                            $isFeatured = isset($notice['featured']) && $notice['featured'] == 1;
                            $attachment = isset($notice['attachment']) && !empty($notice['attachment']);
                            
                            echo '<tr class="notice-row" data-category="'. $category .'">
                              <td>'. ($isFeatured ? '<span class="badge badge-danger mr-1">Important</span>' : '') . 
                                  ($attachment ? '<i class="icofont-attachment text-secondary mr-1"></i>' : '') . 
                                  htmlspecialchars($title) .'</td>
                              <td>'. htmlspecialchars($description) .'</td>
                              <td>'. htmlspecialchars($from) .'</td>
                              <td><span class="badge badge-info">'. ucfirst($category) .'</span></td>
                              <td>'. $date .'</td>
                              <td class="text-center">
                                <div class="btn-group btn-group-sm">
                                  <a href="Edit.php?id='. urlencode($id) .'" class="btn btn-primary" title="Edit">
                                    <i class="icofont-edit"></i>
                                  </a>
                                  <a href="#" onclick="confirmDelete(\'' . htmlspecialchars($id) . '\', \'' . htmlspecialchars($title) . '\')" class="btn btn-danger" title="Delete">
                                    <i class="icofont-trash"></i>
                                  </a>
                                </div>
                              </td>
                            </tr>';
                          }
                        } else {
                          echo '<tr><td colspan="6" class="text-center py-4">No notices found.</td></tr>';
                        }
                      } else {
                        echo '<tr><td colspan="6" class="text-center py-4">Failed to connect to database.</td></tr>';
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
    // Filter notices by category
    function filterNotices() {
      const category = document.getElementById('noticeFilter').value;
      const rows = document.querySelectorAll('#noticesTable tbody tr.notice-row');
      
      rows.forEach(row => {
        if (category === 'all' || row.dataset.category === category) {
          row.style.display = '';
        } else {
          row.style.display = 'none';
        }
      });
    }
    
    // Search notices
    function searchNotices() {
      const input = document.getElementById('searchNotice');
      const filter = input.value.toUpperCase();
      const rows = document.querySelectorAll('#noticesTable tbody tr.notice-row');
      
      rows.forEach(row => {
        const cells = row.getElementsByTagName('td');
        let found = false;
        
        for (let i = 0; i < cells.length - 1; i++) {
          const text = cells[i].textContent || cells[i].innerText;
          if (text.toUpperCase().indexOf(filter) > -1) {
            found = true;
            break;
          }
        }
        
        row.style.display = found ? '' : 'none';
      });
    }
    
    // Delete confirmation
    function confirmDelete(id, title) {
      if (confirm('Are you sure you want to delete the notice: "' + title + '"?\nThis action cannot be undone.')) {
        window.location.href = 'Delete.php?id=' + encodeURIComponent(id);
      }
    }
  </script>
</body>
</html>
