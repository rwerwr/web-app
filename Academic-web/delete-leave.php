<?php
$servername = "localhost";
$username = "root";
$password = "05082003@David";
$dbname = "academic";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die ("Connection failed: " . $conn->connect_error);
}

$id = $_POST['id'];
$table_name = $_POST['table_name'];

// Prepare and execute SQL query to delete the record
$sql = "DELETE FROM leaveform WHERE form_id = $id";


if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>