<?php

require '../../connection.php' ;
session_start() ;

$fetchSql = " SELECT * FROM users WHERE fName='$fname' &&  sName='$sname' " ;
$resultSql = mysqli_query($conn,$fetchSql) ;
$fetchNum = mysqli_num_rows($resultSql) ;

$user = $_SESSION['user_name'] ;
$getUsername = " SELECT * FROM users WHERE fName='$fname' &&  sName='$sname' " ;
$runUsername = mysqli_query($conn,$getUsername) ;
$rowA = mysql_fetch_array($runUsername) ;

$userid = $rowA['sName'] ;

$userPosts = " SELECT * FROM profilepictures WHERE inputProfilephoto='$profilePicture' " ;
$runPosts = mysqli_query($conn,$userPosts) ;
$posts = mysqli_num_rows($runPosts) ;

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
		<li class="nav-item"><a href="homeregistered.php" class="nav-link">Home</a></li>
		<li class="nav-item"><a href="aboutregistered.php" class="nav-link">About Us</a></li>
		<li class="nav-item"><a href="vehicleregistered.php" class="nav-link">Vehicle</a></li>
		<li class="nav-item"><a href="contactregistered.php" class="nav-link">Contact Us</a></li>
		<li class="nav-item"><a href="mybookingregistered.php" class="nav-link">My Booking</a></li>
		<li class="nav-item"><a href="myaccountregistered.php" class="nav-link"  id="active">My Account</a></li>
		<li class="nav-item"><a href="logoutregistered.php" class="nav-link">Log Out</a></li>
	</nav>
</div>
<br/>

<div class="container-fluid">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2">
				<p>Welcome,</p><br/>
				<p><a href="#myaccountregistered.php?<?php echo "" ?>"></a></p>
			</div>
			<div class="col-md">
				<div class="container">
					<img src="../../images/myaccountimagex.png" alt="">
					<div class="container-fluid" alt="">
						<form class="form" action="myaccountregistered.php" method="post">
							<label for="inputProfilephoto"></label>
							<input type="file" name="inputProfilephoto" id="inputProfilephoto" class="form-control" value="Browse" placeholder="Browse for photo">
							<p style="color:red; font-style:italic;"> <?php echo $inputProfilephotoErr; ?> </p>
							<br/>
							<input type="submit" name="submitProfileImage" id="submitProfileImage" value="Submit profile photo">
							<input type="reset" name="reset" value="Delete">
						</form>
					</div>
					<div class="row">
						<div class="col-md-6"></div>
						<div class="col-md-3">
							<p></p>
						</div>
						<div class="col-md-5"></div>
					</div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>
</div>

</body>
</html>