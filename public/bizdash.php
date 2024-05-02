<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="../style/styles.css">


<title>iCare</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


</head>
<body>






<!--Navigation Bar-->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php">
         <img src="../style/iCareLogo.png" alt = "Logo"style="width:90px;height:30px;">
      </a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="signup.php">Sign Up</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right"
          <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Sign Out</a></li>
      </ul>
    </div>
  </div>
</nav>
 
 <!--Center Column-->
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
       <h2>Services</h2>
	 	  <p><a href="contact.php"  class="text-decoration-none">Support</a></p>
      <p><a href="TOS.php"  class="text-decoration-none">Terms of Service</a></p>
      <p><a href="PP.php"  class="text-decoration-none">Privacy Policy</a></p>
    </div>

    <div class="col-sm-8 text-center">
	   <img src="../style/iCareLogo.png" class="img-fluid" alt = "Logo">
      <h1>Account Overview</h1>
<?php
// Start session
session_start();

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

// Check if session variable 'biz_id' is set
if (isset($_SESSION["biz_id"])) {
    // Get the business ID from the session
    $bizID = $_SESSION["biz_id"];

    // Query to select services where BusinessID matches the session's biz_id
    $query = "SELECT Name, BusinessID, Description, Price, Availability, Address FROM Services WHERE BusinessID = '$bizID'";
    $result = $conn->query($query);

    // Initialize a counter variable
    $counter = 1;

    // Check if there are services found
    if ($result->num_rows > 0) {
        // Output the table headers
        echo "<div>";
        echo "<table border='1' style='margin: 0 auto; width: 100%'>";
        echo "<tr><th>Name</th><th>BusinessID</th><th>Description</th><th>Price</th><th>Availability</th><th>Address</th></tr>";

        // Output each service as a table row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td style='background-color: white; padding: 6px;'>" . $row["Name"] . "</td>";
            echo "<td style='background-color: white; padding: 6px;'>" . $row["BusinessID"] . "</td>";
            echo "<td style='background-color: white; padding: 6px;'>" . $row["Description"] . "</td>";
            echo "<td style='background-color: white; padding: 6px;'>" . $row["Price"] . "</td>";
            echo "<td style='background-color: white; padding: 6px;'>" . $row["Availability"] . "</td>";
            echo "<td style='background-color: white; padding: 6px;'>" . $row["Address"] . "</td>";
            echo "</tr>";
            // Increment the counter
            $counter++;
        }

        echo "</table>";
        echo "</div>";
    } else {
        echo "No services found.";
    }
} else {
    // If 'biz_id' session variable is not set, display a message
    echo "Please log in";
}

// Close the database connection
$conn->close();
?>


<br>

<?php
// Start session
session_start();

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

// Check if session variable 'biz_id' is set
if (isset($_SESSION["biz_id"])) {
    // Get the business ID from the session
    $bizID = $_SESSION["biz_id"];

    // Query to select requests associated with products owned by the logged-in BusinessOwner
    $requestsQuery = "SELECT r.*, s.Name AS ServiceName
                      FROM Requests AS r
                      INNER JOIN Services AS s ON r.ProductID = s.ProductID
                      WHERE s.BusinessID = '$bizID'";
    $requestsResult = $conn->query($requestsQuery);

    // Check if there are requests found
    if ($requestsResult->num_rows > 0) {
        // Output the table headers for requests
        echo "<div>";
        echo "<h3>Clients</h3>";
        echo "<table border='1' style='margin: 0 auto; width: 100%'>";
        echo "<tr><th>Request ID</th><th>Product Name</th><th>Action</th></tr>";

        // Output each request as a table row
        while ($requestRow = $requestsResult->fetch_assoc()) {
            echo "<tr>";
            echo "<td style='background-color: white; padding: 6px;'>" . $requestRow["RequestID"] . "</td>";
            echo "<td style='background-color: white; padding: 6px;'>" . $requestRow["ServiceName"] . "</td>";
            echo "<td style='background-color: white; padding: 6px;'><form method='post'><input type='hidden' name='request_id' value='" . $requestRow["RequestID"] . "'><button type='submit' name='resolve_request'>Resolved</button></form></td>";
            echo "</tr>";
        }

        echo "</table>";
        echo "</div>";
    } else {
        echo "No requests found.";
    }
} else {
    // If 'biz_id' session variable is not set, display a message
    echo "Please log in";
}

// Handle resolve request action
if (isset($_POST['resolve_request'])) {
    // Get the request ID from the form
    $requestID = $_POST['request_id'];

    // Query to delete the request from the database
    $deleteQuery = "DELETE FROM Requests WHERE RequestID = '$requestID'";
    if ($conn->query($deleteQuery) === TRUE) {
        echo "Request resolved successfully.";
    } else {
        echo "Error resolving request: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>


      <hr>
    </div>
    
    
    
    <div class="col-sm-2 sidenav">
		<a href ="bizdash.php">
			<h2>Dashboard</h2>
		</a>
		<a href ="businesses.php">
			<button type="button" class="btn btn-success btn-block">Products</button>
		</a>
      <hr>
		<a href ="analytics.php">
			<button type="button" class="btn btn-success btn-block">Clients</button>
		</a>

      <hr>
	   <a href ="bizsettings.php">
        <button type="button" class="btn btn-success btn-block">Settings</button>
		</a>
    </div>
  </div>
</div>



<!--Footer-->
<div class="container-fluid">
 <div class="row">
    <footer class = "col-sm-12 text-center">
        <p>&copy; Copyright 2024, Hassan's Corporation</p>
    </footer>
  </div>
</div>
</body>

</html>


