<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "appointments";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database if it doesn't exist
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully or already exists.<br>";
} else {
    echo "Error creating database: " . $conn->error;
}

// Select the database
$conn->select_db($dbname);

// Create doctors table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS doctors (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    doctor_name VARCHAR(50) NOT NULL,
    specialization VARCHAR(50) NOT NULL,
    available_time VARCHAR(50) NOT NULL
)";
if ($conn->query($sql) === TRUE) {
    echo "Table 'doctors' created successfully or already exists.<br>";
} else {
    echo "Error creating table: " . $conn->error;
}

// Close connection
$conn->close();
?>