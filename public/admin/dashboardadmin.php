<?php

require '../../connection.php' ;
// require 'regdusersadmin.php' ;


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>vrmsADMIN</title>
<meta charset="utf-8">	
<meta name="viewport" content="width=device-width, initial-scale=1">	
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<link rel="stylesheet" type="text/css" href="../../../css/style.css">
<link rel="stylesheet" type="text/css" href="../../../css/styleresponsive.css">	

<style type="text/css">
	
	/*#adminnav {
		background-color: #ffe135;
	}*/
	#adminnav {
		padding-top: 10px;
		padding-bottom: 10px;
		background-color: #ffe135;
	}
	.nav-linkAdmin {
		color: #000;
		padding-left: 10px;
		padding-right: 10px;
	}
	.nav-linkAdmin:hover {
		color: #000;
	}
	#activeadmin {
		text-transform: uppercase;
		font-weight: 700;
		text-decoration: underline;
	}
	.nav-itemadmin:hover {
		text-transform: uppercase;
		text-decoration: underline;
	}
	.dropdown-itemAdmin {
		/*padding: 5px;*/
	}

</style>

</head>
<body>


<div class="container-fluid" id="adminnav">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-5"></div>
			<div class="col-md-3">
				<p>3<sup style="color:#000;">rd</sup> Street, CBD, Nairobi, Kenya</p>
			</div>
			<div class="col-md-4">
				<p>
					<img src="../../../images/phonecall.png" alt="" width="20px" height="20px">
					+254 700 000 000
				</p>
				<p>
					<img src="../../../images/contacticons/email/gmailemail.png" alt="" width="20px" height="20px">
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
					<li class="nav-itemAdmin"><a href="dashboardadmin.php" class="nav-linkAdmin" id="activeadmin">Dashboard</a></li>
					<!-- <li class="nav-itemAdmin"><a href="#" class="nav-linkAdmin">Vehicles</a></li>
					<li class="nav-itemAdmin"><a href="#" class="nav-linkAdmin">Bookings</a></li> -->
					<li class="nav-itemAdmin"><a href="regdusersadmin.php" class="nav-linkAdmin">Users</a></li>
					<li class="nav-itemAdmin"><a href="../registered/logoutregistered.php" class="nav-linkAdmin">Log Out ADmin</a></li>
					
				</nav>
			</div>
			<div class="col-md-2"></div>
		</div>
	</div>	
</div>

<br/>

<div class="jumbotron">
	<h4>Vehicle Rental Management System</h4><br/>
	<img src="../../images/vrmslogo.png">
</div>


<div class="container">
	<table class="table table-hovered">
	
		<tr>
			<td>Second Name</td>
			<td>Selected Vehicle</td>
			<td>Number Of days</td>
			<td>Payment Mode</td>
		</tr>
<?php
						$adminFetchHire = "SELECT * FROM selecteddrive" ;
						$adminFetchHireResult = mysqli_query($conn,$adminFetchHire) ;

						if ($adminFetchHireResult->num_rows > 0) {
					   	 while($row = $adminFetchHireResult->fetch_assoc()) {
					?>
		<tr>
			<td> <?php echo $row['snameregistered'] ; ?> </td>
			<td> <?php echo $row['selectedDrivetwoWheel'] ; ?> </td>
			<td> <?php echo $row['numberOfdaysHired'] ?> </td>
			<td> <?php echo $row['paymentMode'] ?> </td>
		</tr>
<?php  }
							} else {
							    echo "No bookings .";
							} ?>
	</table>	
</div>

<br/> <br/> <br/>
.

</body>
</html>