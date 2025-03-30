<?php
require_once 'includes/session.php';

// Log the user out
logoutUser();

// Redirect to home page
header("Location: index.php");
exit;
?>
