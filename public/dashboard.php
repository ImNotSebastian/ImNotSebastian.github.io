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
       		<p class="lead">See and edit properties</p>	
          
       		<!-- PHP Tag for viewing properties-->
          
          
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

    // Initialize a counter variable
    $counter = 1;

    // Check if there are properties found
    if ($result->num_rows > 0) {
        // Output the table headers
        echo "<div>";
        echo "<table border='1' style='margin: 0 auto; width: 100%'>";
        echo "<tr><th>Property Number</th><th>Address</th><th>Zipcode</th><th>Bed Count</th><th>Bathroom Count</th><th>Floor Size</th><th>Yard Size</th><th>Tree Count</th><th>Mbps</th><th>Device Count</th><th>Floor Plan</th><th>_X</th></tr>";

        // Output each property as a table row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td style='background-color: white; padding: 6px;'>" . $counter . "</td>";
            echo "<td style='background-color: white; padding: 6px;'>" . $row["Address"] . "</td>";
            echo "<td style='background-color: white; padding: 6px;'>" . $row["Zipcode"] . "</td>";
            echo "<td style='background-color: white; padding: 6px;'>" . $row["BedCount"] . "</td>";
            echo "<td style='background-color: white; padding: 6px;'>" . $row["BathroomCount"] . "</td>";
            echo "<td style='background-color: white; padding: 6px;'>" . $row["FloorSize"] . "</td>";
            echo "<td style='background-color: white; padding: 6px;'>" . $row["YardSize"] . "</td>";
            echo "<td style='background-color: white; padding: 6px;'>" . $row["TreeCount"] . "</td>";
            echo "<td style='background-color: white; padding: 6px;'>" . $row["Mbps"] . "</td>";
            echo "<td style='background-color: white; padding: 6px;'>" . $row["DeviceCount"] . "</td>";
            echo "<td style='background-color: white; padding: 6px;'>" . $row["FloorPlan"] . "</td>";
            echo "<td style='background-color: white; padding: 6px;'><form method='post'><input type='hidden' name='delete_property_id' value='" . $row["PropertyID"] . "'><button type='submit' name='delete'>Delete</button></form></td>";
            echo "</tr>";
            // Increment the counter
            $counter++;
        }

        echo "</table>";
        echo "</div>";
    } else {
        echo "No properties found.";
    }
} else {
    // If 'customer_id' session variable is not set, display a message
    echo "Please log in";
}

