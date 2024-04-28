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
    echo "Connection Failed!<br>";
    die("Connection failed: " . $conn->connect_error);
}


// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get username and password from the form
    $username = $_POST["email"];
    $password = $_POST["pwd"];

    // Check the referring page to determine the user type
    $referrer = $_SERVER['HTTP_REFERER'];
    $user_type = '';

    if (strpos($referrer, 'login.php') !== false) {
        // User is a homeowner
        $user_type = 'Homeowners';
    } elseif (strpos($referrer, 'bizlogin.php') !== false) {
        // User is a business owner
        $user_type = 'BusinessOwners';
    }

    if (!empty($user_type)) {
        // SQL query to check if the username and password match
        $sql = "SELECT * FROM $user_type WHERE UserName='$username' AND Password='$password'";
        $result = $conn->query($sql);

        if ($result && $result->num_rows == 1) {
            // Login successful, fetch user data
            $row = $result->fetch_assoc();

            // Set session variables for each column in the respective table
            if ($user_type === 'Homeowners') {
                $_SESSION["username"] = $row["UserName"];
                $_SESSION["fullname"] = $row["Name"];
                $_SESSION["phone"] = $row["PhoneNum"];
                $_SESSION["business_id"] = $row["BusinessD"];
                // Add more session variables for other columns as needed
            } elseif ($user_type === 'BusinessOwners') {
                $_SESSION["username"] = $row["UserName"];
                $_SESSION["fullname"] = $row["Name"];
                $_SESSION["phone"] = $row["PhoneNum"];
                $_SESSION["property_id"] = $row["PropertyID"];
                // Add more session variables for other columns as needed
            }

            // Redirect based on user type
            if ($user_type === 'Homeowners') {
                header("Location: dashboard.php");
                exit(); // Make sure to exit after redirection
            } elseif ($user_type === 'BusinessOwners') {
                header("Location: bizdash.php");
                exit(); // Make sure to exit after redirection
            }
        } else {
            // Invalid username or password
            echo "Invalid username or password";
            header("Location: login.php");
            exit(); // Make sure to exit after redirection
        }
    } else {
        // Invalid user type
        echo "Invalid usertype";
        $error = "Invalid user type";
    }
}

// Close connection
$conn->close();
?>