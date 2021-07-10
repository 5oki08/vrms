<?php

require '../../connection.php' ;
session_start() ;

$_SESSION['carDup'] = "Car Already Registered" ;
$_SESSION['carAdd'] = "Car Registration Accepeted" ;
$_SESSION['carRej'] = "Car Registration Denied" ;
$_SESSION['classTypeAccept'] = "success" ;
$_SESSION['classTypeError'] = "danger" ;



$brand = $carName = $modelcolor = $modelYear = $enginecapacity = $modelSittingCapacity = $modelEngineCylinders = $modelSteering = $modelDriveModes = $modelTransmission = $modelGearbox = $modelWheelDrive = $modelPowerSteering = $modelSpareWheel = $modelHorsepower = $modelHybrid = $modelPrice = '' ;
$uploadImage1 = '' ;

$brandErr = $carNameErr = $modelcolorErr = $modelYearErr = $enginecapacityErr = $modelSittingCapacityErr = $modelEngineCylindersErr = $modelSteeringErr = $modelDriveModesErr = $modelTransmissionErr = $modelGearboxErr = $modelWheelDriveErr = $modelPowerSteeringErr = $modelSpareWheelErr = $modelHorsepowerErr = $modelHybridErr = $modelPriceErr = '' ;
$uploadImage1Err = '' ;
 

