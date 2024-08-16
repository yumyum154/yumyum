<?php
include 'conn.php';
if (!isset($_SESSION['admin_id'])) {
    header('location: /readywears/admin/login.php');
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// Set session timeout limit (30 seconds for testing)
$inactive_limit = 3600; // 30 seconds

// Check for session inactivity
if (isset($_SESSION['last_activity'])) {
    $session_duration = time() - $_SESSION['last_activity'];
    if ($session_duration > $inactive_limit) {
        // Session expired, log out the user
        session_unset();
        session_destroy();
        header('Location: /readywears/admin/login.php');
        exit();
    }
}

// Update last activity timestamp
$_SESSION['last_activity'] = time();

// Update last_login in the database
if (isset($_SESSION['admin_id'])) {
    $admin_id = $_SESSION['admin_id'];
    $stmt = $conn->prepare("UPDATE users SET last_login = NOW() WHERE id = ?");
    $stmt->execute([$admin_id]);
}