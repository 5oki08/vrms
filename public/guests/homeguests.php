<?php 

require '../../connection.php' ;
require 'login.php' ;
// session_start() ;

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>VRMS-GuestHome</title>
<meta charset="utf-8">	
<meta name="viewport" content="width=device-width, initial-scale=1">	
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<link rel="stylesheet" type="text/css" href="../../css/style.css">
<link rel="stylesheet" type="text/css" href="../../css/styleresponsive.css">

<style type="text/css">
	.alert {
		color: red;
		border: 3px solid #fff;
		padding: 10px;
		text-align: center;
	}
	.footer-links {
		color: #000;
	}
</style>

</head>
<body>

<div class="container-fluid" id="guestsnav">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-5"></div>
			<div class="col-md-3">
				<p>3<sup style="color:#000;">rd</sup> Street, CBD, Nairobi, Kenya</p>
			</div>
			<div class="col-md-4">
				<p>
					<img src="../../images/phonecall.png" alt="" width="20px" height="20px">
					+254 700 000 000
				</p>
				<p>
					<img src="../../images/contacticons/email/gmailemail.png" alt="" width="20px" height="20px">
					614rollingstone@gmail.com
				</p>
				<p>
					ADMIN login <a href="adminlogin.php">here</a> .
				</p>
			</div>
		</div>
	</div> 
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<nav class="nav nav-expand">
					<li class="nav-item"><a href="homeguests.php" class="nav-link" id="active">Home</a></li>
					<li class="nav-item"><a href="aboutguests.php" class="nav-link">About Us</a></li>
					<div class="dropdown">
						<!-- <div class="dropdown-header"> -->
							<!-- <li class="nav-item"><a href="vehicleguests.php" class="nav-link" data-toggle="dropdown">Vehicle</a></li> -->
							<button type="" class="dropdown-toggle nav-link" data-toggle="dropdown" style="border:none; background-color:#00FFFF;">Vehicles</button>
						<!-- </div>	 -->
						<div class="dropdown-menu">
							<a href="twowheeler.php" class="dropdown-item">TWO WHEELER VEHICLES</a>
							<a href="fourwheeler.php" class="dropdown-item">FOUR WHEELER VEHICLES</a>
						</div>
					</div>	
					<li class="nav-item"><a href="contact.php" class="nav-link">Contact Us</a></li>
				</nav>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>	
</div>

<br/>

