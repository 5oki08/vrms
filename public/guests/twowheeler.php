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
				<li class="twowheel-item"><a href="twowheeler.php" class="twowheel-link" id="active">Ducatti</a></li>
				<li class="twowheel-item"><a href="twowheelS.php" class="twowheel-link">Suzuki</a></li>
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
							<img src="../../images/twowheeler/ducattiSfV4.jpg" id="twowheelercardimg">
						</div>
					</div>
					<div class="col-md">
						<div class="card-body">
							<h3 class="card-text">Ducatti SfV4</h3>
						</div>
						<div class="card-footer">
							<p class="card-text">The modern and technological Ducati naked bike has immediately enjoyed great success among motorcyclists all over the world, also confirmed by the positive feedback from the international media.</p>
							<br/>
							<button type="button" class="btn btn-outline-primary">
								<a href="twowheelDucatti.php" class="twowheelermoreinfo">More Info</a>
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
							<img src="../../images/twowheeler/ducatti1100.jpg" id="twowheelercardimg">
						</div>
					</div>
					<div class="col-md">
						<div class="card-body">
							<h3 class="card-text">Ducatti 1100</h3>
						</div>
						<div class="card-footer">
							<p class="card-text">Ride bigger, ride better. With the Ducati Scrambler 1100, the Land of Joy greets the most demanding and expert motorcyclists, to offer fun, style and freedom in an upgraded and uncompromised fashion.</p>
							<br/>
							<button type="button" class="btn btn-outline-primary">
								<a href="twowheelDucatti1100.php" class="twowheelermoreinfo">More Info</a>
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