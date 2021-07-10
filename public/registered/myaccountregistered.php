<?php

require '../../connection.php' ;
// require '../guests/login.php' ;
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
 


 


$_SESSION['updateDprofile'] = "Profile Successfully Updated." ;
$_SESSION['classTypeAccept'] = "success" ;
$_SESSION['FailupdateDprofile'] = "Failed Profile Update." ;
$_SESSION['classTypeError'] = "danger" ;


$registeredLocation = $registeredPhone = $profilePhoto = '' ;
$registeredLocationErr = $registeredPhoneErr  = '' ;


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
	$id = $_POST['id'] ;


	// $target = "profileImages/".basename($_FILES['inputProfilephoto']['name']) ;
	// $profilePhoto = $_FILES['inputProfilephoto']['name'] ;

	$targetdir = "profileImages/" ;
	$targetpath = $targetdir.basename($_FILES['inputProfilephoto']['name']) ;
	 

	if ( empty($registeredLocationErr) && empty($registeredPhoneErr) ) {
		$updateProfile = " UPDATE users SET userLocation='$registeredLocation' , userPhone='$registeredPhone' , profilePicture='{$_FILES['inputProfilephoto']['name']}' WHERE id='$id' " ; 
		$resultUpdatePass = mysqli_query($conn,$updateProfile) ;
 
		if ( $conn->query($resultUpdatePass) === TRUE ) {
			// move_uploaded_file($_FILES['name']['tmp_name'], $target) ;
			move_uploaded_file($_FILES['inputProfilephoto']['name'],$targetpath) ;
			// if ( move_uploaded_file($_FILES['inputProfilephoto']['name'],$targetpath) ) {
			// 	$_SESSION['updateDprofile'] ;
			// $_SESSION['classTypeAccept'] ;
			// header('location: myaccountregistered.php?ProfileUpdateSuccess') ;
			// }
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
.footer { padding: 30px; }
.footer-links { color: #000; font-size: 15px; }
.footer-links:hover { font-weight: 600; color: #000; }

#fourwheelercardimg { width: 100%; }
/*#fourwheelermoreinfo { width: 50%; padding: 10px; margin-left: 25%; }*/
#fourwheelermoreinfo { width: 100%; }

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
	      <a class="navbar-brand" href="#"><!-- <img src="../../images/vrmslogo.png" alt="Logo" width="80" height="80"> --></a>
	    </div>
	    <div class="collapse navbar-collapse" id="myNavbar">
	      <ul class="nav navbar-nav navbar-expand-md align-content-start">
	        <li> <a href="homeregistered.php" class="text-dark">Home</a> </li>
	        <li> <a href="aboutregistered.php" class="text-dark">About Us</a> </li>
			<li> <a href="twowheelerregistered.php" class="text-dark">Two Wheeler Vehicles</a> </li>
			<li> <a href="fourwheelerregistered.php" class="text-dark">Four Wheeler Vehicles</a> </li>
			 <li class="dropdown btn-outline-primary">
			 	<a href="#" class="text-dark dropdown-toggle" data-toggle="dropdown">Welcome, <?php echo $_COOKIE['userloginLastName']  ; ?></a>
			 	<div class="dropdown-menu">
			      <a class="dropdown-item h4 text-center" href="mybookingregistered.php">My Booking</a>
			      <a class="dropdown-item h4 text-center active" href="myaccountregistered.php">My Account</a>
			      <a class="dropdown-item h4 text-center" href="logoutregistered.php">Log Out</a>
			    </div>
			 </li>  
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
				<?php

								$fetchuserdata = "SELECT * FROM users WHERE sName='{$_COOKIE['userloginLastName']}' ";
								$fetchuserdataResults = $conn->query($fetchuserdata);

								if ($fetchuserdataResults->num_rows > 0) {
									 while($rowFetchuserdetails = $fetchuserdataResults->fetch_array()) {
								
							?> 
				<div class="container">
					<div class="jumbotron" id="picturecontainer">
						 <img src="profileImages/<?=$rowFetch['profilePicture']?>" class="mx-auto" id="fourwheelermoreinfo">
					</div>
					<div class="container-fluid">

						<form class="form" action="myaccountregistered.php" method="post" enctype="multipart/form-data">
							<div class="form-group" hidden>
								<input type="number" name="id" id="id" value="<?php echo $rowFetchuserdetails['id'] ; ?>" class="form-control form-control-lg">
							</div>	

							<div class="form-group">
								<?php if ( isset($_GET['edit']) ) :  ?>
									<label for="inputProfilephoto">Select profile image</label>
									<input type="file" name="inputProfilephoto" id="inputProfilephoto" class="form-control form-control-lg">
								<?php else: ?>
									<label for="inputProfilephoto" hidden>Select profile image</label>
									<input type="file" name="inputProfilephoto" id="inputProfilephoto" class="form-control form-control-lg" hidden>
								<?php endif ; ?>
							</div>	

								
							<div class="form-group">
								<div class="row">
									<div class="col-md">
										<?php if ( isset($_GET['edit']) ) :  ?>
											<label for="registeredFirstname">First Name</label>
											<input type="text" name="registeredFirstname" id="registeredFirstname" class="form-control form-control-lg" value="<?php echo $rowFetchuserdetails['fName'] ; ?>" disabled>
										<?php else: ?>	
											<label for="registeredFirstname">First Name</label>
											<input type="text" name="registeredFirstname" id="registeredFirstname" class="form-control form-control-lg" value="<?php echo $rowFetchuserdetails['fName'] ; ?>" disabled>
										<?php endif ; ?>	
									</div>
									<div class="col-md">
										<?php if ( isset($_GET['edit']) ) :  ?>
											<label for="registeredSecondname">Second Name</label>
											<input type="text" name="registeredSecondname" id="registeredSecondname" class="form-control form-control-lg" value="<?php echo $rowFetchuserdetails['sName'] ; ?>" disabled>
										<?php else: ?>	
											<label for="registeredSecondname">Second Name</label>
										<input type="text" name="registeredSecondname" id="registeredSecondname" class="form-control form-control-lg" value="<?php echo $rowFetchuserdetails['sName'] ; ?>" disabled>
										<?php endif ; ?>	
									</div>
								</div>
							</div>

							
							<div class="form-group">
								<?php if ( isset($_GET['edit']) ) :  ?>
									<label for="registeredLocation">User Location</label>
									<input type="text" name="registeredLocation" id="registeredLocation" class="form-control form-control-lg" value="<?php echo $rowFetchuserdetails['userLocation'] ; ?>">
								<?php else: ?>	
									<label for="registeredLocation">User Location</label>
									<input type="text" name="registeredLocation" id="registeredLocation" class="form-control form-control-lg" value="<?php echo $rowFetchuserdetails['userLocation'] ; ?>" disabled>
								<?php endif ; ?>
							</div>		

							
							<div class="form-group">
								<?php if ( isset($_GET['edit']) ) :  ?>
									<label for="registeredGender">Gender</label>
									<input type="text" name="registeredGender" id="registeredGender" class="form-control form-control-lg" value="<?php echo $rowFetchuserdetails['userGender'] ; ?>" disabled>
								<?php else: ?>	
									<label for="registeredGender">Gender</label>
									<input type="text" name="registeredGender" id="registeredGender" class="form-control form-control-lg" value="<?php echo $rowFetchuserdetails['userGender'] ; ?>" disabled>
								<?php endif ; ?>
							</div>	

							
							<div class="form-group">
								<?php if ( isset($_GET['edit']) ) :  ?>
									<label for="registeredPhone">Phone Number</label>
									<input type="phone" name="registeredPhone" id="registeredPhone" class="form-control form-control-lg" value="<?php echo $rowFetchuserdetails['userPhone'] ; ?>">
								<?php else: ?>
									<label for="registeredPhone">Phone Number</label>
									<input type="phone" name="registeredPhone" id="registeredPhone" class="form-control form-control-lg" value="<?php echo $rowFetchuserdetails['userPhone'] ; ?>" disabled>	
								<?php endif ; ?>
							</div>

							
							<div class="form-group">
								<?php if ( isset($_GET['edit']) ) :  ?>
									<label for="registeredcurrentPassword">Current Password</label>
									<input type="password" name="registeredcurrentPassword" id="registeredPassword" class="form-control form-control-lg" value="<?php echo $rowFetchuserdetails['userPassword'] ; ?>" disabled>
								<?php else: ?>
									<label for="registeredcurrentPassword">Current Password</label>
									<input type="password" name="registeredcurrentPassword" id="registeredPassword" class="form-control form-control-lg" value="<?php echo $rowFetchuserdetails['userPassword'] ; ?>" disabled>	
								<?php endif ; ?>
							</div>	

							<br/>							
							<div class="form-group">
								<?php
									if ( isset($_GET['edit']) ) : 
								?>
								<div class="row">
									<div class="col-md">
										<a href="myaccountregistered.php?edit=<?php echo $rowFetchuserdetails['id'];?>" class="btn btn-lg btn-warning text-light font-weight-bold w-50" hidden="">Edit</a>
									</div>
									<div class="col-md">
										<input type="submit" name="submitUpdateDetails" id="submitUpdateDetails" class="form-control btn btn-lg btn-outline-success w-50"> 
									</div>
								</div>
								<?php else: ?>
								<div class="row">
									<div class="col-md">
										<a href="myaccountregistered.php?edit=<?php echo $rowFetchuserdetails['id'];?>" class="btn btn-lg btn-outline-warning w-50">Edit</a>
									</div>
									<div class="col-md">
										<input type="submit" name="submitUpdateDetails" id="submitUpdateDetails" class="form-control btn btn-lg btn-outline-success w-50" hidden=""> 
									</div>
								</div>	
								<?php endif ; ?>
							</div>
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
