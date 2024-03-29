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

$id = $_POST['fk_student_id'];
$table_name = $_POST["table_name"];

// Prepare and execute SQL query to delete the record
$sql = "DELETE FROM $table_name WHERE fk_student_id = $id";

echo "SQL query: $sql"; // Print out the SQL query for debugging

if ($conn->query($sql) === TRUE) {
    echo "<Script>alert('Record deleted successfully')</script>";
} else {
    echo "<script>alert('Error deleting record:  . $conn->error;')</script>";
}

$conn->close();
?>