if ( isset($_POST['adminRegCar']) ) {

	if ( empty($_POST['brand']) ) {
		$brandErr = 'input Brand name' ;
	} else {
		$brand = $_POST['brand'] ;
	}
	if ( empty($_POST['carName']) ) {
		$carNameErr = 'input car name' ;
	} else {
		$carName = $_POST['carName'] ;
	}
	if ( empty($_POST['modelcolor']) ) {
		$modelcolorErr = 'input color' ;
	} else {
		$modelcolor = $_POST['modelcolor'] ;
	}
	if ( empty($_POST['modelYear']) ) {
		$modelYearErr = 'input year' ;
	} else {
		$modelYear = $_POST['modelYear'] ;
	}
	if ( empty($_POST['enginecapacity']) ) {
		$enginecapacityErr = 'input engine capacity' ;
	} else {
		$enginecapacity = $_POST['enginecapacity'] ;
	}
	if ( empty($_POST['modelSittingCapacity']) ) {
		$modelSittingCapacityErr = 'Sitting capacity' ;
	} else {
		$modelSittingCapacity = $_POST['modelSittingCapacity'] ;
	}
	if ( empty($_POST['modelEngineCylinders']) ) {
		$modelEngineCylindersErr = 'Engine Cylinders' ;
	} else {
		$modelEngineCylinders = $_POST['modelEngineCylinders'] ;
	}
	if ( empty($_POST['modelSteering']) ) {
		$modelSteeringErr = 'Steering Side' ;
	} else {
		$modelSteering = $_POST['modelSteering'] ;
	}
	if ( empty($_POST['modelDriveModes']) ) {
		$modelDriveModesErr = 'drive modes' ;
	} else {
		$modelDriveModes = $_POST['modelDriveModes'] ;
	}
	if ( empty($_POST['modelTransmission']) ) {
		$modelTransmissionErr = 'Transmission' ;
	} else {
		$modelTransmission = $_POST['modelTransmission'] ;
	}
	if ( empty($_POST['modelGearbox']) ) {
		$modelGearboxErr = 'Gear Box' ;
	} else {
		$modelGearbox = $_POST['modelGearbox'] ;
	}
	if ( empty($_POST['modelWheelDrive']) ) {
		$modelWheelDriveErr = 'Wheel Drives' ;
	} else {
		$modelWheelDrive = $_POST['modelWheelDrive'] ;
	}
	if ( empty($_POST['modelPowerSteering']) ) {
		$modelPowerSteeringErr = 'Power Steering ' ;
	} else {
		$modelPowerSteering = $_POST['modelPowerSteering'] ;
	}
	if ( empty($_POST['modelSpareWheel']) ) {
		$modelSpareWheelErr = 'Spare Wheel' ;
	} else {
		$modelSpareWheel = $_POST['modelSpareWheel'] ;
	}
	if ( empty($_POST['modelHorsepower']) ) {
		$modelHorsepowerErr = 'Horsepower' ;
	} else {
		$modelHorsepower = $_POST['modelHorsepower'] ;
	}
	if ( empty($_POST['modelHybrid']) ) {
		$modelHybridErr = 'Hybrid' ;
	} else {
		$modelHybrid = $_POST['modelHybrid'] ;
	}
	if ( empty($_POST['modelPrice']) ) {
		$modelPriceErr = 'Price' ;
	} else {
		$modelPrice = $_POST['modelPrice'] ;
	}   


	$target = "../../images/adminFourwheel/".basename($_FILES['uploadImage1']['name']) ;

	$uploadImage1 = $_FILES['uploadImage1']['name'] ;

	$fetchcarRecords = " SELECT * FROM fourwheel WHERE brand='$brand' && FourwheelName='$carName' && modelColor='$modelcolor' && modelyear='$modelYear' && enginecapacity='$enginecapacity' && sittingcapacity='$modelSittingCapacity' && enginecylinders='$modelEngineCylinders' && steeringside='$modelSteering' && 	drivemodes='$modelDriveModes' && transmission='$modelTransmission' && gearbox='$modelGearbox' && wheeldrive='$modelWheelDrive' && powersteering='$modelPowerSteering' && sparewheel='$modelSpareWheel' && horsepower='$modelHorsepower' && hybrid='$modelHybrid' && priceperday='$modelPrice' && carImage='$uploadImage1'  " ; 
	$fetchResult = mysqli_query($conn,$fetchcarRecords) ;
	$fetchNum = mysqli_num_rows($fetchResult) ;

	if ( $fetchNum >= 10 ) {
		$_SESSION['carDup'] ;
		header('location: fourwheeladminAddNew.php?Rej') ;
	} else {
		if (empty($brandErr) && empty($carNameErr) && empty($modelcolorErr) && empty($modelYearErr) && empty($enginecapacityErr) && empty($modelSittingCapacityErr) && empty($modelEngineCylindersErr) && empty($modelSteeringErr) && empty($modelDriveModesErr) && empty($modelTransmissionErr) && empty($modelGearboxErr) && empty($modelWheelDriveErr) && empty($modelPowerSteeringErr) && empty($modelSpareWheelErr) && empty($modelHorsepowerErr) && empty($modelHybridErr) && empty($modelPriceErr) ) {

			$carStmt = $conn->prepare(" INSERT INTO fourwheel (brand,FourwheelName,modelColor,modelyear,enginecapacity,sittingcapacity,enginecylinders,steeringside,drivemodes,transmission,gearbox,wheeldrive,powersteering,sparewheel,horsepower,hybrid,priceperday,carImage) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,'$uploadImage1') ") ;
			$carStmt->bind_param("sssssssssssssssss",$brand,$carName,$modelcolor,$modelYear,$enginecapacity,$modelSittingCapacity,$modelEngineCylinders,$modelSteering,$modelDriveModes,$modelTransmission,$modelGearbox,$modelWheelDrive,$modelPowerSteering,$modelSpareWheel,$modelHorsepower,$modelHybrid,$modelPrice) ;		
			if ( $carStmt->execute() === TRUE ) { 
				move_uploaded_file($_FILES['name']['tmp_name'], $target) ;
				$_SESSION['carAdd'] ;
				$_SESSION['classTypeAccept'] ;
				header('location: fourwheeladminAddNew.php?carAddTrue') ;
			} else {
				$_SESSION['carRej'] ;
				$_SESSION['classTypeError'] ; 
				header('location: fourwheeladminAddNew.php?carAddFalse') ;
			}

		} else {
			$_SESSION['fillDetails'] ;
			$_SESSION['classTypeError'] ;
			header('location: fourwheeladminAddNew.php?notFill') ;
		}
		
	}

}




