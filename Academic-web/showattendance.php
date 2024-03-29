<?php

$servername = "localhost";
$username = "root";
$password = "05082003@David";
$database = "attendace";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die ("Connection failed: " . $conn->connect_error);
}
$table_name = $_POST["table_name"];
// SQL query to fetch data
$sql = "SELECT * FROM $table_name";
$result = $conn->query($sql);

// Check if there are rows returned
if ($result->num_rows > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Student ID</th><th>Time Arrived</th></tr>";

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["student_id"] . "</td>";
        echo "<td>" . $row["time_arrived"] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No data found";
}

// Close connection
$conn->close();
?>