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
      <ul class="nav navbar-nav navbar-right">
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
      <h1>Internet</h1>
      <hr>
      <p>iCare needs some information about your internet needs for your request. Please enter your Mbs and device count below after going through the embedded web tool.</p>
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

// Check if session variable 'customer_id' is set
if (isset($_SESSION["customer_id"])) {
    // Get the customer ID from the session
    $ownerID = $_SESSION["customer_id"];

    // Query to select properties owned by the current user
    $query = "SELECT * FROM Properties WHERE OwnerID = '$ownerID'";
    $result = $conn->query($query);

    // Check if there are properties found
    if ($result->num_rows > 0) {
        // Output the table headers
        echo "<div>";
        echo "<form method='post'>";
        echo "<table border='1' style='margin: 0 auto; width: 100%'>";
        echo "<tr><th>Property Number</th><th>Address</th><th>Zipcode</th><th>Mbps</th><th>Device Count</th><th>Action</th></tr>";

        // Output each property as a table row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td style='background-color: white; padding: 6px;'>" . $row["PropertyID"] . "</td>";
            echo "<td style='background-color: white; padding: 6px;'>" . $row["Address"] . "</td>";
            echo "<td style='background-color: white; padding: 6px;'>" . $row["Zipcode"] . "</td>";
            echo "<td style='background-color: white; padding: 6px;'><input type='text' name='mbps[" . $row["PropertyID"] . "]' value='" . $row["Mbps"] . "'></td>";
            echo "<td style='background-color: white; padding: 6px;'><input type='text' name='devicecount[" . $row["PropertyID"] . "]' value='" . $row["DeviceCount"] . "'></td>";
            echo "<td style='background-color: white; padding: 6px;'><button type='submit' name='update' value='" . $row["PropertyID"] . "'>Update</button></td>";
            echo "</tr>";
        }

        echo "</table>";
        echo "</form>";
        echo "</div>";
    } else {
        echo "No properties found.";
    }
} else {
    // If 'customer_id' session variable is not set, display a message
    echo "Please log in";
}

// Handle property update action
if (isset($_POST['update'])) {
    $propertyID = $_POST['update'];
    $mbps = $_POST['mbps'][$propertyID];
    $devicecount = $_POST['devicecount'][$propertyID];

    // Update the property in the database
    $update_query = "UPDATE Properties SET Mbps = '$mbps', DeviceCount = '$devicecount' WHERE PropertyID = '$propertyID'";
    if ($conn->query($update_query) === TRUE) {
        // Refresh the page to reflect the changes
        echo "<meta http-equiv='refresh' content='0'>";
    } else {
        echo "Error updating property: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
      <br>
      <embed src="https://broadbandnow.com/bandwidth-calculator" style="width:100%; height: 550px;">
      <h3>Other Account Stuff</h3>
      <p>Now you shall suffer...</p>
    </div>
    <div class="col-sm-2 sidenav">
		<a href ="dashboard.php">
			<h2>Dashboard</h2>
		</a>
		<a href ="landscaping.php">
			<button type="button" class="btn btn-success btn-block">Landscaping</button>
		</a>
      <hr>
		<a href ="internet.php">
			<button type="button" class="btn btn-success btn-block">Internet</button>
		</a>
      <hr>
	  <a href ="interior.php">
        <button type="button" class="btn btn-success btn-block">Interior</button>
	  </a>
      <hr>
	   <a href ="billing.php">
        <button type="button" class="btn btn-success btn-block">Billing</button>
		</a>
      <hr>
	   <a href ="settings.php">
        <button type="button" class="btn btn-success btn-block">Settings</button>
		</a>
    </div>
  </div>
</div>


<div class="container-fluid">
 <div class="row">
	<footer class = "col-sm-12 text-center">
		<p>&copy; Copyright 2024, Hassan's Corporation</p>
	</footer>
  </div>
</div>




</body>
</html>


