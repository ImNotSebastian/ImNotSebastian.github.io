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
    $query = "SELECT Name, BusinessID, Description, Price, Availability, Zipcode, Address, ProductID FROM Services WHERE BusinessID = '$bizID'";
    $result = $conn->query($query);

    // Initialize a counter variable
    $counter = 1;

    // Check if there are services found
    if ($result->num_rows > 0) {
        // Output the table headers
        echo "<div>";
        echo "<table border='1' style='margin: 0 auto; width: 100%'>";
        echo "<tr><th>Name</th><th>BusinessID</th><th>Description</th><th>Price</th><th>Availability</th><th>Zipcode</th><th>Address</th><th>Action</th></tr>";

        // Output each service as a table row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td style='background-color: white; padding: 6px;'>" . $row["Name"] . "</td>";
            echo "<td style='background-color: white; padding: 6px;'>" . $row["BusinessID"] . "</td>";
            echo "<td style='background-color: white; padding: 6px;'>" . $row["Description"] . "</td>";
            echo "<td style='background-color: white; padding: 6px;'>" . $row["Price"] . "</td>";
            echo "<td style='background-color: white; padding: 6px;'>" . $row["Availability"] . "</td>";
            echo "<td style='background-color: white; padding: 6px;'>" . $row["Zipcode"] . "</td>";
            echo "<td style='background-color: white; padding: 6px;'>" . $row["Address"] . "</td>";
            echo "<td style='background-color: white; padding: 6px;'><form method='post'><input type='hidden' name='delete_product_id' value='" . $row["ProductID"] . "'><button type='submit' name='delete'>Delete</button></form></td>";
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

// Handle delete action
if (isset($_POST['delete'])) {
    // Get the product ID from the form
    $product_id = $_POST['delete_product_id'];

    // Query to delete the service from the database
    $delete_query = "DELETE FROM Services WHERE ProductID = '$product_id'";
    if ($conn->query($delete_query) === TRUE) {
        // Refresh the page to reflect the changes
        header("Refresh:0");
    } else {
        echo "Error deleting service: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>



<br>
<p class="lead">
    <button data-toggle="collapse" data-target="#createservice">Create New Service</button>
    <div id="createservice" class="collapse">
        <h3>Create New Service</h3>
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

// Check if form is submitted and all required fields are not empty
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["name"]) && !empty($_POST["price"]) && !empty($_POST["description"]) && !empty($_POST["availability"]) && !empty($_POST["zipcode"]) && !empty($_POST["address"])) {
    // Get form data
    $name = $_POST["name"];
    $price = $_POST["price"];
    $description = $_POST["description"];
    $availability = $_POST["availability"];
    $zipcode = $_POST["zipcode"];
    $address = $_POST["address"];

    // Get the business ID from the session
    if (isset($_SESSION["biz_id"])) {
        $bizID = $_SESSION["biz_id"];

        // SQL query to insert new service into the Services table
        $sql = "INSERT INTO Services (Name, Price, Description, Availability, BusinessID, Zipcode, Address) VALUES ('$name', '$price', '$description', '$availability', '$bizID', '$zipcode', '$address')";

        if ($conn->query($sql) === TRUE) {
            // Service added successfully

            // Get the last inserted service's ID
            $serviceID = $conn->insert_id;

            // Update the logged-in BusinessOwners table with the new service's ID
            $updateSql = "UPDATE BusinessOwners SET ProductID = '$serviceID' WHERE BusinessID = '$bizID'";
            if ($conn->query($updateSql) === TRUE) {
                if ($conn->query($insertRequestSql) === TRUE) {
                    // Refresh the page to reflect the changes
                    echo "<meta http-equiv='refresh' content='0'>";
                } else {
                    echo "Error inserting into Requests table: " . $conn->error;
                }
            } else {
                echo "Error updating BusinessOwners table: " . $conn->error;
            }
        } else {
            // Error adding service
            echo "Error: " . $sql . ": " . $conn->error;
        }
    } else {
        // Redirect if business ID is not found in session
        header("Location: login.php");
        exit(); // Make sure to exit after redirection
    }
}
?>


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="name">Service Name:</label>
    <input type="text" class="form-control" id="name" name="name">
    <br>
    <label for="price">Price:</label>
    <input type="text" class="form-control" id="price" name="price">
    <br>
    <label for="description">Description:</label>
    <input type="text" class="form-control" id="description" name="description">
    <br>
    <label for="availability">Availability:</label>
    <input type="text" class="form-control" id="availability" name="availability">
    <br>
    <label for="zipcode">Zipcode:</label>
    <input type="text" class="form-control" id="zipcode" name="zipcode">
    <br>
    <label for="address">Address:</label>
    <input type="text" class="form-control" id="address" name="address">
    <br>
    <button type="submit">Create</button>
</form>

    </div>
    <br>
</p>




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


 <div class="container overflow-auto">
</div>
  <footer class="navbar-fixed-bottom bg-black text-white mt-auto">
      <div class="container text-center">
          <p><p>&copy; Copyright 2024, Hassan's Corporation</p></p>
      </div>
  </footer>
</body>



</html>


