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
	  
	  <ul class="list-group">
		<li class="list-group-item">
			<h3>Settings</h3>
		</li>
		<li class="list-group-item">
			<button data-toggle="collapse" data-target="#noti">Notification Settings</button>
			<div id="noti" class="collapse">
         	<form action="/action_page.php">
	      		<div class="form-group">
			      	<label for="email">Email address:</label>
				         <input type="email" class="form-control" id="email">
			      </div>
			      <div class="form-group">
				      <label for="pwd">Password:</label>
				         <input type="password" class="form-control" id="pwd">
			      </div>
			      <div class="checkbox">
				      <label><input type="checkbox"> Remember me</label>
			      </div>
			      <button type="submit" class="btn btn-default">Submit</button>
		      </form>
         </div>
		</li>
    <li class="list-group-item">
		<button data-toggle="collapse" data-target="#ads">Manage Advertisments</button>
			<div id="ads" class="collapse">
          <br>
          <button data-toggle="collapse" data-target="#addnewad">Add New</button>
          <button>See All</button>
          <br>
          <form action = "/action_page.php">
            <div id="addnewad" class="collapse">
              <label for="adName">Ad Name:</label>
              <input type="AdName" class="form-control" id="adName">
              <label for="#adType">Service Type:</label>
              <select name="type" id="adType">
                <option value="landscaping">Lawn/Landscaping</option>
                <option value="internet">Internet</option>
                <option value="interior">Interior</option>
              </select>
              <label for="#state">State:</label>
              <select name="state" id="state">
                <option value="idaho">ID</option>
              </select>
              <label for="#city">City</label>
              <select name="city" id="city">
                <option value="moscow">Moscow</option>
                <option value="boise">Boise</option>
              </select>
              <button>Create New</button>
            </div>
          </form>
			</div>
		</li>
		<li class="list-group-item">
		<button data-toggle="collapse" data-target="#add">Add Business</button>
			<div id="add" class="collapse">
        <form action = "/action_page.php">
              <label for="adName">Business Name:</label>
              <input type="AdName" class="form-control" id="adName">
              <label for="#state">State:</label>
              <select name="state" id="state">
                <option value="idaho">ID</option>
              </select>
              <label for="#city">City:</label>
              <select name="city" id="city">
                <option value="moscow">Moscow</option>
                <option value="boise">Boise</option>
              </select>
              <label for="#bizAddress">Business Address: </label>
              <input type="businessAddress" class="form-control" id="bizAddress">
              <button>Create New</button>
              <br>
        </form>
			</div>
		</li>
		<li class="list-group-item">
			<button data-toggle="collapse" data-target="#remo">Remove Business</button>
			<div id="remo" class="collapse">
         	<form action="/action_page.php">
	      		<div class="form-group">
			      	<label for="email">Email address:</label>
				         <input type="email" class="form-control" id="email">
			      </div>
			      <div class="form-group">
				      <label for="pwd">Password:</label>
				         <input type="password" class="form-control" id="pwd">
			      </div>
			      <div class="checkbox">
				      <label><input type="checkbox"> Remember me</label>
			      </div>
			      <button type="submit" class="btn btn-default">Submit</button>
		      </form>
			</div>
		</li>
		<li class="list-group-item">
			<button data-toggle="collapse" data-target="#change">Change Password</button>
			<div id="change" class="collapse">
         	<form action="/action_page.php">
	      		<div class="form-group">
			      	<label for="email">Email address:</label>
				         <input type="email" class="form-control" id="email">
			      </div>
			      <div class="form-group">
				      <label for="pwd">Password:</label>
				         <input type="password" class="form-control" id="pwd">
			      </div>
			      <div class="checkbox">
				      <label><input type="checkbox"> Remember me</label>
			      </div>
			      <button type="submit" class="btn btn-default">Submit</button>
		      </form>
			</div>
		</li>
		<li class="list-group-item">
			<button data-toggle="collapse" data-target="#delete">Delete Account</button>
			<div id="delete" class="collapse">
         	<form action="/action_page.php">
	      		<div class="form-group">
			      	<label for="email">Email address:</label>
				         <input type="email" class="form-control" id="email">
			      </div>
			      <div class="form-group">
				      <label for="pwd">Password:</label>
				         <input type="password" class="form-control" id="pwd">
			      </div>
			      <div class="checkbox">
				      <label><input type="checkbox"> Remember me</label>
			      </div>
			      <button type="submit" class="btn btn-default">Submit</button>
		      </form>
			</div>
		</li>
	  </ul> 
    </div>
    <div class="col-sm-2 sidenav">
		<a href ="bizdash.php">
			<h2>Dashboard</h2>
		</a>
		<a href ="businesses.php">
			<button type="button" class="btn btn-success btn-block">Businesses</button>
		</a>
      <hr>
		<a href ="analytics.php">
			<button type="button" class="btn btn-success btn-block">Analytics</button>
		</a>
      <hr>
	  <a href ="ads.php">
        <button type="button" class="btn btn-success btn-block">Manage Ads</button>
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


