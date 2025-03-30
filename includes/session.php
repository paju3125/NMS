<?php
// Start session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/**
 * Check if user is logged in
 * @return boolean
 */
function isLoggedIn() {
    return isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true;
}

/**
 * Verify if user is logged in, redirect to login page if not
 */
function requireLogin() {
    if (!isLoggedIn()) {
        // Store the requested URL for redirection after login
        $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];
        header("Location: /nms/login.php");
        exit;
    }
}

/**
 * Set user as logged in
 * @param string $username Admin username
 */
function loginUser($username) {
    $_SESSION['admin_logged_in'] = true;
    $_SESSION['admin_username'] = $username;
    $_SESSION['login_time'] = time();
}

/**
 * Log out user
 */
function logoutUser() {
    // Unset all session variables
    $_SESSION = array();
    
    // Delete the session cookie
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    
    // Destroy the session
    session_destroy();
}
?>
