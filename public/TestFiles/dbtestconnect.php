<?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$database = "iCare";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Write and execute query
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

// Check if query was successful
if ($result) {
    // Fetch data and do something with it
    while ($row = $result->fetch_assoc()) {
        echo "Name: " . $row["name"] . "<br>";
    }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>