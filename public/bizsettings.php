<?php
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

// Check if form data is set
if (isset($_POST['current_password']) && isset($_POST['new_password']) && isset($_POST['confirm_password'])) {
    // Retrieve current password and new password from the form
    $currentPassword = $_POST['current_password'];
    $newPassword = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    // Retrieve BusinessOwner ID from session
    $bizID = $_SESSION["biz_id"];

    // Check if the new password matches the confirm password
    if ($newPassword !== $confirmPassword) {
        echo "<p>New password and confirm password do not match.</p>";
    } else {
        // Retrieve the current password from the database
        $checkPasswordQuery = "SELECT Password FROM BusinessOwners WHERE OwnerID = '$bizID'";
        $result = $conn->query($checkPasswordQuery);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $storedPassword = $row["Password"];

            // Check if the current password matches the password stored in the database
            if ($currentPassword === $storedPassword) {
                // Update the password in the database
                $updatePasswordQuery = "UPDATE BusinessOwners SET Password = '$newPassword' WHERE OwnerID = '$bizID'";
                if ($conn->query($updatePasswordQuery) === TRUE) {
                    echo "<p>Password changed successfully.</p>";
                } else {
                    echo "<p>Error updating password: " . $conn->error . "</p>";
                }
            } else {
                echo "<p>Incorrect current password.</p>";
            }
        } else {
            echo "<p>BusinessOwner not found.</p>";
        }
    }
}

// Check if deletion confirmation is set
if (isset($_POST['confirm_delete'])) {
    // Retrieve BusinessOwner ID from session
    $bizID = $_SESSION["biz_id"];

    // Delete the BusinessOwner account from the database
    $deleteQuery = "DELETE FROM BusinessOwners WHERE OwnerID = '$bizID'";
    if ($conn->query($deleteQuery) === TRUE) {
        echo "<p>Account deleted successfully.</p>";
        // Clear session and redirect to logout page
        session_unset();
        session_destroy();
        header("Location: logout.php");
        exit();
    } else {
        echo "<p>Error deleting account: " . $conn->error . "</p>";
    }
}

// Close the database connection
$conn->close();
?>

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
	  
	  
	  <li class="list-group-item">
    <button data-toggle="collapse" data-target="#change">Change Password</button>
    <div id="change" class="collapse">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form-group">
                <label for="current_password">Current Password:</label>
                <input type="password" class="form-control" id="current_password" name="current_password" required>
            </div>
            <div class="form-group">
                <label for="new_password">New Password:</label>
                <input type="password" class="form-control" id="new_password" name="new_password" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm New Password:</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>
    </div>
</li>
<li class="list-group-item">
    <button data-toggle="collapse" data-target="#delete">Delete Account</button>
    <div id="delete" class="collapse">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="checkbox">
                <label><input type="checkbox"> Remember me</label>
            </div>
            <button type="submit" class="btn btn-default" name="confirm_delete">Submit</button>
        </form>
    </div>
</li>

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


