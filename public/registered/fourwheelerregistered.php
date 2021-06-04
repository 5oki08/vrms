<?php 

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

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>VRMS-fourWheeler</title>
<meta charset="utf-8">	
<meta name="viewport" content="width=device-width, initial-scale=1">	
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<link rel="stylesheet" type="text/css" href="../../css/style.css">
<link rel="stylesheet" type="text/css" href="../../css/styleresponsive.css">		

<style type="text/css">
	
	#fourwheelnavigation {
		border-right: 5px solid;
	}
	.fourwheel-item {
		text-align: center;
		list-style-type: none;
		margin-top: 20px;
		margin-bottom: 20px;
	}
	.fourwheel-link {
		color: #000;
	}
	.fourwheel-link:hover {
		text-decoration: none;
	}
	#fourwheelercardimg {
		width: 280px;
		height: 190px;
	}
	#registerednav {
		background-color: #efa12b;
	}

</style>

</head>
<body>

<div class="container-fluid" id="registerednav">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-5"></div>
			<div class="col-md-3">
				<p>3<sup style="color:#000;">rd</sup> Street, CBD, Nairobi, Kenya</p>
			</div>
			<div class="col-md-4">
				<p>
					<img src="../../images/phonecall.png" alt="" width="20px" height="20px">
					+254 700 000 000
				</p>
				<p>
					<img src="../../images/contacticons/email/gmailemail.png" alt="" width="20px" height="20px">
					614rollingstone@gmail.com
				</p>
			</div>
		</div>
	</div> 
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<nav class="nav nav-expand">
					<li class="nav-item"><a href="homeguestsregistered.php" class="nav-link">Home</a></li>
					<li class="nav-item"><a href="aboutregistered.php" class="nav-link">About Us</a></li>
					<div class="dropdown"  id="active">
						<button type="" class="dropdown-toggle nav-link" data-toggle="dropdown" style="border:none; background-color:#efa12b;">Vehicles</button>
						<div class="dropdown-menu">
							<a href="twowheelerregistered.php" class="dropdown-item">TWO WHEELER VEHICLES</a>
							<a href="fourwheelerregistered.php" class="dropdown-item">FOUR WHEELER VEHICLES</a>
						</div>
					</div>	
					<li class="nav-item"><a href="contactregistered.php" class="nav-link">Contact Us</a></li>
					<li class="nav-item"><a href="mybookingregistered.php" class="nav-link">My Booking</a></li>
					<div class="dropdown" class="nav-link">
						<a href="#" class="text-danger" data-toggle="dropdown" style="font-size:16px;">My Profile</a>
						<div class="dropdown-menu">
							<a href="myaccountregistered.php" class="" style="color:#000; text-align:center;"> My Account</a>
							<a href="logoutregistered.php" class="nav-link">Log Out</a>
						</div>
					</div>
				</nav>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>	
</div>

<br/>

<div class="container-fluid">
	
	<div class="col-md-2" id="fourwheelnavigation">
		<div class="container-fluid">
			<nav class="">
				<li class="fourwheel-item"><a href="fourwheelerregistered.php" class="fourwheel-link" id="active">Aston Martin</a></li>
				<li class="fourwheel-item"><a href="fourwheelMitsubishiregistered.php" class="fourwheel-link">Mitsubishi</a></li>
				<li class="fourwheel-item"><a href="fourwheelJeepregistered.php" class="fourwheel-link">Jeep</a></li>
			</nav>
		</div>
	</div>

	<div class="col-md-8">
		
		<div class="container-fluid">
			<div class="card">
				<div class="row">
					<div class="col-md">
						<div class="card-header">
							<img src="../../images/fourwheeler/vantageA.jpg" id="fourwheelercardimg">
						</div>
					</div>
					<div class="col-md">
						<div class="card-body">
							<h3 class="card-text">Aston Martin Vantage</h3>
						</div>
						<div class="card-footer">
							<p class="card-text">The Aston Martin Vantage is a two-seater sports car manufactured by British luxury car manufacturer Aston Martin as a successor to the previous outgoing model which had been in production for 12 years.</p>
							<br/>
							<button type="button" class="btn btn-outline-primary">
								<a href="fourwheelVantageregistered.php" class="fourwheelermoreinfo">More Info</a>
							</button>
						</div>
					</div>
				</div>
			</div>

			<br/>

			<div class="card">
				<div class="row">
					<div class="col-md">
						<div class="card-header">
							<img src="../../images/fourwheeler/db5B.jpg" id="fourwheelercardimg">
							<small>Aston Martin DB5, chassis DB5/2008/R /Source: RM Sothebys</small>
						</div>
					</div>
					<div class="col-md">
						<div class="card-body">
							<h3 class="card-text">Aston Martin DB5</h3>
						</div>
						<div class="card-footer">
							<p class="card-text">The engine was enlarged from the 3.6 liter engine in the DB4 Series V to a more modern 4.0 liter all-aluminum straight-six engine that produced 282 hp and 288 foot pounds of torque and gave the car a top speed of about 145 mph (233 km/h).</p>
							<br/>
							<button type="button" class="btn btn-outline-primary">
								<a href="#" class="fourwheelermoreinfo">More Info</a>
							</button>
						</div>
					</div>
				</div>
			</div>

			<br/>

			<div class="card">
				<div class="row">
					<div class="col-md">
						<div class="card-header">
							<img src="../../images/fourwheeler/dbxB.jpg" id="fourwheelercardimg">
						</div>
					</div>
					<div class="col-md">
						<div class="card-body">
							<h3 class="card-text">Aston Martin DBX</h3>
						</div>
						<div class="card-footer">
							<p class="card-text">The Aston Martin DBX delivers all the practicality and refinement you’d expect from a luxury SUV, with a driver-focused approach that sets it apart from its closest rivals. The British sports car manufacturer has gone with what it knows best - applying its technical wizardry to produce the finest-handling SUV available.</p>
							<br/>
							<button type="button" class="btn btn-outline-primary">
								<a href="#" class="fourwheelermoreinfo">More Info</a>
							</button>
						</div>
					</div>
				</div>
			</div>

		</div>

	</div>

	<div class="col-md-2"></div>

</div>


</body>
</html>