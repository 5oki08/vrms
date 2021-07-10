<?php
require '../../connection.php' ;
session_start() ;



$_SESSION['hireQueried'] = "Hire Details Submitted. Kindly wait for approval." ;
$_SESSION['classTypeAccept'] = "success" ;
$_SESSION['hireDenied'] = "Hire Details Submission Failed." ;
$_SESSION['classTypeError'] = "danger" ;

$snameregistered = $selectedDriveWheel = $numberOfdaysHired = $paymentMode = $mpesaCodeInput = $visaCodeInput =  '' ;
$snameregisteredErr = $selectedDriveWheelErr = $numberOfdaysHiredErr = $paymentModeErr = $mpesaCodeInputErr  = $visaCodeInputErr =  '' ; 


if ( isset($_POST['hireSubmitdetails']) ) {

	if (empty($_POST['selectedDriveWheel'])) {
		$selectedDriveWheelErr = "no selected wheels" ;
	} else {
		$selectedDriveWheel = $_POST['selectedDriveWheel'] ;
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
	if (empty($_POST['adminDecision'])) {
		$adminDecisionErr = "wait" ;
	} else {
		$adminDecision = $_POST['adminDecision'] ;
	}
	if (empty($_POST['mpesaCodeInput'])) {
		$mpesaCodeInputErr = "input  Payment Code" ;
	} else {
		$mpesaCodeInput = $_POST['mpesaCodeInput'] ;
	}
	// if (empty($_POST['visaCodeInput'])) {
	// 	$visaCodeInput = "input  Payment Code" ;
	// } else {
	// 	$visaCodeInput = $_POST['visaCodeInput'] ;
	// } 
 

	$hireSql = " SELECT * FROM selecteddrive WHERE snameregistered='{$_COOKIE['userloginLastName']}' && selectedDriveWheel='$selectedDriveWheel' && numberOfdaysHired='$numberOfdaysHired' && paymentMode='$paymentMode' && PAYCodeInput='$mpesaCodeInput' " ;
	$hireSqlresult = mysqli_query($conn,$hireSql) ;
	$hireSqlNum = mysqli_num_rows($hireSqlresult) ; 

	if ( $hireSqlNum>=0 ) {    
		
		if ( empty($snameregisteredErr) && empty($selectedDriveWheelErr) && empty($numberOfdaysHiredErr) && empty($paymentModeErr) && empty($mpesaCodeInputErr)   ) {
			$hireStmt = $conn->prepare(" INSERT INTO selecteddrive (snameregistered,selectedDriveWheel,numberOfdaysHired,paymentMode,PAYCodeInput,status) VALUES('{$_COOKIE['userloginLastName']}',?,?,?,?,'WaitingApproval') ") ;  
			$hireStmt->bind_param('ssss',$selectedDriveWheel,$numberOfdaysHired,$paymentMode,$mpesaCodeInput) ;

			if ($hireStmt->execute() === TRUE ) { 
				$_SESSION['hireQueried'] ;
				$_SESSION['classTypeAccept'] ;
				header('location: fourwheelDB5registered.php?hireSubmitTrue') ;
			} else {
				$_SESSION['hireDenied'] ;
				$_SESSION['classTypeError'] ;
				header('location: fourwheelDB5registered.php?hireSubmittedFail') ;
			}
		} else {
				$_SESSION['hireDenied'] ;
				$_SESSION['classTypeError'] ;
				header('location: fourwheelDB5registered.php?hireSubmittedFail') ; 
			}

	} 


}
 




?>





<!DOCTYPE html>
<html lang="en">
<head>
	<title>vrms-FourWheelerUser</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 


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
.footer { padding: 30px;  }
.footer-links { color: #000; font-size: 15px; }
.footer-links:hover { font-weight: 600; color: #000; }


.d-sm-table-cell { padding-left: 10px; padding-right: 10px; }

#fourwheelermoreinfo { width: 100%; }

@media only screen and (max-width: 600px) { 


.heading1subj { display: block; margin-top: 3px; margin-bottom: 3px; }
.navbar-toggle { float: right; }
.carousel-inner img { width: 400; height: 270; }
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
		?> text-center w-50 mx-auto " >
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
			<?php
			 // $id = 1 ;
			 	$fetchCarRecords = " SELECT * FROM fourwheel WHERE FourwheelName='DB5' " ; 
			 	$fetchCarRecordsResult = mysqli_query($conn,$fetchCarRecords) ;

			 	if ($fetchCarRecordsResult->num_rows > 0) {
				   	 while($rowFetch = $fetchCarRecordsResult->fetch_assoc()) {
			 ?>
			 <p hidden> <?php echo $rowFetch['id'] ; ?> </p>   
			 <img src="../../images/fourwheeler/<?=$rowFetch['carImage']?>" class="mx-auto" id="fourwheelermoreinfo" class="card-img-top">
			<kbd class="h2 text-light" style="padding: 10px; border-radius: 5px;"> <?php echo $rowFetch['brand'] ;?> <?php echo $rowFetch['FourwheelName'] ;?> </kbd><br/><br/>
		</div>
			 
			<br/>

			
			<div class="col-md-6">
			 
			<form class="form" action="#" method="post">  
				 
				
				 <div class="form-group">
						<div class="row">
							<div class="col-md">
								<label for="brand">Brand </label>
								<input type="text" name="brand" id="brand" class="form-control form-control-lg" value="<?php echo $rowFetch['brand'] ; ?>" disabled >
							</div>
							<div class="col-md">
								<label for="carName">Car Name</label>
								<input type="text" name="carName" id="carName" class="form-control form-control-lg" value="<?php echo $rowFetch['FourwheelName'] ; ?>"disabled> 
							</div>
						</div>
					</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md">
							<label for="modelcolor">Color</label>
							<input type="text" name="modelcolor" id="modelcolor" class="form-control form-control-lg" value="<?php echo $rowFetch['modelColor'] ; ?>" disabled="">
						</div>
						<div class="col-md">
							<label for="modelYear">Model Year</label>
							<input type="text" name="modelYear" id="modelYear" class="form-control form-control-lg" value="<?php echo $rowFetch['modelyear'] ; ?>" disabled="">
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="row">
						<div class="col-md">
							<label for="modelFuelType">Engine Capacity</label>
							<input type="text" name="modelFuelType" id="modelFuelType" class="form-control form-control-lg" value="<?php echo $rowFetch['enginecapacity'] ; ?>" disabled=""> 
						</div>
						<div class="col-md">
							<label for="modelSittingCapacity">Sitting Capacity</label>
							<input type="number" name="modelSittingCapacity" id="modelSittingCapacity" class="form-control form-control-lg" value="<?php echo $rowFetch['sittingcapacity'] ; ?>" disabled="">
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="row">
						<div class="col-md">
							<label for="modelEngineCylinders">Engine Cylinders</label>
							<input type="number" name="modelEngineCylinders" id="modelEngineCylinders" class="form-control form-control-lg" value="<?php echo $rowFetch['enginecylinders'] ; ?>" disabled="">
						</div>
						<div class="col-md">
							<label for="modelSteering">Steering Side</label>
							<input type="text" name="modelSteering" id="modelSteering" class="form-control form-control-lg" value="<?php echo $rowFetch['steeringside'] ; ?>" disabled="">
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="row">
						<div class="col-md">
							<label for="modelDriveModes">Drive Modes</label>
							<input type="number" name="modelDriveModes" id="modelDriveModes" class="form-control form-control-lg" value="<?php echo $rowFetch['drivemodes'] ; ?>" disabled="">
						</div>
						<div class="col-md">
							<label for="modelTransmission">Transmission</label>
							<input type="text" name="modelTransmission" id="modelTransmission" class="form-control form-control-lg" value="<?php echo $rowFetch['transmission'] ; ?>" disabled="">
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="row">
						<div class="col-md">
							<label for="modelGearbox">Gearbox</label>
							<input type="text" name="modelGearbox" id="modelGearbox" class="form-control form-control-lg" value="<?php echo $rowFetch['gearbox'] ; ?>" disabled="">
						</div>
						<div class="col-md">
							<label for="modelWheelDrive">Wheel Drive</label>
							<input type="text" name="modelWheelDrive" id="modelWheelDrive" class="form-control form-control-lg" value="<?php echo $rowFetch['wheeldrive'] ; ?>" disabled="">
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="row">
						<div class="col-md">
							<label for="modelPowerSteering">Power Steering</label>
							<input type="text" name="modelPowerSteering" id="modelPowerSteering" class="form-control form-control-lg" value="<?php echo $rowFetch['powersteering'] ; ?>" disabled="">
						</div>
						<div class="col-md">
							<label for="modelSpareWheel">Spare Wheel</label>
							<input type="text" name="modelSpareWheel" id="modelSpareWheel" class="form-control form-control-lg" value="<?php echo $rowFetch['sparewheel'] ; ?>" disabled="">
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="row">
						<div class="col-md">
							<label for="modelHorsepower">Horsepower</label>
							<input type="number" name="modelHorsepower" id="modelHorsepower" class="form-control form-control-lg" value="<?php echo $rowFetch['horsepower'] ; ?>" disabled="">
						</div>
						<div class="col-md">
							<label for="modelHybrid">Hybrid</label>
							<input type="text" name="modelHybrid" id="modelHybrid" class="form-control form-control-lg" value="<?php echo $rowFetch['hybrid'] ; ?>" disabled="">
						</div>
					</div>
				</div>
				<br/>
				<div class="form-group">
					<label for="modelPrice">Price per day (KES) </label>
					<input type="number" name="modelPrice" id="modelPrice" class="form-control form-control-lg" value="<?php echo $rowFetch['priceperday'] ; ?>" disabled="">
				</div>
				<?php  }
					} ?>
			</form>
			<button type="button" class="btn btn-lg btn-primary" data-toggle="modal" data-target="#hirebuttonregistered" id="hirebtnlinkguests">
					    Hire
					  </button>
		</div>

			
		</div>
		<!-- <div class="col-md-2"></div> -->

		<div class="row">
			<div class="col"></div>
			<div class="col">
				<div class="container-fluid">
					  
					  <div class="modal" id="hirebuttonregistered">
					    <div class="modal-dialog">
					      <div class="modal-content">

					        <div class="modal-header">
					        	<h5>Hire Form</h5>
					          	<button type="button" class="close" data-dismiss="modal">&times;</button>
					        </div>

					        <div class="modal-body">
					          
					        	<form class="form" action="fourwheelDB5registered.php" method="post">
					        		<!-- <div class="form-group">
										<label for="snameregistered">Second Name</label>
										<input type="text" name="snameregistered" class="form-control form-control-lg" id="snameregistered" value="{$_SESSION['activeuser']}" disabled>
									</div> -->

					        		<div class="form-group" >
					        			<label for="selectedDriveWheel">Selected Drive</label>
					        			<select name="selectedDriveWheel" id="selectedDriveWheel" class="form-control form-control-lg"  >
					        				<!-- <option ></option> -->
					        				<option value="astonMartinDB5">Aston Martin DB5</option>
					        			</select>
					        			<span style="color:red;"> <?php echo $selectedDriveWheelErr ; ?> </span>
					        		</div>

					        		<div class="form-group">
					        			<label for="numberOfdaysHired">Number of Days For Hire</label>
					        			<input type="number" name="numberOfdaysHired" id="numberOfdaysHired" class="form-control form-control-lg">
					        			<span style="color:red;"> <?php echo $numberOfdaysHiredErr ; ?> </span>
					        		</div>

					        		<div class="form-group">
					        			<label for="paymentMode">Mode of Payment</label>
					        			<select name="paymentMode" id="paymentMode" class="form-control form-control-lg" onchange="onchangeStatus()">
						        			<option value=" "> </option>
						        			<!-- <option value="visa">VISA</option> -->
						        			<option value="mpesa">M-PESA</option>
						        			<br/>
	<!-- <script type="text/javascript">
		function onchangeStatus() {
			var status = document.getElementById('paymentMode') ;
			if ( status.value == "mpesa" ) {
				document.getElementById('mpesaCodeInput').style.visibility = "visible" ;
				document.getElementById('visaCodeInput').style.visibility = "hidden" ;
			} else {
				document.getElementById('mpesaCodeInput').style.visibility = "hidden" ;
				document.getElementById('visaCodeInput').style.visibility = "visible" ; 
			} 
		}
	</script>
 -->					        			</select>
					        			<span style="color:red;"> <?php echo $numberOfdaysHiredErr ; ?> </span>
					        			<br/>
						        		<input type="text" name="mpesaCodeInput" id="mpesaCodeInput" class="form-control form-control-lg" placeholder="Enter MPesa Code for verification">
						        		<!-- <input type="text" name="visaCodeInput" id="visaCodeInput" class="form-control form-control-lg" placeholder="Enter Payment Code for verification" disabled=""> -->
					        		</div> 

					        		<div class="row">
							          	<div class="col">
							          		<input type="submit" name="hireSubmitdetails" class="form-control form-control-lg btn btn-lg btn-outline-success" id="hireSubmitdetails" value="Submit Hire Details">
							          	</div>
							          	<div class="col">
							          		<button type="button" class="border border-0" data-dismiss="modal" >
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
</div>


  
 
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