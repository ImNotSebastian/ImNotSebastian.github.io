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
        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
       <h2>Services</h2>
	  <p><a href="contact.php">Support</a></p>
      <p><a href="TOS.php">Terms of Service</a></p>
      <p><a href="PP.php">Privacy Policy</a></p>
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


               <div class="checkbox">
                  <label><input type="checkbox" value="">Dynamic</label>
               </div>
               <div class="checkbox">
                  <label><input type="checkbox" value="">Daily</label>
               </div>
               <div class="checkbox disabled">
                  <label><input type="checkbox" value="">Weekly</label>
               </div>
            </form>

         </div>
		</li>
		
		<li class="list-group-item">
		
			<button data-toggle="collapse" data-target="#remo">Change Phone #</button>
			<div id="remo" class="collapse">
         	<form action="HOS.php">
	      		<div class="form-group">
			      	<label for="email">Old Phone #: </label>
				         <input type="text" class="form-control" id="email">
			      </div>
			      <div class="form-group">
				      <label for="pwd">New Phone #:</label>
				         <input type="password" class="form-control" id="pwd">
			      </div>
			      <div class="form-group">
				      <label for="pwd">Password:</label>
				         <input type="password" class="form-control" id="pwd">
			      </div>
			      <button type="submit" class="btn btn-default">Submit</button>
		      </form>
			</div>
		</li>
		<li class="list-group-item">
			<button data-toggle="collapse" data-target="#change">Change Password</button>
			<div id="change" class="collapse">
         	<form action="HOS.php">
	      		<div class="form-group">
			      	<label for="email">Old Password:</label>
				         <input type="email" class="form-control" id="email">
			      </div>
			      <div class="form-group">
				      <label for="pwd"> New Password:</label>
				         <input type="password" class="form-control" id="pwd">
			      </div>
			      <div class="form-group">
				      <label for="pwd"> Confirm Password:</label>
				         <input type="password" class="form-control" id="pwd">
			      </div>
			      <button type="submit" class="btn btn-default">Submit</button>
		      </form>
			</div>
		</li>
		<li class="list-group-item">
			<button data-toggle="collapse" data-target="#delete">Delete Account</button>
			<div id="delete" class="collapse">
         	<form action="HOS.php">
	      		<div class="form-group">
			      	<label for="email">Password:</label>
				         <input type="password" class="form-control" id="pwd">
			      </div>
			      <div class="form-group">
				      <label for="pwd">Confirm Password:</label>
				         <input type="password" class="form-control" id="pwd">
			      </div>
			      <button type="submit" class="btn btn-default">Remove Account</button>
		      </form>
			</div>
		</li>
	  </ul> 
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
