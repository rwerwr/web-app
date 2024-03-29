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

$table_name = $_POST["table_name"];

// Prepare and execute SQL query to delete the record
$sql = "DROP table $table_name";

echo "SQL query: $sql"; // Print out the SQL query for debugging

if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>