<?php

session_start() ;
require '../../connection.php' ;

$_SESSION['passUpdateComplete'] = "Password Reset Complete. The new credentials can now be used to login" ;
$_SESSION['classTypeAccept'] = "success" ;
$_SESSION['invalidCred'] = "Provide the phone number associated with your account" ;
$_SESSION['classTypeError'] = "danger" ;

$userresetphone = $userNewpassword = $encryptuserNewpassword = '' ;
$userresetphoneErr = $userNewpasswordErr = '' ;


if ( isset($_POST['newpasswordSubmit']) ) {
	if ( empty($_POST['userresetphone']) ) {
		$userresetphoneErr = "Invalid phone number" ;
	} else {
		$userresetphone = $_POST['userresetphone'] ;
	}
	if ( empty($_POST['userNewpassword']) ) {
		$userNewpasswordErr = "Input New Password" ;
	} else {
		$userNewpassword = $_POST['userNewpassword'] ;
		 $encryptuserNewpassword = md5($userNewpassword) ;
	}

	if ( empty($userresetphoneErr) && empty($userNewpasswordErr) ) {
		$resetpassSql = " UPDATE users SET userPassword='$encryptuserNewpassword' WHERE userPhone='$userresetphone' " ;

		$resultresetpass = mysqli_query($conn,$resetpassSql) ;

		if ( $resultresetpass ) {
			$_SESSION['passUpdateComplete'] ;
			$_SESSION['classTypeAccept'] ;
			header('location: homeguests.php?passResetAccept') ;
		} else {
		// echo "Invalid Details";
		$_SESSION['invalidCred'] ;
		$_SESSION['classTypeError'] ;
		header('location: resetpassword.php?passresetfalseinvalidcred') ;
	}
	}
	

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>VRMS-resetPassword</title>
<meta charset="utf-8">	
<meta name="viewport" content="width=device-width, initial-scale=1">	
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<link rel="stylesheet" type="text/css" href="../../css/style.css">
<link rel="stylesheet" type="text/css" href="../../css/styleresponsive.css">	
</head>
<body>

<div class="container-fluid" id="guestsnav">
	<nav class="nav nav-expand">
		<div class="navbar-header">
	      <a class="navbar-brand" href="homeguests.php">VRSM</a>
	    </div>
		<li class="nav-item"><a href="homeguests.php" class="nav-link">Home</a></li>
		<li class="nav-item"><a href="loginregisterguests.php" id="active" class="nav-link">Login/Register</a></li>
	</nav>
</div>
<br/>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<div class="container-fluid">
				<p class="alert alert-<?php
					if ( isset($_GET['passUpdateComplete']) ) {
							echo $_SESSION['classTypeAccept'] ;
							session_unset() ;
							session_destroy() ;
						}
						if ( isset($_GET['passresetfalseinvalidcred']) ) {
							echo $_SESSION['classTypeError'] ;
							session_unset() ;
							session_destroy() ;
						}
				?> "><?php
					if ( isset($_GET['passResetAccept']) ) {
						if ( isset($_SESSION['passUpdateComplete']) ) {
							echo $_SESSION['passUpdateComplete'] ;
							session_unset() ;
							session_destroy() ;
						} else {
							echo "Password Reset Complete. The new credentials can now be used to login";
						}
					}
					if ( isset($_GET['passresetfalseinvalidcred']) ) {
						if ( isset($_SESSION['invalidCred']) ) {
							echo $_SESSION['invalidCred'] ;
							session_unset() ;
							session_destroy() ;
						} else {
							echo "Provide the phone number associated with your account";
						}
					}
				?></p>
				<form class="form" action="resetpassword.php" method="post">
					<div class="form-group">
						<label for="userresetphone">Enter Phone Number</label>
						<input type="phone" name="userresetphone" id="userresetphone" class="form-control" style="width:60%;" maxlength="10" minlength="10">
					</div>
					<div class="form-group">
						<label for="userNewpassword">Enter New Password</label>
						<input type="password" name="userNewpassword" id="userNewpassword" class="form-control" style="width:60%;" onkeyup="newpasscheck()">
					</div>
					<div class="form-group">
						<label for="userConfirmnewpassword">Confirm Password</label>
						<input type="password" name="userConfirmnewpassword" id="userConfirmnewpassword" class="form-control" style="width:60%;" onkeyup="newpasscheck()">
						<span id="usernewpasswordmsg"></span>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-md">
								<input type="submit" name="newpasswordSubmit" class="form-control btn btn-success" id="newpasswordSubmit" value="New Password Submit">
							</div>
							<div class="col-md">
								<input type="reset" name="reset" class="form-control reset btn btn-outline-danger" id="reset" style="color:#000;">
							</div>
						</div>
					</div>
				</form>
				<p> Log In <a href="homeguests.php">here</a></p>

			</div>
		</div>
		<div class="col-md-3"></div>
	</div>
</div>


<script type="text/javascript">
	function newpasscheck() {
		if ( document.getElementById('userNewpassword').value===document.getElementById('userConfirmnewpassword').value ) {
			document.getElementById('usernewpasswordmsg').style.color = "green" ;
			document.getElementById('usernewpasswordmsg').innerHTML = "password match";
			document.getElementById('newpasswordSubmit').disabled = false ;
		} else {
			document.getElementById('usernewpasswordmsg').style.color = "red" ;
			document.getElementById('usernewpasswordmsg').innerHTML = "password mismatch";
			document.getElementById('newpasswordSubmit').disabled = true ;
		}
	}
</script>

</body>
</html>