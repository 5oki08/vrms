<?php

require '../../connection.php' ;
require '../guests/login.php' ;
// session_start() ;

if ( isset($_POST['activeuser']) ) {
	if ( empty($_SESSION['activeuser']) ) {
		$_SESSION['noactiveaccount'] ;
		$_SESSION['classTypeError'] ;
		header('location: ../guests/homeguests.php?logIn') ;
	} else {
		$_SESSION['activeuser'] ;
	}
} 



?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>VRMS-MyBookings</title>
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
					<li class="nav-item"><a href="mybookingregistered.php" class="nav-link" id="active">My Booking</a></li>
					<div class="dropdown" class="nav-link">
						<a href="myaccountregistered.php" class="text-danger" data-toggle="dropdown" style="font-size:16px;">My Profile</a>
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

<div class="jumbotron">
	<div class="row">
		
		<div class="col-md-1"></div>
		<div class="col-md-10">

			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<form class="form" action="mybookingregistered.php" method="post">
						<input type="text" name="searchSecondNameRecord" id="searchSecondNameRecord" class="form-control" placeholder="Input Second Name ...">
						<br/>
						<input type="submit" name="searchSecondNamebtn" id="searchSecondNamebtn" class="btn btn-outline-primary" value="Search Record">
					</form>
				</div>
				<div class="col-md-3"></div>
			</div>
			
			<table class="table table-hovered">
				<tr>
					<th> Second Name Registered </th>
					<th> Selected Drive </th>
					<th> Days Hired </th>
					<th> Payment Mode </th>
					<th> Status </th>
				</tr>

			<?php

				$searchSecondNameRecord = '' ;

				if ( isset($_POST['searchSecondNamebtn']) ) {
					if ( !empty($_POST['searchSecondNameRecord']) ) {
						$searchSecondNameRecord = $_POST['searchSecondNameRecord'] ;
					}
				}

				$fetchBookingsql = "SELECT * FROM selecteddrive WHERE snameregistered='$searchSecondNameRecord' ";
				$resultBooking = $conn->query($fetchBookingsql);

				if ($resultBooking->num_rows > 0) {
				    while($rowFetch = $resultBooking->fetch_assoc()) {
			?>
				<tr>
					<td> <?php echo $rowFetch["snameregistered"]; ?> </td> 
					<td> <?php echo $rowFetch["selectedDrivetwoWheel"] ; ?> </td>
					<td> <?php echo $rowFetch["numberOfdaysHired"] ; ?> </td>
					<td> <?php echo $rowFetch["paymentMode"] ; ?> </td>
				</tr>
				<?php  }
					} else {
					    echo "Enter Second Name to Retrieve Booking Record .";
					} ?>
			</table> 

		</div>
		<div class="col-md-1"></div>

	</div>
</div>

</body>
</html>