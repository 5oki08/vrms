<?php

require '../../connection.php' ;
require '../guests/login.php' ;
// session_start();

if ( isset($_POST['activeuser']) ) {
	if ( empty($_POST['activeuser']) ) {
		$_SESSION['noactiveaccount'] ;
		$_SESSION['classTypeError'] ;
		header('location: ../guests/homeguests.php?logIn') ;
	} else {
		$_POST['activeuser'] ;
	}
}



$_SESSION['updateDprofile'] = "Profile Successfully Updated." ;
$_SESSION['classTypeAccept'] = "success" ;
$_SESSION['FailupdateDprofile'] = "Failed Profile Update." ;
$_SESSION['classTypeError'] = "danger" ;


$registeredLocation = $registeredPhone = $registeredConfirmNewPassword = '' ;
$registeredLocationErr = $registeredPhoneErr = $registeredConfirmNewPasswordErr = '' ;


if ( isset($_POST['submitUpdateDetails']) ) {
	
	if ( empty($_POST['registeredLocation']) ) {
		$registeredLocationErr = "Provide Current Location Details" ;
	} else {
		$registeredLocation = $_POST['registeredLocation'] ;
	}
	if ( empty($_POST['registeredPhone']) ) {
		$registeredPhoneErr = "Input Current Active Phone Number" ;
	} else {
		$registeredPhone = $_POST['registeredPhone'] ;
	}


	if ( empty($registeredLocationErr) && empty($registeredPhoneErr) ) {
		$updateProfile = " UPDATE users SET userLocation='$registeredLocation' && userPhone='$registeredPhone' WHERE registeredSecondname='{$_SESSION['activeuser']}' " ;

		$resultUpdatePass = mysqli_query($conn,$updateProfile) ;

		if ( $resultUpdatePass ) {
			$_SESSION['updateDprofile'] ;
			$_SESSION['classTypeAccept'] ;
			header('location: myaccountregistered.php?ProfileUpdateSuccess') ;
		} else {
			$_SESSION['FailupdateDprofile'] ;
			$_SESSION['classTypeError'] ;
			header('location: myaccountregistered.php?ProfileUpdateFailed') ;
		}

	} else {}

}



?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>VRMS-MyAccount</title>
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
			 <li> <a href="fourwheelerregistered.php" class="text-dark">Four Wheeler Vehicles</a> </li>
			 <li> <a href="mybookingregistered.php" class="text-dark">My Booking</a> </li>
			 <li class="active"> <a href="myaccountregistered.php" class="text-dark bg-light font-weight-bold"> My Account</a> </li>
			 <li> <a href="logoutregistered.php" class="text-dark">Log Out</a> </li> 
	      </ul>
	    </div>
	  </div>
	</nav>

</header>

<br/>


<div class="container-fluid">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2">
				
				<p class=" alert alert-<?php
					if ( isset($_GET['ProfileUpdateSuccess']) ) {
								echo $_SESSION['classTypeAccept']  ;
								session_unset() ;
								session_destroy() ;
							}
					if ( isset($_GET['ProfileUpdateFailed']) ) {
								echo $_SESSION['classTypeError']  ;
								session_unset() ;
								session_destroy() ;
							}		
				?> " >
					<?php

						if ( isset($_GET['ProfileUpdateSuccess']) ) {
							if ( isset($_SESSION['updateDprofile']) ) {
								echo $_SESSION['updateDprofile'] ;
								session_unset() ;
								session_destroy() ;
							} else { echo "Profile Successfully Updated."; }
						} 
						if ( isset($_GET['ProfileUpdateFailed']) ) {
							if ( isset($_SESSION['FailupdateDprofile']) ) {
								echo $_SESSION['FailupdateDprofile'] ;
								session_unset() ;
								session_destroy() ;
							} else { echo "Failed Profile Update."; }
						}

					?>
				</p>

			</div>
			<div class="col-md" >
				<div class="container">
					<div class="jumbotron" id="picturecontainer">
						<img src="../../images/myaccountimagex.png">
					</div>
					<div class="container-fluid">

						<form class="form" action="myaccountregistered.php" method="post" enctype="multipart/form-data">
							<?php
								$fetchuserdata = "SELECT * FROM users WHERE sName='{$_SESSION['activeuser']}' ";
								$fetchuserdataResults = $conn->query($fetchuserdata);

								if ($fetchuserdataResults->num_rows > 0) {
									 while($rowFetchuserdetails = $fetchuserdataResults->fetch_assoc()) {
								
							?>

							<div class="form-group">
								<label for="inputProfilephoto">Select profile image</label>
								<input type="file" name="inputProfilephoto" id="inputProfilephoto" class="form-control form-control-lg">
							</div>	

							<div class="form-group">
								<div class="row">
									<div class="col-md">
										<label for="registeredFirstname">First Name</label>
										<input type="text" name="registeredFirstname" id="registeredFirstname" class="form-control form-control-lg" value="<?php echo $rowFetchuserdetails['fName'] ; ?>" disabled>
									</div>
									<div class="col-md">
										<label for="registeredSecondname">Second Name</label>
										<input type="text" name="registeredSecondname" id="registeredSecondname" class="form-control form-control-lg" value="<?php echo $rowFetchuserdetails['sName'] ; ?>" disabled>
									</div>
								</div>
							</div>	

							<div class="form-group">
								<label for="registeredLocation">User Location</label>
								<input type="text" name="registeredLocation" id="registeredLocation" class="form-control form-control-lg" value="<?php echo $rowFetchuserdetails['userLocation'] ; ?>" disabled>
								<!-- <span id="submiterrormsg"> <?php echo $registeredLocationErr ; ?> </span> -->
							</div>		

							<div class="form-group">
								<label for="registeredGender">Gender</label>
								<input type="text" name="registeredGender" id="registeredGender" class="form-control form-control-lg" value="<?php echo $rowFetchuserdetails['userGender'] ; ?>" disabled>
							</div>	

							<div class="form-group">
								<label for="registeredPhone">Phone Number</label>
								<input type="phone" name="registeredPhone" id="registeredPhone" class="form-control form-control-lg" value="<?php echo $rowFetchuserdetails['userPhone'] ; ?>" disabled>
								<!-- <span id="submiterrormsg"> <?php echo $registeredPhoneErr ; ?> </span> -->
							</div>	

							<div class="form-group">
								<label for="registeredcurrentPassword">Current Password</label>
								<input type="password" name="registeredcurrentPassword" id="registeredPassword" class="form-control form-control-lg" value="<?php echo $rowFetchuserdetails['userPassword'] ; ?>" disabled>
							</div>		

							<!-- <div class="form-group">
								<div class="row">
									<div class="col-md">
										<input type="submit" name="submitUpdateDetails" id="submitUpdateDetails" class="form-control btn btn-outline-success">
									</div>
									<div class="col-md">
										<input type="reset" name="resetupdateDetails" id="resetupdateDetails" class="form-control" > 
									</div>
								</div>
							</div> -->
							<?php  }
					} ?>
						</form>

					</div>
					<!-- <div class="row">
						<div class="col-md-6"></div>
						<div class="col-md-3">
							<p></p>
						</div>
						<div class="col-md-5"></div>
					</div> -->
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
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
