<?php
require_once '../includes/session.php';

// Check if user is logged in, redirect to login if not
requireLogin();

// Get database connection
$conn = mysqli_connect("127.0.0.1", "root", "", "nms");

// Count total notices
$noticeQuery = "SELECT COUNT(*) as total_notices FROM notice";
$noticeResult = mysqli_query($conn, $noticeQuery);
$noticeData = mysqli_fetch_assoc($noticeResult);
$totalNotices = $noticeData['total_notices'];

// Count total feedback
$feedbackQuery = "SELECT COUNT(*) as total_feedback FROM feed";
$feedbackResult = mysqli_query($conn, $feedbackQuery);
$feedbackData = mysqli_fetch_assoc($feedbackResult);
$totalFeedback = $feedbackData['total_feedback'];

// Get recent notices
$recentNoticesQuery = "SELECT * FROM notice ORDER BY `date` DESC LIMIT 5";
$recentNoticesResult = mysqli_query($conn, $recentNoticesQuery);

// Get recent feedback
$recentFeedbackQuery = "SELECT * FROM feed ORDER BY date DESC LIMIT 5";
$recentFeedbackResult = mysqli_query($conn, $recentFeedbackQuery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Admin Dashboard - Notice Management System</title>
  
  <!-- Favicons -->
  <link href="../assets/img/gp.png" rel="icon">
  
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  
  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  
  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">
  
  <style>
    .admin-sidebar {
      background-color: #34495e;
      color: white;
      min-height: 100vh;
      padding-top: 20px;
    }
    .admin-sidebar a {
      color: #ecf0f1;
      padding: 10px 15px;
      display: block;
      transition: 0.3s;
    }
    .admin-sidebar a:hover {
      background-color: #2c3e50;
      text-decoration: none;
    }
    .admin-sidebar a.active {
      background-color: #2980b9;
    }
    .admin-content {
      padding: 20px;
    }
    .stat-card {
      border-radius: 5px;
      padding: 20px;
      margin-bottom: 20px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    .stat-card i {
      font-size: 40px;
      margin-bottom: 10px;
    }
    .bg-info-light {
      background-color: #d1ecf1;
      color: #0c5460;
    }
    .bg-success-light {
      background-color: #d4edda;
      color: #155724;
    }
    .bg-warning-light {
      background-color: #fff3cd;
      color: #856404;
    }
    .bg-danger-light {
      background-color: #f8d7da;
      color: #721c24;
    }
  </style>
</head>

<body>
  <div class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <div class="col-md-3 col-lg-2 admin-sidebar">
        <div class="text-center mb-4">
          <h3>NMS Admin</h3>
          <p><?php echo $_SESSION['admin_username']; ?></p>
        </div>
        <ul class="nav flex-column">
          <li class="nav-item">
            <a href="dashboard.php" class="nav-link active">
              <i class="bx bxs-dashboard"></i> Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a href="manage_notices.php" class="nav-link">
              <i class="bx bxs-notepad"></i> Manage Notices
            </a>
          </li>
          <li class="nav-item">
            <a href="view_feedback.php" class="nav-link">
              <i class="bx bxs-message-detail"></i> View Feedback
            </a>
          </li>
          <!-- <li class="nav-item">
            <a href="settings.php" class="nav-link">
              <i class="bx bxs-cog"></i> Settings
            </a>
          </li> -->
          <li class="nav-item">
            <a href="../logout.php" class="nav-link">
              <i class="bx bxs-log-out"></i> Logout
            </a>
          </li>
        </ul>
      </div>
      
      <!-- Main Content -->
      <div class="col-md-9 col-lg-10 admin-content">
        <div class="d-flex justify-content-between align-items-center mb-4">
          <h2>Dashboard</h2>
          <span class="text-muted"><?php echo date('l, F j, Y'); ?></span>
        </div>
        
        <!-- Stats Cards -->
        <div class="row">
          <div class="col-md-3">
            <div class="stat-card bg-info-light text-center">
              <i class="bx bxs-notepad"></i>
              <h3><?php echo $totalNotices; ?></h3>
              <p>Total Notices</p>
            </div>
          </div>
          <div class="col-md-3">
            <div class="stat-card bg-success-light text-center">
              <i class="bx bxs-message-detail"></i>
              <h3><?php echo $totalFeedback; ?></h3>
              <p>Total Feedback</p>
            </div>
          </div>
          <div class="col-md-3">
            <div class="stat-card bg-warning-light text-center">
              <i class="bx bxs-user"></i>
              <h3>1</h3>
              <p>Admin Users</p>
            </div>
          </div>
          <div class="col-md-3">
            <div class="stat-card bg-danger-light text-center">
              <i class="bx bxs-time"></i>
              <h3><?php echo date('H:i'); ?></h3>
              <p>Last Updated</p>
            </div>
          </div>
        </div>
        
        <!-- Quick Actions -->
        <!-- <div class="row mt-4">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h5>Quick Actions</h5>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-4 text-center">
                    <a href="manage_notices.php" class="btn btn-primary btn-lg mb-3">
                      <i class="bx bxs-plus-circle"></i><br>
                      Add New Notice
                    </a>
                  </div>
                  <div class="col-md-4 text-center">
                    <a href="view_feedback.php" class="btn btn-info btn-lg mb-3">
                      <i class="bx bxs-message-detail"></i><br>
                      View Feedback
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> -->
        
        <!-- Recent Notices -->
        <div class="row mt-4">
          <div class="col-md-6">
            <div class="card">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Recent Notices</h5>
                <a href="manage_notices.php" class="btn btn-sm btn-outline-primary">View All</a>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php while ($notice = mysqli_fetch_assoc($recentNoticesResult)) { ?>
                        <tr>
                          <td><?php echo $notice['Title']; ?></td>
                          <td><?php echo date('d M Y', strtotime($notice['date'])); ?></td>
                          <td>
                            <a href="edit.php?id=<?php echo $notice['id']; ?>" class="btn btn-sm btn-outline-info">Edit</a>
                          </td>
                        </tr>
                      <?php } ?>
                      <?php if (mysqli_num_rows($recentNoticesResult) == 0) { ?>
                        <tr>
                          <td colspan="3" class="text-center">No notices found</td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          
          <!-- Recent Feedback -->
          <div class="col-md-6">
            <div class="card">
              <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Recent Feedback</h5>
                <a href="view_feedback.php" class="btn btn-sm btn-outline-primary">View All</a>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Ratings</th>
                        <th>Feedback</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php while ($feedback = mysqli_fetch_assoc($recentFeedbackResult)) { ?>
                        <tr>
                          <td><?php echo $feedback['Name']; ?></td>
                          <td class="star-rating">
                              <?php
                            // Generate star rating HTML
                            $stars = '';
                            for($i = 1; $i <= 5; $i++) {
                                $starClass = ($i <= $feedback['Rating']) ? 'text-warning' : 'text-muted';
                                $stars .= '<i class="icofont-star ' . $starClass . '"></i>';
                            }
                            echo $stars;
                            ?>
                          </td>
                          <td><?php echo ($feedback['Text']); ?></td>
                        </tr>
                      <?php } ?>
                      <?php if (mysqli_num_rows($recentFeedbackResult) == 0) { ?>
                        <tr>
                          <td colspan="3" class="text-center">No feedback found</td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!-- System Info -->
        <div class="row mt-4">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h5>System Information</h5>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-4">
                    <p><strong>PHP Version:</strong> <?php echo phpversion(); ?></p>
                    <p><strong>Server:</strong> <?php echo $_SERVER['SERVER_SOFTWARE']; ?></p>
                  </div>
                  <div class="col-md-4">
                    <p><strong>Last Login:</strong> <?php echo date('d M Y H:i', $_SESSION['login_time']); ?></p>
                    <p><strong>Database:</strong> MySQL</p>
                  </div>
                  <div class="col-md-4">
                    <p><strong>Admin User:</strong> <?php echo $_SESSION['admin_username']; ?></p>
                    <p><strong>Current Time:</strong> <?php echo date('H:i:s'); ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </div>
  
  <!-- Vendor JS Files -->
  <script src="../assets/vendor/jquery/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  
  <script>
    // For real-time clock update
    function updateClock() {
      const now = new Date();
      const hours = String(now.getHours()).padStart(2, '0');
      const minutes = String(now.getMinutes()).padStart(2, '0');
      const seconds = String(now.getSeconds()).padStart(2, '0');
      document.querySelector('.bg-danger-light h3').textContent = `${hours}:${minutes}`;
      
      setTimeout(updateClock, 60000); // Update every minute
    }
    
    // Initialize on load
    document.addEventListener('DOMContentLoaded', updateClock);
  </script>
</body>
</html>
