<?php

session_start() ;
require '../../connection.php' ;

$_SESSION['passUpdateComplete'] = "Password Reset Complete. The new credentials can now be used to login" ;
$_SESSION['classTypeAccept'] = "success" ;
$_SESSION['invalidCred'] = "Provide the phone number associated with your account" ;
$_SESSION['classTypeError'] = "danger" ;

$userresetphone = $userNewpassword = $encryptuserNewpassword = '' ;
$userresetphoneErr = $userNewpasswordErr = '' ;


if ( isset($_POST['newpasswordSubmit']) ) {
	if ( empty($_POST['userresetphone']) ) {
		$userresetphoneErr = "Invalid phone number" ;
	} else {
		$userresetphone = $_POST['userresetphone'] ;
	}
	if ( empty($_POST['userNewpassword']) ) {
		$userNewpasswordErr = "Input New Password" ;
	} else {
		$userNewpassword = $_POST['userNewpassword'] ;
		 $encryptuserNewpassword = md5($userNewpassword) ;
	}

	if ( empty($userresetphoneErr) && empty($userNewpasswordErr) ) {
		$resetpassSql = " UPDATE users SET userPassword='$encryptuserNewpassword' WHERE userPhone='$userresetphone' " ;

		$resultresetpass = mysqli_query($conn,$resetpassSql) ;

		if ( $resultresetpass ) {
			$_SESSION['passUpdateComplete'] ;
			$_SESSION['classTypeAccept'] ;
			header('location: homeguests.php?passResetAccept') ;
		} else {
		// echo "Invalid Details";
		$_SESSION['invalidCred'] ;
		$_SESSION['classTypeError'] ;
		header('location: resetpassword.php?passresetfalseinvalidcred') ;
	}
	}
	

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>VRMS-resetPassword</title>
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
	

body {font-size:14px;}	
.alert {
	color: red;
	border: 3px solid #fff;
	padding: 10px;
	text-align: center;
}


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
#loginSubmit { padding: 10px; width: 100%; height: 100%; }


#newpasswordSubmit { margin: 20px; height: 60%; }
#reset { margin: 20px; height: 60%; }



@media only screen and (max-width: 600px) {
  
.heading1subj { display: block; margin-top: 3px; margin-bottom: 3px; }
.navbar-toggle { float: right; }

.carousel-inner img { width: 400; height: 270; }
.carousel-inner { margin: 0 auto; width: 100%; }

#footerSec1 { margin-bottom: 30px; }
#footerSec2 { margin-bottom: 30px; }
#footerSec3 {}

#newpasswordSubmit { margin: 20px; height: 60%; }
#reset { margin: 20px; height: 60%; }


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
	      <a class="navbar-brand" href="#"></a>
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

<div class="container-fluid">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<div class="container-fluid">
				<p class="alert alert-<?php
					if ( isset($_GET['passUpdateComplete']) ) {
							echo $_SESSION['classTypeAccept'] ;
							session_unset() ;
							session_destroy() ;
						}
						if ( isset($_GET['passresetfalseinvalidcred']) ) {
							echo $_SESSION['classTypeError'] ;
							session_unset() ;
							session_destroy() ;
						}
				?> "><?php
					if ( isset($_GET['passResetAccept']) ) {
						if ( isset($_SESSION['passUpdateComplete']) ) {
							echo $_SESSION['passUpdateComplete'] ;
							session_unset() ;
							session_destroy() ;
						} else {
							echo "Password Reset Complete. The new credentials can now be used to login";
						}
					}
					if ( isset($_GET['passresetfalseinvalidcred']) ) {
						if ( isset($_SESSION['invalidCred']) ) {
							echo $_SESSION['invalidCred'] ;
							session_unset() ;
							session_destroy() ;
						} else {
							echo "Provide the phone number associated with your account";
						}
					}
				?></p>
				<form class="form" action="resetpassword.php" method="post">
					<div class="form-group">
						<label for="userresetphone">Enter Phone Number</label>
						<input type="phone" name="userresetphone" id="userresetphone" class="form-control form-control-lg" style="width:60%;" maxlength="10" minlength="10">
					</div>
					<div class="form-group">
						<label for="userNewpassword">Enter New Password</label>
						<input type="password" name="userNewpassword" id="userNewpassword" class="form-control form-control-lg" style="width:60%;" onkeyup="newpasscheck()">
					</div>
					<div class="form-group">
						<label for="userConfirmnewpassword">Confirm Password</label>
						<input type="password" name="userConfirmnewpassword" id="userConfirmnewpassword" class="form-control form-control-lg" style="width:60%;" onkeyup="newpasscheck()">
						<span id="usernewpasswordmsg"></span>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md">
								<input type="submit" name="newpasswordSubmit" class="form-control form-control-lg btn btn-lg btn-success" id="newpasswordSubmit" value="New Password Submit">
							</div>
							<div class="col-md">
								<input type="reset" name="reset" class="form-control form-control-lg reset btn btn-lg btn-outline-danger" id="reset" style="color:#000;">
							</div>
						</div>
					</div>
				</form>
				<aside class="h2">
					<p> Log In <a href="homeguests.php">here</a></p>
				</aside>	

			</div>
		</div>
		<div class="col-md-3"></div>
	</div>
</div>


<script type="text/javascript">
	function newpasscheck() {
		if ( document.getElementById('userNewpassword').value===document.getElementById('userConfirmnewpassword').value ) {
			document.getElementById('usernewpasswordmsg').style.color = "green" ;
			document.getElementById('usernewpasswordmsg').innerHTML = "password match";
			document.getElementById('newpasswordSubmit').disabled = false ;
		} else {
			document.getElementById('usernewpasswordmsg').style.color = "red" ;
			document.getElementById('usernewpasswordmsg').innerHTML = "password mismatch";
			document.getElementById('newpasswordSubmit').disabled = true ;
		}
	}
</script>

</body>
</html>