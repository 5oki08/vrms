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
	#picturecontainer {
		border: 5px solid;
	}
	#resetupdateDetails {
		border: none;
		text-decoration: underline;
	}
	#resetupdateDetails:hover {
		text-decoration-style: solid;
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
					<li class="nav-item"><a href="contactregistered.php" class="nav-link">Contact Us</a></li>
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
								<input type="file" name="inputProfilephoto" id="inputProfilephoto" class="form-control">
							</div>	

							<div class="form-group">
								<div class="row">
									<div class="col-md">
										<label for="registeredFirstname">First Name</label>
										<input type="text" name="registeredFirstname" id="registeredFirstname" class="form-control" value="<?php echo $rowFetchuserdetails['fName'] ; ?>" disabled>
									</div>
									<div class="col-md">
										<label for="registeredSecondname">Second Name</label>
										<input type="text" name="registeredSecondname" id="registeredSecondname" class="form-control" value="<?php echo $rowFetchuserdetails['sName'] ; ?>" disabled>
									</div>
								</div>
							</div>	

							<div class="form-group">
								<label for="registeredLocation">User Location</label>
								<input type="text" name="registeredLocation" id="registeredLocation" class="form-control" value="<?php echo $rowFetchuserdetails['userLocation'] ; ?>" disabled>
								<!-- <span id="submiterrormsg"> <?php echo $registeredLocationErr ; ?> </span> -->
							</div>		

							<div class="form-group">
								<label for="registeredGender">Gender</label>
								<input type="text" name="registeredGender" id="registeredGender" class="form-control" value="<?php echo $rowFetchuserdetails['userGender'] ; ?>" disabled>
							</div>	

							<div class="form-group">
								<label for="registeredPhone">Phone Number</label>
								<input type="phone" name="registeredPhone" id="registeredPhone" class="form-control" value="<?php echo $rowFetchuserdetails['userPhone'] ; ?>" disabled>
								<!-- <span id="submiterrormsg"> <?php echo $registeredPhoneErr ; ?> </span> -->
							</div>	

							<div class="form-group">
								<label for="registeredcurrentPassword">Current Password</label>
								<input type="password" name="registeredcurrentPassword" id="registeredPassword" class="form-control" value="<?php echo $rowFetchuserdetails['userPassword'] ; ?>" disabled>
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

</body>
</html>
