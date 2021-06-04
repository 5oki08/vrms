<?php 

require '../../connection.php';
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


$_SESSION['hireQueried'] = "Hire Details Submitted. Kindly wait for approval." ;
$_SESSION['classTypeAccept'] = "success" ;
$_SESSION['hireDenied'] = "Hire Details Submission Failed." ;
$_SESSION['classTypeError'] = "danger" ;

$snameregistered = $selectedDrivetwoWheel = $numberOfdaysHired = $paymentMode = $mpesaCodeInput = '' ;
$snameregisteredErr = $selectedDrivetwoWheelErr = $numberOfdaysHiredErr = $paymentModeErr = $mpesaCodeInputErr = '' ;


if ( isset($_POST['hireSubmitdetails']) ) {

	if (empty($_POST['snameregistered'])) {
		$snameregisteredErr = "Last Name does not match" ;
	} else {
		$snameregistered = $_POST['snameregistered'] ;
	}
	if (empty($_POST['selectedDrivetwoWheel'])) {
		$selectedDrivetwoWheelErr = "no selected wheels" ;
	} else {
		$selectedDrivetwoWheel = $_POST['selectedDrivetwoWheel'] ;
	}
	if (empty($_POST['numberOfdaysHired'])) {
		$numberOfdaysHiredErr = "Input number of days to hire" ;
	} else {
		$numberOfdaysHired = $_POST['numberOfdaysHired'] ;
	}
	if (empty($_POST['paymentMode'])) {
		$paymentModeErr = "Select payment mode" ;
	} else {
		$paymentMode = $_POST['paymentMode'] ;
	}


	$hireSql = " SELECT * FROM selecteddrive WHERE snameregistered='$snameregistered' && selectedDrivetwoWheel='$selectedDrivetwoWheel' && numberOfdaysHired='$numberOfdaysHired' && paymentMode='$paymentMode' " ;
	$hireSqlresult = mysqli_query($conn,$hireSql) ;
	$hireSqlNum = mysqli_num_rows($hireSqlresult) ;

	if ( $hireSqlNum<=0 ) {
		
		if ( empty($snameregisteredErr) && empty($selectedDrivetwoWheelErr) && empty($numberOfdaysHiredErr) && empty($paymentModeErr) ) {
			$hireStmt = $conn->prepare(" INSERT INTO selecteddrive (snameregistered,selectedDrivetwoWheel,numberOfdaysHired,paymentMode) VALUES(?,?,?,?) ") ;
			$hireStmt->bind_param('ssss',$snameregistered,$selectedDrivetwoWheel,$numberOfdaysHired,$paymentMode) ;

			if ($hireStmt->execute() === TRUE ) {
				$_SESSION['hireQueried'] ;
				$_SESSION['activeuser'] ;
				$_SESSION['classTypeAccept'] ;
				header('location: twowheelyamahaMT-09registered.php?hireSubmitTrue') ;
			} else {
				$_SESSION['hireDenied'] ;
				$_SESSION['activeuser'] ;
				$_SESSION['classTypeError'] ;
				header('location: twowheelyamahaMT-09registered.php?hireSubmittedFail') ;
			}
		} else {
				$_SESSION['hireDenied'] ;
				$_SESSION['activeuser'] ;
				$_SESSION['classTypeError'] ;
				header('location: twowheelyamahaMT-09registered.php?hireSubmittedFail') ;
			}

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

		<p class="alert alert-<?php
			if ( isset($_GET['hireSubmitTrue']) ) {
						echo $_SESSION['classTypeAccept'] ;
						session_unset() ;
						session_destroy() ;
					}
			if ( isset($_GET['hireSubmittedFail']) ) {
						echo $_SESSION['classTypeError'] ;
						session_unset() ;
						session_destroy() ;
					}		
		?> " >
			<?php
				if ( isset($_GET['hireSubmitTrue']) ) {
					if ( isset($_SESSION['hireQueried']) ) {
						echo $_SESSION['hireQueried'] ;
						session_unset() ;
						session_destroy() ;
					} else { echo "Hire Details Submitted. Kindly wait for approval."; }
				}	
				if ( isset($_GET['hireSubmittedFail']) ) {
					if ( isset($_SESSION['hireDenied']) ) {
						echo $_SESSION['hireDenied'] ;
						session_unset() ;
						session_destroy() ;
					} else { echo "Hire Details Submission Failed."; }
				}
			?>
		</p>

		<div class="col-md-6">
			<p>A new cylinder head was created for both emissions and performance. It was given 12 percent less coolant volume for faster engine warm-up; most hydrocarbon emissions are created while an engine is still warming, while the fuel mixture must be rich and the exhaust catalyst isn’t yet up to temperature. For better performance, the new cooling passages completely encircle each exhaust valve seat, eliminating the potential hot spot between the valves. Intake ports were redesigned with reduced volume for faster flow, and the injectors were repositioned and re-aimed to hit the backs of the intake valve. All these changes lead to better fuel vaporization and mixing, improving both emissions and drivability. New camshafts have reduced timing, with 30 percent less overlap; there is now only a 20-degree period during which both intake and exhaust valves are open simultaneously. Shorter timing and less overlap generally favor emissions and torque over top-end performance, but the engineers gave the cams notably steeper ramps, so the curtain area under the whole lift curve stays relatively high. The new ramps are so steep that the entire cam drive had to be redesigned with a wider and stronger cam chain and an oil-pressure-powered cam-chain tensioner added. The tensioner provides more tension when the engine is spinning fast, when the cam chain is more likely to whip around, and less drag at lower rpm.</p> <br/>
			<p>The intake and exhaust systems also were retuned and redesigned. Three unequal-length runners poke up into the airbox, a design that delivers more torque, a smoother powerband, and a delightful intake note. The exhaust system is pieced together from stainless steel stampings with beautiful robotic welds that look as good as those on some high-end race pipes. It’s an all-new design that places the catalyst forward in the conical header portion of the pipe for quicker warming (emissions again) and tucks almost all the muffler under the engine for better mass centralization. The increased displacement and new engine tuning is claimed to increase torque by 6 percent while further broadening the band. Fuel economy is said to be 11 percent better than with the previous model.</p> <br/>
		</div>
	</div>
	<br/>
	
	<div class="row">
		<div class="col"></div>
		<div class="col">
			<div class="container-fluid">
				  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#hirebuttonregistered" class="hirebtnlinkguests">
				    Hire
				  </button>
				  <div class="modal" id="hirebuttonregistered">
				    <div class="modal-dialog">
				      <div class="modal-content">

				        <div class="modal-header">
				        	<h5>Hire Form</h5>
				          	<button type="button" class="close" data-dismiss="modal">&times;</button>
				        </div>

				        <div class="modal-body">
				          
				        	<form class="form" action="twowheelyamahaMT-09registered.php" method="post">
				        		<div class="form-group">
									<label for="snameregistered">Second Name</label>
									<input type="text" name="snameregistered" class="form-control" id="snameregistered">
								</div>

				        		<div class="form-group">
				        			<label for="selectedDrivetwoWheel">Selected Drive</label>
				        			<select name="selectedDrivetwoWheel" id="selectedDrivetwoWheel" class="form-control">
				        				<option></option>
				        				<option value="yamahaMT-09">Yamaha MT-09</option>
				        			</select>
				        			<span style="color:red;"> <?php echo $selectedDrivetwoWheelErr ; ?> </span>
				        		</div>

				        		<div class="form-group">
				        			<label for="numberOfdaysHired">Number of Days For Hire</label>
				        			<input type="number" name="numberOfdaysHired" id="numberOfdaysHired" class="form-control">
				        			<span style="color:red;"> <?php echo $numberOfdaysHiredErr ; ?> </span>
				        		</div>

				        		<div class="form-group">
				        			<label for="paymentMode">Mode of Payment</label>
				        			<select name="paymentMode" id="paymentMode" class="form-control" onchange="onchangeStatus()">
					        			<option></option>
					        			<option value="visa">VISA</option>
					        			<option value="mpesa">M-PESA</option>
					        			<br/>
<script type="text/javascript">
	function onchangeStatus() {
		var status = document.getElementById('paymentMode') ;
		if ( status.value == "mpesa" ) {
			document.getElementById('mpesaCodeInput').style.visibility = "visible" ;
		} else {
			document.getElementById('mpesaCodeInput').style.visibility = "hidden" ;
		}
	}
</script>
				        			</select>
				        			<span style="color:red;"> <?php echo $numberOfdaysHiredErr ; ?> </span>
				        			<br/>
					        		<input type="text" name="mpesaCodeInput" id="mpesaCodeInput" class="form-control" placeholder="Enter MPesa Code for verification">
				        		</div>

				        		<div class="row">
						          	<div class="col">
						          		<input type="submit" name="hireSubmitdetails" class="form-control btn btn-outline-success" id="hireSubmitdetails" value="Submit Hire Details">
						          	</div>
						          	<div class="col">
						          		<button type="button" class="" data-dismiss="modal" style="border:none;">
						          			<input type="reset" name="reset" class="form-control btn btn-outline-danger" id="reset" value="Close">
						          		</button>
						          	</div>
						        </div>  	

				        	</form>
							
				        </div>

				        <div class="modal-footer"></div>

				      </div>
				    </div>
				  </div>
				  
				</div>
			</div>
		</div>
		<div class="col"></div>
	</div>


</div>


</body>
</html>