<div class="container-fluid">
	<div class="row" style="text-align:center;">
		<div class="col-md-7">
			<div class="jumbotron">
				<h4>Vehicle Rental Management System</h4><br/>
				<img src="../../images/vrmslogo.png">
			</div>
		</div>
		<div class="col-md-5">
			<div class="container-fluid">
				<p class="alert alert-<?php
					if (isset($_GET['credentialsReject'])) {
							echo $_SESSION['classTypeError'] ;
							session_unset();
							session_destroy();
						}
					if (isset($_GET['userdetailsaccepted'])) {
							echo $_SESSION['classTypeAccept'] ;
							session_unset();
							session_destroy();
						}	
					if (isset($_GET['passResetAccept'])) {
							echo $_SESSION['classTypeAccept'] ;
							session_unset();
							session_destroy();
						}	
					if (isset($_GET['logIn'])) {
							echo $_SESSION['classTypeError'] ;
							session_unset();
							session_destroy();
						}
					if (isset($_GET['adS'])) {
							echo $_SESSION['classTypeAccept'] ;
							session_unset();
							session_destroy();
						}
					if (isset($_GET['adF'])) {
							echo $_SESSION['classTypeError'] ;
							session_unset();
							session_destroy();
						}
					if (isset($_GET['none'])) {
							echo $_SESSION['classTypeError'] ;
							session_unset();
							session_destroy();
						}	
					if (isset($_GET['nonead'])) {
							echo $_SESSION['classTypeError'] ;
							session_unset();
							session_destroy();
						}							
				?> ">
					<?php
						if ( isset($_GET['credentialsReject']) ) {
							if (isset($_SESSION['failCred'])) {
								echo $_SESSION['failCred'] ;
								session_unset() ;
								session_destory() ;
							} else {
								echo "Login failed. Check input credentials then try again.";
							}
						}
						if ( isset($_GET['userdetailsaccepted']) ) {
							if (isset($_SESSION['userAccept'])) {
								echo $_SESSION['userAccept'] ;
								session_unset() ;
								session_destory() ;
							} else {
								echo "Successful Registration. Proceed with log in.";
							}
						}
						if ( isset($_GET['passResetAccept']) ) {
							if (isset($_SESSION['passUpdateComplete'])) {
								echo $_SESSION['passUpdateComplete'] ;
								session_unset() ;
								session_destory() ;
							} else {
								echo "Password Reset Complete. The new credentials can now be used to login";
							}
						}
						if ( isset($_GET['logIn']) ) {
							if (isset($_SESSION['noactiveaccount'])) {
								echo $_SESSION['noactiveaccount'] ;
								session_unset() ;
								session_destory() ;
							} else {
								echo "No active account. Kindly log in.";
							}
						}
						if ( isset($_GET['adS']) ) {
							if (isset($_SESSION['adminRegAccept'])) {
								echo $_SESSION['adminRegAccept'] ;
								session_unset() ;
								session_destory() ;
							} else {
								echo "Admin Register Accept.";
							}
						}
						if ( isset($_GET['adF']) ) {
							if (isset($_SESSION['adminRegFail'])) {
								echo $_SESSION['adminRegFail'] ;
								session_unset() ;
								session_destory() ;
							} else {
								echo "Admin Register Declined.";
							}
						}		
						if ( isset($_GET['none']) ) {
							if (isset($_SESSION['adminDupRej'])) {
								echo $_SESSION['adminDupRej'] ;
								session_unset() ;
								session_destory() ;
							} else {
								echo "Similar admin details. Rejected";
							}
						}
						if ( isset($_GET['nonead']) ) {
							if (isset($_SESSION['adminNone'])) {
								echo $_SESSION['adminNone'] ;
								session_unset() ;
								session_destory() ;
							} else {
								echo "Details Rejected";
							}
						}					
					?>
				</p>
				<form class="form" method="post" action="login.php">
					<div class="form-group">
						<label for="userloginphone">Enter Phone Number</label>
						<input type="phone" name="userloginphone" class="form-control" maxlength="10" minlength="10">
						<span> <?php echo $userloginphoneErr; ?> </span>
					</div>
					<div class="form-group">
						<label for="userloginLastName">Enter Last Name</label>
						<input type="text" name="userloginLastName" id="userloginLastName" class="form-control">
					</div>
					<div class="form-group">
						<label for="userloginpassword">Enter Password</label>
						<input type="password" name="userloginpassword" class="form-control">
						<span> <?php echo $userloginpasswordErr; ?> </span>
					</div>
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<input type="submit" name="loginSubmit" id="loginSubmit" class="form-control btn btn-outline-success" value="Log IN">
						</div>
						<div class="col-md-2"></div>
					</div>
				</form><br/>
				<div class="container-fluid">
					<p>Don't have an account? Register <a href="loginregisterguests.php">here</a></p> 
					<a href="resetpassword.php">Reset Passsword</a>
				</div>
			</div>
		</div>
	</div>
</div>
<br/>

<!-- footer -->
<div class="container-fluid" style="background-color:#00FFFF; padding:20px;">
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md" style="text-align:center;">
			<p style="text-decoration:underline;">Quick Links</p>
			<a href="homeguests.php" class="footer-links">Home</a><br/>
			<a href="aboutguests.php" class="footer-links">About Us</a><br/>
			<a href="#" class="footer-links">Privacy Policy</a>
		</div>
		<div class="col-md" style="text-align:center;">
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat.
		</div>
		<div class="col-md" style="text-align:center;">
			<p>3<sup style="color:#000;">rd</sup> Street, CBD, Nairobi, Kenya</p>
			<p>
				<img src="../../images/phonecall.png" alt="" width="20px" height="20px">
				+254 700 000 000
			</p>
			<p>
				<img src="../../images/contacticons/email/gmailemail.png" alt="" width="20px" height="20px">
				614rollingstone@gmail.com
			</p>
		</div>
		<div class="col-md-1"></div>
	</div>
</div>

</body>
</html>