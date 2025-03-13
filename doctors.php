<?php
// Database connection
$conn = new mysqli("localhost", "root", "", "appointments");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch doctors and their available timings
$sql = "SELECT * FROM doctors";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['doctor_name'] . "</td>";
        echo "<td>" . $row['specialization'] . "</td>";
        echo "<td>" . $row['available_time'] . "</td>";
        echo "<td><a href='book.php?doctor_id=" . $row['id'] . "' class='btn btn-book'>Book Appointment</a></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='4'>No doctors available</td></tr>";
}

$conn->close();
?>
