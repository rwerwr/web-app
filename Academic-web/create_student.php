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

// Get POST data
$name = $_POST['student_name'];
$id = $_POST['student_id'];

// SQL to insert into table
$sql = "INSERT INTO student_tbl (student_id, student_name) VALUES (?, ?)";
$stmt = $conn->prepare($sql);

// Check if the statement was prepared successfully
if ($stmt === false) {
    die ("Error preparing statement: " . $conn->error);
}

// Bind parameters
$stmt->bind_param("is", $id, $name);

// Execute SQL query
if ($stmt->execute() === TRUE) {
    echo "<script>alert('Inserted successfully')</script>";
} else {
    echo "Error inserting record: " . $stmt->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
?>