<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database credentials
$host = "localhost";
$user = "root";         // Replace with your MySQL username
$password = "";         // Replace with your MySQL password
$database = "news_website";

// Step 1: Connect to MySQL without a database
$conn = mysqli_connect($host, $user, $password);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Step 2: Create the database if it does not exist
$db_query = "CREATE DATABASE IF NOT EXISTS $database";
if (!mysqli_query($conn, $db_query)) {
    die("Error creating database: " . mysqli_error($conn));
}

// Select the database
mysqli_select_db($conn, $database);

// Step 3: Create `news_articles` table with image_url column
$table_query = "
CREATE TABLE IF NOT EXISTS news_articles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    rss_id VARCHAR(255) UNIQUE NOT NULL,
    title VARCHAR(255) NOT NULL,
    content_text TEXT NOT NULL,
    image_url VARCHAR(255) DEFAULT NULL,
    date_published DATETIME NOT NULL,
    is_deleted TINYINT(1) DEFAULT 0
)";

if (!mysqli_query($conn, $table_query)) {
    die("Error creating table: " . mysqli_error($conn));
}

// Connection success
?>
