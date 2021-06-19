<?php
session_start() ;
require '../../connection.php' ;

$_SESSION['userAccept'] = "Successful Registration. You can now login with the details." ;
$_SESSION['classTypeAccept'] = "success" ;
$_SESSION['userFail'] = "Registration Failed. Check input details then try again." ;
$_SESSION['userDup'] = "A user with the same details has already registered. Try again with different details." ;
$_SESSION['classTypeError'] = "danger" ;

$fname = $sname = $userLocation = $yob = $userPhone = $userGender = $userPassword = $userEncryptPassword = '' ;
$fnameErr = $snameErr = $userLocationErr = $yobErr = $userPhoneErr = $userGenderErr = $userPasswordErr = '' ;

if ( isset($_POST['detailsSubmit']) ) {

	if ( empty($_POST['fname']) ) {
		$fnameErr = "Enter First Name" ;
	} else {
		$fname = $_POST['fname'] ;
	}
	if ( empty($_POST['sname']) ) {
		$snameErr = "Enter Second Name" ; 
	} else {
		$sname = $_POST['sname'] ;
	}
	if ( empty($_POST['userLocation']) ) {
		$userLocationErr = "Provide Location" ;
	} else {
		$userLocation = $_POST['userLocation'] ;
	}
	if ( empty($_POST['yob']) ) {
		$yobErr = "DOB details cannot be empty" ;
	} else {
		$yob = $_POST['yob'] ;
	}
	if ( empty($_POST['userPhone']) ) {
		$userPhoneErr = "Input Phone Number" ;
	} else {
		$userPhone = $_POST['userPhone'] ;
	} 
	if ( empty($_POST['userGender']) ) {
		$userGenderErr = "Select Gender" ;
	} else {
		$userGender = $_POST['userGender'] ;
	}
	if ( empty($_POST['userPassword']) ) {
		$userPasswordErr = "Choose and input Password" ;
	} else {
		$userPassword = $_POST['userPassword'] ;
		$userEncryptPassword = md5($userPassword) ;
	}

$insSql = " SELECT * FROM users WHERE fName='$fname' &&  sName='$sname' && userLocation='$userLocation' && userGender='$userGender' && userAge='$yob' && userPhone='$userPhone' && userPassword='$userPassword' " ;
$insResult = mysqli_query($conn,$insSql) ;
$insNums = mysqli_num_rows($insResult) ; 

if ( $insNums>=1 ) {
	$_SESSION['userDup'] ;
	header('location: loginregisterguests.php?userdetailsdup') ;
} else {
	if ( empty($fnameErr) && empty($snameErr) && empty($userLocationErr) && empty($yobErr) && empty($userPhoneErr) && empty($userGenderErr) && empty($userPasswordErr) ) {
		$insStmt = $conn->prepare(" INSERT INTO users (fName,sName,userLocation,userGender,userAge,userPhone,userPassword) VALUES (?,?,?,?,?,?,?) ") ;
		$insStmt->bind_param("sssssss",$fname,$sname,$userLocation,$userGender,$yob,$userPhone,$userEncryptPassword) ;
		if ( $insStmt->execute() === TRUE ) {
			$_SESSION['userAccept'] ;
			$_SESSION['classTypeAccept'] ;
			header('location: homeguests.php?userdetailsaccepted') ;
		} else {
			$_SESSION['userFail'] ;
			$_SESSION['classTypeError'] ;
			header('location: loginregisterguests.php?userdetailsfail');
		}
	} else {
		$_SESSION['userFail'] ;
		$_SESSION['classTypeError'] ;
		header('location: loginregisterguests.php?userdetailsfail');
	}
}

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>VRMS-GuestRegister</title>
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
	span {font-size:12px; color:red; font-style:italic; font-weight:700;}

body {font-size:14px;}	
#mainheader1 {  padding: 5px; }
#heading1 { letter-spacing: 1px; text-align: center; margin-top: 5px; list-style-type: none;}
.heading1subj { display: inline; margin-left:7px; margin-right:7px; }
#heading2 { padding: 10px;}
.nav-link {}
.active { text-transform: uppercase; text-decoration: underline; font-weight: 600;}
li a { width: 100%; }

.carousel-inner img { width: 1100; height: 470; }
.carousel-inner { margin: 0 auto; width: 80%; }

#asidehome { padding: 10px; height: 100%; }
.card-text { margin-top: 50px; }
.form { padding: 20px; }
.form form-control { padding: 15px; }
.footer { padding: 30px;  width: 80%; justify-content: center; margin: 0 auto; }
.footer-links { color: #000; font-size: 15px; }
.footer-links:hover { font-weight: 600; color: #000; }


#detailsSubmit { width:40%; height: 100%; }
#reset { width:40%; border:none; text-decoration:underline; }


@media only screen and (max-width: 600px) {
  
.heading1subj { display: block; margin-top: 3px; margin-bottom: 3px; }
.navbar-toggle { float: right; }

.carousel-inner img { width: 400; height: 270; }
.carousel-inner { margin: 0 auto; width: 100%; }

#footerSec1 { margin-bottom: 30px; }
#footerSec2 { margin-bottom: 30px; }
#footerSec3 {}

#detailsSubmit { width:100%; height: 100%; }
#reset { width:40%; border:none; text-decoration:underline; }


}



</style>

</head>
<body>


<header id="mainheader1" class="">
	<ul id="heading1">
		<li class="heading1subj" >3<sup style="color:#000;">rd</sup> Street, CBD, Nairobi, Kenya </li>
		<li class="heading1subj" > <img src="../../images/phonecall.png" alt="" width="20px" height="20px"> +254 700 000 000 </li>
		<li class="heading1subj" > <img src="../../images/contacticons/email/gmailemail.png" class="img-fluid" alt="" width="20px" height="20px"> 614rollingstone@gmail.com </li>
		<li class="heading1subj" > <a href="adminlogin.php">ADMIN login here</a> </li>
		<hr style="width:50%;" />
	</ul>
	<h4 class="text-center text-uppercase" style="letter-spacing:5px;">Vehicle Rental Management System</h4>
	<nav class="navbar navbar-inverse navbar-info bg-info border border-0">
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
	        <li class="active"> <a href="homeguests.php" class="text-dark bg-light font-weight-bold">Home</a> </li>
	        <li> <a href="aboutguests.php" class="text-dark">About Us</a> </li>
			 <li class="dropdown">
			 	<a href="twowheeler.php" class="text-dark dropdown-toggle" data-toggle="dropdown">Two Wheeler Vehicles</a>
			 	<div class="dropdown-menu">
			      <a class="dropdown-item h4 text-center" href="twowheeler.php">Ducatti</a>
			      <a class="dropdown-item h4 text-center" href="twowheelS.php">Suzuki</a>
			      <a class="dropdown-item h4 text-center" href="twowheelYamaha.php">Yamaha</a>
			    </div>
			 </li>
			 <li class="dropdown">
			 	<a href="fourwheeler.php" class="text-dark dropdown-toggle" data-toggle="dropdown">Four Wheeler Vehicles</a>
			 	<div class="dropdown-menu">
			      <a class="dropdown-item h4 text-center" href="fourwheeler.php">Aston Martin</a>
			      <a class="dropdown-item h4 text-center" href="fourwheelMitsubishi.php">Mitsubishi</a>
			      <a class="dropdown-item h4 text-center" href="fourwheelJeep.php">Jeep</a>
			    </div>
			 </li>
	      </ul>
	    </div>
	  </div>
	</nav>

</header>

<br/>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<div class="jumbotron">
				<p>Already have an account? Log In <a href="homeguests.php">here</a></p>
				<p class="text-center">Thank you for choosing us as your sole vehicle dealership. We offer free membership, where you can register with the form below, and enjoy unlimited promotional offers.</p>
				<p class="alert alert-<?php
					if (isset($_GET['userdetailsaccepted'])) {
							echo $_SESSION['classTypeAccept'] ;
							session_unset();
							session_destroy();
						}
					if (isset($_GET['userdetailsfail'])) {
							echo $_SESSION['classTypeError'] ;
							session_unset();
							session_destroy();
						}
					if (isset($_GET['userdetailsdup'])) {
							echo $_SESSION['classTypeError'] ;
							session_unset();
							session_destroy();
						}		
				?>">
					<?php
						if ( isset($_GET['userdetailsaccepted']) ) {
							if (isset($_SESSION['userAccept'])) {
								echo $_SESSION['userAccept'] ;
								session_unset() ;
								session_destory() ;
							} else {
								echo "Successful Registration. You can now login with the details.";
							}
						}
						if ( isset($_GET['userdetailsfail']) ) {
							if (isset($_SESSION['userFail'])) {
								echo $_SESSION['userFail'] ;
								session_unset() ;
								session_destory() ;
							} else {
								echo "Registration Failed. Check input details then try again.";
							}
						}
						if ( isset($_GET['userdetailsdup']) ) {
							if (isset($_SESSION['userDup'])) {
								echo $_SESSION['userDup'] ;
								session_unset() ;
								session_destory() ;
							} else {
								echo "A user with the same details has already registered. Try again with different details.";
							}
						}
					?>
				</p>
			</div>
			<form class="form" action="loginregisterguests.php" method="post">
				<div class="row">
					<div class="col-md">
						<div class="form-group">
							<label for="fname">First Name<sup style="color:red;">*</sup></label>
							<input type="text" name="fname" class="form-control form-control-lg" id="fname">
							<span> <?php echo $fnameErr; ?> </span>
						</div>
					</div>
					<div class="col-md">
						<div class="form-group">
							<label for="sname">Second Name<sup style="color:red;">*</sup></label>
							<input type="text" name="sname" class="form-control form-control-lg" id="sname">
							<span> <?php echo $snameErr; ?> </span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="userLocation">User Location<sup style="color:red;">*</sup></label>
					<input type="text" name="userLocation" class="form-control form-control-lg" style="width:60%;" id="userLocation">
					<span> <?php echo $userLocationErr; ?> </span>
				</div>
				<div class="form-group">
					<label for="yob">Input DOB</label>
					<input type="date" name="yob" class="form-control form-control-lg" max-length="8" minlength="8" style="width:60%;">
					<span> <?php echo $yobErr; ?> </span>
				</div>
				<div class="form-group">
					<label for="userPhone">Input Phone Number<sup style="color:red;">*</sup></label>
					<input type="phone" name="userPhone" class="form-control form-control-lg" max-length="10" style="width:60%;" id="userPhone">
					<span> <?php echo $userPhoneErr; ?> </span>
				</div>
				<div class="form-group">
					<label for="userGender">Select Gender<sup style="color:red;">*</sup></label>
					<select name="userGender" class="form-control form-control-lg"  style="width:60%;" id="userGender">
						<option></option><option value="male">Male</option><option value="female">Female</option>
					</select>
					<span> <?php echo $userGenderErr; ?> </span>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col">
							<label for="userPassword">Password<sup style="color:red;">*</sup></label>
							<input type="password" name="userPassword" class="form-control form-control-lg" id="userPassword" onkeyup="passcheck();">
						</div>
						<div class="col">
							<label for="conPassword">Confirm Password</label>
							<input type="password" name="conPassword" class="form-control form-control-lg" id="conPassword" onkeyup="passcheck();">
							<span id="passcheckmsg"></span>
						</div>
					</div>
					<span> <?php echo $userPasswordErr; ?> </span>
				</div>
				<br/>
				<div class="row">
					<div class="col">
						<input type="submit" name="detailsSubmit" class="form-control btn btn-lg btn-success" id="detailsSubmit" value="Submit Details" >
					</div>
					<div class="col">
						<input type="reset" name="reset" class="form-control btn btn-lg reset" id="reset" >
					</div>
				</div>
			</form>
		</div>
		<div class="col-md-2"></div>
	</div>
</div>


<br/>


<footer class="footer bg-info">
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


 

<script type="text/javascript">
	function passcheck() {
		if ( document.getElementById('userPassword').value === document.getElementById('conPassword').value ) {
			document.getElementById('passcheckmsg').style.color="green";
			document.getElementById('passcheckmsg').innerHTML = "password match" ;
			document.getElementById('detailsSubmit').disabled = false ;
		} else {
			document.getElementById('passcheckmsg').style.color="red";
			document.getElementById('passcheckmsg').innerHTML = "password mismatch" ;
			document.getElementById('detailsSubmit').disabled = true ;
		}
	} ;
</script>
</body>
</html>