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
					<li class="nav-item"><a href="contact.php" class="nav-link">Contact Us</a></li>
					<li class="nav-item"><a href="mybookingregistered.php" class="nav-link">My Booking</a></li>
					<li class="nav-item"><a href="myaccountregistered.php" class="nav-link">My Account</a></li>
					<li class="nav-item"><a href="logoutregistered.php" class="nav-link">Log Out</a></li>
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
				  <img class="ducattitwowheeler" src="../../images/twowheeler/suzukiHayabusaA.png" id="detailedTwowheelerimg">
				  <img class="ducattitwowheeler" src="../../images/twowheeler/suzukiHayabusaB.png" id="detailedTwowheelerimg">
				  <img class="ducattitwowheeler" src="../../images/twowheeler/suzukiHayabusaC.png" id="detailedTwowheelerimg">
				</div>
<script>
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("ducattitwowheeler");
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
			<p>The Hayabusa remains instantly recognizable as its restyled, wind-cheating body retains the cues that were inspired by the peregrine falcon – the world’s fastest animal. To bring a sophisticated appearance to the iconic Hayabusa, Suzuki’s design team incorporated distinct lines and shapes to achieve an expression of refinement and ultimate performance.</p> <br/>
			<p>Suzuki didn’t want to kill the Busa in 2018, but in Europe its hand was forced by emissions rules. The last generation of the bike was only certified to Euro3 standards, and since Euro4 was brought in in 2016 it had been living on borrowed time, accounting for Suzuki’s quota of ‘end-of-series’ models permitted to remain on sale for up to two years after the introduction of the rules. With no Euro4 model forthcoming when that time was up, the bike had to be withdrawn from sale.</p> <br/>
			<p>Having considered various options including a six-cylinder engine, a larger-capacity four and even a turbo version of the bike, Suzuki instead opted to keep the same 1340cc four-cylinder engine with design roots in the original 1999 model, and to use the same 81mm bore and 65mm stroke that was introduced in 2008. Forced to comply with Euro5 rules, a drop in power was almost inevitable. Torque, which previously peaked at 113.6lbft at 7200rpm, now tops out at 110.6lbft at 7000rpm.</p> <br/>
			<p>The changes mean that despite lower peaks for power and torque, Suzuki claims the new bike is quicker than ever before. The 2021 model is claimed to reach 62mph from standstill in 3.2 seconds, 0.2 seconds faster than the 2nd gen bike and 0.1 second quicker than the original model. The 0-200 metre time is also down to 6.8 seconds (6.9s for the 2nd gen, 7.1s for the 1st gen bike). On the downside, it drinks a bit more heavily than before, managing 42.1mpg where the 2nd gen achieved 49.7mpg. But then again, if that’s a concern you’re probably more likely to buy a Honda Cub than a Suzuki Hayabusa.</p> <br/>
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