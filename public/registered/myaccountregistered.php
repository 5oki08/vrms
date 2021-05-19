

<!-- // require '../../connection.php' ;
// session_start() ;

// $fetchSql = " SELECT * FROM users WHERE fName='$fname' &&  sName='$sname' " ;
// $resultSql = mysqli_query($conn,$fetchSql) ;
// $fetchNum = mysqli_num_rows($resultSql) ;

// $user = $_SESSION['user_name'] ;
// $getUsername = " SELECT * FROM users WHERE fName='$fname' &&  sName='$sname' " ;
// $runUsername = mysqli_query($conn,$getUsername) ;
// $rowA = mysql_fetch_array($runUsername) ;

// $userid = $rowA['sName'] ;

// $userPosts = " SELECT * FROM profilepictures WHERE inputProfilephoto='$profilePicture' " ;
// $runPosts = mysqli_query($conn,$userPosts) ;
// $posts = mysqli_num_rows($runPosts) ; -->


<!DOCTYPE html>
<html lang="en">
<head>
	<title>VRMS-MyAccount</title>
<meta charset="utf-8">	
<meta name="viewport" content="width=device-width, initial-scale=1">	
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<link rel="stylesheet" type="text/css" href="../../css/style.css">
<link rel="stylesheet" type="text/css" href="../../css/styleresponsive.css">	

<style type="text/css">
	
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
					<li class="nav-item"><a href="homeregistered.php" class="nav-link">Home</a></li>
					<li class="nav-item"><a href="aboutregistered.php" class="nav-link">About Us</a></li>
					<div class="dropdown">
						<button type="" class="dropdown-toggle nav-link" data-toggle="dropdown" style="border:none; background-color:#efa12b;">Vehicles</button>
						<div class="dropdown-menu">
							<a href="twowheelerregistered.php" class="dropdown-item">TWO WHEELER VEHICLES</a>
							<a href="fourwheelerregistered.php" class="dropdown-item">FOUR WHEELER VEHICLES</a>
						</div>
					</div>	
					<li class="nav-item"><a href="contactregistered.php" class="nav-link">Contact Us</a></li>
					<li class="nav-item"><a href="mybookingregistered.php" class="nav-link">My Booking</a></li>
					<li class="nav-item"><a href="myaccountregistered.php" class="nav-link" id="active">My Account</a></li>
					<li class="nav-item"><a href="logoutregistered.php" class="nav-link">Log Out</a></li>
				</nav>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>	
</div>

<br/>

<div class="container-fluid">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-2">
				<p>Welcome,</p><br/>
				<!-- <p><a href="#myaccountregistered.php?<?php  ?>"></a></p> -->
			</div>
			<div class="col-md">
				<div class="container">
					<img src="../../images/myaccountimagex.png" alt="">
					<div class="container-fluid" alt="">
						<form class="form" action="myaccountregistered.php" method="post">
							<label for="inputProfilephoto"></label>
							<input type="file" name="inputProfilephoto" id="inputProfilephoto" class="form-control" value="Browse" placeholder="Browse for photo">
							<!-- <p style="color:red; font-style:italic;"> <?php  $inputProfilephotoErr; ?> </p> -->
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