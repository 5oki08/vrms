<?php 

require '../../connection.php' ;
require 'login.php' ;
// session_start() ;

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>VRMS-GuestHome</title>
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
/*#heading2 { padding: 10px;}*/
/*.nav-link {}*/
.active { text-transform: uppercase; text-decoration: underline; font-weight: 600;}
/*li a { width: 100%; }*/

/*.carousel-inner img { width: 1100; height: 470; }*/
/*.carousel-inner { margin: 0 auto; width: 80%; }*/

#homeguestsmid { background-color: #cecece; }

#asidehome { padding: 10px; height: 100%; }
.card-text { margin-top: 50px; }

#carouselphoto2 { position:relative; left:175px; }
#carouselphoto3 { position:absolute; left:680px; bottom:50px; }


.form { padding: 20px; }
.form form-control { padding: 15px; }
/*#loginSubmit { padding: 10px; width: 100%; height: 100%; }*/
#loginSubmit { margin-left: 50px; }
#passwordnewaccount { padding: 5px; }



/*#userloginphone { padding: 18px; width: 75%; margin: 0 auto; }
#userloginLastName { padding: 18px; width: 75%; margin: 0 auto; }
#userloginpassword { padding: 18px; width: 75%; margin: 0 auto; }*/



.footer { padding: 30px; }
.footer-links { color: #000; font-size: 15px; }
.footer-links:hover { font-weight: 600; color: #000; }

#socialmediaicons{ margin-left: 5px; margin-right: 5px; }



@media only screen and (max-width: 600px) {
  
.heading1subj { display: block; margin-top: 3px; margin-bottom: 3px; }
/*.navbar-toggle { float: right; }*/

/*.carousel-inner img { width: 400; height: 270; }*/
/*.carousel-inner { margin: 0 auto; width: 100%; }*/

#carouselphoto2 { width:100%; position: relative; right: 10px; }
#carouselphoto3 { width:100%; position: relative; left: 30px; }


#loginSubmit { margin-top: 10px; }


/*#userloginphone { padding: 16px; width: 100%; }
#userloginLastName { padding: 16px; width: 100%; }
#userloginpassword { padding: 16px; width: 100%; }*/


#footerSec1 { margin-bottom: 30px; }
#footerSec2 { margin-bottom: 30px; }
#footerSec3 {}


}

</style>

</head>
<body>


<header id="mainheader1" class="" >
	<ul id="heading1">
		<li class="heading1subj" ><img src="../../images/pinLocation.jpg" alt="" width="40px" height="20px"> 3<sup style="color:#000;">rd</sup> Street, CBD, Nairobi, Kenya </li>
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
			<li> <a href="twowheeler.php" class="text-dark">Two Wheeler Vehicles**</a> </li>
			<li> <a href="fourwheeler.php" class="text-dark">Four Wheeler Vehicles</a> </li>
	      </ul>
	    </div>
	  </div>
	</nav>
</header> 


<div>
	<div class="w-50" style=" ">
		<img src="../../images/vrmslogo.png" alt="Logo" class="">
	</div>
	<div class="w-50" style="" id="carouselphoto2">
		<img src="../../images/twowheeler/twowheeler1.png" alt="Two Wheel Sample" class="w-75">
	</div>
	<div class="w-50" style="" id="carouselphoto3">
		<img src="../../images/fourwheeler/fielder2018.jpg" alt="Four Wheel Sample"  class="border border-dark w-75">
	</div>
</div>


<br/><br/>

<div class="container-fluid" id="homeguestsmid">
	<div class="row mx-auto justify-content-center">
		<div class="col-md-6">
			<article>
				<aside id="asidehome" class="card text-center justify-content-center border border-0">
					<div class="card-header">
						<p class="text-center font-weight-bold">The big brown fox</p>
					</div>
					<div class="card-body">
						<p class="text-center"> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. <br/>
						<!-- <p class="card-text">Jumpred Over The</p> -->
						Jumpred Over The<br/>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
						</p>
					</div>
					<div class="card-footer">
						<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
						quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
						consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
						cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
						proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>
					</div>
				</aside>
			</article>
		</div>
		<div class="col-md-6">
			<div class="container-fluid"> <br/>
				<p class="alert alert-<?php
					if (isset($_GET['credentialsReject'])) {
							echo $_SESSION['classTypeError'] ;
							session_unset();
							session_destroy();
						}
					if (isset($_GET['userdetailsaccepted'])) {
							echo $_SESSION['classTypeAccept'] ;
							session_unset();
							session_destroy();
						}	
					if (isset($_GET['passResetAccept'])) {
							echo $_SESSION['classTypeAccept'] ;
							session_unset();
							session_destroy();
						}	
					if (isset($_GET['logIn'])) {
							echo $_SESSION['classTypeError'] ;
							session_unset();
							session_destroy();
						}
					if (isset($_GET['adS'])) {
							echo $_SESSION['classTypeAccept'] ;
							session_unset();
							session_destroy();
						}
					if (isset($_GET['adF'])) {
							echo $_SESSION['classTypeError'] ;
							session_unset();
							session_destroy();
						}
					if (isset($_GET['none'])) {
							echo $_SESSION['classTypeError'] ;
							session_unset();
							session_destroy();
						}	
					if (isset($_GET['nonead'])) {
							echo $_SESSION['classTypeError'] ;
							session_unset();
							session_destroy();
						}							
				?> border border-0 w-75 mx-auto">
					<?php
						if ( isset($_GET['credentialsReject']) ) {
							if (isset($_SESSION['failCred'])) {
								echo $_SESSION['failCred'] ;
								session_unset() ;
								session_destory() ;
							} else {
								echo "Login failed. Check input credentials then try again.";
							}
						}
						if ( isset($_GET['userdetailsaccepted']) ) {
							if (isset($_SESSION['userAccept'])) {
								echo $_SESSION['userAccept'] ;
								session_unset() ;
								session_destory() ;
							} else {
								echo "Successful Registration. Proceed with log in.";
							}
						}
						if ( isset($_GET['passResetAccept']) ) {
							if (isset($_SESSION['passUpdateComplete'])) {
								echo $_SESSION['passUpdateComplete'] ;
								session_unset() ;
								session_destory() ;
							} else {
								echo "Password Reset Complete. The new credentials can now be used to login";
							}
						}
						if ( isset($_GET['logIn']) ) {
							if (isset($_SESSION['noactiveaccount'])) {
								echo $_SESSION['noactiveaccount'] ;
								session_unset() ;
								session_destory() ;
							} else {
								echo "No active account. Kindly log in.";
							}
						}
						if ( isset($_GET['adS']) ) {
							if (isset($_SESSION['adminRegAccept'])) {
								echo $_SESSION['adminRegAccept'] ;
								session_unset() ;
								session_destory() ;
							} else {
								echo "Admin Register Accept.";
							}
						}
						if ( isset($_GET['adF']) ) {
							if (isset($_SESSION['adminRegFail'])) {
								echo $_SESSION['adminRegFail'] ;
								session_unset() ;
								session_destory() ;
							} else {
								echo "Admin Register Declined.";
							}
						}		
						if ( isset($_GET['none']) ) {
							if (isset($_SESSION['adminDupRej'])) {
								echo $_SESSION['adminDupRej'] ;
								session_unset() ;
								session_destory() ;
							} else {
								echo "Similar admin details. Rejected";
							}
						}
						if ( isset($_GET['nonead']) ) {
							if (isset($_SESSION['adminNone'])) {
								echo $_SESSION['adminNone'] ;
								session_unset() ;
								session_destory() ;
							} else {
								echo "Details Rejected";
							}
						}					
					?>
				</p>
				<form class="form" method="post" action="login.php">
					<div class="form-group">
						<label for="userloginphone" class="control-label">Enter Phone Number</label>
						<input type="phone" name="userloginphone" id="userloginphone" class="form-control form-control-lg w-75 mx-auto" maxlength="10" minlength="10" value="<?php if(isset($_COOKIE["userloginphone"])) { echo $_COOKIE["userloginphone"]; } ?>">
						<span> <?php echo $userloginphoneErr; ?> </span>
					</div>
					<div class="form-group">
						<label for="userloginLastName" class="control-label">Enter Last Name</label>
						<input type="text" name="userloginLastName" id="userloginLastName" class="form-control form-control-lg w-75 mx-auto" value="<?php if(isset($_COOKIE["userloginLastName"])) { echo $_COOKIE["userloginLastName"]; } ?>">
					</div>
					<div class="form-group">
						<label for="userloginpassword" class="control-label">Enter Password</label>
						<input type="password" name="userloginpassword" id="userloginpassword" class="form-control form-control-lg w-75 mx-auto" value="<?php if(isset($_COOKIE["userloginpassword"])) { echo $_COOKIE["userloginpassword"]; } ?>">
						<span> <?php echo $userloginpasswordErr; ?> </span>
					</div> <br/>
					<div class="form-group">
						<div class="row" >
							<div class="col-sm" style="padding: 5px;">
								<p class="mx-auto w-50"><input type="checkbox" name="remember" class="" /> Remember me</p> 
							</div>
							<div class="col-sm " style="padding: 5px;">
								<input type="submit" name="loginSubmit" id="loginSubmit" class="btn w-50 justify-content btn-lg btn-outline-success text-center font-weight-bold" value="Log in">
							</div>
						</div>
					</div>
					<div class="form-group w-75 mx-auto text-center" id="passwordnewaccount">
						<p><a href="resetpassword.php" class="font-weight-bold">Reset Passsword</a> || <a href="loginregisterguests.php"  style="text-decoration:underline;">Register here</a></p>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


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