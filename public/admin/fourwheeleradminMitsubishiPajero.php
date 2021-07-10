<?php

require '../../connection.php' ;

 


if ( isset($_GET['delete'] ) ) {
	$id = $_GET['delete'] ;

	$deleteRecordSql = "DELETE brand,FourwheelName,modelColor,modelyear,enginecapacity,sittingcapacity,enginecylinders,steeringside,drivemodes,transmission,gearbox,wheeldrive,powersteering,sparewheel,horsepower,hybrid,priceperday,carImage FROM fourwheel WHERE id='$id' " ;
	if ( $conn->query($deleteRecordSql) ===  TRUE ) {
		$_SESSION['recordCut'] ;
		$_SESSION['classTypeAccept'] ;
		header('location: fourwheeleradmin.php?recordDismissed') ;
	}
}


if ( isset($_GET['edit']) ) {
		$id = $_GET['edit'] ;
		$update = true ;


 	$fetchCarRecords = $conn->query(" SELECT * FROM fourwheel WHERE FourwheelName='Pajero' ") or die($conn->error) ;
	$pullRow = $fetchCarRecords->fetch_array() ;

	$idE = $pullRow['id'] ;
 	$brandE = $pullRow['brand'] ;
 	$carNameE = $pullRow['FourwheelName'] ;
 	$modelcolorE = $pullRow['modelColor'] ;
 	$modelYearE = $pullRow['modelyear'] ;
 	$modelFuelTypeE = $pullRow['enginecapacity'] ;
 	$modelSittingCapacityE = $pullRow['sittingcapacity'] ;
 	$modelEngineCylindersE = $pullRow['enginecylinders'] ;
 	$modelSteeringE = $pullRow['steeringside'] ;
 	$modelDriveModesE = $pullRow['drivemodes'] ;
 	$modelTransmissionE = $pullRow['transmission'] ;
 	$modelGearboxE = $pullRow['gearbox'] ;
 	$modelWheelDriveE = $pullRow['wheeldrive'] ;
 	$modelPowerSteeringE = $pullRow['powersteering'] ;
 	$modelSpareWheelE = $pullRow['sparewheel'] ;
 	$modelHorsepowerE = $pullRow['horsepower'] ;
 	$modelHybridE = $pullRow['hybrid'] ;
 	$modelPriceE = $pullRow['priceperday'] ;
}

$brandEd = $carNameEd = $modelcolorEd = $modelYearEd = $modelFuelTypeEd = $modelSittingCapacityEd = $modelEngineCylindersEd = $modelSteeringEd = $modelDriveModesEd = $modelTransmissionEd = $modelGearboxEd = $modelWheelDriveEd = $modelPowerSteeringEd = $modelSpareWheelEd = $modelHorsepowerEd = $modelHybridEd = $modelPriceEd = '' ;

$brandErr = $carNameErr = $modelcolorErr = $modelYearErr = $modelFuelTypeErr = $modelSittingCapacityErr = $modelEngineCylindersErr = $modelSteeringErr = $modelDriveModesErr = $modelTransmissionErr = $modelGearboxErr = $modelWheelDriveErr = $modelPowerSteeringErr = $modelSpareWheelErr = $modelHorsepowerErr = $modelHybridErr = $modelPriceErr = '' ;
 


