<?php 

require '../../connection.php' ;
require '../guests/login.php' ;

$_SESSION['noactiveaccount'] = "No active account. Kindly log in.";
$_SESSION['classTypeError'] = "danger" ;

if ( isset($_POST['activeuser']) ) {
	if ( empty($_POST['activeuser']) ) {
		$_SESSION['noactiveaccount'] ;
		$_SESSION['classTypeError'] ;
		header('location: ../guests/homeguests.php?logIn') ;
	} else {
		$_POST['activeuser'] ;
	}
}
	


?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>VRMS-Home</title>
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
	
	#registerednav {
		background-color: #efa12b;
	}


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

 
.footer { padding: 30px;  width: 80%; justify-content: center; margin: 0 auto; }
.footer-links { color: #000; font-size: 15px; }
.footer-links:hover { font-weight: 600; color: #000; }


.grid-container { display: grid; grid-template-areas: 'head head head head' 'neck neck thorax thorax' 'neck neck thorax thorax' 'abdomen abdomen abdomen abdomen' ; margin-left: 20px; margin-right: 20px; grid-gap: 10px; }
.homereg1 { grid-area: head; grid-gap: 10px; padding: 30px; }
.homereg2 { grid-area: neck; grid-gap: 10px; padding: 30px; }
.homereg3 { grid-area: thorax; grid-gap: 10px; padding: 30px; }
.homereg4 { grid-area: abdomen; grid-gap: 10px; padding: 30px; }


.homereg1:hover { background-color: #D2691E; color: #fff; } 
.homereg2:hover { background-color: #9ACD32; color: #fff; }
.homereg3:hover { background-color: #F4A460; color: #fff; }
.homereg4:hover { background-color: #DC143C; color: #fff; }



@media only screen and (max-width: 600px) {
  
.heading1subj { display: block; margin-top: 3px; margin-bottom: 3px; }
.navbar-toggle { float: right; }

.carousel-inner img { width: 400; height: 270; }
.carousel-inner { margin: 0 auto; width: 100%; }

#footerSec1 { margin-bottom: 30px; }
#footerSec2 { margin-bottom: 30px; }
#footerSec3 {}




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
	        <li class="active"> <a href="homeregistered.php" class="text-dark bg-light font-weight-bold">Home</a> </li>
	        <li> <a href="aboutregistered.php" class="text-dark">About Us</a> </li>
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
			 <li> <a href="mybookingregistered.php" class="text-dark">My Booking</a> </li>
			 <li> <a href="myaccountregistered.php" class="text-dark"> My Account</a> </li>
			 <li> <a href="logoutregistered.php" class="text-dark">Log Out</a> </li>
	      </ul>
	    </div>
	  </div>
	</nav>

</header>

<br/>

<div>
<section class="jumbotron">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<h4>Vehicle Rental Management System</h4><br/>
			<img src="../../images/vrmslogo.png">
			<aside class="aside">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			</aside>
		</div>
		<div class="col-md-2"></div>
	</div>	
</section>
</div>

<br/> <br/>


<section class="grid-container">
	
	<div class="homereg1 border border-warning">
		<p class="card-text text-center">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
				cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
				proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	</div>
	<div class="homereg2 border border-warning">
		<p class="card-text text-center">The amber droplet hung from the branch, reaching fullness and ready to drop. It waited. While many of the other droplets were satisfied to form as big as they could and release, this droplet had other plans. It wanted to be part of history. It wanted to be remembered long after all the other droplets had dissolved into history. So it waited for the perfect specimen to fly by to trap and capture that it hoped would eventually be discovered hundreds of years in the future.</p>
	</div>
	<div class="homereg3 border border-warning">
		<p class="card-text text-center">"Are you getting my texts???" she texted to him. He glanced at it and chuckled under his breath. Of course he was getting them, but if he wasn't getting them, how would he ever be able to answer? He put the phone down and continued on his project. He was ignoring her texts and he planned to continue to do so.</p>
		<p>As she sat watching the world go by, something caught her eye. It wasn't so much its color or shape, but the way it was moving. She squinted to see if she could better understand what it was and where it was going, but it didn't help. As she continued to stare into the distance, she didn't understand why this uneasiness was building inside her body. She felt like she should get up and run. If only she could make out what it was. At that moment, she comprehended what it was and where it was heading, and she knew her life would never be the same.</p>
	</div>
	<div class="homereg4 border border-warning">
		<p class="card-text text-center">He heard the loud impact before he ever saw the result. It had been so loud that it had actually made him jump back in his seat. As soon as he recovered from the surprise, he saw the crack in the windshield. It seemed to be an analogy of the current condition of his life. Here's the thing. She doesn't have anything to prove, but she is going to anyway. That's just her character. She knows she doesn't have to, but she still will just to show you that she can. Doubt her more and she'll prove she can again. We all already know this and you will too.</p>
	</div>

</section>


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