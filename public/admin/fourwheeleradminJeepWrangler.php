<?php

require '../../connection.php' ;



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
		<div class="col-md-2 bg-light text-left">
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
					    <li class="active"> <a href="fourwheeleradmin.php" class="text-dark bg-light font-weight-bold">Four Wheeler Vehicles</a> </li>
					    <li> <a href="#" class="text-dark">Bookings</a> </li>
						 <li> <a href="../registered/logoutregistered.php" class="text-dark">Log Out</a> </li>  
				      </ul>
				    </div> 
				  </div>
				</nav>
 
			</header>
		</div>

		<div class="col-md-10">
			
			<header class=" text-center w-100">
				<nav  class="navbar navbar-inverse bg-light  border border-top-0 border-left-0 border-right-0">
					
				    <div class=" navbar-expand bg-light d-table" id="twowheelNav">
				      <ul class="nav navbar-nav text-nowrap d-table-row">
				        <!-- <li class="active d-sm-table-cell"> <a href="fourwheeleradmin.php" class="text-dark bg-light">Aston Martin</a> </li> -->
				         <li class="d-sm-table-cell"> <a href="fourwheeleradmin.php" class="text-dark bg-light">Aston Martin</a> </li>
				        <li class=" d-sm-table-cell"> <a href="fourwheeleradminMitsubishi.php" class="text-dark bg-light">Mitsubishi</a> </li>
						<li class="active d-sm-table-cell"> <a href="fourwheeleradminJeep.php" class="text-dark bg-light">Jeep</a> </li> 
						<li class=" d-sm-table-cell"> <a href="fourwheeladminAddNew.php" class="text-light bg-success font-weight-bold btn btn-lg btn-outline-success">Add New</a> </li>    
				      </ul>  
				    </div>
				</nav>
			</header>
			<br/>

			
			<div class="col-md-6">
				<div class="container-fluid">
					<div class="" style="max-width:500px">
					  <img src="#" id="detailedFourwheelerimg" class="w-75 h-25 wranglerfourwheeler">
					  <img src="#" id="detailedFourwheelerimg" class="w-75 h-25 wranglerfourwheeler">
					  <img src="#" id="detailedFourwheelerimg" class="w-75 h-25 wranglerfourwheeler">
					</div>
	<script>
	var myIndex = 0;
	carousel();

	function carousel() {
	  var i;
	  var x = document.getElementsByClassName("wranglerfourwheeler");
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
			 <?php
			 // $id = 1 ;
			 	$fetchCarRecords = " SELECT * FROM fourwheel WHERE FourwheelName='Wrangler' " ; 
			 	$fetchCarRecordsResult = mysqli_query($conn,$fetchCarRecords) ;

			 	if ($fetchCarRecordsResult->num_rows > 0) {
				   	 while($rowFetch = $fetchCarRecordsResult->fetch_assoc()) {
			 ?>
			 <p hidden> <?php echo $rowFetch['id'] ; ?> </p>   
			<kbd class="h2 text-light" style="padding: 10px; border-radius: 5px;"> <?php echo $rowFetch['brand'] ;?> <?php echo $rowFetch['FourwheelName'] ;?> </kbd><br/><br/>
			<form class="form" action="#" method="post">  
				 
				
				 <div class="form-group">
						<div class="row">
							<div class="col-md">
								<label for="brand">Brand </label>
								<input type="text" name="brand" id="brand" class="form-control form-control-lg" value="<?php echo $rowFetch['brand'] ; ?>"  >
							</div>
							<div class="col-md">
								<label for="carName">Car Name</label>
								<input type="text" name="carName" id="carName" class="form-control form-control-lg" value="<?php echo $rowFetch['FourwheelName'] ; ?>">
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
		</div>


		</div>

	</div>
</div>


  
 



</body>
</html>