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
    // Get username and password from the form
    $username = $_POST["email"];
    $password = $_POST["pwd"];
    
    // SQL query to check if the username and password match
    $sql = "SELECT * FROM BusinessOwners WHERE UserName='$username' AND Password='$password'";
    $result = $conn->query($sql);
    
    if ($result->num_rows == 1) {
        // Login successful, set session variables
        $_SESSION["username"] = $username;
        // Redirect to dashboard
        header("Location: bizlogin.php");
        exit();
    } else {
        // Invalid username or password
        $error = "Invalid username or password";
    }
}

// Close connection
$conn->close();
?>
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
        <li class="active"><a href="index.php">Home</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="signup.php">Sign Up</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
  
  <!--Center Column-->
<div class="container-fluid text-center border">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
       <h3>Services</h3>
	  	  <p><a href="contact.php"  class="text-decoration-none">Support</a></p>
      <p><a href="TOS.php"  class="text-decoration-none">Terms of Service</a></p>
      <p><a href="PP.php"  class="text-decoration-none">Privacy Policy</a></p>
    </div>

    <div class="col-sm-8 text-center">
	   <img src="../style/iCareLogo.png" class="img-fluid" alt = "Logo">
		<h1>Your Personal Property Manager</h1>
       	<form action="bizlogin.php" method="POST">

         <div class="btn-group">
               <a href="login.php" class="btn btn-default" role="button">Home Owner</a>
               <a href="bizlogin.php" class="btn btn-primary" role="button">Business</a>

         </div>


			<div class="form-group">
				<label for="email">Email address:</label>
				<input type="email" class="form-control" id="email" name ="email">
			</div>
			<div class="form-group">
				<label for="pwd">Password:</label>
				<input type="password" class="form-control" id="pwd" name ="pwd">
			</div>
			<div class="checkbox">
				<label><input type="checkbox"> Remember me</label>
			</div>
         <button type="submit" class="btn btn-default">Submit</button>
		</form>
    </div>
	   
	<div class="col-sm-2 sidenav">
      <div class="well">
        <p>Ad for Service</p>
      </div>
      <div class="well">
        <p>Ad for Service</p>
      </div>
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


