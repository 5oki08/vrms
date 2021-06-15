<?php 

require '../../connection.php';
session_start();


if ( isset($_POST['activeuser']) ) {
	if ( empty($_POST['activeuser']) ) {
		$_SESSION['noactiveaccount'] ;
		$_SESSION['classTypeError'] ;
		header('location: ../guests/homeguests.php?logIn') ;
	} else {
		$_POST['activeuser'] ;
	}
}
 

$_SESSION['hireQueried'] = "Hire Details Submitted. Kindly wait for approval." ;
$_SESSION['classTypeAccept'] = "success" ;
$_SESSION['hireDenied'] = "Hire Details Submission Failed." ;
$_SESSION['classTypeError'] = "danger" ;

$snameregistered = $selectedDrivetwoWheel = $numberOfdaysHired = $paymentMode = $mpesaCodeInput = '' ;
$snameregisteredErr = $selectedDrivetwoWheelErr = $numberOfdaysHiredErr = $paymentModeErr = $mpesaCodeInputErr = '' ;


if ( isset($_POST['hireSubmitdetails']) ) {

	if (empty($_POST['snameregistered'])) {
		$snameregisteredErr = "Last Name does not match" ;
	} else {
		$snameregistered = $_POST['snameregistered'] ;
	}
	if (empty($_POST['selectedDrivetwoWheel'])) {
		$selectedDrivetwoWheelErr = "no selected wheels" ;
	} else {
		$selectedDrivetwoWheel = $_POST['selectedDrivetwoWheel'] ;
	}
	if (empty($_POST['numberOfdaysHired'])) {
		$numberOfdaysHiredErr = "Input number of days to hire" ;
	} else {
		$numberOfdaysHired = $_POST['numberOfdaysHired'] ;
	}
	if (empty($_POST['paymentMode'])) {
		$paymentModeErr = "Select payment mode" ;
	} else {
		$paymentMode = $_POST['paymentMode'] ;
	}
 

	$hireSql = " SELECT * FROM selecteddrive WHERE snameregistered='$snameregistered' && selectedDrivetwoWheel='$selectedDrivetwoWheel' && numberOfdaysHired='$numberOfdaysHired' && paymentMode='$paymentMode' " ;
	$hireSqlresult = mysqli_query($conn,$hireSql) ;
	$hireSqlNum = mysqli_num_rows($hireSqlresult) ;

	if ( $hireSqlNum<=0 ) {
		
		if ( empty($snameregisteredErr) && empty($selectedDrivetwoWheelErr) && empty($numberOfdaysHiredErr) && empty($paymentModeErr) ) {
			$hireStmt = $conn->prepare(" INSERT INTO selecteddrive (snameregistered,selectedDrivetwoWheel,numberOfdaysHired,paymentMode) VALUES(?,?,?,?) ") ;
			$hireStmt->bind_param('ssss',$snameregistered,$selectedDrivetwoWheel,$numberOfdaysHired,$paymentMode) ;

			if ($hireStmt->execute() === TRUE ) {
				$_SESSION['hireQueried'] ;
				$_SESSION['activeuser'] ;
				$_SESSION['classTypeAccept'] ;
				header('location: twowheelyamahaYZF-R1aregistered.php?hireSubmitTrue') ;
			} else {
				$_SESSION['hireDenied'] ;
				$_SESSION['activeuser'] ;
				$_SESSION['classTypeError'] ;
				header('location: twowheelyamahaYZF-R1aregistered.php?hireSubmittedFail') ;
			}
		} else {
				$_SESSION['hireDenied'] ;
				$_SESSION['activeuser'] ;
				$_SESSION['classTypeError'] ;
				header('location: twowheelyamahaYZF-R1aregistered.php?hireSubmittedFail') ;
			}

	} 


}


