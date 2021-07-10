<?php

require '../../connection.php' ;


$_SESSION['userAccept'] = "Successful User Entry. ^admin" ;
$_SESSION['classTypeAccept'] = "success" ;
$_SESSION['userFail'] = "Reg Failed. ^admin" ;
$_SESSION['userDup'] = "A user with the same details has already registered. Try again with different details. ^admin" ;
$_SESSION['classTypeError'] = "danger" ;
$_SESSION['recordCut'] = "Record Deleted" ;

$_SESSION['recUpdated'] = "Record Successfully Updated" ;
$_SESSION['recFail'] = "Record Update Failed." ;

$fnameAdminreg = $snameAdminreg = $userLocationAdminreg = $yobAdminreg = $userPhoneAdminreg = $userGenderAdminreg = $usernewpassAdminreg = '' ;
$fnameAdminregErr = $snameAdminregErr = $userLocationAdminregErr = $yobAdminregErr = $userPhoneAdminregErr = $userGenderAdminregErr = $usernewpassAdminregErr = '' ;

if ( isset($_POST['detailsadminSubmit']) ) {

	if ( empty($_POST['fnameAdminreg']) ) {
		$fnameAdminregErr = "Enter First Name" ;
	} else {
		$fnameAdminreg = $_POST['fnameAdminreg'] ;
	}
	if ( empty($_POST['snameAdminreg']) ) {
		$snamAdminregeErr = "Enter Second Name" ; 
	} else {
		$snameAdminreg = $_POST['snameAdminreg'] ;
	}
	if ( empty($_POST['userLocationAdminreg']) ) {
		$userLocationAdminregErr = "Provide Location" ;
	} else {
		$userLocationAdminreg = $_POST['userLocationAdminreg'] ;
	}
	if ( empty($_POST['yobAdminreg']) ) {
		$yobAdminregErr = "DOB details cannot be empty" ;
	} else {
		$yobAdminreg = $_POST['yobAdminreg'] ;
	}
	if ( empty($_POST['userPhoneAdminreg']) ) {
		$userPhoneAdminregErr = "Input Phone Number" ;
	} else {
		$userPhoneAdminreg = $_POST['userPhoneAdminreg'] ;
	} 
	if ( empty($_POST['userGenderAdminreg']) ) {
		$userGenderAdminregErr = "Select Gender" ;
	} else {
		$userGenderAdminreg = $_POST['userGenderAdminreg'] ;
	}
	$usernewpassAdminreg = $_POST['usernewpassAdminreg'] ;
	$userconfpassAdminreg = md5($usernewpassAdminreg) ;


$insSql = " SELECT * FROM users WHERE fName='$fnameAdminreg' &&  sName='$snameAdminreg' && userLocation='$userLocationAdminreg' && userGender='$userGenderAdminreg' && userAge='$yobAdminreg' && userPhone='$userPhoneAdminreg' && userPassword='$usernewpassAdminreg' " ;
$insResult = mysqli_query($conn,$insSql) ;
$insNums = mysqli_num_rows($insResult) ;

if ( $insNums>=1 ) {
	$_SESSION['userDup'] ; 
	header('location: regdusersadmin.php?userdetailsdup') ;
} else {
	if ( empty($fnameAdminregErr) && empty($snameAdminregErr) && empty($userLocationAdminregErr) && empty($yobAdminregErr) && empty($userPhoneAdminregErr) && empty($userGenderAdminregErr) ) {
		$insStmt = $conn->prepare(" INSERT INTO users (fName,sName,userLocation,userGender,userAge,userPhone,userPassword) VALUES (?,?,?,?,?,?,?) ") ;
		$insStmt->bind_param("sssssss",$fnameAdminreg,$snameAdminreg,$userLocationAdminreg,$userGenderAdminreg,$yobAdminreg,$userPhoneAdminreg,$userconfpassAdminreg) ;
		if ( $insStmt->execute() === TRUE ) {
			$_SESSION['userAccept'] ;
			$_SESSION['classTypeAccept'] ;
			header('location: regdusersadmin.php?userdetailsaccepted') ;
		} else {
			$_SESSION['userFail'] ;
			$_SESSION['classTypeError'] ;
			header('location: regdusersadmin.php?userdetailsfail');
		}
	} else {
		$_SESSION['userFail'] ;
		$_SESSION['classTypeError'] ;
		header('location: regdusersadmin.php?userdetailsfaill');
	}
}

}


