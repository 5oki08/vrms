<?php 

require '../../connection.php' ;

$userloginphone = $userloginpassword = $userloginencryptpassword = '' ;
$userloginphoneErr = $userloginpasswordErr = $userloginencryptpassword = '' ;

if ( isset($_POST['loginSubmit']) ) {
	if ( empty($_POST['userloginphone']) ) {
		$userloginphoneErr = "Incorrect Phone Details" ;
	} else {
		$userloginphone = $_POST['userloginphone'] ;
	}
	if ( empty($_POST['userloginpassword']) ) {
		$userloginpasswordErr = "Incorrect Password" ;
	} else {
		$userloginpassword = $_POST['userloginpassword'] ;
	}

	$loginSql = " SELECT * FROM users WHERE userPhone='$userloginphone' && userPassword='".md5($userloginpassword)."' " ;
	$loginResult = mysqli_query($conn,$loginSql) ;
	$loginNum = mysqli_num_rows($loginResult) ;

	if ( $loginNum == 1 ) {
		if ( empty($userloginphone) && empty($userloginpassword) ) {
			$_SESSION['activeuser'] ;
			header(string) ;
		} else {
			
		}
	}


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>VRMS-LogIN</title>
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
		<li class="nav-item"><a href="#" class="nav-link">About Us</a></li>
		<li class="nav-item"><a href="#" class="nav-link">Vehicle</a></li>
		<li class="nav-item"><a href="#" class="nav-link">Contact Us</a></li>
		<li class="nav-item"><a href="loginregisterguests.php" id="active" class="nav-link">Login/Register</a></li>
	</nav>
</div>
<br/>


<div class="container-fluid">
	<div class="jumbotron" id="loginjumbo">
		<div class="row">
			<div class="col-md" style="background-image:url(../../images/vrmslogo.png);">
				<br/>
			</div>
			<div class="col-md">
				<form class="form" method="post" action="login.php">
					<div class="form-group">
						<label for="userloginphone">Enter Phone Number</label>
						<input type="phone" name="userloginphone" class="form-control" maxlength="10" minlength="10">
					</div>
					<div class="form-group">
						<label for="userloginpassword">Enter Password</label>
						<input type="password" name="userloginpassword" class="form-control">
					</div>
					<div class="form-group">
						<input type="submit" name="loginSubmit" id="loginSubmit" class="form-control btn btn-outline-success" value="Log IN">
					</div>
					<div class="form-group">
						<input type="reset" name="reset" id="resetLogin" class="form-control btn btn-outline-danger" value="Reset">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


</body>
</html>