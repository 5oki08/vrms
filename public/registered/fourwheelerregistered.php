<?php 

session_start();
require '../../connection.php' ;

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
	<title>VRMS-fourWheeler</title>
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
.active { text-transform: uppercase; text-decoration: underline; font-weight: 600; border-radius: 15px 5px 15px 0px; }
li a { width: 100%; }
.carousel-inner img { width: 1100; height: 470; }
#asidehome { padding: 10px; height: 100%; }
.card-text { margin-top: 50px; }
.form { padding: 20px; }
.form form-control { padding: 15px; }

.footer { padding: 30px;  }
.footer-links { color: #000; font-size: 15px; }
.footer-links:hover { font-weight: 600; color: #000; }

/*#fourwheelercardimg { width: 100%; }*/
#fourwheelermoreinfo { width: 100%; }
#fourwheelnavigation { border-right: 2px solid #000; }

#fourwheeltitles { padding:10px; }
 

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
			 <li class="active"> <a href="fourwheelerregistered.php" class="text-dark bg-light font-weight-bold">Four Wheeler Vehicles</a> </li>
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

<div class="container-fluid">
	 
	<div class="col-md-2" id="fourwheelnavigation">
		<div class="container-fluid">
			<nav class="navbar navbar-nav"> 
				<li class="" id=""><a href="fourwheelerregistered.php" class="nav-link text-center text-dark active btn btn-lg border border-info" id="fourwheeltitles">Aston Martin</a></li>
				<li class="" id=""><a href="fourwheelMitsubishiregistered.php" class="nav-link text-center text-dark">Mitsubishi</a></li>
				<li class="" id=""><a href="fourwheelJeepregistered.php" class="nav-link text-center text-dark">Jeep</a></li>
			</nav>
		</div>
	</div> 

	<div class="col-md-8">
		
		<div class="card-deck"> 
			<?php
			$id = 0 ;
				$adminFetchRecords = "SELECT * FROM fourwheel WHERE brand='Aston Martin' " ;
				$adminFetchRecordsResult = mysqli_query($conn,$adminFetchRecords) ;

				if ($adminFetchRecordsResult->num_rows > 0) {
			   	 while($rowFetch = $adminFetchRecordsResult->fetch_assoc()) {
			   	 	$id++ ;
			   	 	
			?>
			<div class="card"> 
				<!-- <img src="../../images/adminFourwheel/evo6.jpg" id="fourwheelercardimg" class="card-img-top w-25"> php to insert image --> 
				<div class="card-body" style="height: 100%;">
					<p class="text-center">
						<p hidden> <?php echo $rowFetch['id'] ; ?> </p>
						<p class="text-center font-weight-bold h3"> <?php echo $rowFetch['FourwheelName'] ; ?> </p>
						<hr style="width: 50%;" />
					</p> <br/>
					  <?php switch($id): 
						case 1: ?>
						    <div> 
							    <img src="../../images/fourwheeler/<?=$rowFetch['carImage']?>" class="mx-auto" id="fourwheelermoreinfo" class="card-img-top">
							    <a href="fourwheelVantageregistered.php" class="btn btn-lg text-center btn-outline-primary text-dark font-weight-bold w-50 mx-auto" style="margin-top:10px;">More Info</a>
						    </div> 
						<?php break; ?>
						<?php case 2: ?>
						    <div>
							    <img src="../../images/fourwheeler/<?=$rowFetch['carImage']?>" class="mx-auto" id="fourwheelermoreinfo" class="card-img-top">
							    <a href="fourwheelDB5registered.php" class="btn btn-lg text-center btn-outline-primary text-dark font-weight-bold w-50 mx-auto"  style="margin-top:10px;">More Info</a>
						    </div> 
						<?php break; ?>
						<?php case 3: ?>
						    <div>
							    <img src="../../images/fourwheeler/<?=$rowFetch['carImage']?>" class="mx-auto" id="fourwheelermoreinfo" class="card-img-top">
							    <a href="fourwheelDBxregistered.php" class="btn btn-lg text-center btn-outline-primary text-dark font-weight-bold w-50"  style="margin-top:10px;">More Info</a> 
						    </div> 
						<?php break; ?>
						<?php endswitch; ?>
				</div> 
			</div>
			<?php  }
			} ?>
		</div> 

	</div>

	<div class="col-md-2"></div>

</div>



<br/><br/><br/>

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