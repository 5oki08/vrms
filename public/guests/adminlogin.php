<?php

require '../../connection.php' ;
session_start() ;

$_SESSION['adminDupRej'] = "Similar admin details. Rejected" ;
$_SESSION['classTypeError'] = "danger" ;
$_SESSION['adminGranted'] = "Admin  rights granted. Procees with log in" ;
$_SESSION['classTypeAccept'] = "danger" ;
$_SESSION['adminNone'] = "Details Rejected" ;

$_SESSION['adminFail'] = "Credentials Rejected" ;


$adminfirstName = $adminSecondName = $adminEmail = $adminUniqueNumber = $adminUniqueNumberEncrypt =  '' ;
$adminfirstNameErr = $adminSecondNameErr = $adminEmailErr = $adminUniqueNumberErr = $adminUniqueNumberEncrypt =  '' ;

if ( isset($_POST['adminSubmitRegistration']) ) {
	
	if ( empty($_POST['adminfirstName']) ) {
		$adminfirstNameErr = "input correct details" ;
	}  else {
		$adminfirstName = $_POST['adminfirstName'] ;
	}
	if ( empty($_POST['adminSecondName']) ) {
		$adminSecondNameErr = "input correct details" ;
	}  else {
		$adminSecondName = $_POST['adminSecondName'] ;
	}
	if ( empty($_POST['adminEmail']) ) {
		$adminEmailErr = "input correct details" ;
	}  else {
		$adminEmail = $_POST['adminEmail'] ;
	}
	if ( empty($_POST['adminUniqueNumber']) ) {
		$adminUniqueNumberErr = "input correct details" ;
	}  else {
		// $adminUniqueNumber = $_POST['adminUniqueNumber'] ;
		if ( preg_match("/^$adminSecondName$/", $adminSecondName) ) {
			$adminUniqueNumber = $_POST['adminUniqueNumber'] ;
			$adminUniqueNumberEncrypt = md5($adminUniqueNumber) ;
		} else {
			$adminUniqueNumberErr = "input correct details" ;
		}
	}



	$adminRegisterSql = " SELECT * FROM adminusers WHERE adminfirstName='$adminfirstName' && adminSecondName='$adminSecondName' && adminEmail='$adminEmail' && adminUniqueNumber='$adminUniqueNumberEncrypt' " ;
	$adminRegisterResult = mysqli_query($conn,$adminRegisterSql) ;
	$adminRegNum = mysqli_num_rows($adminRegisterResult) ;

	if ( $adminRegNum==1 ) {
		$_SESSION['adminDupRej'] ;
		// $_SESSION['classTypeError'] ;
		header('location: homeguests.php?none') ;
	} else {
		if ( empty($adminfirstNameErr) && empty($adminSecondNameErr) && empty($adminEmailErr) && empty($adminUniqueNumberErr)  ) {
			$RegadminStmt = $conn->prepare(" INSERT INTO adminusers (adminfirstName,adminSecondName,adminEmail,adminUniqueNumber) VALUES (?,?,?,?) ") ;
			$RegadminStmt->bind_param("ssss",$adminfirstName,$adminSecondName,$adminEmail,$adminUniqueNumberEncrypt) ;
			if ( $RegadminStmt->execute() === TRUE ) {
				$_SESSION['adminGranted'] ;
				$_SESSION['classTypeAccept'] ;
				header('location: adminlogin.php?aG') ;
			} else {
				$_SESSION['adminNone'] ;
				$_SESSION['classTypeError'] ;
				header('location: homeguests.php?nonead') ;
			}
		}
	}

} 





$passadminEmail = $passadminUniqueNumber = '' ;
$passadminEmailErr = $passadminUniqueNumberErr = '' ;


if ( isset($_POST['adminLogin']) ) {
	
	if ( empty($_POST['passadminEmail']) ) {
		$passadminEmailErr = "Invalid Credentials" ;
	} else {
		$passadminEmail = $_POST['passadminEmail'] ;
	}
	if ( empty($_POST['passadminUniqueNumber']) ) {
		$passadminUniqueNumberErr = "Invalid Credentials" ;
	} else {
		$passadminUniqueNumber = $_POST['passadminUniqueNumber'] ;
	}


	$loginSqlAdmin = " SELECT * FROM adminusers WHERE adminEmail='$passadminEmail' && adminUniqueNumber='".md5($passadminUniqueNumber)."' " ;
	$loginadminResult = mysqli_query($conn,$loginSqlAdmin) ;
	$loginNumadmin = mysqli_num_rows($loginadminResult) ;

	if ( $loginNumadmin == 1 ) {
		if ( empty($passadminEmailErr) && empty($passadminUniqueNumberErr) ) {
			$_SESSION['activeuseradmin'] = $passadminUniqueNumber ;
			header('location: ../admin/dashboardadmin.php?true') ;
		}
	} else {
			$_SESSION['adminFail'] ;
			// $_SESSION['classTypeError'] ;
			header('location: homeguests.php?guest') ;
		}


}



