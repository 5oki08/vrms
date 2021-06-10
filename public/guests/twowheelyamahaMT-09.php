<!DOCTYPE html>
<html lang="en">
<head>
	<title>VRMS-twoWheeler</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<link rel="stylesheet" type="text/css" href="../../css/style.css">
<link rel="stylesheet" type="text/css" href="../../css/styleresponsive.css">	

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


#hirebtnlinkguests { padding: 10px; width: 20%; }
#hirebtnlinkguests:hover { color: #000; background-color: #fff; font-weight: 600; }
#detailedTwowheelerimg { width:350px; height:260px;	}


@media only screen and (max-width: 600px) {
  
.heading1subj { display: block; margin-top: 3px; margin-bottom: 3px; }
.navbar-toggle { float: right; }
.carousel-inner img { width: 400; height: 270; }
#footerSec1 { margin-bottom: 30px; }
#footerSec2 { margin-bottom: 30px; }
#footerSec3 {}

#twowheelnavigation { border: none; }


#hirebtnlinkguests { padding: 10px; width: 50%; }
#hirebtnlinkguests:hover { color: #000; background-color: #fff; font-weight: 600; }


}	


</style>

</head>
<body>

<header id="mainheader1" class="">
	<ul id="heading1">
		<li class="heading1subj" >3<sup style="color:#000;">rd</sup> Street, CBD, Nairobi, Kenya </li>
		<li class="heading1subj" > <img src="../../images/phonecall.png" alt="" width="20px" height="20px"> +254 700 000 000 </li>
		<li class="heading1subj" > <img src="../../images/contacticons/email/gmailemail.png" class="img-fluid" alt="" width="20px" height="20px"> 614rollingstone@gmail.com </li>
		<li class="heading1subj" > <a href="adminlogin.php">ADMIN login here</a> </li>
		<hr style="width:50%;" />
	</ul>
	<h4 class="text-center text-uppercase" style="letter-spacing:5px;">Vehicle Rental Management System</h4>
	<nav class="navbar navbar-inverse navbar-info bg-info border border-0">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="#"></a>
	    </div>
	    <div class="collapse navbar-collapse" id="myNavbar">
	      <ul class="nav navbar-nav navbar-expand-md align-content-start">
	        <li> <a href="homeguests.php" class="text-dark">Home</a> </li>
	        <li> <a href="aboutguests.php" class="text-dark">About Us</a> </li>
	        <li class="dropdown">
			 	<a href="twowheeler.php" class="text-dark dropdown-toggle active bg-light font-weight-bold" data-toggle="dropdown">Two Wheeler Vehicles</a>
			 	<div class="dropdown-menu">
			      <a class="dropdown-item h4 text-center" href="twowheeler.php">Ducatti</a>
			      <a class="dropdown-item h4 text-center" href="twowheelS.php">Suzuki</a>
			      <a class="dropdown-item h4 text-center" href="twowheelYamaha.php">Yamaha</a>
			    </div>
			 </li>
	        <li class="dropdown">
			 	<a href="fourwheeler.php" class="text-dark dropdown-toggle" data-toggle="dropdown">Four Wheeler Vehicles</a>
			 	<div class="dropdown-menu">
			      <a class="dropdown-item h4 text-center" href="fourwheeler.php">Aston Martin</a>
			      <a class="dropdown-item h4 text-center" href="fourwheelMitsubishi.php">Mitsubishi</a>
			      <a class="dropdown-item h4 text-center" href="fourwheelJeep.php">Jeep</a>
			    </div>
			 </li>
	      </ul>
	      <ul class="nav navbar-nav navbar-right navbar-expand-md">
	        <img src="../../images/vrmslogo.png" alt="Logo" width="80" height="80">
	      </ul>
	    </div>
	  </div>
	</nav>

</header>

<br/>

<div class="container-fluid">
	
	<div class="row">
		<div class="col-md-1"></div>

		<div class="col-md-4">
			<div class="container-fluid">
				<div class="" style="max-width:500px">
				  <img class="yamahatwowheeler" src="../../images/twowheeler/yamahaMT-09b.jpg" id="detailedTwowheelerimg">
				  <img class="yamahatwowheeler" src="../../images/twowheeler/yamahaMT-09a.jpg" id="detailedTwowheelerimg">
				  <img class="yamahatwowheeler" src="../../images/twowheeler/yamahaMT-09.png" id="detailedTwowheelerimg">
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
			<kbd class="h2 text-light" style="padding: 10px; border-radius: 5px;">yamahaMT-09</kbd><br/><br/>
			<p>A new cylinder head was created for both emissions and performance. It was given 12 percent less coolant volume for faster engine warm-up; most hydrocarbon emissions are created while an engine is still warming, while the fuel mixture must be rich and the exhaust catalyst isn’t yet up to temperature. For better performance, the new cooling passages completely encircle each exhaust valve seat, eliminating the potential hot spot between the valves. Intake ports were redesigned with reduced volume for faster flow, and the injectors were repositioned and re-aimed to hit the backs of the intake valve. All these changes lead to better fuel vaporization and mixing, improving both emissions and drivability. New camshafts have reduced timing, with 30 percent less overlap; there is now only a 20-degree period during which both intake and exhaust valves are open simultaneously. Shorter timing and less overlap generally favor emissions and torque over top-end performance, but the engineers gave the cams notably steeper ramps, so the curtain area under the whole lift curve stays relatively high. The new ramps are so steep that the entire cam drive had to be redesigned with a wider and stronger cam chain and an oil-pressure-powered cam-chain tensioner added. The tensioner provides more tension when the engine is spinning fast, when the cam chain is more likely to whip around, and less drag at lower rpm.</p> <br/>
			<p>The intake and exhaust systems also were retuned and redesigned. Three unequal-length runners poke up into the airbox, a design that delivers more torque, a smoother powerband, and a delightful intake note. The exhaust system is pieced together from stainless steel stampings with beautiful robotic welds that look as good as those on some high-end race pipes. It’s an all-new design that places the catalyst forward in the conical header portion of the pipe for quicker warming (emissions again) and tucks almost all the muffler under the engine for better mass centralization. The increased displacement and new engine tuning is claimed to increase torque by 6 percent while further broadening the band. Fuel economy is said to be 11 percent better than with the previous model.</p> <br/>
		</div>
	</div>
	<br/>
	
	<div class="row">
		<div class="col"></div>
		<div class="col">
			<div class="container-fluid">
				  <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#hirebuttonguests" id="hirebtnlinkguests">
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
				          <button class="btn btn-danger btn-lg" data-dismiss="modal">Close</button>
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