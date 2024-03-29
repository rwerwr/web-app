<?php
// Database connection parameters
$servername = "localhost"; // Change this to your database server name
$username = "root"; // Change this to your database username
$password = "05082003@David";
$database = "academic";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die ("Connection failed: " . $conn->connect_error);
}
$title = $_POST['title'];

$sql = "CREATE TABLE $title (
    time_arrived DATETIME,
    fk_student_id int,
    FOREIGN KEY (fk_student_id) REFERENCES student_tbl(student_id)
)";
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Table Created successfully')</script>";
} else {
    echo "Error creating table: " . $conn->error;
}

// Close connection
$conn->close();
?>