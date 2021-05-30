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
	
	<div class="row">
		<div class="col-md-1"></div>

		<div class="col-md-4">
			<div class="container-fluid">
				<div class="" style="max-width:500px">
				  <img class="ducattitwowheeler" src="../../images/twowheeler/ducattiSfV4.jpg" id="detailedTwowheelerimg">
				  <img class="ducattitwowheeler" src="../../images/twowheeler/ducattiSfV4b.jpg" id="detailedTwowheelerimg">
				  <img class="ducattitwowheeler" src="../../images/twowheeler/ducattiSfV4c.jpg" id="detailedTwowheelerimg">
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
			<div class="container-fluid">
				<p>For 2021 Ducati presents the Streetfighter V4 S in a new Dark Stealth colour scheme, which joins the sporty Ducati Red. Furthermore, all models in the Ducati Streetfighter V4 range become compliant with the Euro 5 anti-pollution legislation (Only for Markets where EU 5 is applied). </p> <br/>
				<p>The bike not only appeals to my sport bike loving temperament, but it also marks the return of Ducati back to one of its more core elements – the sport bike category.</p> <br/>
				<p>It is not enough that one can build a radical and raw machine, and then expect to get noticed in the current “super-naked” segment. While the Streetfighter 1098 has an obvious place in my heart, I can tell you that it is also a machine with many flaws.</p> <br/>
				<p>In 2020, there is no shortage of super-nakeds with attitude, and the bar they set is very, very high. Some of the best motorcycles in the industry are in this category, which means coming out with a follow-up to the Streetfighter 1098, so many years later than its original debut, is a daunting task.</p> <br/>
				<p>With 205hp (153 kW) and 90 lbs•ft (123 Nm) of torque on tap, along with a red line that pushes past the 14,000 rpm mark, on paper the Streetfighter V4 seems like a horrible idea for Ducati to turn into a street bike. And yet, what you realize within the first miles of riding the machine is that this is not the case.</p> <br/>
				<p>New front brake pumps and a self-purging clutch have also been introduced, both originating from those used for the first time on the Superleggera V4. </p>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col"></div>
		<div class="col">
			<div class="container-fluid">
				  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#hirebuttonguests" class="hirebtnlinkguests">
				    Hire
				  </button>
				  <div class="modal" id="hirebuttonguests">
				    <div class="modal-dialog">
				      <div class="modal-content">
				        <div class="modal-header">
				          <button type="button" class="close" data-dismiss="modal">&times;</button>
				        </div>
				        <div class="modal-body" style="text-align:center;">
				          You must login  to hire. <br/> <br/>

				          <p>Have an account? Log in <a href="homeguests.php" class="">here</a> </p> <br/>
				          <p> <a href="loginregisterguests.php" class="">Create an account</a> </p>

				        </div>
				        <div class="modal-footer">
				          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				        </div>
				      </div>
				    </div>
				  </div>
				  
				</div>
			</div>
		</div>
		<div class="col"></div>
	</div>

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