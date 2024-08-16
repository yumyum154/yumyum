<?php

// Database connection
session_start();
session_regenerate_id(true);

// Database credentials
$dsn = "mysql:host=127.0.0.1;dbname=mindb";
$username = "root";
$password = "";

try {
    // Create a PDO instance
    $conn = new PDO($dsn, $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Display connection error message
    echo "Connection failed: " . $e->getMessage();
}

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


$today = date('Y-m-d');
$timestamp = date('Y-m-d H:i:s');
$transaction_type = isset($_POST['transaction_type']) ? $_POST['transaction_type'] : 'Profit'; // Default to 'Profit' if not set
error_reporting(E_ALL);
ini_set('display_errors', 1);

try {
    // Prepare and execute query to get profits to process
    $stmt = $conn->prepare("SELECT * FROM automatic_profits WHERE start_date <= ? AND end_date >= ? AND processed = 0");
    $stmt->execute([$today, $today]);

    $profits = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($profits as $profit) {
        $user_id = $profit['user_id'];
        $automatic_profit = $profit['profit_percentage'];

        // Retrieve current profit and balance for the user
        $stmt = $conn->prepare("SELECT balance, profit FROM users WHERE user_id = ?");
        $stmt->execute([$user_id]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        $currentProfit = $user['profit'];
        $balance = $user['balance'];

        // Calculate new profit and balance
        $processedAmount = $balance * ($automatic_profit / 100);
        $newProfit = $currentProfit + $processedAmount;

        // Update user balance and profit
        $stmt = $conn->prepare("UPDATE users SET balance = balance + ?, profit = ? WHERE user_id = ?");
        $stmt->execute([$processedAmount, $newProfit, $user_id]);

        // Log the transaction
        $stmt = $conn->prepare("INSERT INTO transaction_logs (user_id, transaction_type, amount, profit, profit_remark, processed_amount, profit_timestamp) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $profit_remark = "Automated profit adjustment from " . $profit['start_date'] . " to " . $profit['end_date'];
        $stmt->execute([$user_id, $transaction_type, $processedAmount, $automatic_profit, $profit_remark, $processedAmount, $timestamp]);

        // Update automatic_profits with the processed amount
        $stmt = $conn->prepare("UPDATE automatic_profits SET processed = 1, processed_amount = ? WHERE id = ?");
        $stmt->execute([$processedAmount, $profit['id']]);
    }
} catch (PDOException $e) {
    // Handle PDO exceptions here
    echo 'Error: ' . $e->getMessage();
}