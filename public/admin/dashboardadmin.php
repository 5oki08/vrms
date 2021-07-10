<?php

require '../../connection.php' ;
// require 'regdusersadmin.php' ;


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>vrmsADMIN</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 

<link rel="stylesheet" type="text/css" href="../../../css/style.css">
<link rel="stylesheet" type="text/css" href="../../../css/styleresponsive.css">	

<style type="text/css">




body { font-size: 14px; }
#mainheader1 {  padding: 5px; }
#heading1 { letter-spacing: 1px; text-align: center; margin-top: 5px; list-style-type: none;}
.heading1subj { display: inline; margin-left:7px; margin-right:7px; }
#heading2 { padding: 10px;}
.nav-link {}
.active { text-transform: uppercase; text-decoration: underline; font-weight: 600;}
li a { width: 100%; }
.carousel-inner img { width: 1100; height: 470; }
#asidehome { padding: 10px; height: 100%; }
.card-text { margin-top: 50px; }
.form { padding: 20px; }
.form form-control { padding: 15px; }
.footer { padding: 30px;  }
.footer-links { color: #000; font-size: 15px; }
.footer-links:hover { font-weight: 600; color: #000; }


#errorRegadminDetails { color: #fff; }




@media only screen and (max-width: 600px) {
   
.heading1subj { display: block; margin-top: 3px; margin-bottom: 3px; }
.navbar-toggle { float: right; }
.carousel-inner img { width: 400; height: 270; }
#footerSec1 { margin-bottom: 30px; }
#footerSec2 { margin-bottom: 30px; }
#footerSec3 {}


#adminSubmitRegistration { margin-top: 20px; width: 70%; height: 70%; float: right; }
#resetadminDetails { margin-top: 25px; width: 70%; }

#adminLogin { width: 50%; height:100%; }


}	





</style>

</head>
<body>


<header id="mainheader1" class="">
	<ul id="heading1">
		<li class="heading1subj" >3<sup style="color:#000;">rd</sup> Street, CBD, Nairobi, Kenya </li>
		<li class="heading1subj" > <img src="../../images/phonecall.png" alt="" width="20px" height="20px"> +254 700 000 000 </li>
		<li class="heading1subj" > <img src="../../images/contacticons/email/gmailemail.png" class="img-fluid" alt="" width="20px" height="20px"> 614rollingstone@gmail.com </li>
		<hr style="width:50%;" />
	</ul>
	<h4 class="text-center text-uppercase" style="letter-spacing:5px;">Vehicle Rental Management System</h4>
</header> 

<hr />

<div class="container-fluid">
	<div class="row">
		<div class="col-md-3" style="margin-left:none;">
			<header id="mainheader1" class=" border border-0">
				<nav class="navbar navbar-inverse navbar-light bg-light border border-0 w-100 h-100">
				  <div class="container-fluid">
				    <div class="navbar-header ">
				      <button type="button" class="navbar-toggle bg-dark border border-0" data-toggle="collapse" data-target="#myNavbar">
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				      </button>
				    </div>
				    <div class="collapse navbar-collapse float-left" id="myNavbar">
				      <ul class="nav navbar-nav text-nowrap">
				        <li class="active"> <a href="dashboardadmin.php" class="text-dark btn btn-lg border border-dark bg-light font-weight-bold">Dashboard</a> </li>
				        <li> <a href="regdusersadmin.php" class="text-dark">Users</a> </li>
						  <li> <a href="#" class="text-dark">Two Wheeler Vehicles</a> </li> 
						  <li> <a href="fourwheeleradmin.php" class="text-dark">Four Wheeler Vehicles</a> </li>
						  <li> <a href="fourwheelerbookingadmin.php" class="text-dark">Bookings <sup class="badge badge-secondary"><?php
								$countRecords = " SELECT COUNT(status) AS TotalUndecidedBookings FROM selecteddrive WHERE status='WaitingApproval' " ;
								$countRecordsResult = mysqli_query($conn,$countRecords) ;
								$dataF = $countRecordsResult->fetch_assoc();
								echo $dataF['TotalUndecidedBookings']; 
							?></sup></a> </li>
						 <li> <a href="../registered/logoutregistered.php" class="text-dark">Log Out</a> </li> 
				      </ul>
				    </div>
				  </div>
				</nav>

			</header>
		</div>
		<div class="col-md-9">

			<div class="card-deck bg-light">
				<div class="card">
					<div class="card-body">
						<p class="text-center">
							<?php
								$countRecords = " SELECT COUNT(*) AS TotalregdUsers FROM users " ;
								$countRecordsResult = mysqli_query($conn,$countRecords) ;
								$dataF = $countRecordsResult->fetch_assoc();
								echo $dataF['TotalregdUsers'];
							?>
						</p>
						<p class="card-text text-center">Registered Users</p>
					</div>
				</div>

				<div class="card">
					<div class="card-body">
						<p class="text-center">
							<?php
								$countRecords = " SELECT COUNT(*) AS TotalregdFourWheels FROM fourwheel " ;
								$countRecordsResult = mysqli_query($conn,$countRecords) ;
								$dataF = $countRecordsResult->fetch_assoc();
								echo $dataF['TotalregdFourWheels'];
							?>
						</p>
						<p class="card-text text-center">Registered Four Wheel Vehicles</p>
					</div>
				</div>

				<div class="card">
					<div class="card-body">
						<p class="text-center">null</p>
						<p class="card-text text-center">Registered Two Wheel Vehicles</p>
					</div>
				</div>

				<div class="card bg-warning">
					<div class="card-body">
						<p class="text-center">
							<?php
								$countRecords = " SELECT COUNT(*) AS TotalregdBookings FROM selecteddrive " ;
								$countRecordsResult = mysqli_query($conn,$countRecords) ;
								$dataF = $countRecordsResult->fetch_assoc();
								echo $dataF['TotalregdBookings'];
							?>
						</p>	
						<p class="card-text text-center">Total Bookings</p>
					</div>
				</div>

				<div class="card bg-success text-light">
					<div class="card-body">
						<p class="text-center">
							<?php
								$countRecords = " SELECT COUNT(status) AS TotalApprovedBookings FROM selecteddrive WHERE status='approved' " ;
								$countRecordsResult = mysqli_query($conn,$countRecords) ;
								$dataF = $countRecordsResult->fetch_assoc();
								echo $dataF['TotalApprovedBookings']; 
							?>
						</p>
						<p class="card-text text-center">Approved Bookings</p>
					</div>
				</div>

				<div class="card bg-danger text-light">
					<div class="card-body">
						<p class="text-center">
							<?php
								$countRecords = " SELECT COUNT(status) AS TotalDeniedBookings FROM selecteddrive WHERE status='denied' " ;
								$countRecordsResult = mysqli_query($conn,$countRecords) ;
								$dataF = $countRecordsResult->fetch_assoc();
								echo $dataF['TotalDeniedBookings']; 
							?>
						</p>
						<p class="card-text text-center">Denied Bookings</p>
					</div>
				</div>

				<div class="card bg-dark text-light font-weight-bolder">
					<div class="card-body">
						<p class="text-center">
							<?php
								$countRecords = " SELECT COUNT(status) AS TotalUndecidedBookings FROM selecteddrive WHERE status='WaitingApproval' " ;
								$countRecordsResult = mysqli_query($conn,$countRecords) ;
								$dataF = $countRecordsResult->fetch_assoc();
								echo $dataF['TotalUndecidedBookings']; 
							?>
						</p>
						<p class="card-text text-center">Undecided Bookings</p>
					</div>
				</div>

			</div>

			<p class="card-text">The quick brown fox jumped over the lazy dog. The quick brown fox jumped over the lazy dog. The quick brown fox jumped over the lazy dog. The quick brown fox jumped over the lazy dog. The quick brown fox jumped over the lazy dog. The quick brown fox jumped over the lazy dog. The quick brown fox jumped over the lazy dog. The quick brown fox jumped over the lazy dog. The quick brown fox jumped over the lazy dog. The quick brown fox jumped over the lazy dog. The quick brown fox jumped over the lazy dog. The quick brown fox jumped over the lazy dog. The quick brown fox jumped over the lazy dog. The quick brown fox jumped over the lazy dog.</p>
			<br/>
			<div class="jumbotron">
				<h4>Vehicle Rental Management System</h4><br/>
				<img src="../../images/vrmslogo.png" style="" class="mx-auto modal-dialog-centered">
			</div>
			<br/>

		</div>
	</div>
</div>



<br/><br/><br/>

<footer class="footer" style="background-color:#C0C0C0;">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md text-center" id="footerSec1">
				<p style="text-decoration:underline;">Quick Links</p>
				<a href="homeguests.php" class="footer-links">Home</a><br/>
				<a href="aboutguests.php" class="footer-links">About Us</a><br/>
				<a href="#" class="footer-links">Privacy Policy</a>
			</div>
			<div class="col-md text-center" id="footerSec2">
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat.
			</div>
			<div class="col-md text-center" id="footerSec3">
				<p><img src="../../images/pinLocation.jpg" alt="" width="40px" height="20px"> 3<sup style="color:#000;">rd</sup> Street, CBD, Nairobi, Kenya</p>
				<p>
					<img src="../../images/phonecall.png" alt="" width="20px" height="20px">
					+254 700 000 000
				</p>
				<p>
					<img src="../../images/contacticons/email/gmailemail.png" alt="" width="20px" height="20px">
					614rollingstone@gmail.com
				</p>
				<br/>
			</div>
			<div class="col-md-1"></div>
		</div>
	</div> <br/>
	<div class="w-75 mx-auto text-center font-weight-bold bg-light" style="padding:10px;">
		<a href="https://twitter.com/itscool012" target="_blank"><img src="../../images/contacticons/socialmedia/instagram.png" alt="instagram account" width="20px" height="20px" id="socialmediaicons"></a>
		<a href="https://www.instagram.com/jam_croc/" target="_blank"><img src="../../images/contacticons/socialmedia/twitter.png" alt="twitter account" width="20px" height="20px" id="socialmediaicons"></a>
		<p>Samuel Emmanuel Okinyo<sup class="text-dark">©</sup>  2021  All Rights Reserved </p>
	</div>
</footer>





</body>
</html>