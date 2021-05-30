<!DOCTYPE html>
<html lang="en">
<head>
	<title>VRMS-twoWheeler</title>
<meta charset="utf-8">	
<meta name="viewport" content="width=device-width, initial-scale=1">	
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<link rel="stylesheet" type="text/css" href="../../css/style.css">
<link rel="stylesheet" type="text/css" href="../../css/styleresponsive.css">	

<style type="text/css">
	#twowheelnavigation {
		border-right: 5px solid;
	}
	.twowheel-item {
		text-align: center;
		list-style-type: none;
		margin-top: 20px;
		margin-bottom: 20px;
	}
	.twowheel-link {
		color: #000;
	}
	.twowheel-link:hover {
		text-decoration: none;
	}
	.card-header {
		border: none;
	}
	#twowheelercardimg {
		width: 280px;
		height: 190px;
	}
	.card-text {
		text-align: center;
	}
	.twowheelermoreinfo {
		color: #000;
	}
	.twowheelermoreinfo:hover {
		text-decoration: none;
		color: #fff;
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
					<li class="nav-item"><a href="aboutguests.php" class="nav-link"  >About Us</a></li>
					<div class="dropdown" id="active">
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
	
	<div class="col-md-2" id="twowheelnavigation">
		<div class="container-fluid">
			<nav class="">
				<li class="twowheel-item"><a href="twowheeler.php" class="twowheel-link">Ducatti</a></li>
				<li class="twowheel-item"><a href="twowheelS.php" class="twowheel-link" id="active">Suzuki</a></li>
				<li class="twowheel-item"><a href="twowheelYamaha.php" class="twowheel-link">Yamaha</a></li>
			</nav>
		</div>
	</div>

	<div class="col-md-8">
		<div class="container-fluid">

			<div class="card">
				<div class="row">
					<div class="col-md">
						<div class="card-header">
							<img src="../../images/twowheeler/suzukiHayabusaA.png" id="twowheelercardimg">
						</div>
					</div>
					<div class="col-md">
						<div class="card-body">
							<h3 class="card-text">Hayabusa</h3>
						</div>
						<div class="card-footer">
							<p class="card-text">The 2022 Suzuki Hayabusa reaffirms its status as motorcycling’s Ultimate Sportbike. This new generation of Suzuki’s flagship sportbike is propelled by a muscular, refined inline four-cylinder engine housed in a proven and thoroughly updated chassis with incomparable manners, managed by an unequaled suite of electronic rider aids within stunning aerodynamic bodywork that is distinctly Hayabusa.</p>
							<br/>
							<button type="button" class="btn btn-outline-primary">
								<a href="twowheelsuzukiHayabusa.php" class="twowheelermoreinfo">More Info</a>
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
							<img src="../../images/twowheeler/RM-Z450b.png" id="twowheelercardimg">
						</div>
					</div>
					<div class="col-md">
						<div class="card-body">
							<h3 class="card-text">RM-Z450</h3>
						</div>
						<div class="card-footer">
							<p class="card-text">The 2021 RM-Z450 remains the champion’s choice, as its sleek, race-ready appearance, strong engine, and nimble chassis continue the Suzuki tradition of extraordinarily precise handling. The RM-Z450 epitomizes Suzuki’s “Winning Balance” philosophy with strong brakes for controlled stopping power, a wide spread of engine muscle with high peak power, and a strong, light, and more nimble chassis that remains the class standard for cornering performance and extraordinarily precise handling.</p>
							<br/>
							<button type="button" class="btn btn-outline-primary">
								<a href="twowheelSuzukiRM-Z450.php" class="twowheelermoreinfo">More Info</a>
							</button>
						</div>
					</div>
				</div>
			</div>
			<br/>

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