<?php
session_start(); // Start session

// Database configuration
$servername = "localhost";
$username = "root"; // database username
$password = ""; // database password
$dbname = "iCare"; // database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get property address from the form
    $address = $_POST["createpropertyname"];
    
    // Get the owner ID from the session
    if (isset($_SESSION["CustomerID"])) {
        $ownerID = $_SESSION["CustomerID"];
    } else {
        // Redirect if owner ID is not found in session
        header("Location: login.php");
        exit();
    }

    // SQL query to insert new property into the Properties table
    $sql = "INSERT INTO Properties (Address, OwnerID) VALUES ('$address', '$ownerID')";

    if ($conn->query($sql) === TRUE) {
        // Property added successfully
        echo "New property added successfully";
    } else {
        // Error adding property
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
