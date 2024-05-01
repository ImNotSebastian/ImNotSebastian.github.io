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
      <h1>Interior</h1>
      <b>iCare is a groundbreaking home service that empowers homeowners to effortlessly manage their essential home services in a whole new way. With iCare, homeowners can create personalized home profiles encompassing every aspect of their living space, from mortgages and insurance to lawn care, internet, and more.</b>
      <hr>

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
        echo "<tr><th>Property Number</th><th>Address</th><th>Zipcode</th><th>Bed Count</th><th>Bathroom Count</th><th>Floor Size</th><th>Floor Plans</th><th>Action</th></tr>";

        // Output each property as a table row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td style='background-color: white; padding: 6px;'>" . $row["PropertyID"] . "</td>";
            echo "<td style='background-color: white; padding: 6px;'>" . $row["Address"] . "</td>";
            echo "<td style='background-color: white; padding: 6px;'>" . $row["Zipcode"] . "</td>";
            echo "<td style='background-color: white; padding: 6px;'><input type='number' name='bedcount[" . $row["PropertyID"] . "]' value='" . $row["BedCount"] . "' style='width: 60px'></td>";
            echo "<td style='background-color: white; padding: 6px;'><input type='number' name='bathroomcount[" . $row["PropertyID"] . "]' value='" . $row["BathroomCount"] . "' style='width: 60px'></td>";
            echo "<td style='background-color: white; padding: 6px;'><input type='number' name='floorsize[" . $row["PropertyID"] . "]' value='" . $row["FloorSize"] . "' style='width: 60px'></td>";
            echo "<td style='background-color: white; padding: 6px;'><input type='file' name='floorplans[" . $row["PropertyID"] . "]'></td>";
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
    $bedcount = $_POST['bedcount'][$propertyID];
    $bathroomcount = $_POST['bathroomcount'][$propertyID];
    $floorsize = $_POST['floorsize'][$propertyID];
    
    // Handle floor plans upload
    if(isset($_FILES['floorplans']['name'][$propertyID])) {
        $floorplans_tmp_name = $_FILES['floorplans']['tmp_name'][$propertyID];
        $floorplans_data = file_get_contents($floorplans_tmp_name);
        $floorplans_data = $conn->real_escape_string($floorplans_data);
        $update_query = "UPDATE Properties SET FloorPlans = '$floorplans_data' WHERE PropertyID = '$propertyID'";
        if ($conn->query($update_query) !== TRUE) {
            echo "Error updating floor plans: " . $conn->error;
        }
    }

    // Update the property in the database
    $update_query = "UPDATE Properties SET BedCount = '$bedcount', BathroomCount = '$bathroomcount', FloorSize = '$floorsize' WHERE PropertyID = '$propertyID'";
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

</body>


<!--Footer-->
<body class="d-flex flex-column vh-100">
 <div class="container overflow-auto">
  </div>
  <footer class="bg-black text-white mt-auto">
      <div class="container text-center">
          <p><p>&copy; Copyright 2024, Hassan's Corporation</p></p>
      </div>
  </footer>
</body>
</html>

<!--Comment-->



</html>


