<?php
session_start() ;
require '../../connection.php' ;

$_SESSION['userAccept'] = "Successful Registration. You can now login with the details." ;
$_SESSION['classTypeAccept'] = "success" ;
$_SESSION['userFail'] = "Registration Failed. Check input details then try again." ;
$_SESSION['userDup'] = "A user with the same details has already registered. Try again with different details." ;
$_SESSION['classTypeError'] = "danger" ;

$fname = $sname = $userLocation = $yob = $userPhone = $userGender = $userPassword = $userEncryptPassword = '' ;
$fnameErr = $snameErr = $userLocationErr = $yobErr = $userPhoneErr = $userGenderErr = $userPasswordErr = '' ;

if ( isset($_POST['detailsSubmit']) ) {

	if ( empty($_POST['fname']) ) {
		$fnameErr = "Enter First Name" ;
	} else {
		$fname = $_POST['fname'] ;
	}
	if ( empty($_POST['sname']) ) {
		$snameErr = "Enter Second Name" ; 
	} else {
		$sname = $_POST['sname'] ;
	}
	if ( empty($_POST['userLocation']) ) {
		$userLocationErr = "Provide Location" ;
	} else {
		$userLocation = $_POST['userLocation'] ;
	}
	if ( empty($_POST['yob']) ) {
		$yobErr = "DOB details cannot be empty" ;
	} else {
		$yob = $_POST['yob'] ;
	}
	if ( empty($_POST['userPhone']) ) {
		$userPhoneErr = "Input Phone Number" ;
	} else {
		$userPhone = $_POST['userPhone'] ;
	} 
	if ( empty($_POST['userGender']) ) {
		$userGenderErr = "Select Gender" ;
	} else {
		$userGender = $_POST['userGender'] ;
	}
	if ( empty($_POST['userPassword']) ) {
		$userPasswordErr = "Choose and input Password" ;
	} else {
		$userPassword = $_POST['userPassword'] ;
		$userEncryptPassword = md5($userPassword) ;
	}

$insSql = " SELECT * FROM users WHERE fName='$fname' &&  sName='$sname' && userLocation='$userLocation' && userGender='$userGender' && userAge='$yob' && userPhone='$userPhone' && userPassword='$userPassword' " ;
$insResult = mysqli_query($conn,$insSql) ;
$insNums = mysqli_num_rows($insResult) ;

if ( $insNums>=1 ) {
	$_SESSION['userDup'] ;
	header('location: loginregisterguests.php?userdetailsdup') ;
} else {
	if ( empty($fnameErr) && empty($snameErr) && empty($userLocationErr) && empty($yobErr) && empty($userPhoneErr) && empty($userGenderErr) && empty($userPasswordErr) ) {
		$insStmt = $conn->prepare(" INSERT INTO users (fName,sName,userLocation,userGender,userAge,userPhone,userPassword) VALUES (?,?,?,?,?,?,?) ") ;
		$insStmt->bind_param("sssssss",$fname,$sname,$userLocation,$userGender,$yob,$userPhone,$userEncryptPassword) ;
		if ( $insStmt->execute() === TRUE ) {
			$_SESSION['userAccept'] ;
			$_SESSION['classTypeAccept'] ;
			header('location: login.php?userdetailsaccepted') ;
		} else {
			$_SESSION['userFail'] ;
			$_SESSION['classTypeError'] ;
			header('location: loginregisterguests.php?userdetailsfail');
		}
	} else {
		$_SESSION['userFail'] ;
		$_SESSION['classTypeError'] ;
		header('location: loginregisterguests.php?userdetailsfail');
	}
}

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>VRMS-GuestRegister</title>
<meta charset="utf-8">	
<meta name="viewport" content="width=device-width, initial-scale=1">	
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<link rel="stylesheet" type="text/css" href="../../css/style.css">
<link rel="stylesheet" type="text/css" href="../../css/styleresponsive.css">

<style type="text/css">
	span {font-size:12px; color:red; font-style:italic; font-weight:700;}
</style>

</head>
<body>

<div class="container-fluid" id="guestsnav">
	<nav class="nav nav-expand">
		<div class="navbar-header">
	      <a class="navbar-brand" href="homeguests.php">VRSM</a>
	    </div>
		<li class="nav-item"><a href="homeguests.php" class="nav-link">Home</a></li>
		<li class="nav-item"><a href="#" class="nav-link">About Us</a></li>
		<li class="nav-item"><a href="#" class="nav-link">Vehicle</a></li>
		<li class="nav-item"><a href="#" class="nav-link">Contact Us</a></li>
		<li class="nav-item"><a href="loginregisterguests.php" id="active" class="nav-link">Login/Register</a></li>
	</nav>
</div>
<br/>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<div class="jumbotron">
				<p>Already have an account? Log In <a href="login.php">here</a></p>
				<p style="text-align:center;">Thank you for choosing us as your sole vehicle dealership. We offer free membership, where you can register with the form below, and enjoy unlimited promotional offers.</p>
				<p class="alert alert-<?php
					if (isset($_GET['userdetailsaccepted'])) {
							echo $_SESSION['classTypeAccept'] ;
							session_unset();
							session_destroy();
						}
					if (isset($_GET['userdetailsfail'])) {
							echo $_SESSION['classTypeError'] ;
							session_unset();
							session_destroy();
						}
					if (isset($_GET['userdetailsdup'])) {
							echo $_SESSION['classTypeError'] ;
							session_unset();
							session_destroy();
						}		
				?>">
					<?php
						if ( isset($_GET['userdetailsaccepted']) ) {
							if (isset($_SESSION['userAccept'])) {
								echo $_SESSION['userAccept'] ;
								session_unset() ;
								session_destory() ;
							} else {
								echo "Successful Registration. You can now login with the details.";
							}
						}
						if ( isset($_GET['userdetailsfail']) ) {
							if (isset($_SESSION['userFail'])) {
								echo $_SESSION['userFail'] ;
								session_unset() ;
								session_destory() ;
							} else {
								echo "Registration Failed. Check input details then try again.";
							}
						}
						if ( isset($_GET['userdetailsdup']) ) {
							if (isset($_SESSION['userDup'])) {
								echo $_SESSION['userDup'] ;
								session_unset() ;
								session_destory() ;
							} else {
								echo "A user with the same details has already registered. Try again with different details.";
							}
						}
					?>
				</p>
			</div>
			<form class="form" action="loginregisterguests.php" method="post">
				<div class="row">
					<div class="col-md">
						<div class="form-group">
							<label for="fname">First Name<sup style="color:red;">*</sup></label>
							<input type="text" name="fname" class="form-control" id="fname">
							<span> <?php echo $fnameErr; ?> </span>
						</div>
					</div>
					<div class="col-md">
						<div class="form-group">
							<label for="sname">Second Name<sup style="color:red;">*</sup></label>
							<input type="text" name="sname" class="form-control" id="sname">
							<span> <?php echo $snameErr; ?> </span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="userLocation">User Location<sup style="color:red;">*</sup></label>
					<input type="text" name="userLocation" class="form-control" style="width:60%;" id="userLocation">
					<span> <?php echo $userLocationErr; ?> </span>
				</div>
				<div class="form-group">
					<label for="yob">Input DOB (format: dd/mm/yyyy)</label>
					<input type="phone" name="yob" class="form-control" max-length="8" minlength="8" style="width:60%;">
					<span> <?php echo $yobErr; ?> </span>
				</div>
				<div class="form-group">
					<label for="userPhone">Input Phone Number<sup style="color:red;">*</sup></label>
					<input type="phone" name="userPhone" class="form-control" max-length="10" style="width:60%;" id="userPhone">
					<span> <?php echo $userPhoneErr; ?> </span>
				</div>
				<div class="form-group">
					<label for="userGender">Select Gender<sup style="color:red;">*</sup></label>
					<select name="userGender" class="form-control"  style="width:60%;" id="userGender">
						<option></option><option value="male">Male</option><option value="female">Female</option>
					</select>
					<span> <?php echo $userGenderErr; ?> </span>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col">
							<label for="userPassword">Password<sup style="color:red;">*</sup></label>
							<input type="password" name="userPassword" class="form-control" id="userPassword" onkeyup="passcheck();">
						</div>
						<div class="col">
							<label for="conPassword">Confirm Password</label>
							<input type="password" name="conPassword" class="form-control" id="conPassword" onkeyup="passcheck();">
							<span id="passcheckmsg"></span>
						</div>
					</div>
					<span> <?php echo $userPasswordErr; ?> </span>
				</div>
				<br/>
				<div class="row">
					<div class="col-md">
						<input type="submit" name="detailsSubmit" class="form-control btn btn-success" id="detailsSubmit" value="Submit Details" style="width:40%;">
					</div>
					<div class="col-md">
						<input type="reset" name="reset" class="form-control reset" id="reset" style="width:40%; border:none; text-decoration:underline;">
					</div>
				</div>
			</form>
		</div>
		<div class="col-md-2"></div>
	</div>
</div>


<script type="text/javascript">
	function passcheck() {
		if ( document.getElementById('userPassword').value === document.getElementById('conPassword').value ) {
			document.getElementById('passcheckmsg').style.color="green";
			document.getElementById('passcheckmsg').innerHTML = "password match" ;
			document.getElementById('detailsSubmit').disabled = false ;
		} else {
			document.getElementById('passcheckmsg').style.color="red";
			document.getElementById('passcheckmsg').innerHTML = "password mismatch" ;
			document.getElementById('detailsSubmit').disabled = true ;
		}
	} ;
</script>
</body>
</html>