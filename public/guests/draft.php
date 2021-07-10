<!DOCTYPE html>
<html lang="en">
<head>
	<title>VRMS-aboutUs</title>
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
/*#heading2 { padding: 10px;}*/
/*.nav-link {}*/
.active { text-transform: uppercase; text-decoration: underline; font-weight: 600;}
/*li a { width: 100%; }*/

/*.carousel-inner img { width: 1100; height: 470; }*/
/*.carousel-inner { margin: 0 auto; width: 80%; }*/

#homeguestsmid { background-color: #cecece; }
/*.navbar { position: fixed; top: 0; right: 0; left: 0; }*/
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

#aboutVision { text-align:center; padding:20px; }


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
<!-- .navbar { position: fixed; top: 0; right: 0; left: 0; } -->

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
	        <li class="active"> <a href="aboutregistered.php" class="text-dark bg-light font-weight-bold">About Us</a> </li>
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
			 <li class="dropdown btn-outline-primary">
			 	<a href="#" class="text-dark dropdown-toggle" data-toggle="dropdown">Welcome, <?php echo $_COOKIE['userloginLastName']  ; ?></a>
			 	<div class="dropdown-menu">
			      <a class="dropdown-item h4 text-center" href="mybookingregistered.php">My Booking</a>
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

<style type="text/css">
	.grid-container { display: grid; grid-template-areas: 'about1 about1 about1 about1' 'about2 about3 about3 about3' 'about2 about3 about3 about3' 'about4 about4 about4 about4' ; grid-gap: 20px; }
	#about1 { grid-area: about1; padding: 20px; }
	#about2 { grid-area: about2; padding: 20px; }
	#about3 { grid-area: about3; padding: 20px; }
	#about4 { grid-area: about4; padding: 20px; }
</style>

<div class="grid-container w-75 mx-auto">
	<div id="about1" class="shadow p-4 mb-4 bg-white">
		<p class="text-center h1 font-weight-bold ">Our History</p>
		<br/>
		<p>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		</p>
	</div>
	<div id="about2" class="shadow-lg p-4 mb-4 bg-white">
		<p class="text-center h1 font-weight-bold">Our Motto</p><br/>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam. </p>
	</div>
	<div id="about3" class="shadow-lg p-4 mb-4 bg-white">
		<p class="text-center h1 font-weight-bold" >Our Vision</p><br/>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam. </p> <br/>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	</div>
	<div id="about4" class="shadow p-4 mb-4 bg-white">
		<img src="../../images/brands/mitsubishi.png" alt="" width="100px" height="75px" loading="lazy">
		<img src="../../images/brands/Jeep.png" alt="" width="100px" height="75px" loading="lazy">
		<img src="../../images/brands/mazda.png" alt="" width="100px" height="75px" loading="lazy">
		<img src="../../images/brands/nissan.png" alt="" width="100px" height="75px" loading="lazy">
		<img src="../../images/brands/mercedes.png" alt="" width="100px" height="75px" loading="lazy">
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