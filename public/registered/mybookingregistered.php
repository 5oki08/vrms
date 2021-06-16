<?php

require '../../connection.php' ;
require '../guests/login.php' ;

// require 'activeusersession.php' ; 
 
 // define("activeuser" , $_SESSION['activeuser']);

// session_start() ;

if ( isset($_POST['activeuser']) ) {
	if ( empty($_SESSION['activeuser']) ) {
		$_SESSION['noactiveaccount'] ;
		$_SESSION['classTypeError'] ;
		header('location: ../guests/homeguests.php?logIn') ;
	} else {
		$_SESSION['activeuser'] ;
	} 
} 



?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>VRMS-MyBookings</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 

<link rel="stylesheet" type="text/css" href="../../css/style.css">
<link rel="stylesheet" type="text/css" href="../../css/styleresponsive.css">	

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
.footer { padding: 30px;  width: 80%; justify-content: center; margin: 0 auto; }
.footer-links { color: #000; font-size: 15px; }
.footer-links:hover { font-weight: 600; color: #000; }

#fourwheelercardimg { width: 100%; }
#fourwheelermoreinfo { width: 50%; padding: 10px; margin-left: 25%; }
#fourwheelnavigation { border-right: 2px solid #000; padding: 20px; }




@media only screen and (max-width: 600px) {
  
.heading1subj { display: block; margin-top: 3px; margin-bottom: 3px; }
.navbar-toggle { float: right; }
.carousel-inner img { width: 400; height: 270; }
#footerSec1 { margin-bottom: 30px; }
#footerSec2 { margin-bottom: 30px; }
#footerSec3 {}

#twowheelnavigation { border: none; }

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
	<nav class="navbar navbar-inverse navbar-warning bg-warning border border-0">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="#"><img src="../../images/vrmslogo.png" alt="Logo" width="80" height="80"></a>
	    </div>
	    <div class="collapse navbar-collapse" id="myNavbar">
	      <ul class="nav navbar-nav navbar-expand-md align-content-start">
	        <li> <a href="homeregistered.php" class="text-dark">Home</a> </li>
	        <li> <a href="aboutregistered.php" class="text-dark">About Us</a> </li>
			 <li class="dropdown">
			 	<a href="#" class="text-dark dropdown-toggle" data-toggle="dropdown">Two Wheeler Vehicles</a>
			 	<div class="dropdown-menu">
			      <a class="dropdown-item h4 text-center" href="twowheelerregistered.php">Ducatti</a> 
			      <a class="dropdown-item h4 text-center" href="twowheelSregistered.php">Suzuki</a>
			      <a class="dropdown-item h4 text-center" href="twowheelYamaharegistered.php">Yamaha</a>
			    </div>
			 </li>
			 <li class="dropdown">
			 	<a href="#" class="text-dark dropdown-toggle" data-toggle="dropdown">Four Wheeler Vehicles</a>
			 	<div class="dropdown-menu">
			      <a class="dropdown-item h4 text-center" href="fourwheelerregistered.php">Aston Martin</a>
			      <a class="dropdown-item h4 text-center" href="fourwheelMitsubishiregistered.php">Mitsubishi</a>
			      <a class="dropdown-item h4 text-center" href="fourwheelJeepregistered.php">Jeep</a>
			    </div>
			 </li> 
			 <li class="active"> <a href="mybookingregistered.php" class="text-dark bg-light font-weight-bold">My Booking</a> </li>
			 <li> <a href="myaccountregistered.php" class="text-dark"> My Account</a> </li>
			 <li> <a href="logoutregistered.php" class="text-dark">Log Out</a> </li>
	      </ul>
	    </div>
	  </div>
	</nav>
</header>


<br/>

<div class="jumbotron">
	<div class="row">
		
		<div class="col-md-1"></div>
		<div class="col-md-10">

			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<form class="form" action="mybookingregistered.php" method="post">
						<input type="text" name="searchSecondNameRecord" id="searchSecondNameRecord" class="form-control form-control-lg" placeholder="Input Second Name ...">
						<br/>
						<input type="submit" name="searchSecondNamebtn" id="searchSecondNamebtn" class="btn btn-lg btn-outline-primary" value="Search Record"> 
					</form>
				</div>
				<div class="col-md-3"></div>
			</div>
			
			<table class="table table-hovered">
				<tr>
					<th> Second Name Registered </th>
					<th> Selected Drive </th>
					<th> Days Hired </th>
					<th> Payment Mode </th>
					<th> Status </th>
				</tr>

			<?php

				$searchSecondNameRecord = '' ;

				if ( isset($_POST['searchSecondNamebtn']) ) {
					if ( !empty($_POST['searchSecondNameRecord']) ) {
						$searchSecondNameRecord = $_POST['searchSecondNameRecord'] ;
					}
				}

				$fetchBookingsql = "SELECT * FROM selecteddrive WHERE snameregistered='$searchSecondNameRecord' ";
				$resultBooking = $conn->query($fetchBookingsql);

				if ($resultBooking->num_rows > 0) {
				    while($rowFetch = $resultBooking->fetch_assoc()) {
			?>
				<tr>
					<td> <?php echo $rowFetch["snameregistered"]; ?> </td> 
					<td> <?php echo $rowFetch["selectedDrivetwoWheel"] ; ?> </td>
					<td> <?php echo $rowFetch["numberOfdaysHired"] ; ?> </td>
					<td> <?php echo $rowFetch["paymentMode"] ; ?> </td>
				</tr>
				<?php  }
					} else {
					    echo "Enter Second Name to Retrieve Booking Record .";
					} ?>
			</table> 

			<!-- <table class="table table-hovered">
				
				<tr>
					<th> Second Name Registered </th>
					<th> Selected Drive </th>
					<th> Days Hired </th>
					<th> Payment Mode </th>
					<th> Status </th>
				</tr>

				<?php

				$fetchBookingsql = "SELECT * FROM selecteddrive WHERE snameregistered='{$_SESSION['activeuser']}' ";
				$resultBooking = $conn->query($fetchBookingsql);

				if ($resultBooking->num_rows > 0) {
				    while($rowFetch = $resultBooking->fetch_assoc()) {

				?>

				<tr>
					<td> <?php echo $rowFetch["snameregistered"]; ?> </td> 
					<td> <?php echo $rowFetch["selectedDrivetwoWheel"] ; ?> </td>
					<td> <?php echo $rowFetch["numberOfdaysHired"] ; ?> </td>
					<td> <?php echo $rowFetch["paymentMode"] ; ?> </td>
				</tr>

				<?php  }
					} ?>

			</table> -->

		</div>
		<div class="col-md-1"></div>

	</div>
</div>




<br/><br/> 

<footer class="footer bg-warning">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md text-center" id="footerSec1">
				<p style="text-decoration:underline;">Quick Links</p>
				<a href="homeregistered.php" class="footer-links">Home</a><br/>
				<a href="aboutregistered.php" class="footer-links">About Us</a><br/>
				<a href="#" class="footer-links">Privacy Policy</a>
			</div>
			<div class="col-md text-center" id="footerSec2">
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat.
			</div>
			<div class="col-md text-center" id="footerSec3">
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
</footer> 



</body>
</html>