?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>VRMS - admin login</title>
<meta charset="utf-8">	
<meta name="viewport" content="width=device-width, initial-scale=1">	
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<link rel="stylesheet" type="text/css" href="../../css/style.css">
<link rel="stylesheet" type="text/css" href="../../css/styleresponsive.css">

<style type="text/css">
	
	#errorRegadminDetails {
		color: #fff;
	}
	#adminSubmitRegistration {
		background-color: #fff;
	}
	#adminSubmitRegistration:hover {
		background-color: green;
		color: #000;
	}
	#resetadminDetails {
		text-decoration: underline;
		border: 2px solid tomato;
	}
	#adminLogin {
		padding: 10px;
	}
	#adminLogin:hover {
		border: none;
		background-color: #E30B5C;
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
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md">
			<div class="jumbotron" style="text-align:center;">
				<h4>Vehicle Rental Management System (admin Login)</h4><br/>
				<img src="../../images/vrmslogo.png">
			</div>
		</div>
		<div class="col-md-1"></div>
	</div>
</div>



<div class="container-fluid">
	<div class="row">
		<div class="col-md-1"></div>

		<div class="col-md-5">
			<div class="container-fluid" style="background-color:#E30B5C;">
				<form class="form" action="adminlogin.php" method="post">
					<div class="form-group">
						<label for="adminfirstName">First Name</label>
						<input type="text" name="adminfirstName" id="adminfirstName" class="form-control">
						<span id="errorRegadminDetails"> <?php echo $adminfirstNameErr ; ?> </span>
					</div>
					<div class="form-group">
						<label for="adminSecondName">Second Name</label>
						<input type="password" name="adminSecondName" id="adminSecondName" class="form-control">
						<span id="errorRegadminDetails"> <?php echo $adminSecondNameErr ; ?> </span>
					</div>
					<div class="form-group">
						<label for="adminEmail">Email</label>
						<input type="email" name="adminEmail" id="adminEmail" class="form-control">
						<span id="errorRegadminDetails"> <?php echo $adminEmailErr ; ?> </span>
					</div>
					<div class="form-group">
						<label for="adminUniqueNumber">Unique Number</label>
						<input type="password" name="adminUniqueNumber" id="adminUniqueNumber" class="form-control">
						<span id="errorRegadminDetails"> <?php echo $adminUniqueNumberErr ; ?> </span>
					</div>	
					<div class="form-group">
						<div class="row">
							<div class="col-md-4">
								<input type="submit" name="adminSubmitRegistration" id="adminSubmitRegistration" class="form-control btn " value="Register Admin">
							</div>
							<div class="col-md-4">
								<input type="reset" name="resetadminDetails" id="resetadminDetails" class="form-control" >
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>

		<div class="col-md-5">
			<div class="jumbotron">
				<form class="form" method="post" action="adminlogin.php">
					<p class=" alert alert-<?php
						if (isset($_GET['aG'])) {
								echo $_SESSION['classTypeAccept'] ;
								session_unset();
								session_destroy();
							}
					?> ">
						<?php
							if ( isset($_GET['aG']) ) {
								if (isset($_SESSION['adminGranted'])) {
									echo $_SESSION['adminGranted'] ;
									session_unset() ;
									session_destory() ;
								} else {
									echo "Admin  rights granted. Procees with log in";
								}
							}
						?>
					</p>
					<div class="form-group">
						<label for="passadminEmail">Email</label>
						<input type="email" name="passadminEmail" id="passadminEmail" class="form-control">
					</div>
					<div class="form-group">
						<label for="passadminUniqueNumber">Enter Unique Number</label>
						<input type="password" name="passadminUniqueNumber" id="passadminUniqueNumber" class="form-control">
					</div>
					<div class="form-group">
						<input type="submit" name="adminLogin" id="adminLogin" value="Admin Login">
					</div>
				</form>
			</div>
		</div>

		<div class="col-md-1"></div>
	</div>
</div>





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