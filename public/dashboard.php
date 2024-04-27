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
       <h2>Services</h2>
	 	  <p><a href="contact.php"  class="text-decoration-none">Support</a></p>
      <p><a href="TOS.php"  class="text-decoration-none">Terms of Service</a></p>
      <p><a href="PP.php"  class="text-decoration-none">Privacy Policy</a></p>
    </div>

    <div class="col-sm-8 text-center">
	   <img src="../style/iCareLogo.png" class="img-fluid" alt = "Logo">
      <h1>Account Overview</h1>
      <b>iCare is a groundbreaking home service that empowers homeowners to effortlessly manage their essential home services in a whole new way. With iCare, homeowners can create personalized home profiles encompassing every aspect of their living space, from mortgages and insurance to lawn care, internet, and more.</b>
      <hr>
      <br>
          <div class="row">
            <div class="col-sm-4">
              <h3><div class="card">
                    <div class="card-body">
                      <h3 class="card-title">Landscaping</h3>
                      <h4 class="card-text">Ladscaping Information and Requests</h4>
                      <div id="landscaping" class="collapse">
                        <div id="landscaping_new_info" class="collapse">
                        </div>
                        <button class="btn btn-primary" data-toggle="collapse" data-target="landscaping_new_info">New Request</button>
                      </div>
        	            <button class="btn btn-primary" data-toggle="collapse" data-target="landscaping">Open Section</button>
        		        </div>
             	  	</div></h3>
            </div>
              <div class="col-sm-4 col-5"><h3>
                <div class="card">
                    <div class="card-body">
                      <h3 class="card-title">Interior</h4>
                      <h4 class="card-text">Interior Information and Requests</h4>
                      <a href="#" class="btn btn-primary">Open Section</a>
                    </div>
                </div></h3>
              </div>
              <div class="col-sm-4"><h3>
                <div class="card">
                  <div class="card-body">
                    <h3 class="card-title">Internet</h3>
                    <h4 class="card-text">Internet Information and Requests</h4>
                    <a href="#" class="btn btn-primary">Open Section</a>
                  </div>
                </div></h3>
              </div>
          </div>
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


