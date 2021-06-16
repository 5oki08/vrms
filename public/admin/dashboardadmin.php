<?php

require '../../connection.php' ;
// require 'regdusersadmin.php' ;


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

<link rel="stylesheet" type="text/css" href="../../../css/style.css">
<link rel="stylesheet" type="text/css" href="../../../css/styleresponsive.css">	

<style type="text/css">
	
	/*#adminnav {
		background-color: #ffe135;
	}
	#adminnav {
		padding-top: 10px;
		padding-bottom: 10px;
		background-color: #ffe135;
	}
	.nav-linkAdmin {
		color: #000;
		padding-left: 10px;
		padding-right: 10px;
	}
	.nav-linkAdmin:hover {
		color: #000;
	}
	#activeadmin {
		text-transform: uppercase;
		font-weight: 700;
		text-decoration: underline;
	}
	.nav-itemadmin:hover {
		text-transform: uppercase;
		text-decoration: underline;
	}
	.dropdown-itemAdmin {
		padding: 5px;
	}*/



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


#errorRegadminDetails { color: #fff; }




@media only screen and (max-width: 600px) {
  
.heading1subj { display: block; margin-top: 3px; margin-bottom: 3px; }
.navbar-toggle { float: right; }
.carousel-inner img { width: 400; height: 270; }
#footerSec1 { margin-bottom: 30px; }
#footerSec2 { margin-bottom: 30px; }
#footerSec3 {}


#adminSubmitRegistration { margin-top: 20px; width: 70%; height: 70%; float: right; }
#resetadminDetails { margin-top: 25px; width: 70%; }

#adminLogin { width: 50%; height:100%; }


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
		<div class="col-md-2 bg-light text-left" style="margin-left:none;">
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
				        <li class="active"> <a href="#" class="text-dark bg-light font-weight-bold">Dashboard</a> </li>
				        <li> <a href="regdusersadmin.php" class="text-dark">Users</a> </li>
						  <li> <a href="#" class="text-dark">Two Wheeler Vehicles</a> </li>
						  <li> <a href="#" class="text-dark">Four Wheeler Vehicles</a> </li>
						  <li> <a href="#" class="text-dark">Bookings</a> </li>
						 <li> <a href="logoutregistered.php" class="text-dark">Log Out</a> </li> 
				      </ul>
				    </div>
				  </div>
				</nav>

			</header>
		</div>
		<div class="col-md-10">

			<div class="card-deck bg-light">
				<div class="card">
					<div class="card-body">
						<p class="text-center">
							<?php
								$countRecords = " SELECT COUNT(*) AS TotalregdUsers FROM users " ;
								$countRecordsResult = mysqli_query($conn,$countRecords) ;
								$dataF = $countRecordsResult->fetch_assoc();
								echo $dataF['TotalregdUsers'];
							?>
						</p>
						<p class="card-text text-center">Registered Users</p>
					</div>
				</div>

				<div class="card bg-warning">
					<div class="card-body">
						<p class="text-center">
							<?php
								$countRecords = " SELECT COUNT(*) AS TotalregdBookings FROM selecteddrive " ;
								$countRecordsResult = mysqli_query($conn,$countRecords) ;
								$dataF = $countRecordsResult->fetch_assoc();
								echo $dataF['TotalregdBookings'];
							?>
						<p class="card-text text-center">Total Bookings</p>
					</div>
				</div>

				<div class="card bg-info">
					<div class="card-body">
						<p class="text-center">null</p>
						<p class="card-text text-center">Approved Bookings</p>
					</div>
				</div>
			</div>

			<p class="card-text">The quick brown fox jumped over the lazy dog. The quick brown fox jumped over the lazy dog. The quick brown fox jumped over the lazy dog. The quick brown fox jumped over the lazy dog. The quick brown fox jumped over the lazy dog. The quick brown fox jumped over the lazy dog. The quick brown fox jumped over the lazy dog. The quick brown fox jumped over the lazy dog. The quick brown fox jumped over the lazy dog. The quick brown fox jumped over the lazy dog. The quick brown fox jumped over the lazy dog. The quick brown fox jumped over the lazy dog. The quick brown fox jumped over the lazy dog. The quick brown fox jumped over the lazy dog.</p>
			<br/>
			<div class="jumbotron">
				<h4>Vehicle Rental Management System</h4><br/>
				<img src="../../images/vrmslogo.png" style="" class="mx-auto modal-dialog-centered">
			</div>
			<br/>
			<!-- <div class="container">
				<table class="table table-hovered">
				
					<tr>
						<td>Second Name</td>
						<td>Selected Vehicle</td>
						<td>Number Of days</td>
						<td>Payment Mode</td>
					</tr>
			<?php
									$adminFetchHire = "SELECT * FROM selecteddrive" ;
									$adminFetchHireResult = mysqli_query($conn,$adminFetchHire) ;

									if ($adminFetchHireResult->num_rows > 0) {
								   	 while($row = $adminFetchHireResult->fetch_assoc()) {
								?>
					<tr>
						<td> <?php echo $row['snameregistered'] ; ?> </td>
						<td> <?php echo $row['selectedDrivetwoWheel'] ; ?> </td>
						<td> <?php echo $row['numberOfdaysHired'] ?> </td>
						<td> <?php echo $row['paymentMode'] ?> </td>
					</tr>
			<?php  }
										} else {
										    echo "No bookings .";
										} ?>
				</table>	
			</div> -->

		</div>
	</div>
</div>



<br/><br/><br/><br/>





<br/> <br/> <br/>

<!-- <div class="col-md-6">
			<kbd class="h2 text-light" style="padding: 10px; border-radius: 5px;">Aston Martin DBx</kbd><br/><br/>
			<form class="form">
				
				<div class="form-group">
					<div class="row">
						<div class="col-md">
							<label for="modelcolor">Color</label>
							<input type="text" name="modelcolor" id="modelcolor" class="form-control form-control-lg" value="" disabled="">
						</div>
						<div class="col-md">
							<label for="modelYear">Model Year</label>
							<input type="text" name="modelYear" id="modelYear" class="form-control form-control-lg" value="" disabled="">
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="row">
						<div class="col-md">
							<label for="modelFuelType">Engine Capacity</label>
							<input type="text" name="modelFuelType" id="modelFuelType" class="form-control form-control-lg" value="" disabled="">
						</div>
						<div class="col-md">
							<label for="modelSittingCapacity">Sitting Capacity</label>
							<input type="number" name="modelSittingCapacity" id="modelSittingCapacity" class="form-control form-control-lg" value="" disabled="">
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="row">
						<div class="col-md">
							<label for="modelEngineCylinders">Engine Cylinders</label>
							<input type="number" name="modelEngineCylinders" id="modelEngineCylinders" class="form-control form-control-lg" value="" disabled="">
						</div>
						<div class="col-md">
							<label for="modelSteering">Steering Side</label>
							<input type="text" name="modelSteering" id="modelSteering" class="form-control form-control-lg" value="" disabled="">
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="row">
						<div class="col-md">
							<label for="modelDriveModes">Drive Modes</label>
							<input type="number" name="modelDriveModes" id="modelDriveModes" class="form-control form-control-lg" value="" disabled="">
						</div>
						<div class="col-md">
							<label for="modelTransmission">Transmission</label>
							<input type="text" name="modelTransmission" id="modelTransmission" class="form-control form-control-lg" value="" disabled="">
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="row">
						<div class="col-md">
							<label for="modelGearbox">Gearbox</label>
							<input type="text" name="modelGearbox" id="modelGearbox" class="form-control form-control-lg" value="" disabled="">
						</div>
						<div class="col-md">
							<label for="modelWheelDrive">Wheel Drive</label>
							<input type="text" name="modelWheelDrive" id="modelWheelDrive" class="form-control form-control-lg" value="" disabled="">
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="row">
						<div class="col-md">
							<label for="modelPowerSteering">Power Steering</label>
							<input type="text" name="modelPowerSteering" id="modelPowerSteering" class="form-control form-control-lg" value="" disabled="">
						</div>
						<div class="col-md">
							<label for="modelSpareWheel">Spare Wheel</label>
							<input type="text" name="modelSpareWheel" id="modelSpareWheel" class="form-control form-control-lg" value="" disabled="">
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="row">
						<div class="col-md">
							<label for="modelHorsepower">Horsepower</label>
							<input type="number" name="modelHorsepower" id="modelHorsepower" class="form-control form-control-lg" value="" disabled="">
						</div>
						<div class="col-md">
							<label for="modelHybrid">Hybrid</label>
							<input type="text" name="modelHybrid" id="modelHybrid" class="form-control form-control-lg" value="" disabled="">
						</div>
					</div>
				</div>
				<br/>
				<div class="form-group">
					<label for="modelPrice">Price per day (KES) </label>
					<input type="number" name="modelPrice" id="modelPrice" class="form-control form-control-lg" value="5555" disabled="">
				</div>

			</form>
		</div>
	</div>
	<br/>
 -->

<br/><br/><br/>	


<br/><br/>  

<footer class="footer bg-success rounded-left">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md text-center" id="footerSec1">
				<p style="text-decoration:underline;">Quick Links</p>
				<a href="#p" class="footer-links">Home</a><br/>
				<a href="#" class="footer-links">About Us</a><br/>
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