?>

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

 
.footer { padding: 30px;  width: 80%; justify-content: center; margin: 0 auto; }
.footer-links { color: #000; font-size: 15px; }
.footer-links:hover { font-weight: 600; color: #000; }


#twowheelnavigation { border-right: 2px solid #000; padding: 20px; }
#twowheelercardimg { width: 100%; }
#twowheelermoreinfo { width: 50%; padding: 10px; margin-left: 25%; } 

#detailedTwowheelerimg { width:350px; height:260px;	}

.alert { height: 50px;  width: 50%; margin: 0 auto; }  

#hirebtnlinkguests { padding: 10px; width: 20%; }
#hirebtnlinkguests:hover { color: #000; background-color: #fff; font-weight: 600; }


@media only screen and (max-width: 600px) {
  
.heading1subj { display: block; margin-top: 3px; margin-bottom: 3px; }
.navbar-toggle { float: right; }

.carousel-inner img { width: 400; height: 270; }
.carousel-inner { margin: 0 auto; width: 100%; }

#footerSec1 { margin-bottom: 30px; }
#footerSec2 { margin-bottom: 30px; }
#footerSec3 {} 

.alert { height: 70px;  width: 50%; margin: 0 auto; } 

#hirebtnlinkguests { padding: 10px; width: 50%; }
#hirebtnlinkguests:hover { color: #000; background-color: #fff; font-weight: 600; } 


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
	        <li> <a href="homeregistered.php" class="text-dark">Home</a> </li>
	        <li> <a href="aboutregistered.php" class="text-dark">About Us</a> </li>
			 <li class="active"> <a href="twowheelerregistered.php" class="text-dark bg-light font-weight-bold">Two Wheeler Vehicles</a> </li>
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

<div class="container-fluid">

	<p class="alert alert-<?php
			if ( isset($_GET['hireSubmitTrue']) ) {
						echo $_SESSION['classTypeAccept'] ;
						session_unset() ;
						session_destroy() ;
					}
			if ( isset($_GET['hireSubmittedFail']) ) {
						echo $_SESSION['classTypeError'] ;
						session_unset() ;
						session_destroy() ;
					}		
		?> text-center " >
			<?php
				if ( isset($_GET['hireSubmitTrue']) ) {
					if ( isset($_SESSION['hireQueried']) ) {
						echo $_SESSION['hireQueried'] ;
						session_unset() ;
						session_destroy() ;
					} else { echo "Hire Details Submitted. Kindly wait for approval."; }
				}	
				if ( isset($_GET['hireSubmittedFail']) ) {
					if ( isset($_SESSION['hireDenied']) ) {
						echo $_SESSION['hireDenied'] ;
						session_unset() ;
						session_destroy() ;
					} else { echo "Hire Details Submission Failed."; }
				}
			?>
		</p> <br/>
	
	<div class="row">
		<div class="col-md-1"></div>

		<div class="col-md-4">
			<div class="container-fluid">
				<div class="" style="max-width:500px">
				  <img class="yamahatwowheeler" src="../../images/twowheeler/yamahaYZF-R1a.png" id="detailedTwowheelerimg">
				  <img class="yamahatwowheeler" src="../../images/twowheeler/yamahaYZF-R1b.jpg" id="detailedTwowheelerimg">
				  <img class="yamahatwowheeler" src="../../images/twowheeler/yamahaYZF-R1c.jpg" id="detailedTwowheelerimg">
				</div>
<script>
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("yamahatwowheeler");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 2000); // Change image every 2 seconds
}
</script>
			</div>
		</div>

		

		<div class="col-md-6">
			<kbd class="h2 text-light" style="padding: 10px; border-radius: 5px;">Yamaha YZF-R1</kbd><br/><br/>
			<p>The 998cc inline-four-cylinder engine features Yamaha’s exclusive crossplane crankshaft technology derived from the YZR-M1 MotoGP® machine. Every aspect of this unique engine is built to thrill.</p> <br/>
			<p>The R1® features a cable-less ride-by-wire Yamaha Chip Controlled Throttle (YCC-T®) system that transforms the rider’s inputs into motion, with a full suite of IMU-powered electronic rider aids that bring new meaning to the term "rider confidence."</p> <br/>
			<p>The YZF-R1® utilizes track-focused braking hardware, featuring potent 4-piston radial-mounted front calipers, stainless steel front lines, big 320mm rotors with high-friction pads and a compact ABS unit. The Bridgestone® RS11 tires ensure true racetrack-ready traction with balanced road feel and handling.</p> <br/>
			<p>The R1’s 998cc inline-four-cylinder engine features Yamaha’s exclusive crossplane crankshaft technology derived from the YZR-M1 MotoGP® machine. By equalizing inertial forces at the crankshaft, the CP4 motor delivers a direct feeling of linear torque, giving the rider the ultimate connection between throttle grip and the rear wheel.</p> <br/>
			<p>Developed on racetracks around the world, Yamaha’s Brake Control system works with an Antilock Braking System (ABS) to minimize brake slip under aggressive braking or on less than ideal surfaces. The adjustable BC system uses the IMU to provide progressive brake force intervention as lean angle increases which boosts rider confidence when braking mid-corner.</p> <br/>
		</div>
	</div>
	<br/>
	
	<div class="row">
		<div class="col"></div>
		<div class="col">
			<div class="container-fluid">
				  <button type="button" class="btn btn-lg btn-primary" data-toggle="modal" data-target="#hirebuttonregistered" id="hirebtnlinkguests">
				    Hire
				  </button>
				  <div class="modal" id="hirebuttonregistered">
				    <div class="modal-dialog">
				      <div class="modal-content">

				        <div class="modal-header">
				        	<h5>Hire Form</h5>
				          	<button type="button" class="close" data-dismiss="modal">&times;</button>
				        </div>

				        <div class="modal-body">
				          
				        	<form class="form" action="twowheelyamahaYZF-R1aregistered.php" method="post">
				        		<div class="form-group">
									<label for="snameregistered">Second Name</label>
									<input type="text" name="snameregistered" class="form-control form-control-lg" id="snameregistered">
								</div>

				        		<div class="form-group">
				        			<label for="selectedDrivetwoWheel">Selected Drive</label>
				        			<select name="selectedDrivetwoWheel" id="selectedDrivetwoWheel" class="form-control form-control-lg">
				        				<option></option>
				        				<option value="yamahaYZF-R1">Yamaha YZF-R1</option>
				        			</select>
				        			<span style="color:red;"> <?php echo $selectedDrivetwoWheelErr ; ?> </span>
				        		</div>

				        		<div class="form-group">
				        			<label for="numberOfdaysHired">Number of Days For Hire</label>
				        			<input type="number" name="numberOfdaysHired" id="numberOfdaysHired" class="form-control form-control-lg">
				        			<span style="color:red;"> <?php echo $numberOfdaysHiredErr ; ?> </span>
				        		</div>

				        		<div class="form-group">
				        			<label for="paymentMode">Mode of Payment</label>
				        			<select name="paymentMode" id="paymentMode" class="form-control form-control-lg" onchange="onchangeStatus()">
					        			<option></option>
					        			<option value="visa">VISA</option>
					        			<option value="mpesa">M-PESA</option>
					        			<br/>
<script type="text/javascript">
	function onchangeStatus() {
		var status = document.getElementById('paymentMode') ;
		if ( status.value == "mpesa" ) {
			document.getElementById('mpesaCodeInput').style.visibility = "visible" ;
		} else {
			document.getElementById('mpesaCodeInput').style.visibility = "hidden" ;
		}
	}
</script>
				        			</select>
				        			<span style="color:red;"> <?php echo $numberOfdaysHiredErr ; ?> </span>
				        			<br/>
					        		<input type="text" name="mpesaCodeInput" id="mpesaCodeInput" class="form-control form-control-lg" placeholder="Enter MPesa Code for verification">
				        		</div>

				        		<div class="row">
						          	<div class="col">
						          		<input type="submit" name="hireSubmitdetails" class="form-control form-control-lg btn btn-lg btn-outline-success" id="hireSubmitdetails" value="Submit Hire Details">
						          	</div>
						          	<div class="col">
						          		<button type="button" class="" data-dismiss="modal" style="border:none;">
						          			<input type="reset" name="reset" class="form-control form-control-lg btn btn-lg btn-outline-danger" id="reset" value="Close">
						          		</button>
						          	</div>
						        </div>  	

				        	</form>
							
				        </div>

				        <div class="modal-footer"></div>

				      </div>
				    </div>
				  </div>
				  
				</div>
			</div>
		</div>
		<div class="col"></div>
	</div>


</div>



<br/><br/><br/>

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