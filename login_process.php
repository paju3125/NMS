<?php
require_once 'includes/session.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    // Validate input
    if (empty($username) || empty($password)) {
        $_SESSION['login_error'] = "Username and password are required";
        header("Location: login.php");
        exit;
    }
    
    // Connect to database
    $conn = mysqli_connect("127.0.0.1", "root", "", "nms");
    if (!$conn) {
        $_SESSION['login_error'] = "Database connection error";
        header("Location: login.php");
        exit;
    }
    
    // Direct query to check credentials
    $query = "SELECT * FROM admin WHERE Email = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);
    
    if (mysqli_num_rows($result) == 1) {
        // Login successful
        loginUser($username);
        
        // Redirect to admin dashboard or requested page
        $redirect = $_SESSION['redirect_url'] ?? 'admin/dashboard.php';
        unset($_SESSION['redirect_url']); // Clear stored URL
        
        header("Location: $redirect");
        exit;
    } else {
        // Login failed
        $_SESSION['login_error'] = "Invalid username or password";
        header("Location: login.php");
        exit;
    }
}
else {
    // If not a POST request, redirect to login page
    header("Location: login.php");
    exit;
}
?>
