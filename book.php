<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "appointments");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get doctor ID from query parameters
$doctor_id = $_GET['doctor_id'];

// Fetch doctor details
$sql = "SELECT * FROM doctors WHERE id = $doctor_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $doctor = $result->fetch_assoc();
    echo "<h1>Booking an appointment with Dr. " . $doctor['doctor_name'] . "</h1>";
    echo "<p>Specialization: " . $doctor['specialization'] . "</p>";
    echo "<p>Available Timing: " . $doctor['available_time'] . "</p>";
} else {
    echo "Doctor not found!";
}

// Close connection
$conn->close();
?>
