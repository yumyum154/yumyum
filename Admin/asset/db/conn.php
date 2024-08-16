<?php

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