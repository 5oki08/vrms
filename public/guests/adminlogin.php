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
	<nav class="navbar navbar-inverse navbar-success bg-success border border-0">
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
	        <li> <a href="homeguests.php" class="text-dark">Home</a> </li>
	        <li> <a href="aboutguests.php" class="text-dark">About Us</a> </li>
			<li> <a href="twowheeler.php" class="text-dark">Two Wheeler Vehicles**</a> </li>
			<li> <a href="fourwheeler.php" class="text-dark">Four Wheeler Vehicles</a> </li>
	      </ul>
	    </div>
	  </div>
	</nav>

</header>


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
						<input type="text" name="adminfirstName" id="adminfirstName" class="form-control form-control-lg">
						<span id="errorRegadminDetails" class="text-center"> <?php echo $adminfirstNameErr ; ?> </span>
					</div>
					<div class="form-group">
						<label for="adminSecondName">Second Name</label>
						<input type="password" name="adminSecondName" id="adminSecondName" class="form-control form-control-lg">
						<span id="errorRegadminDetails"> <?php echo $adminSecondNameErr ; ?> </span>
					</div>
					<div class="form-group">
						<label for="adminEmail">Email</label>
						<input type="email" name="adminEmail" id="adminEmail" class="form-control form-control-lg">
						<span id="errorRegadminDetails"> <?php echo $adminEmailErr ; ?> </span>
					</div>
					<div class="form-group">
						<label for="adminUniqueNumber">Unique Number</label>
						<input type="password" name="adminUniqueNumber" id="adminUniqueNumber" class="form-control form-control-lg">
						<span id="errorRegadminDetails"> <?php echo $adminUniqueNumberErr ; ?> </span>
					</div>	
					<div class="form-group">
						<div class="row">
							<div class="col-md-4">
								<input type="submit" name="adminSubmitRegistration" id="adminSubmitRegistration" class="form-control form-control-lg btn btn-lg border border-dark bg-light " value="Register Admin">
							</div>
							<div class="col-md-4">
								<input type="reset" name="resetadminDetails" id="resetadminDetails" class="form-control form-control-lg" >
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
						<input type="email" name="passadminEmail" id="passadminEmail" class="form-control form-control-lg">
					</div>
					<div class="form-group">
						<label for="passadminUniqueNumber">Enter Unique Number</label>
						<input type="password" name="passadminUniqueNumber" id="passadminUniqueNumber" class="form-control form-control-lg">
					</div>
					<div class="form-group">
						<input type="submit" name="adminLogin" id="adminLogin" value="Admin Login" class="form-control form-control-lg btn btn-lg bg-success text-center">
					</div>
				</form>
			</div>
		</div>

		<div class="col-md-1"></div>
	</div>
</div>





<br/><br/>  

<footer class="footer bg-success">
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