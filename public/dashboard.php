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
        echo "<table border='1' style='margin: 0 auto;'>";
        echo "<tr><th>Property Number</th><th>Address</th><th>Dimensions</th><th>Insurance</th><th>Internet</th><th>Action</th></tr>";

        // Output each property as a table row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td style='background-color: white; padding: 10px;'>" . $counter . "</td>";
            echo "<td style='background-color: white; padding: 10px;'>" . $row["Address"] . "</td>";
            echo "<td style='background-color: white; padding: 10px;'>" . $row["Dimensions"] . "</td>";
            echo "<td style='background-color: white; padding: 10px;'>" . $row["Insurance"] . "</td>";
            echo "<td style='background-color: white; padding: 10px;'>" . $row["Internet"] . "</td>";
            echo "<td style='background-color: white; padding: 10px;'><form method='post'><input type='hidden' name='delete_property_id' value='" . $row["PropertyID"] . "'><button type='submit' name='delete'>Delete</button></form></td>";
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
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["createpropertyname"])) {
    // Get property address from the form
    $address = $_POST["createpropertyname"];

    // Get the owner ID from the session
    if (isset($_SESSION["customer_id"])) {
        $ownerID = $_SESSION["customer_id"];

        // SQL query to insert new property into the Properties table
        $sql = "INSERT INTO Properties (Address, OwnerID) VALUES ('$address', '$ownerID')";

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
            	<button type="submit">Create</button>
          	</form>
      	</div>
      	<br>      
          
          
          
      <h3>Other Account Stuff</h3>
      
      
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


