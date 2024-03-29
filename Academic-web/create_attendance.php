<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "05082003@David";
$database = "academic";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die ("Connection failed: " . $conn->connect_error);
}

// Check if form data is set
if (isset ($_POST["name-of-table"], $_POST["student_id"], $_POST["time-arrived"])) {
    $name = $_POST["name-of-table"];
    $student_id = $_POST['student_id'];
    $timearrived = $_POST['time-arrived'];

    $sql = "INSERT INTO $name (fk_student_id, time_arrived) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);

    // Check if the statement was prepared successfully
    if ($stmt === false) {
        die ("Error preparing statement: " . $conn->error);
    }

    // Bind parameters
    $stmt->bind_param("is", $student_id, $timearrived);

    // Execute SQL query
    if ($stmt->execute()) {
        echo "<script>alert('Inserted successfully')</script>";
    } else {
        echo "Error inserting into table: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
} else {
    echo "Form data not set.";
}

// Close connection
$conn->close();
?>