$id = 0 ;
if ( isset($_GET['delete'] ) ) {
	$id = $_GET['delete'] ;

	$deleteRecordSql = "DELETE FROM users WHERE id='$id' " ;
	if ( $conn->query($deleteRecordSql) ===  TRUE ) {
		$_SESSION['recordCut'] ;
		$_SESSION['classTypeAccept'] ;
		header('location: regdusersadmin.php?recordDismissed') ;
	}
}


 
$update = false ;
if ( isset($_GET['edit']) ) {
	$id = $_GET['edit'] ;
	$update = TRUE ;

	 
	$pulluserRecordsResult = $conn->query(" SELECT * FROM users WHERE id='$id' ") or die($conn->error) ;
  	$userRecordsRow = $pulluserRecordsResult->fetch_array() ;
	
	$idE = $userRecordsRow['id'] ;
	$fnameE = $userRecordsRow['fName'] ;
	$snameE = $userRecordsRow['sName'] ;
	$userLocationE = $userRecordsRow['userLocation'] ;
	$userGenderE = $userRecordsRow['userGender'] ;
	$userAgeE = $userRecordsRow['userAge'] ;
	$userPhoneE = $userRecordsRow['userPhone'] ;
	$userPasswordE = $userRecordsRow['userPassword'] ;


}
 

						

$fnameEd = $snameEd = $userLocationEd = $userPhoneEd = $userGenderEd ='' ; 

	$fnameErr = $snameErr = $userLocationErr = $userPhoneErr = $userGenderErr ='' ;


