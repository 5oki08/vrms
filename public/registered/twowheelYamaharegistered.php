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
					<li class="nav-item"><a href="aboutregistered.php" class="nav-link"  >About Us</a></li>
					<div class="dropdown" id="active">
						<button type="" class="dropdown-toggle nav-link" data-toggle="dropdown" style="border:none; background-color:#efa12b;">Vehicles</button>
						<div class="dropdown-menu">
							<a href="twowheelerregistered.php" class="dropdown-item">TWO WHEELER VEHICLES</a>
							<a href="fourwheelerregistered.php" class="dropdown-item">FOUR WHEELER VEHICLES</a>
						</div>
					</div>	
					<li class="nav-item"><a href="contactregistered.php" class="nav-link">Contact Us</a></li>
					<li class="nav-item"><a href="mybookingregistered.php" class="nav-link">My Booking</a></li>
					<!-- <li class="nav-item"><a href="myaccountregistered.php" class="nav-link">My Account</a></li> -->
					<!-- <li class="nav-item"><a href="logoutregistered.php" class="nav-link">Log Out</a></li> -->
					<div class="dropdown" class="nav-link">
						<!-- <button type="" class="" data-toggle="dropdown" style="">My Profile</button> -->
						<a href="#" class="text-danger" data-toggle="dropdown" style="font-size:16px;">My Profile</a>
						<div class="dropdown-menu">
							<a href="myaccountregistered.php" class="" style="text-align:center; color:#000; text-decoration-style:dotted; font-size:18px;"> <?php echo $_SESSION['activeuser'] ; ?> </a>
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
	
	<div class="col-md-2" id="twowheelnavigation">
		<div class="container-fluid">
			<nav class="">
				<li class="twowheel-item"><a href="twowheelerregistered.php" class="twowheel-link">Ducatti</a></li>
				<li class="twowheel-item"><a href="twowheelSregistered.php" class="twowheel-link">Suzuki</a></li>
				<li class="twowheel-item"><a href="twowheelYamaharegistered.php" class="twowheel-link" id="active">Yamaha</a></li>
			</nav>
		</div>
	</div>

	<div class="col-md-8">
		<div class="container-fluid">

			<div class="card">
				<div class="row">
					<div class="col-md">
						<div class="card-header">
							<img src="../../images/twowheeler/yamahaMT-09.png" id="twowheelercardimg">
						</div>
					</div>
					<div class="col-md">
						<div class="card-body">
							<h3 class="card-text">MT-09</h3>
						</div>
						<div class="card-footer">
							<p class="card-text">Weighing in at only 417 pounds, the 2021 MT-09's new engine, chassis and bodywork extensively incorporate weight-reducing technologies, to weigh in 8 pounds lighter than the former MT-09.</p>
							<br/>
							<button type="button" class="btn btn-outline-primary">
								<a href="twowheelyamahaMT-09registered.php" class="twowheelermoreinfo">More Info</a>
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
							<img src="../../images/twowheeler/yamahaYZF-R1a.png" id="twowheelercardimg">
						</div>
					</div>
					<div class="col-md">
						<div class="card-body">
							<h3 class="card-text">YZF-R1</h3>
						</div>
						<div class="card-footer">
							<p class="card-text">The R1® features a cable-less ride-by-wire Yamaha Chip Controlled Throttle (YCC-T®) system that transforms the rider’s inputs into motion, with a full suite of IMU-powered electronic rider aids that bring new meaning to the term "rider confidence."</p>
							<br/>
							<button type="button" class="btn btn-outline-primary">
								<a href="twowheelyamahaYZF-R1aregistered.php" class="twowheelermoreinfo">More Info</a>
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


</body>
</html>