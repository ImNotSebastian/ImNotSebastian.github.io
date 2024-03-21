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
      <a class="navbar-brand" href="index.html">
         <img src="../style/iCareLogo.png" alt = "Logo"style="width:90px;height:30px;">
      </a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="index.html">Home</a></li>
        <li><a href="about.html">About</a></li>
        <li><a href="signup.html">Sign Up</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="login.html"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
       <h2>Services</h2>
	  <p><a href="contact.html">Support</a></p>
      <p><a href="TOS.html">Terms of Service</a></p>
      <p><a href="PP.html">Privacy Policy</a></p>
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
				Check Boxes and sliders will be here
			</div>
		</li>
		<li class="list-group-item">
		<button data-toggle="collapse" data-target="#add">Add Property</button>
			<div id="add" class="collapse">
				Check Boxes and sliders will be here
			</div>
		</li>
		<li class="list-group-item">
			<button data-toggle="collapse" data-target="#remo">Remove Property</button>
			<div id="remo" class="collapse">
				Check Boxes and sliders will be here
			</div>
		</li>
		<li class="list-group-item">
			<button data-toggle="collapse" data-target="#change">Change Password</button>
			<div id="change" class="collapse">
				Check Boxes and sliders will be here
			</div>
		</li>
		<li class="list-group-item">
			<button data-toggle="collapse" data-target="#delete">Delete Account</button>
			<div id="delete" class="collapse">
				Check Boxes and sliders will be here
			</div>
		</li>
	  </ul>
     
	  
	  
	  
    </div>
    <div class="col-sm-2 sidenav">
		<a href ="dashboard.html">
			<h2>Dashboard</h2>
		</a>
		<a href ="landscaping.html">
			<button type="button" class="btn btn-success btn-block">Landscaping</button>
		</a>
      <hr>
		<a href ="internet.html">
			<button type="button" class="btn btn-success btn-block">Internet</button>
		</a>
      <hr>
	  <a href ="interior.html">
        <button type="button" class="btn btn-success btn-block">Interior</button>
	  </a>
      <hr>
	   <a href ="billing.html">
        <button type="button" class="btn btn-success btn-block">Billing</button>
		</a>
      <hr>
	   <a href ="settings.html">
        <button type="button" class="btn btn-success btn-block">Settings</button>
		</a>
    </div>
  </div>
</div>

</body>

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


