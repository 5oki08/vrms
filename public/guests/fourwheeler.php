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

</style>

</head>
<body>

<div class="container-fluid" id="guestsnav">
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
					<li class="nav-item"><a href="homeguests.php" class="nav-link">Home</a></li>
					<li class="nav-item"><a href="aboutguests.php" class="nav-link">About Us</a></li>
					<div class="dropdown"  id="active">
						<button type="" class="dropdown-toggle nav-link" data-toggle="dropdown" style="border:none; background-color:#00FFFF;">Vehicles</button>
						<div class="dropdown-menu">
							<a href="twowheeler.php" class="dropdown-item">TWO WHEELER VEHICLES</a>
							<a href="fourwheeler.php" class="dropdown-item">FOUR WHEELER VEHICLES</a>
						</div>
					</div>	
					<li class="nav-item"><a href="contact.php" class="nav-link">Contact Us</a></li>
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
				<li class="fourwheel-item"><a href="fourwheeler.php" class="fourwheel-link" id="active">Aston Martin</a></li>
				<li class="fourwheel-item"><a href="fourwheelMitsubishi.php" class="fourwheel-link">Mitsubishi</a></li>
				<li class="fourwheel-item"><a href="fourwheelJeep.php" class="fourwheel-link">Jeep</a></li>
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
								<a href="fourwheelVantage.php" class="fourwheelermoreinfo">More Info</a>
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