?>




<!DOCTYPE html>
<html lang="en">
<head>
	<title>vrmsADMIN</title>
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
.footer { padding: 30px;  width: 80%; justify-content: center; margin: 0 auto; }
.footer-links { color: #000; font-size: 15px; }
.footer-links:hover { font-weight: 600; color: #000; }

span { font-size: 12px; color: red; font-style: italic; }

.d-sm-table-cell { padding-left: 10px; padding-right: 10px; } 


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
</header> 

<hr />




<div class="container-fluid">
	<div class="row">

		<div class="col-md-3 bg-light text-left">
			<header id="mainheader1" class=" border border-0">
				<nav class="navbar navbar-inverse navbar-light bg-light border border-0 w-100 h-100">
				  <div class="container-fluid">
				    <div class="navbar-header ">
				      <button type="button" class="navbar-toggle bg-dark border border-0" data-toggle="collapse" data-target="#myNavbar">
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				      </button> 
				    </div>
				    <div class="collapse navbar-collapse" id="myNavbar">
				      <ul class="nav navbar-nav text-nowrap">
				        <li> <a href="dashboardadmin.php" class="text-dark">Dashboard</a> </li>
				        <li> <a href="regdusersadmin.php" class="text-dark">Users</a> </li>
					    <li> <a href="#" class="text-dark">Two Wheeler Vehicles</a> </li>   
					    <li class="active"> <a href="fourwheeleradmin.php" class="text-dark btn btn-lg border border-dark bg-light font-weight-bold">Four Wheeler Vehicles</a> </li>
					    <li> <a href="fourwheelerbookingadmin.php" class="text-dark">Bookings <sup class="badge badge-secondary"><?php
								$countRecords = " SELECT COUNT(status) AS TotalUndecidedBookings FROM selecteddrive WHERE status='WaitingApproval' " ;
								$countRecordsResult = mysqli_query($conn,$countRecords) ;
								$dataF = $countRecordsResult->fetch_assoc();
								echo $dataF['TotalUndecidedBookings']; 
							?></sup> </a> </li>
						 <li> <a href="../registered/logoutregistered.php" class="text-dark">Log Out</a> </li>  
				      </ul>
				    </div> 
				  </div>
				</nav>
 
			</header>
		</div>

		<div class="col-md-9">
			
			<header class=" text-center w-100">
				<nav  class="navbar navbar-inverse bg-light  border border-top-0 border-left-0 border-right-0">
					
				    <div class=" navbar-expand bg-light d-table" id="twowheelNav">
				      <ul class="nav navbar-nav text-nowrap d-table-row">
				        <li class="d-sm-table-cell"> <a href="fourwheeleradmin.php" class="text-dark bg-light">Aston Martin</a> </li>
				        <li class=" d-sm-table-cell"> <a href="fourwheeleradminMitsubishi.php" class="text-dark bg-light">Mitsubishi</a> </li>
						<li class=" d-sm-table-cell"> <a href="fourwheeleradminJeep.php" class="text-dark bg-light">Jeep</a> </li> 
						<li class="active d-sm-table-cell"> <a href="fourwheeladminAddNew.php" class="text-light bg-success font-weight-bold btn btn-lg btn-outline-success">Add New</a> </li>      
				      </ul>  
				    </div>
				</nav>
			</header>
			<br/>
			<aside>
				<p class="text-center mx-auto w-50 alert alert-<?php
					if (isset($_GET['carAddTrue'])) {
							echo $_SESSION['classTypeAccept'] ;
							session_unset();
							session_destroy();
						}
					if (isset($_GET['carAddFalse'])) {
							echo $_SESSION['classTypeError'] ;
							session_unset();
							session_destroy();
						}
					if (isset($_GET['Rej'])) {
							echo $_SESSION['classTypeError'] ;
							session_unset();
							session_destroy();
						}	
					if (isset($_GET['notFill'])) {
							echo $_SESSION['classTypeError'] ;
							session_unset();
							session_destroy();
						}			
				?>">
					<?php
						if ( isset($_GET['carAddTrue']) ) {
							if (isset($_SESSION['carAdd'])) {
								echo $_SESSION['carAdd'] ;
								session_unset() ;
								session_destory() ;
							} else {
								echo "Car Registration Accepted";
							}
						}
						if ( isset($_GET['carAddFalse']) ) {
							if (isset($_SESSION['carRej'])) {
								echo $_SESSION['carRej'] ;
								session_unset() ;
								session_destory() ;
							} else {
								echo "Car Registration Denied";
							}
						}
						if ( isset($_GET['Rej']) ) {
							if (isset($_SESSION['carDup'])) {
								echo $_SESSION['carDup'] ;
								session_unset() ;
								session_destory() ;
							} else {
								echo "Car Already Registered";
							}
						}
						if ( isset($_GET['notFill']) ) {
							if (isset($_SESSION['fillDetails'])) {
								echo $_SESSION['fillDetails'] ;
								session_unset() ;
								session_destory() ;
							} else {
								echo "Fill All Details";
							}
						}
					?>
				</p>				
				<form class="form" action="fourwheeladminAddNew.php" method="post" enctype="multipart/form-data" >
					 
					
					<div class="form-group">
						<div class="row">
							<div class="col-md">
								<?php
									if ( isset($_GET['notFill']) ) : 
								?>
								<label for="brand">Brand </label>
								<input type="text" name="brand" id="brand" class="form-control form-control-lg border border-danger" value=""  >
								<?php else: ?>
								<label for="brand">Brand </label>
								<input type="text" name="brand" id="brand" class="form-control form-control-lg" value=""  >
								<?php endif ; ?>
							</div>
							<div class="col-md">
								<?php
									if ( isset($_GET['notFill']) ) : 
								?>
								<label for="carName">Car Name</label>
								<input type="text" name="carName" id="carName" class="form-control form-control-lg border border-danger">
								<?php else: ?>
								<label for="carName">Car Name</label>
								<input type="text" name="carName" id="carName" class="form-control form-control-lg">
								<?php endif ; ?>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md">
								<?php
									if ( isset($_GET['notFill']) ) : 
								?>
								<label for="modelcolor">Color</label>
								<input type="text" name="modelcolor" id="modelcolor" class="form-control form-control-lg border border-danger" value=""  >
								<?php else: ?>
								<label for="modelcolor">Color</label>
								<input type="text" name="modelcolor" id="modelcolor" class="form-control form-control-lg" value=""  >
								<?php endif ; ?>
							</div>
							<div class="col-md">
								<?php
									if ( isset($_GET['notFill']) ) : 
								?>
								<label for="modelYear">Model Year</label>
								<input type="text" name="modelYear" id="modelYear" class="form-control form-control-lg border border-danger" value=""  >
								<?php else: ?>
								<label for="modelYear">Model Year</label>
								<input type="text" name="modelYear" id="modelYear" class="form-control form-control-lg" value=""  >
								<?php endif ; ?>
							</div>
						</div>
					</div> 
							
					<div class="form-group">
						<div class="row">
							<div class="col-md">
								<?php
									if ( isset($_GET['notFill']) ) : 
								?>
								<label for="enginecapacity">Engine Capacity (cc) </label>
								<input type="number" name="enginecapacity" id="enginecapacity" class="form-control form-control-lg border border-danger" value=""  >
								<?php else: ?>
								<label for="enginecapacity">Engine Capacity (cc) </label>
								<input type="number" name="enginecapacity" id="enginecapacity" class="form-control form-control-lg" value=""  >
								<?php endif ; ?>
							</div>
							<div class="col-md">
								<?php
									if ( isset($_GET['notFill']) ) : 
								?>
								<label for="modelSittingCapacity">Sitting Capacity</label>
								<input type="number" name="modelSittingCapacity" id="modelSittingCapacity" class="form-control form-control-lg border border-danger" value=""  >
								<?php else: ?>
								<label for="modelSittingCapacity">Sitting Capacity</label>
								<input type="number" name="modelSittingCapacity" id="modelSittingCapacity" class="form-control form-control-lg" value=""  >
								<?php endif ; ?>
							</div>
						</div>
					</div>
			 					
					<div class="form-group">
						<div class="row">
							<div class="col-md">
								<?php
									if ( isset($_GET['notFill']) ) : 
								?>
								<label for="modelEngineCylinders">Engine Cylinders</label>
								<input type="number" name="modelEngineCylinders" id="modelEngineCylinders" class="form-control form-control-lg  border border-danger" value=""  >
								<?php else: ?>
								<label for="modelEngineCylinders">Engine Cylinders</label>
								<input type="number" name="modelEngineCylinders" id="modelEngineCylinders" class="form-control form-control-lg" value=""  >
								<?php endif ; ?>
							</div>
							<div class="col-md">
								<?php
									if ( isset($_GET['notFill']) ) : 
								?>
								<label for="modelSteering">Steering Side</label>
								<input type="text" name="modelSteering" id="modelSteering" class="form-control form-control-lg  border border-danger " value=""  >
								<?php else: ?>
								<label for="modelSteering">Steering Side</label>
								<input type="text" name="modelSteering" id="modelSteering" class="form-control form-control-lg " value=""  >
								<?php endif ; ?>
							</div>
						</div>
					</div>
								
					<div class="form-group">
						<div class="row">
							<div class="col-md">
								<?php
									if ( isset($_GET['notFill']) ) : 
								?>
								<label for="modelDriveModes">Drive Modes</label>
								<input type="number" name="modelDriveModes" id="modelDriveModes" class="form-control form-control-lg border border-danger" value=""  >
								<?php else: ?>
								<label for="modelDriveModes">Drive Modes</label>
								<input type="number" name="modelDriveModes" id="modelDriveModes" class="form-control form-control-lg" value=""  >
								<?php endif ; ?>
							</div>
							<div class="col-md">
								<?php
									if ( isset($_GET['notFill']) ) : 
								?>
								<label for="modelTransmission">Transmission</label>
								<input type="text" name="modelTransmission" id="modelTransmission" class="form-control form-control-lg border border-danger" value=""  >
								<?php else: ?>
								<label for="modelTransmission">Transmission</label>
								<input type="text" name="modelTransmission" id="modelTransmission" class="form-control form-control-lg" value=""  >
								<?php endif ; ?>
							</div>
						</div>
					</div>
								
					<div class="form-group">
						<div class="row">
							<div class="col-md">
								<?php
									if ( isset($_GET['notFill']) ) : 
								?>
								<label for="modelGearbox">Gearbox</label>
								<input type="text" name="modelGearbox" id="modelGearbox" class="form-control form-control-lg border border-danger" value=""  >
								<?php else: ?>
								<label for="modelGearbox">Gearbox</label>
								<input type="text" name="modelGearbox" id="modelGearbox" class="form-control form-control-lg" value=""  >
								<?php endif ; ?>
							</div>
							<div class="col-md">
								<?php
									if ( isset($_GET['notFill']) ) : 
								?>
								<label for="modelWheelDrive">Wheel Drive</label>
								<input type="text" name="modelWheelDrive" id="modelWheelDrive" class="form-control form-control-lg border border-danger" value=""  >
								<?php else: ?>
								<label for="modelWheelDrive">Wheel Drive</label>
								<input type="text" name="modelWheelDrive" id="modelWheelDrive" class="form-control form-control-lg" value=""  >
								<?php endif ; ?>
							</div>
						</div>
					</div>
													
					<div class="form-group">
						<div class="row">
							<div class="col-md">
								<?php
									if ( isset($_GET['notFill']) ) : 
								?>
								<label for="modelPowerSteering">Power Steering</label>
								<input type="text" name="modelPowerSteering" id="modelPowerSteering" class="form-control form-control-lg border border-danger" value=""  >
								<?php else: ?>
								<label for="modelPowerSteering">Power Steering</label>
								<input type="text" name="modelPowerSteering" id="modelPowerSteering" class="form-control form-control-lg" value=""  >
								<?php endif ; ?>
							</div>
							<div class="col-md">
								<?php
									if ( isset($_GET['notFill']) ) : 
								?>
								<label for="modelSpareWheel">Spare Wheel</label>
								<input type="text" name="modelSpareWheel" id="modelSpareWheel" class="form-control form-control-lg border border-danger" value=""  >
								<?php else: ?>
								<label for="modelSpareWheel">Spare Wheel</label>
								<input type="text" name="modelSpareWheel" id="modelSpareWheel" class="form-control form-control-lg" value=""  >
								<?php endif ; ?>
							</div>
						</div>
					</div>
								
					<div class="form-group">
						<div class="row">
							<div class="col-md">
								<?php
									if ( isset($_GET['notFill']) ) : 
								?>
								<label for="modelHorsepower">Horsepower</label>
								<input type="number" name="modelHorsepower" id="modelHorsepower" class="form-control form-control-lg border border-danger" value=""  >
								<?php else: ?>
								<label for="modelHorsepower">Horsepower</label>
								<input type="number" name="modelHorsepower" id="modelHorsepower" class="form-control form-control-lg" value=""  >
								<?php endif ; ?>
							</div>
							<div class="col-md">
								<?php
									if ( isset($_GET['notFill']) ) : 
								?>
								<label for="modelHybrid">Hybrid</label>
								<input type="text" name="modelHybrid" id="modelHybrid" class="form-control form-control-lg border border-danger" value=""  >
								<?php else: ?>
								<label for="modelHybrid">Hybrid</label>
								<input type="text" name="modelHybrid" id="modelHybrid" class="form-control form-control-lg" value=""  >
								<?php endif ; ?>
							</div>
						</div>
					</div>
					<br/>
								
					<div class="form-group">
						<?php
							if ( isset($_GET['notFill']) ) : 
						?>
						<label for="modelPrice">Price per day (KES) </label>
						<input type="number" name="modelPrice" id="modelPrice" class="form-control form-control-lg border border-danger w-75" value=""  >
						<?php else: ?>
						<label for="modelPrice">Price per day (KES) </label>
						<input type="number" name="modelPrice" id="modelPrice" class="form-control form-control-lg w-75" value=""  >
						<?php endif ; ?>
					</div>
					<br/>
								
					<div class="form-group">
						<label>Upload Pictures</label>
						<div class="row">
							<div class="col-md">
								<?php
									if ( isset($_GET['notFill']) ) : 
								?>
								<input type="file" name="uploadImage1" id="uploadImage1" class="form-control form-control-lg border border-danger">
								<?php else: ?>
								<input type="file" name="uploadImage1" id="uploadImage1" class="form-control form-control-lg">
								<?php endif ; ?>
							</div>
							<!-- <div class="col-md">
								<input type="file" name="uploadImage2" id="uploadImage2" class="form-control form-control-lg">
							</div>
							<div class="col-md">
								<input type="file" name="uploadImage3" id="uploadImage3" class="form-control form-control-lg">
							</div>
							<div class="col-md">
								<input type="file" name="uploadImage4" id="uploadImage4" class="form-control form-control-lg">
							</div>
 -->					</div>
					</div> 
					<br/><br/>
					<div class="form-group">
						<div class="row">
							<div class="col">
								<input type="submit" name="adminRegCar" id="adminRegCar" class="form-control form-control-lg btn btn-lg w-75 h-100 btn-outline-success">
							</div>
							<div class="col">
								<input type="reset" name="reset" id="reset" class="form-control form-control-lg btn btn-lg w-75 h-100 btn-outline-light border border-danger text-dark font-weight-bolder">
							</div>
						</div>
					</div>

				</form>
			</aside>

		</div>

	</div>
</div>





</body>
</html>