if ( isset($_POST['detailsEditUpdate']) ) {
	if ( empty($_POST['fnameEd']) ) {
		$fnameErr = "Enter First Name" ;
	} else {
		$fnameEd = $_POST['fnameEd'] ;
	}
	if ( empty($_POST['snameEd']) ) {
		$snameErr = "Enter Second Name" ; 
	} else {
		$snameEd = $_POST['snameEd'] ;
	}
	if ( empty($_POST['userLocationEd']) ) {
		$userLocationErr = "Provide Location" ;
	} else {
		$userLocationEd = $_POST['userLocationEd'] ;
	}
	if ( empty($_POST['userPhoneEd']) ) {
		$userPhoneErr = "Input Phone Number" ;
	} else {
		$userPhoneEd = $_POST['userPhoneEd'] ;
	} 
	if ( empty($_POST['userGenderEd']) ) {
		$userGenderErr = "Select Gender" ;
	} else {
		$userGenderEd = $_POST['userGenderEd'] ;
	}

	$id= $_POST['idEd'] ;

	if ( empty($fnameErr) && empty($snameErr) && empty($userLocationErr) && empty($userPhoneErr) && empty($userGenderErr) ) {
		$updateSql = " UPDATE users SET fName='$fnameEd' , sName='$snameEd' , userLocation='$userLocationEd' ,   userPhone='$userPhoneEd' , userGender='$userGenderEd' WHERE id='$id' " ;
		if ( $conn->query($updateSql) === TRUE ) {
			$_SESSION['recUpdated'] ;
			$_SESSION['classTypeAccept'] ;
			header('location: regdusersadmin.php?recUpdt') ;
		} else {
			$_SESSION['recFail'] ;
			$_SESSION['classTypeError'] ;
			header('location: regdusersadmin.php?recF') ;
		}
	}

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>vrmsADMIN</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 

<link rel="stylesheet" type="text/css" href="../../../css/style.css">
<link rel="stylesheet" type="text/css" href="../../../css/styleresponsive.css">	

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
.footer { padding: 30px;  }
.footer-links { color: #000; font-size: 15px; }
.footer-links:hover { font-weight: 600; color: #000; }


/*#userListings { padding: 50px; }*/
#userListingsJumbotron { padding:20px; }


@media only screen and (max-width: 600px) {
  
.heading1subj { display: block; margin-top: 3px; margin-bottom: 3px; }
.navbar-toggle { float: right; }
.carousel-inner img { width: 400; height: 270; }
#footerSec1 { margin-bottom: 30px; }
#footerSec2 { margin-bottom: 30px; }
#footerSec3 {}

 

#userListingsJumbotron { padding:0px; }

#edituser { /*margin-top: 10px;*/ }
#deleteUser { margin-top: 10px; }

}	

  

</style>

</head>
<body>



<header id="mainheader1" class="">
	<ul id="heading1">
		<li class="heading1subj" >3<sup style="color:#000;">rd</sup> Street, CBD, Nairobi, Kenya </li>
		<li class="heading1subj" > <img src="../../images/phonecall.png" alt="" width="20px" height="20px"> +254 700 000 000 </li>
		<li class="heading1subj" > <img src="../../images/contacticons/email/gmailemail.png" class="img-fluid" alt="" width="20px" height="20px"> 614rollingstone@gmail.com </li>
		<hr style="width:50%;" />
	</ul>
	<h4 class="text-center text-uppercase" style="letter-spacing:5px;">Vehicle Rental Management System</h4>
</header> 

<hr />


<div class="container-fluid">

	<div class="row">

		<div class="col-md-3 bg-light text-left">
			<header id="mainheader1" class=" border border-0">
				<nav class="navbar navbar-inverse navbar-light bg-light border border-0 w-100 h-100">
				  <div class="container-fluid">
				    <div class="navbar-header ">
				      <button type="button" class="navbar-toggle bg-dark border border-0" data-toggle="collapse" data-target="#myNavbar">
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				      </button> 
				    </div>
				    <div class="collapse navbar-collapse" id="myNavbar">
				      <ul class="nav navbar-nav text-nowrap">
				        <li> <a href="dashboardadmin.php" class="text-dark">Dashboard</a> </li>
				        <li class="active"> <a href="regdusersadmin.php" class="text-dark btn btn-lg border border-dark  bg-light font-weight-bold">Users</a> </li>
						  <li> <a href="#" class="text-dark">Two Wheeler Vehicles</a> </li>  
						  <li> <a href="fourwheeleradmin.php" class="text-dark">Four Wheeler Vehicles</a> </li>
						  <li> <a href="fourwheelerbookingadmin.php" class="text-dark">Bookings <sup class="badge badge-secondary"><?php
								$countRecords = " SELECT COUNT(status) AS TotalUndecidedBookings FROM selecteddrive WHERE status='WaitingApproval' " ;
								$countRecordsResult = mysqli_query($conn,$countRecords) ;
								$dataF = $countRecordsResult->fetch_assoc();
								echo $dataF['TotalUndecidedBookings']; 
							?></sup> </a> </li>
						 <li> <a href="../registered/logoutregistered.php" class="text-dark">Log Out</a> </li>  
				      </ul>
				    </div>
				  </div>
				</nav>

			</header>
		</div>
		<div class="col-md-9">
			
			<div class="container-fluid">
				<div class="row">

						<div class="jumbotron w-100" id="userListingsJumbotron">
							
							<p style="font-size:15px;" class="alert alert-<?php 
									if (isset($_GET['recordDismissed'])) {
										echo $_SESSION['classTypeError'] ;
										// session_unset();
										// session_destroy();
									}
									if (isset($_GET['recUpdt'])) {
										echo $_SESSION['classTypeAccept'] ;
										// session_unset();
										// session_destroy();
									}
									if (isset($_GET['recF'])) {
										echo $_SESSION['classTypeError'] ;
										// session_unset();
										// session_destroy();
									}
									if (isset($_GET['userdetailsdup'])) {
										echo $_SESSION['classTypeError'] ;
										// session_unset();
										// session_destroy();
									}
									if (isset($_GET['userdetailsfail'])) {
										echo $_SESSION['classTypeError'] ;
										// session_unset();
										// session_destroy();
									}	
									if (isset($_GET['userdetailsaccepted'])) {
										echo $_SESSION['classTypeAccept'] ;
										// session_unset();
										// session_destroy();
									}
								?> w-50 text-center text-success text-nowrap font-weight-bold mx-auto" >
									<?php
										if ( isset($_GET['recordDismissed']) ) {
											if (isset($_SESSION['recordCut'] )) {
												echo $_SESSION['recordCut'] ; ;
												session_unset() ;
												// session_destory() ;
											} else {
												echo "Record Deleted";
											}
										}
										if ( isset($_GET['recUpdt']) ) {
											if (isset($_SESSION['recUpdated'] )) {
												echo $_SESSION['recUpdated'] ; ;
												session_unset() ;
												// session_destory() ;
											} else {
												echo "Record Successfully Updated";
											}
										}
										if ( isset($_GET['recF']) ) {
											if (isset($_SESSION['recFail'] )) {
												echo $_SESSION['recFail'] ; ;
												session_unset() ;
												// session_destory() ;
											} else {
												echo "Record Update Failed.";
											}
										}
										if ( isset($_GET['userdetailsdup']) ) {
											if (isset($_SESSION['userDup'])) {
												echo $_SESSION['userDup'] ;
												session_unset() ;
												// session_destory() ;
											} else {
												echo "A user with the same details has already registered. Try again with different details. ^admin";
											}
										}
										if ( isset($_GET['userdetailsfail']) ) {
											if (isset($_SESSION['userFail'])) {
												echo $_SESSION['userFail'] ;
												session_unset() ;
												// session_destory() ;
											} else {
												echo "Reg Failed. ^admin";
											}
										}
										if ( isset($_GET['userdetailsaccepted']) ) {
											if (isset($_SESSION['userAccept'])) {
												echo $_SESSION['userAccept'] ;
												session_unset() ;
												// session_destory() ;
											} else {
												echo "Successful User Entry. ^admin";
											}
										}
										 ;
									?>
								</p>


							<table class="table table-hovered table-responsive-sm table-bordered w-100" id="userListings">

								<!-- <?php
									$adminFetchRecords = "SELECT * FROM users WHERE id='$id'" ;
									$adminFetchRecordsResult = mysqli_query($conn,$adminFetchRecords) ;
								?>  -->
								
								<tr class="text-center">
									<th hidden>ID</th>
									<th>First Name</th>
									<th>Second Name</th>
									<th>Location</th>
									<th>Gender</th>
									<th>Phone Number</th>
									<th hidden>Password</th>
									<th>Last Update</th>
									<th colspan="2">Action</th>
								</tr>

								<?php
									$adminFetchRecords = "SELECT * FROM users " ;
									$adminFetchRecordsResult = mysqli_query($conn,$adminFetchRecords) ;

									if ($adminFetchRecordsResult->num_rows > 0) {
								   	 while($rowFetch = $adminFetchRecordsResult->fetch_array()) {
								?>
									<tr>
										<td hidden> <?php echo $rowFetch['id'] ; ?> </td>
										<td> <?php echo $rowFetch['fName'] ; ?> </td>
										<td> <?php echo $rowFetch['sName'] ; ?> </td>
										<td> <?php echo $rowFetch['userLocation'] ; ?> </td>
										<td> <?php echo $rowFetch['userGender'] ; ?> </td>
										<td> <?php echo $rowFetch['userPhone'] ; ?> </td>
										<td hidden> <?php echo $rowFetch['userPassword'] ; ?> </td>
										<td  class="text-center"> <?php echo $rowFetch['reg_date'] ; ?> </td>
										<td>
											<a href="regdusersadmin.php?edit=<?php echo $rowFetch['id']?>" class="btn btn-lg border border-dark btn-outline-warning" id="edituser">Edit</a>
											<a href="regdusersadmin.php?delete=<?php echo $rowFetch['id']?>" class="btn btn-lg border border-dark btn-outline-danger" id="deleteUserID" onclick="confirm_change()" >Delete</a>
										</td>
									</tr>
									<?php  } } ?>
							</table>

						</div>

						<br/> <br/>
							<?php 
								if (  $update === TRUE ) :
							?>
						<article class="container bg-warning" style="padding:15px;">
							<aside style="letter-spacing: 2px;" class="text-center font-weight-bolder w-50 mx-auto" >Update Existing Records</aside>
						</article>
						<form class="form" action="regdusersadmin.php" method="post">
							
							<input name="idEd" id="idEd" class="form-control form-control-lg" hidden value="<?php echo $idE ; ?>">
							<div class="row">
								<div class="col-md">
									<div class="form-group">
										<label for="fnameEd">First Name<sup style="color:red;">*</sup></label>
										<input type="text" name="fnameEd" class="form-control form-control-lg" id="fnameEd" value="<?php echo $fnameE ; ?>"> 
										<span> <?php echo $fnameErr; ?> </span>
									</div>
								</div>
								<div class="col-md">
									<div class="form-group">
										<label for="snameEd">Second Name<sup style="color:red;">*</sup></label>
										<input type="text" name="snameEd" class="form-control form-control-lg" id="snameEd" value="<?php echo $snameE ;  ?>">
										<span> <?php echo $snameErr; ?> </span>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="userLocationEd">User Location<sup style="color:red;">*</sup></label>
								<input type="text" name="userLocationEd" class="form-control form-control-lg" style="width:60%;" id="userLocationEd"  value="<?php echo  $userLocationE;  ?>">
								<span> <?php echo $userLocationErr; ?> </span>
							</div>
							<div class="form-group">
								<label for="userPhoneEd">Input Phone Number<sup style="color:red;">*</sup></label>
								<input type="phone" name="userPhoneEd" class="form-control form-control-lg" max-length="10" style="width:60%;" id="userPhoneEd"  value="<?php echo $userPhoneE ;  ?>">
								<span> <?php echo $userPhoneErr; ?> </span>
							</div>
							<div class="form-group">
								<label for="userGenderEd">Select Gender<sup style="color:red;">*</sup></label>
								<select name="userGenderEd" class="form-control form-control-lg"  style="width:60%;" id="userGenderEd" > 
									<option value="<?php echo $userGenderE;  ?>"> <?php echo $userGenderE;  ?> </option>
									<option value="male">Male</option>
									<option value="female">Female</option>
								</select> 
								<span> <?php echo $userGenderErr; ?> </span>
							</div>
							<br/>

							
								<input type="submit" name="detailsEditUpdate" class="form-control form-control-lg btn btn-lg btn-warning  w-75 " id="detailsEditUpdate" value="Update Details">
							
						<?php endif; ?>

						</form>
				</div>
			</div> 	



			<br/> <br/>
			<article class="container bg-warning w-75 mx-auto " style="padding:15px;">
				<aside style="letter-spacing: 2px; padding:10px; text-decoration: underline;" class="text-center font-weight-bolder w-50 mx-auto" >Add New User</aside>
			</article>	
			<br/>

			<form class="form w-75 mx-auto" action="#" method="post" >
				
				<div class="row">
					<div class="col-md">
						<div class="form-group">
							<label for="fnameAdminreg">First Name<sup style="color:red;">*</sup></label>
							<input type="text" name="fnameAdminreg" class="form-control form-control-lg" id="fnameAdminreg">
							<span> <?php echo $fnameAdminregErr; ?> </span>
						</div>
					</div>
					<div class="col-md">
						<div class="form-group">
							<label for="snameAdminreg">Second Name<sup style="color:red;">*</sup></label>
							<input type="text" name="snameAdminreg" class="form-control form-control-lg" id="snameAdminreg">
							<span> <?php echo $snameAdminregErr; ?> </span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="userLocationAdminreg">User Location<sup style="color:red;">*</sup></label>
					<input type="text" name="userLocationAdminreg" class="form-control form-control-lg" style="width:60%;" id="userLocationAdminreg" >
					<span> <?php echo $userLocationAdminregErr; ?> </span>
				</div>
				<div class="form-group">
					<label for="yobAdminreg">Input DOB (format: dd/mm/yyyy)</label>
					<input type="date" name="yobAdminreg" class="form-control form-control-lg" style="width:60%;" >
					<span> <?php echo $yobAdminregErr; ?> </span>
				</div>
				<div class="form-group">
					<label for="userPhoneAdminreg">Input Phone Number<sup style="color:red;">*</sup></label>
					<input type="phone" name="userPhoneAdminreg" class="form-control form-control-lg" max-length="10" min-length="10" style="width:60%;" id="userPhoneAdminreg"  >
					<span> <?php echo $userPhoneAdminregErr; ?> </span>
				</div>
				<div class="form-group">
					<label for="userGenderAdminreg">Select Gender<sup style="color:red;">*</sup></label>
					<select name="userGenderAdminreg" class="form-control form-control-lg"  style="width:60%;" id="userGenderAdminreg">
						<option></option>
						<option value="male">Male</option>
						<option value="female">Female</option>
					</select>
					<span> <?php echo $userGenderAdminregErr; ?> </span> 
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-md">
							<div class="form-group">
								<label for="usernewpassAdminreg">Password</label>
								<input type="password" name="usernewpassAdminreg" id="usernewpassAdminreg" class="form-control form-control-lg" onkeyup="passmatchregAdmin()">
							</div>
						</div>
						<div class="col-md">
							<div class="form-group">
								<label for="userconfpassAdminreg">Confirm Password</label>
								<input type="password" name="userconfpassAdminreg" id="userconfpassAdminreg" class="form-control form-control-lg" onkeyup="passmatchregAdmin()">
								<small id="confPassmsg"></small>
							</div>
						</div>
					</div>
				</div>
				<br/>
				<div class="row">
					<div class="col-md">
						<input type="submit" name="detailsadminSubmit" class="form-control form-control-lg btn btn-lg btn-success w-100 h-100" id="detailsadminSubmit" value="Submit Details">
					</div>
					<div class="col-md">
						<input type="reset" name="reset" class="form-control  form-control-lg reset border  border-dark w-100 h-100" id="reset" style="width:40%;  text-decoration:underline;">
					</div>
				</div>
				
			</form>

		</div>

	</div>
</div>

<br/> <br/> <br/> <br/>
.
 

<footer class="footer" style="background-color:#C0C0C0;">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md text-center" id="footerSec1">
				<p style="text-decoration:underline;">Quick Links</p>
				<a href="homeguests.php" class="footer-links">Home</a><br/>
				<a href="aboutguests.php" class="footer-links">About Us</a><br/>
				<a href="#" class="footer-links">Privacy Policy</a>
			</div>
			<div class="col-md text-center" id="footerSec2">
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat.
			</div>
			<div class="col-md text-center" id="footerSec3">
				<p><img src="../../images/pinLocation.jpg" alt="" width="40px" height="20px"> 3<sup style="color:#000;">rd</sup> Street, CBD, Nairobi, Kenya</p>
				<p>
					<img src="../../images/phonecall.png" alt="" width="20px" height="20px">
					+254 700 000 000
				</p>
				<p>
					<img src="../../images/contacticons/email/gmailemail.png" alt="" width="20px" height="20px">
					614rollingstone@gmail.com
				</p>
				<br/>
			</div>
			<div class="col-md-1"></div>
		</div>
	</div> <br/>
	<div class="w-75 mx-auto text-center font-weight-bold bg-light" style="padding:10px;">
		<a href="https://twitter.com/itscool012" target="_blank"><img src="../../images/contacticons/socialmedia/instagram.png" alt="instagram account" width="20px" height="20px" id="socialmediaicons"></a>
		<a href="https://www.instagram.com/jam_croc/" target="_blank"><img src="../../images/contacticons/socialmedia/twitter.png" alt="twitter account" width="20px" height="20px" id="socialmediaicons"></a>
		<p>Samuel Emmanuel Okinyo<sup class="text-dark">©</sup>  2021  All Rights Reserved </p>
	</div>
</footer> 




<script type="text/javascript">
	function passmatchregAdmin() {
		if ( document.getElementById('usernewpassAdminreg').value !== document.getElementById('userconfpassAdminreg').value ) {
				document.getElementById('userconfpassAdminreg').style.borderColor = "red" ;
				document.getElementById('confPassmsg').style.color = "red" ;
				document.getElementById('confPassmsg').innerHTML = "Password do not match" ;
				document.getElementById('detailsadminSubmit').disabled = true ;
			} else {
				document.getElementById('userconfpassAdminreg').style.borderColor = "black" ;
				document.getElementById('confPassmsg').style.color = "green" ;
				document.getElementById('confPassmsg').innerHTML = "  " ;
				document.getElementById('detailsadminSubmit').disabled = false ;
			}
	}
	function confirm_change() {
	  return confirm('are you sure?');
	}
</script>

</body>
</html>