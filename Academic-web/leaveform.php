<?php
$servername = 'localhost';
$username = 'root';
$password = '05082003@David';
$dbname = 'academic';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die ("Connection failed: " . $conn->connect_error);
}

$student_id = $_POST["student_id"];
$student_name = $_POST["student_name"];
$reason = $_POST["Reason"];
$from_date = $_POST["from_date"];
$to_date = $_POST["to_date"];
$subjectmissing = $_POST["subject_missing"];
$degreetype = $_POST["degree_type"];

$stmt = $conn->prepare("INSERT INTO leaveform (student_id, student_name, degree_type, subject_missing,Reason,from_date,to_date) VALUES (?, ?, ?, ?, ?, ?, ?)");
if ($stmt === false) {
    die ("Error in prepare(): " . $conn->error);
}
$stmt->bind_param("issssss", $student_id, $student_name, $degreetype, $subjectmissing, $reason, $from_date, $to_date);
// Execute the statement
if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>