// Handle delete property action
if (isset($_POST['delete'])) {
    // Get the property ID from the form
    $property_id = $_POST['delete_property_id'];

    // Query to delete the property from the database
    $delete_query = "DELETE FROM Properties WHERE PropertyID = '$property_id'";
    if ($conn->query($delete_query) === TRUE) {
        // Refresh the page to reflect the changes
        echo "<meta http-equiv='refresh' content='0'>";
    } else {
        echo "Error deleting property: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>



			<br>
 
          	<!-- No, for realsies, insert properties here -->		  
<p class="lead">
    <button data-toggle="collapse" data-target="#createproperty">Create New Property</button>
    <div id="createproperty" class="collapse">
        <h3>Create New Property</h3>
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

        // Check if form is submitted and $address is not null
        if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["createpropertyname"]) && !empty($_POST["zipcode"])) {
            // Get property address and zipcode from the form
            $address = $_POST["createpropertyname"];
            $zipcode = $_POST["zipcode"];

            // Get the owner ID from the session
            if (isset($_SESSION["customer_id"])) {
                $ownerID = $_SESSION["customer_id"];

                // SQL query to insert new property into the Properties table
                $sql = "INSERT INTO Properties (Address, Zipcode, OwnerID) VALUES ('$address', '$zipcode', '$ownerID')";

                if ($conn->query($sql) === TRUE) {
                    // Property added successfully
                    // Refresh the page to reflect the changes
                    echo "<meta http-equiv='refresh' content='0'>";
                } else {
                    // Error adding property
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                // Redirect if owner ID is not found in session
                header("Location: login.php");
                exit(); // Make sure to exit after redirection
            }
        }
        ?>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="createpropertyname">Property Address:</label>
            <input type="text" class="form-control" id="createpropertyname" name="createpropertyname">
            <br>
            <label for="zipcode">Zipcode:</label>
            <input type="text" class="form-control" id="zipcode" name="zipcode">
            <br>
            <button type="submit">Create</button>
        </form>
    </div>
    <br>
</p>      
          
      <h3>Suggested Services</h3>
      
    
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

// Check if option is selected
$option = isset($_GET['option']) ? $_GET['option'] : '';

// Default query to select all services
$query = "SELECT * FROM Services";

// Query based on the selected option
if ($option == 'distance') {
    // Query to select services sorted by matching zipcode first
    $query = "SELECT * FROM Services WHERE zipcode IN (SELECT DISTINCT Zipcode FROM Properties WHERE OwnerID = '$ownerID')";
} elseif ($option == 'price') {
    // Query to select services sorted by price in ascending order
    $query = "SELECT * FROM Services ORDER BY Price ASC";
}

// Execute the query
$result = $conn->query($query);

// Check if there are services found
if ($result->num_rows > 0) {
    // Output the table headers
    echo "<div>";
    echo "<table border='1' style='margin: 0 auto; width: 100%'>";
    echo "<tr><th>Name</th><th>Description</th><th>Price</th><th>Availability</th><th>Zipcode</th><th>Action</th><th>Additional Description</th></tr>";

    // Output each service as a table row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td style='background-color: white; padding: 6px;'>" . $row["name"] . "</td>";
        echo "<td style='background-color: white; padding: 6px;'>" . $row["Description"] . "</td>";
        echo "<td style='background-color: white; padding: 6px;'>" . $row["Price"] . "</td>";
        echo "<td style='background-color: white; padding: 6px;'>" . $row["Availability"] . "</td>";
        echo "<td style='background-color: white; padding: 6px;'>" . $row["zipcode"] . "</td>";
        echo "<td style='background-color: white; padding: 6px;'><form method='post'><input type='hidden' name='service_id' value='" . $row["ProductID"] . "'><button type='submit' name='request_service'>Request Service</button></form></td>";
        echo "<td style='background-color: white; padding: 6px;'><input type='text' name='description'></td>";
        echo "</tr>";
    }

    echo "</table>";
    echo "</div>";
} else {
    echo "No services matching search requirements found.";
}

// Handle request service action
if (isset($_POST['request_service'])) {
    // Get the service ID from the form
    $service_id = $_POST['service_id'];

    // Get the logged-in homeowner's customer ID
    $customer_id = isset($_SESSION['customer_id']) ? (int)$_SESSION['customer_id'] : 0;
    
    // Get the description from the form
    $description = isset($_POST['description']) ? $_POST['description'] : '';

    // Insert an entry into the Requests table with the additional description
    $insertRequestSql = "INSERT INTO Requests (ProductID, CustomerID, Description) VALUES ('$service_id', '$customer_id', '$description')";
    if ($conn->query($insertRequestSql) === TRUE) {
        echo "Service requested successfully.";
    } else {
        echo "Error requesting service: " . $conn->error;
        // You might want to handle this error condition appropriately
    }
}

// Close the database connection
$conn->close();
?>

<!-- Radio Buttons -->
<div class="form-group mt-3">
    <form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label>Select Option:</label><br>
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="option1" name="option" class="custom-control-input" value="price" <?php if ($option == 'price') echo 'checked'; ?> onchange="this.form.submit()">
            <label class="custom-control-label" for="option1">Price</label>
        </div>
    </form>
    <form method="get" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="option2" name="option" class="custom-control-input" value="distance" <?php if ($option == 'distance') echo 'checked'; ?> onchange="this.form.submit()">
            <label class="custom-control-label" for="option2">Distance</label>
        </div>
    </form>
</div>





      
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
	   <a href ="settings.php">
        <button type="button" class="btn btn-success btn-block">Settings</button>
		</a>
    </div>
  </div>
</div>

<div class="container-fluid text-center">    
	<div class="row content">
		<!--Show Active Services-->
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


