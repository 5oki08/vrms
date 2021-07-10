<?php

require '../../connection.php' ;
// require '../guests/login.php' ;
session_start() ; 


// if ( isset($_POST['activeuser']) ) {
// 	if ( empty($_SESSION['activeuser']) ) {
// 		$_SESSION['noactiveaccount'] ;
// 		$_SESSION['classTypeError'] ;
// 		header('location: ../guests/homeguests.php?logIn') ;
// 	} else {
// 		$_SESSION['activeuser'] ;
// 	} 
// } 


$fetch = $conn->query( " SELECT snameregistered,status FROM selecteddrive WHERE snameregistered='{$_COOKIE['userloginLastName']}' " );
$fetchroww = $fetch->fetch_array() ;



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
.footer { padding: 30px;}
.footer-links { color: #000; font-size: 15px; }
.footer-links:hover { font-weight: 600; color: #000; }

#fourwheelercardimg { width: 100%; }
#fourwheelermoreinfo { width: 50%; padding: 10px; margin-left: 25%; }
#fourwheelnavigation { border-right: 2px solid #000; padding: 20px; }

#sup1 { font-size:15px; }
#sup2 { font-size:15px; }
#sup3 { font-size:15px; }

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
			<li> <a href="twowheelerregistered.php" class="text-dark">Two Wheeler Vehicles</a> </li>
			<li> <a href="fourwheelerregistered.php" class="text-dark">Four Wheeler Vehicles</a> </li>
			 <li class="dropdown btn-outline-primary">
			 	<a href="#" class="text-dark dropdown-toggle" data-toggle="dropdown">Welcome, <?php echo $_COOKIE['userloginLastName']  ; ?> </a>
			 	<div class="dropdown-menu">
			      <a class="dropdown-item h4 text-center active" href="mybookingregistered.php">My Booking  </a>
			      <a class="dropdown-item h4 text-center" href="myaccountregistered.php">My Account</a>
			      <a class="dropdown-item h4 text-center" href="logoutregistered.php">Log Out</a>
			    </div>
			 </li>  
	      </ul>
	    </div>
	  </div>
	</nav>
</header>


<br/>

<div class="container w-75 mx-auto ">
	<p class="badge badge-success border border-radius" style="padding:10px; font-size:15px;">Approved : <?php if ( $fetchroww['status'] ) {
	$countRecords = " SELECT COUNT(status) AS TotalApprovedChanges FROM selecteddrive WHERE status='approved' && snameregistered='{$_COOKIE['userloginLastName']}' " ;
	$countRecordsResult = mysqli_query($conn,$countRecords) ;
	$dataF = $countRecordsResult->fetch_assoc();
	echo $dataF['TotalApprovedChanges'];
} ?> </p>
	<span class="badge badge-danger border border-radius" style="padding:10px; font-size:15px;">Denied : <?php if ( $fetchroww['status'] ) {
	$countRecords = " SELECT COUNT(status) AS TotalDeniedChanges FROM selecteddrive WHERE status='denied' && snameregistered='{$_COOKIE['userloginLastName']}' " ;
	$countRecordsResult = mysqli_query($conn,$countRecords) ;
	$dataF = $countRecordsResult->fetch_assoc();
	echo $dataF['TotalDeniedChanges'];
} ?>  </span>
	<span class="badge border border-radius" style="padding:10px; font-size:15px;">Waiting Approval : <?php if ( $fetchroww['status'] ) {
	$countRecords = " SELECT COUNT(status) AS TotalWaitingChanges FROM selecteddrive WHERE status='WaitingApproval' && snameregistered='{$_COOKIE['userloginLastName']}' " ;
	$countRecordsResult = mysqli_query($conn,$countRecords) ;
	$dataF = $countRecordsResult->fetch_assoc();
	echo $dataF['TotalWaitingChanges'];
} ?> </span>
</div>

<br/>

<div class="jumbotron">
	<div class="row">
		
		<div class="col-md-1"></div>
		<div class="col-md-10">
		
			<table class="table table-hovered">
				
				<tr>
					<th> Second Name Registered </th>
					<th> Selected Drive </th>
					<th> Days Hired </th>
					<th> Date </th>
					<th> Status </th>
				</tr>

				<?php

				$fetchBookingsql = "SELECT * FROM selecteddrive WHERE snameregistered='{$_COOKIE['userloginLastName']}' ORDER BY reg_date DESC  "; 
				$resultBooking = $conn->query($fetchBookingsql);

				if ($resultBooking->num_rows > 0) {
				    while($rowFetch = $resultBooking->fetch_assoc()) { 

				?>

				<tr >
					<td > <?php echo $rowFetch['snameregistered'] ?> </td> 
					<td > <?php echo $rowFetch["selectedDriveWheel"] ; ?> </td>
					<td > <?php echo $rowFetch["numberOfdaysHired"] ; ?> </td>
					<td > <?php echo $rowFetch["reg_date"] ; ?> </td>
					<!-- <td class="btn btn-lg border border-dark "> <?php echo $rowFetch["status"] ; ?> </td>  -->
					<?php if ( $rowFetch["status"]=='approved' ) { ?>
						<td id="bookingStatus" data-toggle="modal" data-target="#bookingStatus" type="button" class="btn btn-lg bg-success "> <?php echo $rowFetch["status"] ; ?> </td>
					<?php } elseif ( $rowFetch["status"]=='denied' ) { ?>
						<td id="bookingStatus" data-toggle="modal" data-target="#bookingStatus" type="button" class="btn btn-lg bg-danger " > <?php echo $rowFetch["status"] ; ?> </td>
					<?php } else { ?>
						<td id="bookingStatus" data-toggle="modal" data-target="#bookingStatus" type="button" class="btn btn-lg border border-dark " > <?php echo $rowFetch["status"] ; ?> </td>
					<?php } ?> 
				</tr>
				




<div class="row">
			<div class="col"></div>
			<div class="col">
				<div class="container-fluid">
					  
					  <div class="modal" id="bookingStatus">
					    <div class="modal-dialog">
					      <div class="modal-content">

					        <div class="modal-header">
					        	<h5>Hire Details</h5>
					          	<button type="button" class="close" data-dismiss="modal">&times;</button>
					        </div>

					        <div class="modal-body">
					          
					        	<form class="form" action="" method="">
					        		<div class="form-group">

										<label for="snameregistered">Second Name</label>
										<input type="text" name="snameregistered" class="form-control form-control-lg" id="snameregistered" value="<?php echo $rowFetch["snameregistered"] ; ?>"  disabled> 
									</div>  

					        		<div class="form-group" >
					        			<label for="selectedDriveWheel">Selected Drive</label>
					        			<input type="text" name="selectedDriveWheel" id="selectedDriveWheel" class="form-control form-control-lg" value="<?php echo $rowFetch["selectedDriveWheel"] ; ?>" disabled>
					        		</div>

					        		<div class="form-group">
					        			<label for="numberOfdaysHired">Number of Days For Hire</label>
					        			<input type="number" name="numberOfdaysHired" id="numberOfdaysHired" class="form-control form-control-lg" value="<?php echo $rowFetch["numberOfdaysHired"] ; ?>" disabled>
					        		</div>

					        		<div class="form-group">
					        			<label for="paymentMode">Mode of Payment</label>
						        		<input type="text" name="mpesaCodeInput" id="mpesaCodeInput" class="form-control form-control-lg" value="<?php echo $rowFetch["paymentMode"] ; ?>" disabled>
					        		</div> 

					        		<div class="form-group">
					        			<label for="status">Status</label>
						        		<input type="text" name="status" id="status" class="form-control form-control-lg" value="<?php echo $rowFetch["status"] ; ?>" disabled>
						        		<!-- <?php if ( $rowFetch["status"]=='approved' ) { ?>
											<input type="text" name="status" id="status" class="form-control form-control-lg btn btn-lg bg-success" value="<?php echo $rowFetch["status"] ; ?>" disabled>
										<?php } elseif ( $rowFetch["status"]=='denied' ) { ?>
											<input type="text" name="status" id="status" class="form-control form-control-lg btn btn-lg bg-danger" value="<?php echo $rowFetch["status"] ; ?>" disabled>
										<?php } else { ?>
											<input type="text" name="status" id="status" class="form-control form-control-lg btn btn-lg border border-dark " value="<?php echo $rowFetch["status"] ; ?>" disabled>
										<?php } ?>  -->
					        		</div> 

					        		<div class="form-group">
					        			<button type="button" class="border border-0" data-dismiss="modal" >
						          			<input type="reset" name="reset" class="form-control form-control-lg btn btn-lg btn-outline-danger" id="reset" value="Close">
						          		</button>
					        		</div> 	

					        	</form>
								
					        </div>

					        <div class="modal-footer"></div>

					      </div>
					    </div>
					  </div>
					  
					</div>
				</div>
			</div>
			<div class="col"></div>
		</div>


<?php  }
					} else { echo "No Bookings Yet."; } ?> 

			</table> 

		</div>
		<div class="col-md-1"></div>

	</div>
</div>







<br/><br/> 

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
	</div>
</footer>


<div class="w-75 mx-auto text-center font-weight-bold">
	<a href="https://twitter.com/itscool012" target="_blank"><img src="../../images/contacticons/socialmedia/instagram.png" alt="instagram account" width="20px" height="20px" id="socialmediaicons"></a>
	<a href="https://www.instagram.com/jam_croc/" target="_blank"><img src="../../images/contacticons/socialmedia/twitter.png" alt="twitter account" width="20px" height="20px" id="socialmediaicons"></a>
	<p>Samuel Emmanuel Okinyo<sup class="text-dark">©</sup>  2021  All Rights Reserved </p>
</div>

</body>
</html>