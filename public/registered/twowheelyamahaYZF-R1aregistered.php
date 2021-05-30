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

	#detailedTwowheelerimg {
		width:350px;
		height:260px;
	}
	.figcaption {
		text-align: right;
		margin-top: 5px;
	}
	#hirebutton {
		width: 50%;
	}
	.hirebtnlink {
		color: #000;
	}
	.hirebtnlink:hover {
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
				<button type="button" class="btn btn-outline-success" id="hirebutton">
					<a href="#" class="hirebtnlink">Hire </a>
				</button>
			</div>
		</div>
		<div class="col"></div>
	</div>

</div>


</body>
</html>