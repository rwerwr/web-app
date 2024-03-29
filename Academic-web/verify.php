<?php
$servername = 'localhost';
$username = 'root';
$password = '05082003@David';
$dbname = 'academic';

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die ("Connection failed: " . $conn->connect_error);
}


$username = $_POST["username"];
$password = $_POST["password"];


$stmt = $conn->prepare("SELECT * FROM user_tbl WHERE username = ? AND userpassword = ?");
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows == 1) {

    header("Location: func.php");
    exit();
} else {

    echo '<script>alert("Invalid username or password. Please try again.")</script>';
}

$stmt->close();
$conn->close();
?>