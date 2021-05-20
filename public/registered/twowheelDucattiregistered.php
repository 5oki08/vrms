<?php

require '../../connection.php' ;
// require '../guests/login.php' ;
session_start() ;

$snameregistered = '' ;

$fetchSql = " SELECT * FROM users WHERE sName='$snameregistered' " ;
$fetchResult = mysqli_query($conn,$fetchSql) or die( mysqli_error() ) ;


while ( $row = mysqli_fetch_array($fetchResult) ) {
	$snameregistered = $row['sName'] ;
}

$_SESSION['activeuser'] = $snameregistered ;

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

	if ( empty($snameregisteredErr) && empty($selectedDrivetwoWheelErr) && empty($numberOfdaysHiredErr) && empty($paymentModeErr) ) {
		$hireStmt = $conn->prepare(" INSERT INTO selecteddrive (snameregistered,selectedDrivetwoWheel,numberOfdaysHired,paymentMode) VALUES(?,?,?,?) ") ;
		$hireStmt->bind_param('ssss',$snameregistered,$selectedDrivetwoWheel,$numberOfdaysHired,$paymentMode) ;

		if ($hireStmt->execute() === TRUE ) {
			$_SESSION['hireQueried'] ;
			$_SESSION['classTypeAccept'] ;
			header('location: twowheelDucattiregistered.php?hireSubmitTrue') ;
		} else {
			$_SESSION['hireDenied'] ;
			$_SESSION['classTypeError'] ;
			header('location: twowheelDucattiregistered.php?hireSubmittedFail') ;
		}
	} else {
			$_SESSION['hireDenied'] ;
			$_SESSION['classTypeError'] ;
			header('location: twowheelDucattiregistered.php?hireSubmittedFail') ;
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
				<p style="font-weight:800;"> <?php echo "Welcome" , " ", $_SESSION['activeuser']  ; ?> </p>
			</div>
		</div>
	</div> 
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<nav class="nav nav-expand">
					<li class="nav-item"><a href="homeregistered.php" class="nav-link">Home</a></li>
					<li class="nav-item"><a href="aboutregistered.php" class="nav-link"  >About Us</a></li>
					<div class="dropdown" id="active">
						<button type="" class="dropdown-toggle nav-link" data-toggle="dropdown" style="border:none; background-color:#efa12b;">Vehicles</button>
						<div class="dropdown-menu">
							<a href="twowheeler.php" class="dropdown-item">TWO WHEELER VEHICLES</a>
							<a href="fourwheeler.php" class="dropdown-item">FOUR WHEELER VEHICLES</a>
						</div>
					</div>	
					<li class="nav-item"><a href="contactregistered.php" class="nav-link">Contact Us</a></li>
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
			<div class="container-fluid">
				<p>For 2021 Ducati presents the Streetfighter V4 S in a new Dark Stealth colour scheme, which joins the sporty Ducati Red. Furthermore, all models in the Ducati Streetfighter V4 range become compliant with the Euro 5 anti-pollution legislation (Only for Markets where EU 5 is applied). </p> <br/>
				<p>The bike not only appeals to my sport bike loving temperament, but it also marks the return of Ducati back to one of its more core elements – the sport bike category.</p> <br/>
				<p>It is not enough that one can build a radical and raw machine, and then expect to get noticed in the current “super-naked” segment. While the Streetfighter 1098 has an obvious place in my heart, I can tell you that it is also a machine with many flaws.</p> <br/>
				<p>In 2020, there is no shortage of super-nakeds with attitude, and the bar they set is very, very high. Some of the best motorcycles in the industry are in this category, which means coming out with a follow-up to the Streetfighter 1098, so many years later than its original debut, is a daunting task.</p> <br/>
				<p>With 205hp (153 kW) and 90 lbs•ft (123 Nm) of torque on tap, along with a red line that pushes past the 14,000 rpm mark, on paper the Streetfighter V4 seems like a horrible idea for Ducati to turn into a street bike. And yet, what you realize within the first miles of riding the machine is that this is not the case.</p> <br/>
				<p>New front brake pumps and a self-purging clutch have also been introduced, both originating from those used for the first time on the Superleggera V4. </p>
				<div class="container">
					<p>Hire Price : KES1897/Day</p>
				</div>
			</div>
		</div>
	</div>

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
				          
				        	<form class="form" action="twowheelDucattiregistered.php" method="post">
				        		<div class="form-group">
									<label for="snameregistered">Second Name</label>
									<input type="text" name="snameregistered" class="form-control" id="snameregistered">			
									<span style="color:red;"> <?php echo $snameregisteredErr ; ?> </span>	
								</div>

				        		<div class="form-group">
				        			<label for="selectedDrivetwoWheel">Selected Drive</label>
				        			<select name="selectedDrivetwoWheel" id="selectedDrivetwoWheel" class="form-control">
				        				<option></option>
				        				<option value="ducattiSfv4">Ducatti Sfv4</option>
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

				        <div class="modal-footer">
				          <!-- <div class="row">
				          	<div class="col">
				          		<input type="submit" name="hireSubmitdetails" class="form-control btn btn-outline-success" id="hireSubmitdetails" value="Submit Hire Details">
				          	</div>
				          	<div class="col">
				          		<button type="button" class="" data-dismiss="modal" style="border:none;">
				          			<input type="reset" name="reset" class="form-control btn btn-outline-danger" id="reset" value="Close">
				          		</button>
				          	</div> 
				          </div>	-->
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


</body>
</html>