if ( isset($_POST['submitUpdate']) ) {
	if ( empty($_POST['brandEd']) ) {
		$brandErr = 'input Brand name' ;
	} else {
		$brandEd = $_POST['brandEd'] ;
	}
	if ( empty($_POST['carNameEd']) ) {
		$carNameErr = 'input car name' ;
	} else {
		$carNameEd = $_POST['carNameEd'] ;
	}
	if ( empty($_POST['modelcolorEd']) ) {
		$modelcolorErr = 'input color' ;
	} else {
		$modelcolorEd = $_POST['modelcolorEd'] ;
	}
	if ( empty($_POST['modelYearEd']) ) {
		$modelYearErr = 'input year' ;
	} else {
		$modelYearEd = $_POST['modelYearEd'] ;
	}
	if ( empty($_POST['modelFuelTypeEd']) ) {
		$modelFuelTypeErr = 'input engine capacity' ;
	} else {
		$modelFuelTypeEd = $_POST['modelFuelTypeEd'] ;
	}
	if ( empty($_POST['modelSittingCapacityEd']) ) {
		$modelSittingCapacityErr = 'Sitting capacity' ;
	} else {
		$modelSittingCapacityEd = $_POST['modelSittingCapacityEd'] ;
	}
	if ( empty($_POST['modelEngineCylindersEd']) ) {
		$modelEngineCylindersErr = 'Engine Cylinders' ;
	} else {
		$modelEngineCylindersEd = $_POST['modelEngineCylindersEd'] ;
	}
	if ( empty($_POST['modelSteeringEd']) ) {
		$modelSteeringErr = 'Steering Side' ;
	} else {
		$modelSteeringEd = $_POST['modelSteeringEd'] ;
	}
	if ( empty($_POST['modelDriveModesEd']) ) {
		$modelDriveModesErr = 'drive modes' ;
	} else {
		$modelDriveModesEd = $_POST['modelDriveModesEd'] ;
	}
	if ( empty($_POST['modelTransmissionEd']) ) {
		$modelTransmissionErr = 'Transmission' ;
	} else {
		$modelTransmissionEd = $_POST['modelTransmissionEd'] ;
	}
	if ( empty($_POST['modelGearboxEd']) ) {
		$modelGearboxErr = 'Gear Box' ;
	} else {
		$modelGearboxEd = $_POST['modelGearboxEd'] ;
	}
	if ( empty($_POST['modelWheelDriveEd']) ) {
		$modelWheelDriveErr = 'Wheel Drives' ;
	} else {
		$modelWheelDriveEd = $_POST['modelWheelDriveEd'] ;
	}
	if ( empty($_POST['modelPowerSteeringEd']) ) {
		$modelPowerSteeringErr = 'Power Steering ' ;
	} else {
		$modelPowerSteeringEd = $_POST['modelPowerSteeringEd'] ;
	}
	if ( empty($_POST['modelSpareWheelEd']) ) {
		$modelSpareWheelErr = 'Spare Wheel' ;
	} else {
		$modelSpareWheelEd = $_POST['modelSpareWheelEd'] ;
	}
	if ( empty($_POST['modelHorsepowerEd']) ) {
		$modelHorsepowerErr = 'Horsepower' ;
	} else {
		$modelHorsepowerEd = $_POST['modelHorsepowerEd'] ;
	}
	if ( empty($_POST['modelHybridEd']) ) {
		$modelHybridErr = 'Hybrid' ;
	} else {
		$modelHybridEd = $_POST['modelHybridEd'] ;
	}
	if ( empty($_POST['modelPriceEd']) ) {
		$modelPriceErr = 'Price' ;
	} else {
		$modelPriceEd = $_POST['modelPriceEd'] ;
	}   

	$id  = $_POST['id'] ;


	if ( empty($brandErr) && empty($carNameErr) && empty($modelcolorErr) && empty($modelYearErr) && empty($modelFuelTypeErr) && empty($modelSittingCapacityErr) && empty($modelEngineCylindersErr) && empty($modelSteeringErr) && empty($modelDriveModesErr) && empty($modelTransmissionErr) && empty($modelGearboxErr) && empty($modelWheelDriveErr) && empty($modelPowerSteeringErr) && empty($modelSpareWheelErr) && empty($modelHorsepowerErr) && empty($modelHybridErr) && empty($modelPriceErr) ) {
		$updateFourwheel = " UPDATE fourwheel SET  brand='$brandEd' , FourwheelName='$carNameEd' , modelColor='$modelcolorEd' , modelyear='$modelYearEd' , enginecapacity='$modelFuelTypeEd' , sittingcapacity='$modelSittingCapacityEd' , enginecylinders='$modelEngineCylindersEd' , steeringside='$modelSteeringEd' , 	drivemodes='$modelDriveModesEd' , transmission='$modelTransmissionEd' , gearbox='$modelGearboxEd' , wheeldrive='$modelWheelDriveEd' , powersteering='$modelPowerSteeringEd' , sparewheel='$modelSpareWheelEd' , horsepower='$modelHorsepowerEd' , hybrid='$modelHybridEd' , priceperday='$modelPriceEd' WHERE id='$id' " ;
		if ( $conn->query($updateFourwheel) === TRUE ) {   
			$_SESSION['recUpdated'] ;
			$_SESSION['classTypeAccept'] ;
			header('location: fourwheeleradminMitsubishiPajero.php?recUpdt') ;
		} else {
			$_SESSION['recFail'] ;
			$_SESSION['classTypeError'] ;
			header('location: fourwheeleradminMitsubishiPajero.php?recF') ;
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
					    <li> <a href="fourwheelerbookingadmin.php" class="text-dark">Bookings <sup class="badge badge-danger"><?php
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
				        <!-- <li class="active d-sm-table-cell"> <a href="fourwheeleradmin.php" class="text-dark bg-light">Aston Martin</a> </li> -->
				         <li class="d-sm-table-cell"> <a href="fourwheeleradmin.php" class="text-dark bg-light">Aston Martin</a> </li>
				        <li class=" active d-sm-table-cell"> <a href="fourwheeleradminMitsubishi.php" class="text-dark bg-light">Mitsubishi</a> </li>
						<li class=" d-sm-table-cell"> <a href="fourwheeleradminJeep.php" class="text-dark bg-light">Jeep</a> </li> 
						<li class=" d-sm-table-cell"> <a href="fourwheeladminAddNew.php" class="text-light bg-success font-weight-bold btn btn-lg btn-outline-success">Add New</a> </li>    
				      </ul>  
				    </div>
				</nav>
			</header>
			<br/>

			
			<div class="col-md-6">
				<p style="font-size:15px;" class="alert alert-<?php 
					if (isset($_GET['recF'])) {
						echo $_SESSION['classTypeError'] ;
						// session_unset();
						// session_destroy();
					}
					if (isset($_GET['recUpdt'])) {
						echo $_SESSION['classTypeAccept'] ;
						// session_unset();
						// session_destroy();
					}
				?> w-50 text-center text-success text-nowrap font-weight-bold mx-auto" >
					<?php
						if ( isset($_GET['recF']) ) {
							if (isset($_SESSION['recFail'])) {
								echo $_SESSION['recFail'] ;
								session_unset() ;
								// session_destory() ;
							} else {
								echo "Record Update Failed ^admin";
							}
						}
						if ( isset($_GET['recUpdt']) ) {
							if (isset($_SESSION['recUpdated'])) {
								echo $_SESSION['recUpdated'] ;
								session_unset() ;
								// session_destory() ;
							} else {
								echo "Record Updated ^admin";
							}
						}
					?>
				</p>

				 <?php
				 	$fetchCarRecords = " SELECT * FROM fourwheel WHERE FourwheelName='Pajero' " ;
				 	$fetchCarRecordsResult = mysqli_query($conn,$fetchCarRecords) ;

				 	if ($fetchCarRecordsResult->num_rows > 0) {
					   	 while($rowFetch = $fetchCarRecordsResult->fetch_assoc()) {
				 ?>
				 
				 <img src="../../images/fourwheeler/<?=$rowFetch['carImage']?>" class="mx-auto" id="fourwheelermoreinfo" class="card-img-top">  
				<kbd class="h2 text-light" style="padding: 10px; border-radius: 5px;"> <?php echo $rowFetch['brand'] ;?> <?php echo $rowFetch['FourwheelName'] ;?> </kbd><br/><br/>
				<form class="form" action="fourwheeleradminMitsubishiPajero.php" method="post" >  

					<div class="form-group">
						<?php
							if ( isset($_GET['edit']) ) : 
						?>
						<label for="id">Id </label>
						<input type="number" name="id" id="id" class="form-control form-control-lg border border-warning" value="<?php echo $idE ; ?>"  >
						<?php else: ?>
						<label for="id"  hidden>Id </label>
						<input type="number" name="id" id="id" class="form-control form-control-lg" value="<?php echo $rowFetch['id'] ; ?>"  disabled hidden>
						<?php endif ; ?>
					</div> 
					<div class="form-group">
						<div class="row">
							<div class="col-md">
								<?php
									if ( isset($_GET['edit']) ) : 
								?>
								<label for="brandEd">Brand </label>
								<input type="text" name="brandEd" id="brandEd" class="form-control form-control-lg border border-warning" value="<?php echo $brandE ; ?>"  >
								<?php else: ?>
								<label for="brand">Brand </label>
								<input type="text" name="brand" id="brand" class="form-control form-control-lg" value="<?php echo $rowFetch['brand'] ; ?>"  disabled >
								<?php endif ; ?>
							</div>
							<div class="col-md">
								<?php
									if ( isset($_GET['edit']) ) : 
								?>
								<label for="carNameEd">Car Name </label>
								<input type="text" name="carNameEd" id="carNameEd" class="form-control form-control-lg border border-warning" value="<?php echo $carNameE ; ?>"  >
								<?php else: ?>
								<label for="carName">Car Name</label>
								<input type="text" name="carName" id="carName" class="form-control form-control-lg" value="<?php echo $rowFetch['FourwheelName'] ; ?>" disabled>
								<?php endif ; ?>
							</div>
						</div>
					</div>

					
					<div class="form-group">
						<div class="row">
							<div class="col-md">
								<?php
									if ( isset($_GET['edit']) ) : 
								?>
								<label for="modelcolorEd">Color </label>
								<input type="text" name="modelcolorEd" id="modelcolorEd" class="form-control form-control-lg border border-warning" value="<?php echo $modelcolorE ; ?>"  >
								<?php else: ?>
								<label for="modelcolor">Color</label>
								<input type="text" name="modelcolor" id="modelcolor" class="form-control form-control-lg" value="<?php echo $rowFetch['modelColor'] ; ?>" disabled="">
								<?php endif ; ?>
							</div>
							<div class="col-md">
								<?php
									if ( isset($_GET['edit']) ) : 
								?>
								<label for="modelYearEd"> </label>
								<input type="text" name="modelYearEd" id="modelYearEd" class="form-control form-control-lg border border-warning" value="<?php echo $modelYearE ; ?>"  >
								<?php else: ?>
								<label for="modelYear">Model Year</label>
								<input type="text" name="modelYear" id="modelYear" class="form-control form-control-lg" value="<?php echo $rowFetch['modelyear'] ; ?>" disabled="">
								<?php endif ; ?>
							</div>
						</div>
					</div>

					
					<div class="form-group">
						<div class="row">
							<div class="col-md">
								<?php
									if ( isset($_GET['edit']) ) : 
								?>
								<label for="modelFuelTypeEd">Engine Capacity </label>
								<input type="text" name="modelFuelTypeEd" id="modelFuelTypeEd" class="form-control form-control-lg border border-warning" value="<?php echo $modelFuelTypeE ; ?>"  >
								<?php else: ?>
								<label for="modelFuelType">Engine Capacity</label>
								<input type="text" name="modelFuelType" id="modelFuelType" class="form-control form-control-lg" value="<?php echo $rowFetch['enginecapacity'] ; ?>" disabled=""> 
								<?php endif ; ?>
							</div>
							<div class="col-md">
								<?php
									if ( isset($_GET['edit']) ) : 
								?>
								<label for="modelSittingCapacityEd">Sitting Capacity </label>
								<input type="text" name="modelSittingCapacityEd" id="modelSittingCapacityEd" class="form-control form-control-lg border border-warning" value="<?php echo $modelSittingCapacityE ; ?>"  >
								<?php else: ?>
								<label for="modelSittingCapacity">Sitting Capacity</label>
								<input type="number" name="modelSittingCapacity" id="modelSittingCapacity" class="form-control form-control-lg" value="<?php echo $rowFetch['sittingcapacity'] ; ?>" disabled="">
								<?php endif ; ?>
							</div>
						</div>
					</div>

					
					<div class="form-group">
						<div class="row">
							<div class="col-md">
								<?php
									if ( isset($_GET['edit']) ) : 
								?>
								<label for="modelEngineCylindersEd">Engine Cylinders </label>
								<input type="text" name="modelEngineCylindersEd" id="modelEngineCylindersEd" class="form-control form-control-lg border border-warning" value="<?php echo $modelEngineCylindersE ; ?>"  >
								<?php else: ?>
								<label for="modelEngineCylinders">Engine Cylinders</label>
								<input type="number" name="modelEngineCylinders" id="modelEngineCylinders" class="form-control form-control-lg" value="<?php echo $rowFetch['enginecylinders'] ; ?>" disabled="">
								<?php endif ; ?>
							</div>
							<div class="col-md">
								<?php
									if ( isset($_GET['edit']) ) : 
								?>
								<label for="modelSteeringEd">Steering Side </label>
								<input type="text" name="modelSteeringEd" id="modelSteeringEd" class="form-control form-control-lg border border-warning" value="<?php echo $modelSteeringE ; ?>"  >
								<?php else: ?>
								<label for="modelSteering">Steering Side</label>
								<input type="text" name="modelSteering" id="modelSteering" class="form-control form-control-lg" value="<?php echo $rowFetch['steeringside'] ; ?>" disabled="">
								<?php endif ; ?>
							</div>
						</div>
					</div>

					
					<div class="form-group">
						<div class="row">
							<div class="col-md">
								<?php
									if ( isset($_GET['edit']) ) : 
								?>
								<label for="modelDriveModesEd">Drive Modes </label>
								<input type="text" name="modelDriveModesEd" id="modelDriveModesEd" class="form-control form-control-lg border border-warning" value="<?php echo $modelDriveModesE ; ?>"  >
								<?php else: ?>
								<label for="modelDriveModes">Drive Modes</label>
								<input type="number" name="modelDriveModes" id="modelDriveModes" class="form-control form-control-lg" value="<?php echo $rowFetch['drivemodes'] ; ?>" disabled="">
								<?php endif ; ?>
							</div>
							<div class="col-md">
								<?php
									if ( isset($_GET['edit']) ) : 
								?>
								<label for="modelTransmissionEd">Transmission </label>
								<input type="text" name="modelTransmissionEd" id="modelTransmissionEd" class="form-control form-control-lg border border-warning" value="<?php echo $modelTransmissionE ; ?>"  >
								<?php else: ?>
								<label for="modelTransmission">Transmission</label>
								<input type="text" name="modelTransmission" id="modelTransmission" class="form-control form-control-lg" value="<?php echo $rowFetch['transmission'] ; ?>" disabled="">
								<?php endif ; ?>
							</div>
						</div>
					</div>

					
					<div class="form-group">
						<div class="row">
							<div class="col-md">
								<?php
									if ( isset($_GET['edit']) ) : 
								?>
								<label for="modelGearboxEd">Gearbox </label>
								<input type="text" name="modelGearboxEd" id="modelGearboxEd" class="form-control form-control-lg border border-warning" value="<?php echo $modelGearboxE ; ?>"  >
								<?php else: ?>
								<label for="modelGearbox">Gearbox</label>
								<input type="text" name="modelGearbox" id="modelGearbox" class="form-control form-control-lg" value="<?php echo $rowFetch['gearbox'] ; ?>" disabled="">
								<?php endif ; ?>
							</div>
							<div class="col-md">
								<?php
									if ( isset($_GET['edit']) ) : 
								?>
								<label for="modelWheelDriveEd">Wheel Drive </label>
								<input type="text" name="modelWheelDriveEd" id="modelWheelDriveEd" class="form-control form-control-lg border border-warning" value="<?php echo $modelWheelDriveE ; ?>"  >
								<?php else: ?>
								<label for="modelWheelDrive">Wheel Drive</label>
								<input type="text" name="modelWheelDrive" id="modelWheelDrive" class="form-control form-control-lg" value="<?php echo $rowFetch['wheeldrive'] ; ?>" disabled="">
								<?php endif ; ?>
							</div>
						</div>
					</div>

					
					<div class="form-group">
						<div class="row">
							<div class="col-md">
								<?php
									if ( isset($_GET['edit']) ) : 
								?>
								<label for="modelPowerSteeringEd">Power Steering </label>
								<input type="text" name="modelPowerSteeringEd" id="modelPowerSteeringEd" class="form-control form-control-lg border border-warning" value="<?php echo $modelPowerSteeringE ; ?>"  >
								<?php else: ?>
								<label for="modelPowerSteering">Power Steering</label>
								<input type="text" name="modelPowerSteering" id="modelPowerSteering" class="form-control form-control-lg" value="<?php echo $rowFetch['powersteering'] ; ?>" disabled="">
								<?php endif ; ?>
							</div>
							<div class="col-md">
								<?php
									if ( isset($_GET['edit']) ) : 
								?>
								<label for="modelSpareWheelEd">Spare Wheel </label>
								<input type="text" name="modelSpareWheelEd" id="modelSpareWheelEd" class="form-control form-control-lg border border-warning" value="<?php echo $modelSpareWheelE ; ?>"  >
								<?php else: ?>
								<label for="modelSpareWheel">Spare Wheel</label>
								<input type="text" name="modelSpareWheel" id="modelSpareWheel" class="form-control form-control-lg" value="<?php echo $rowFetch['sparewheel'] ; ?>" disabled="">
								<?php endif ; ?>
							</div>
						</div>
					</div>

					
					<div class="form-group">
						<div class="row">
							<div class="col-md">
								<?php
									if ( isset($_GET['edit']) ) : 
								?>
								<label for="modelHorsepowerEd">Horsepower </label>
								<input type="text" name="modelHorsepowerEd" id="modelHorsepowerEd" class="form-control form-control-lg border border-warning" value="<?php echo $modelHorsepowerE ; ?>"  >
								<?php else: ?>
								<label for="modelHorsepower">Horsepower</label>
								<input type="number" name="modelHorsepower" id="modelHorsepower" class="form-control form-control-lg" value="<?php echo $rowFetch['horsepower'] ; ?>" disabled="">
								<?php endif ; ?>
							</div>
							<div class="col-md">
								<?php
									if ( isset($_GET['edit']) ) : 
								?>
								<label for="modelHybridEd">Hybrid </label>
								<input type="text" name="modelHybridEd" id="modelHybridEd" class="form-control form-control-lg border border-warning" value="<?php echo $modelHybridE ; ?>"  >
								<?php else: ?>
								<label for="modelHybrid">Hybrid</label>
								<input type="text" name="modelHybrid" id="modelHybrid" class="form-control form-control-lg" value="<?php echo $rowFetch['hybrid'] ; ?>" disabled="">
								<?php endif ; ?>
							</div>
						</div>
					</div>

					<br/>

					<div class="form-group">
						<div class="col-md">
							<?php
								if ( isset($_GET['edit']) ) : 
							?>
							<label for="modelPriceEd">Price per day (KES)  </label>
							<input type="text" name="modelPriceEd" id="modelPriceEd" class="form-control form-control-lg border border-warning" value="<?php echo $modelPriceE ; ?>"  >
							<?php else: ?>
							<label for="modelPrice">Price per day (KES) </label>
							<input type="number" name="modelPrice" id="modelPrice" class="form-control form-control-lg" value="<?php echo $rowFetch['priceperday'] ; ?>" disabled="">
							<?php endif ; ?>
						</div>
					</div>

					
					<div class="form-group">
						<div class="col-md">
							<?php
								if ( isset($_GET['edit']) ) : 
							?>
							<input type="submit" name="submitUpdate" id="submitUpdate" class="form-control form-control-lg btn btn-lg btn-warning border border-0 w-75" value="Update Record">
							<?php else: ?>
							<div class="row">
								<div class="col">
									<a href="fourwheeleradminMitsubishiPajero.php?edit=<?php echo $rowFetch['id'] ; ?>" class="form-control form-control-lg btn btn-lg bg-info">Edit</a>
								</div>
								<div class="col">
									<a href="fourwheeleradminMitsubishiPajero.php?delete=<?php echo $rowFetch['id'] ; ?>" class="form-control form-control-lg btn btn-lg bg-danger" onclick="confirm_change()">Delete</a>
								</div>
							</div>	
							<?php endif ; ?>
						</div>
					</div>
					
				</form>
<?php  } } ?> 
		</div>

	</div>
</div>


  
 


<script type="text/javascript">
function confirm_change() {
  return confirm('are you sure?');
}
</script> 
</body>
</html>