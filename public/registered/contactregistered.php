<?php 

session_start();

if ( isset($_POST['activeuser']) ) {
	if ( empty($_POST['activeuser']) ) {
		$_SESSION['noactiveaccount'] ;
		$_SESSION['classTypeError'] ;
		header('location: ../guests/homeguests.php?logIn') ;
	} else {
		$_POST['activeuser'] ;
	}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>VRMS-ContactUs</title>
<meta charset="utf-8">	
<meta name="viewport" content="width=device-width, initial-scale=1">	
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<link rel="stylesheet" type="text/css" href="../../css/style.css">
<link rel="stylesheet" type="text/css" href="../../css/styleresponsive.css">	

<style type="text/css">
	
	#registerednav {
		background-color: #efa12b;
	}


</style>

</head>
<body>

<div class="container-fluid" id="registerednav">
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

			</div>
		</div>
	</div> 
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<nav class="nav nav-expand">
					<li class="nav-item"><a href="homeregistered.php" class="nav-link">Home</a></li>
					<li class="nav-item"><a href="aboutregistered.php" class="nav-link">About Us</a></li>
					<div class="dropdown">
						<button type="" class="dropdown-toggle nav-link" data-toggle="dropdown" style="border:none; background-color:#efa12b;">Vehicles</button>
						<div class="dropdown-menu">
							<a href="twowheelerregistered.php" class="dropdown-item">TWO WHEELER VEHICLES</a>
							<a href="fourwheelerregistered.php" class="dropdown-item">FOUR WHEELER VEHICLES</a>
						</div>
					</div>	
					<li class="nav-item"><a href="contactregistered.php" class="nav-link" id="active">Contact Us</a></li>
					<li class="nav-item"><a href="mybookingregistered.php" class="nav-link">My Booking</a></li>
					<div class="dropdown" class="nav-link">
						<a href="#" class="text-danger" data-toggle="dropdown" style="font-size:16px;">My Profile</a>
						<div class="dropdown-menu">
							<a href="myaccountregistered.php" class="" style="color:#000; text-align:center;"> My Account</a>
							<a href="logoutregistered.php" class="nav-link">Log Out</a>
						</div>
					</div>
				</nav>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>	
</div>

<br/>

<div class="container-fluid">
	<div class="jumbotron">
		<div class="row">
			<div class="col-md">
				<h5 style="text-decoration:underline;">Social Media</h5>
				<a href="https://www.facebook.com" target="_blank"><img src="../../images/contacticons/socialmedia/facebook.png" alt="" id="socialmediaicons"></a>
				<a href="https://www.instagram.com/cseanarts" target="_blank"><img src="../../images/contacticons/socialmedia/instagram.png" alt="" id="socialmediaicons"></a>
				<a href="https://www.twitter.com/i/trends" target="_blank"><img src="../../images/contacticons/socialmedia/twitter.png" alt="" id="socialmediaicons"></a>
			</div>
			<div class="col-md">
				<h5 style="text-decoration:underline;">Email</h5>
				<div class="row">
					<div class="col-md-2">
						<img src="../../images/contacticons/email/gmailemail.png" alt="" id="socialmediaicons">
					</div>
					<div class="col-md-2">
						<p>rollingstone614@gmail.com</p>
					</div>
				</div>
			</div>
			<div class="col-md">
				<h5 style="text-decoration:underline;">Phone</h5>
				<div class="row">
					<div class="col-md-2">
						<img src="../../images/contacticons/phone/phone.png" alt="" id="socialmediaicons">
					</div>
					<div class="col-md-10">
						<p>+254 748 304 696</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

</body>
</html>