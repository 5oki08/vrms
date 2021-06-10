<!DOCTYPE html>
<html lang="en">
<head>
	<title>VRMS-twoWheeler</title>
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

li { list-style-type: none; }
#twowheelnavigation { border-right: 2px solid #000; padding: 20px; }
#twowheelercardimg { width: 100%; }
#twowheelermoreinfo { width: 50%; padding: 10px; margin-left: 25%; }




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
	        <li> <a href="homeguests.php" class="text-dark">Home</a> </li>
	        <li> <a href="aboutguests.php" class="text-dark">About Us</a> </li>
	        <li class="active"> <a href="twowheeler.php" class="text-dark bg-light font-weight-bold">Two Wheeler Vehicles</a> </li>
	        <li class="dropdown">
			 	<a href="fourwheeler.php" class="text-dark dropdown-toggle" data-toggle="dropdown">Four Wheeler Vehicles</a>
			 	<div class="dropdown-menu">
			      <a class="dropdown-item h4 text-center" href="fourwheeler.php">Aston Martin</a>
			      <a class="dropdown-item h4 text-center" href="fourwheelMitsubishi.php">Mitsubishi</a>
			      <a class="dropdown-item h4 text-center" href="fourwheelJeep.php">Jeep</a>
			    </div>
			 </li>
	      </ul>
	      <ul class="nav navbar-nav navbar-right navbar-expand-md">
	        <img src="../../images/vrmslogo.png" alt="Logo" width="80" height="80">
	      </ul>
	    </div>
	  </div>
	</nav>

</header>


<br/>

<div class="container-fluid">
	
	<div class="col-md-2" id="twowheelnavigation">
		<div class="container-fluid">
			<nav class="navbar navbar-nav">
				<li class="" id=""><a href="twowheeler.php" class="nav-link text-center text-dark" id="">Ducatti</a></li>
				<li class="" id=""><a href="twowheelS.php" class="nav-link text-center text-dark">Suzuki</a></li>
				<li class="" id=""><a href="twowheelYamaha.php" class="nav-link text-center text-dark active">Yamaha</a></li>
			</nav>
		</div>
	</div>

	<div class="col-md-8">
		<div class="card-deck">		

			<div class="card">
				<img src="../../images/twowheeler/yamahaMT-09.png" id="twowheelercardimg" class="card-img-top">
				<div class="card-body" style="height: 100%;">
					<p class="text-center">
						<p class="text-center font-weight-bold h3">MT-09</p>
						<hr style="width: 50%;" />
						<p>Weighing in at only 417 pounds, the 2021 MT-09's new engine, chassis and bodywork extensively incorporate weight-reducing technologies, to weigh in 8 pounds lighter than the former MT-09.</p>
					</p> <br/>
					<a href="twowheelyamahaMT-09.php" class="btn btn-lg text-center btn-outline-primary text-dark font-weight-bold" id="twowheelermoreinfo">More Info</a>
				</div>
			</div>

			<br/>

			<div class="card">
				<img src="../../images/twowheeler/yamahaYZF-R1a.png" id="twowheelercardimg" class="card-img-top">
				<div class="card-body" style="height: 100%;">
					<p class="text-center">
						<p class="text-center font-weight-bold h3">YZF-R1</p>
						<hr style="width: 50%;" />
						<p>The R1® features a cable-less ride-by-wire Yamaha Chip Controlled Throttle (YCC-T®) system that transforms the rider’s inputs into motion, with a full suite of IMU-powered electronic rider aids that bring new meaning to the term "rider confidence."</p>
					</p> <br/>
					<a href="twowheelyamahaYZF-R1a.php" class="btn btn-lg text-center btn-outline-primary text-dark font-weight-bold" id="twowheelermoreinfo">More Info</a>
				</div>
			</div>

		</div>
	</div>	

	<div class="col-md-2"></div>
</div>

<br/>

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