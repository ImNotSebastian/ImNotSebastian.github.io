<?php
// Database configuration
$servername = "localhost";
$username = "root"; // database username
$password = ""; //database password, very secure
$dbname = "iCare"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert data into the database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Name = $_POST["name"];
    $PhoneNum = $_POST["PhoneNum"]; // Added PhoneNum
    $UserName = $_POST["UserName"];
    $Password = $_POST["pwd"];
    // add more fields as needed

      // Construct the SQL query
    $sql = "INSERT INTO Homeowners (Name, PhoneNum, UserName, Password) VALUES ('$Name', ";
    $sql .= $PhoneNum ? "'$PhoneNum'" : "NULL"; // Use NULL if PhoneNum is empty
    $sql .= ", '$UserName', '$Password')";
    
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
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
        <li><a href="index.php">Home</a></li>
        <li><a href="about.php">About</a></li>
        <li  class="active"><a href="signup.php">Sign Up</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
  
  <!--Center Column-->
<div class="container-fluid text-center">    
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
		<form action="signup.php" method="POST">
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" name="name">
    </div>
    <div class="form-group">
        <label for="PhoneNum">Phone Number:</label>
        <input type="text" class="form-control" id="PhoneNum" name="PhoneNum">
    </div>
    <div class="form-group">
        <label for="UserName">Email address:</label>
        <input type="email" class="form-control" id="UserName" name="UserName">
    </div>
    <div class="form-group">
        <label for="UserName2">Confirm Email address:</label>
        <input type="email" class="form-control" id="UserName2" name="UserName2">
    </div>
    <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" id="pwd" name="pwd">
    </div>
    <div class="checkbox">
        <label><input type="checkbox" name="newsletter"> Sign up for Newsletter</label>
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
 <div class="container overflow-auto">
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


