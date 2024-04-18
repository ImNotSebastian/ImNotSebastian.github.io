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
	  <p><a href="contact.php"  class="text-decoration-none">Support</a></p>
      <p><a href="TOS.php"  class="text-decoration-none">Terms of Service</a></p>
      <p><a href="PP.php"  class="text-decoration-none">Privacy Policy</a></p>
    </div>

    <div class="col-sm-8 text-center">
	   <img src="../style/iCareLogo.png" class="img-fluid" alt = "Logo">
      <h1>Billing</h1>
      <b>iCare is a groundbreaking home service that empowers homeowners to effortlessly manage their essential home services in a whole new way. With iCare, homeowners can create personalized home profiles encompassing every aspect of their living space, from mortgages and insurance to lawn care, internet, and more.</b>
      <hr>


<h2>Add Credit Card Information and Billing Address</h2>



<form action="submit_payment.php" method="POST">
  <fieldset>
    <legend>Credit Card Information</legend>
    <div class="form-row">
      <label for="card_number">Card Number:</label>
      <input type="text" id="card_number" name="card_number" pattern="[0-9]{16}" required>
      <label for="expiration_date">Expiration Date:</label>
      <input type="month" id="expiration_date" name="expiration_date" required>
      <label for="cvv">CVV:</label>
      <input type="text" id="cvv" name="cvv" pattern="[0-9]{3,4}" required>
    </div>
  </fieldset>

  <fieldset>
    <legend>Billing Address</legend>
    <div class="form-row">
      <label for="billing_name">Name:</label>
      <input type="text" id="billing_name" name="billing_name" required>
      <label for="billing_address">Address:</label>
      <input type="text" id="billing_address" name="billing_address" required>
      <label for="billing_city">City:</label>
      <input type="text" id="billing_city" name="billing_city" required>
      <label for="billing_state">State:</label>
      <input type="text" id="billing_state" name="billing_state" required> <br>
      <label for="billing_zip">ZIP Code:</label>
      <input type="text" id="billing_zip" name="billing_zip" pattern="[0-9]{5}" required>
    </div>
  </fieldset>

  <input type="submit" value="Add Card">
</form>


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

</body>

</html>
