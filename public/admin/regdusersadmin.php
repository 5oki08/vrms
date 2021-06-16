<?php

require '../../connection.php' ;


$_SESSION['userAccept'] = "Successful Registration. You can now login with the details." ;
$_SESSION['classTypeAccept'] = "success" ;
$_SESSION['userFail'] = "Registration Failed. Check input details then try again." ;
$_SESSION['userDup'] = "A user with the same details has already registered. Try again with different details." ;
$_SESSION['classTypeError'] = "danger" ;
$_SESSION['recordCut'] = "Record Deleted" ;

$fname = $sname = $userLocation = $yob = $userPhone = $userGender ='' ;
$fnameErr = $snameErr = $userLocationErr = $yobErr = $userPhoneErr = $userGenderErr = '' ;

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

$insSql = " SELECT * FROM users WHERE fName='$fname' &&  sName='$sname' && userLocation='$userLocation' && userGender='$userGender' && userAge='$yob' && userPhone='$userPhone' " ;
$insResult = mysqli_query($conn,$insSql) ;
$insNums = mysqli_num_rows($insResult) ;

if ( $insNums>=1 ) {
	$_SESSION['userDup'] ;
	header('location: loginregisterguests.php?userdetailsdup') ;
} else {
	if ( empty($fnameErr) && empty($snameErr) && empty($userLocationErr) && empty($yobErr) && empty($userPhoneErr) && empty($userGenderErr) ) {
		$insStmt = $conn->prepare(" INSERT INTO users (fName,sName,userLocation,userGender,userAge,userPhone) VALUES (?,?,?,?,?,?) ") ;
		$insStmt->bind_param("ssssss",$fname,$sname,$userLocation,$userGender,$yob,$userPhone) ;
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
		header('location: regdusersadmin.php?userdetailsfail');
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

	$pulluserRecords = $conn->query(" SELECT * FROM users WHERE id='$id' ") ;
	$userRecordsRow = $pulluserRecords->fetch_array() ;

	$fname = $sname = $userLocation = $yob = $userPhone = $userGender ='' ;

	$fname = $userRecordsRow['fName'] ;
	$sname = $userRecordsRow['sName'] ;
	$userLocation = $userRecordsRow['userLocation'] ;
	$yob = $userRecordsRow['userAge'] ;
	$userPhone = $userRecordsRow['userPhone'] ;
	$userGender = $userRecordsRow['userGender'] ;
}


if ( isset($_POST['detailsEditUpdate']) ) {
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

	$id= $_POST['id'] ;

	if ( empty($fnameErr) && empty($snameErr) && empty($userLocationErr) && empty($yobErr) && empty($userPhoneErr) && empty($userGenderErr) ) {
		$updateSql = " UPDATE users SET fName='$fname' , sName='$sname' , userLocation='$userLocation' , userAge='$yob' ,  userPhone='$userPhone' , userGender='$userGender' WHERE id='$id' " ;
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
	
	/*#adminnav {
		background-color: #ffe135;
	}
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
		padding: 5px;
	}*/


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
.footer { padding: 30px;  width: 80%; justify-content: center; margin: 0 auto; }
.footer-links { color: #000; font-size: 15px; }
.footer-links:hover { font-weight: 600; color: #000; }






@media only screen and (max-width: 600px) {
  
.heading1subj { display: block; margin-top: 3px; margin-bottom: 3px; }
.navbar-toggle { float: right; }
.carousel-inner img { width: 400; height: 270; }
#footerSec1 { margin-bottom: 30px; }
#footerSec2 { margin-bottom: 30px; }
#footerSec3 {}

 

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

		<div class="col-md-2">
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
				        <li class="active"> <a href="#" class="text-dark bg-light font-weight-bold">Dashboard</a> </li>
				        <li> <a href="regdusersadmin.php" class="text-dark">Users</a> </li>
						  <li> <a href="#" class="text-dark">Two Wheeler Vehicles</a> </li>
						  <li> <a href="#" class="text-dark">Four Wheeler Vehicles</a> </li>
						  <li> <a href="#" class="text-dark">Bookings</a> </li>
						 <li> <a href="logoutregistered.php" class="text-dark">Log Out</a> </li> 
				      </ul>
				    </div>
				  </div>
				</nav>

			</header>
		</div>
		<div class="col-md-10">
			
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-2"></div>

					<div class="col-md-9">
						<div class="jumbotron">
							
							<table class="table table-hovered">

								<p style="text-align:center; font-weight:700;" class="alert alert-<?php 
									if (isset($_GET['recordDismissed'])) {
										echo $_SESSION['classTypeAccept'] ;
										session_unset();
										session_destroy();
									}
									if (isset($_GET['recUpdt'])) {
										echo $_SESSION['classTypeAccept'] ;
										session_unset();
										session_destroy();
									}
									if (isset($_GET['recF'])) {
										echo $_SESSION['classTypeError'] ;
										session_unset();
										session_destroy();
									}
								?> " >
									<?php
										if ( isset($_GET['recordDismissed']) ) {
											if (isset($_SESSION['recordCut'] )) {
												echo $_SESSION['recordCut'] ; ;
												session_unset() ;
												session_destory() ;
											} else {
												echo "Record Deleted";
											}
										}
										if ( isset($_GET['recUpdt']) ) {
											if (isset($_SESSION['recUpdated'] )) {
												echo $_SESSION['recUpdated'] ; ;
												session_unset() ;
												session_destory() ;
											} else {
												echo "Record Successfully Updated";
											}
										}
										if ( isset($_GET['recF']) ) {
											if (isset($_SESSION['recFail'] )) {
												echo $_SESSION['recFail'] ; ;
												session_unset() ;
												session_destory() ;
											} else {
												echo "Record Update Failed.";
											}
										}

										 ;
									?>
								</p>

								<?php
									$adminFetchRecords = "SELECT * FROM users" ;
									$adminFetchRecordsResult = mysqli_query($conn,$adminFetchRecords) ;
								?>
								
								<tr>
									<th hidden>ID</th>
									<th>First Name</th>
									<th>Second Name</th>
									<th>Location</th>
									<th>Gender</th>
									<th>Phone Number</th>
									<th>Regd. Date</th>
									<th colspan="2">Action</th>
								</tr>

								<?php
									$adminFetchRecords = "SELECT * FROM users" ;
									$adminFetchRecordsResult = mysqli_query($conn,$adminFetchRecords) ;

									if ($adminFetchRecordsResult->num_rows > 0) {
								   	 while($rowFetch = $adminFetchRecordsResult->fetch_assoc()) {
								?>
									<tr>
										<td hidden> <?php echo $rowFetch['id'] ; ?> </td>
										<td> <?php echo $rowFetch['fName'] ; ?> </td>
										<td> <?php echo $rowFetch['sName'] ; ?> </td>
										<td> <?php echo $rowFetch['userLocation'] ; ?> </td>
										<td> <?php echo $rowFetch['userGender'] ; ?> </td>
										<td> <?php echo $rowFetch['userPhone'] ; ?> </td>
										<td> <?php echo $rowFetch['reg_date'] ; ?> </td>
										<td>
											<a href="regdusersadmin.php?edit=<?php echo $rowFetch['id']?>" class="btn btn-outline-warning">Edit</a>
											<a href="regdusersadmin.php?delete=<?php echo $rowFetch['id']?>" class="btn btn-outline-danger">Delete</a>
										</td>
									</tr>
									<?php  }
										} else {
										    echo "Enter Second Name to Retrieve Booking Record .";
										} ?>

							</table>

						</div>

						<br/> <br/>
						<div class="container bg-warning" style="padding:15px;">
							<p style="text-align:center; font-weight:700;">New User Registration / Update Existing Records</p>
						</div>
						<form class="form" action="regdusersadmin.php" method="post">
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
							<div class="row">
								<div class="col-md">
									 <input type="hidden" name="id" id="id" class="form-control" value="<?php echo $id; ?>">
									<div class="form-group">
										<label for="fname">First Name<sup style="color:red;">*</sup></label>
										<input type="text" name="fname" class="form-control" id="fname" value="<?php echo $fname ; ?>">
										<span> <?php echo $fnameErr; ?> </span>
									</div>
								</div>
								<div class="col-md">
									<div class="form-group">
										<label for="sname">Second Name<sup style="color:red;">*</sup></label>
										<input type="text" name="sname" class="form-control" id="sname" value="<?php echo $sname ; ?>">
										<span> <?php echo $snameErr; ?> </span>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="userLocation">User Location<sup style="color:red;">*</sup></label>
								<input type="text" name="userLocation" class="form-control" style="width:60%;" id="userLocation"  value="<?php echo $userLocation ; ?>">
								<span> <?php echo $userLocationErr; ?> </span>
							</div>
							<div class="form-group">
								<label for="yob">Input DOB (format: dd/mm/yyyy)</label>
								<input type="phone" name="yob" class="form-control" max-length="8" minlength="8" style="width:60%;"  value="<?php echo $yob ; ?>">
								<span> <?php echo $yobErr; ?> </span>
							</div>
							<div class="form-group">
								<label for="userPhone">Input Phone Number<sup style="color:red;">*</sup></label>
								<input type="phone" name="userPhone" class="form-control" max-length="10" style="width:60%;" id="userPhone"  value="<?php echo $userPhone ; ?>">
								<span> <?php echo $userPhoneErr; ?> </span>
							</div>
							<div class="form-group">
								<label for="userGender">Select Gender<sup style="color:red;">*</sup></label>
								<select name="userGender" class="form-control"  style="width:60%;" id="userGender">
									<option></option><option value="male">Male</option><option value="female">Female</option>
								</select>
								<span> <?php echo $userGenderErr; ?> </span>
							</div>
							<br/>

							<?php
								if (  $update === TRUE ) :
							?>
								<input type="submit" name="detailsEditUpdate" class="form-control btn btn-warning" id="detailsEditUpdate" value="Update Details" style="width:40%;">
							<?php else : ?>
							<div class="row">
								<div class="col-md">
									<input type="submit" name="detailsSubmit" class="form-control btn btn-success" id="detailsSubmit" value="Submit Details" style="width:40%;">
								</div>
								<div class="col-md">
									<input type="reset" name="reset" class="form-control reset" id="reset" style="width:40%; border:none; text-decoration:underline;">
								</div>
							</div>
						<?php endif; ?>
						</form>

					</div>

					<div class="col-md-1"></div>
				</div>
			</div> 		

		</div>

	</div>
</div>



<!-- <div class="container-fluid">
	<div class="row">
		<div class="col-md-2"></div>

		<div class="col-md-9">
			<div class="jumbotron">
				
				<table class="table table-hovered">

					<p style="text-align:center; font-weight:700;" class="alert alert-<?php 
						if (isset($_GET['recordDismissed'])) {
							echo $_SESSION['classTypeAccept'] ;
							session_unset();
							session_destroy();
						}
						if (isset($_GET['recUpdt'])) {
							echo $_SESSION['classTypeAccept'] ;
							session_unset();
							session_destroy();
						}
						if (isset($_GET['recF'])) {
							echo $_SESSION['classTypeError'] ;
							session_unset();
							session_destroy();
						}
					?> " >
						<?php
							if ( isset($_GET['recordDismissed']) ) {
								if (isset($_SESSION['recordCut'] )) {
									echo $_SESSION['recordCut'] ; ;
									session_unset() ;
									session_destory() ;
								} else {
									echo "Record Deleted";
								}
							}
							if ( isset($_GET['recUpdt']) ) {
								if (isset($_SESSION['recUpdated'] )) {
									echo $_SESSION['recUpdated'] ; ;
									session_unset() ;
									session_destory() ;
								} else {
									echo "Record Successfully Updated";
								}
							}
							if ( isset($_GET['recF']) ) {
								if (isset($_SESSION['recFail'] )) {
									echo $_SESSION['recFail'] ; ;
									session_unset() ;
									session_destory() ;
								} else {
									echo "Record Update Failed.";
								}
							}

							 ;
						?>
					</p>

					<?php
						$adminFetchRecords = "SELECT * FROM users" ;
						$adminFetchRecordsResult = mysqli_query($conn,$adminFetchRecords) ;
					?>
					
					<tr>
						<th hidden>ID</th>
						<th>First Name</th>
						<th>Second Name</th>
						<th>Location</th>
						<th>Gender</th>
						<th>Phone Number</th>
						<th>Regd. Date</th>
						<th colspan="2">Action</th>
					</tr>

					<?php
						$adminFetchRecords = "SELECT * FROM users" ;
						$adminFetchRecordsResult = mysqli_query($conn,$adminFetchRecords) ;

						if ($adminFetchRecordsResult->num_rows > 0) {
					   	 while($rowFetch = $adminFetchRecordsResult->fetch_assoc()) {
					?>
						<tr>
							<td hidden> <?php echo $rowFetch['id'] ; ?> </td>
							<td> <?php echo $rowFetch['fName'] ; ?> </td>
							<td> <?php echo $rowFetch['sName'] ; ?> </td>
							<td> <?php echo $rowFetch['userLocation'] ; ?> </td>
							<td> <?php echo $rowFetch['userGender'] ; ?> </td>
							<td> <?php echo $rowFetch['userPhone'] ; ?> </td>
							<td> <?php echo $rowFetch['reg_date'] ; ?> </td>
							<td>
								<a href="regdusersadmin.php?edit=<?php echo $rowFetch['id']?>" class="btn btn-outline-warning">Edit</a>
								<a href="regdusersadmin.php?delete=<?php echo $rowFetch['id']?>" class="btn btn-outline-danger">Delete</a>
							</td>
						</tr>
						<?php  }
							} else {
							    echo "Enter Second Name to Retrieve Booking Record .";
							} ?>

				</table>

			</div>

			<br/> <br/>
			<div class="container bg-warning" style="padding:15px;">
				<p style="text-align:center; font-weight:700;">New User Registration / Update Existing Records</p>
			</div>
			<form class="form" action="regdusersadmin.php" method="post">
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
				<div class="row">
					<div class="col-md">
						 <input type="hidden" name="id" id="id" class="form-control" value="<?php echo $id; ?>">
						<div class="form-group">
							<label for="fname">First Name<sup style="color:red;">*</sup></label>
							<input type="text" name="fname" class="form-control" id="fname" value="<?php echo $fname ; ?>">
							<span> <?php echo $fnameErr; ?> </span>
						</div>
					</div>
					<div class="col-md">
						<div class="form-group">
							<label for="sname">Second Name<sup style="color:red;">*</sup></label>
							<input type="text" name="sname" class="form-control" id="sname" value="<?php echo $sname ; ?>">
							<span> <?php echo $snameErr; ?> </span>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="userLocation">User Location<sup style="color:red;">*</sup></label>
					<input type="text" name="userLocation" class="form-control" style="width:60%;" id="userLocation"  value="<?php echo $userLocation ; ?>">
					<span> <?php echo $userLocationErr; ?> </span>
				</div>
				<div class="form-group">
					<label for="yob">Input DOB (format: dd/mm/yyyy)</label>
					<input type="phone" name="yob" class="form-control" max-length="8" minlength="8" style="width:60%;"  value="<?php echo $yob ; ?>">
					<span> <?php echo $yobErr; ?> </span>
				</div>
				<div class="form-group">
					<label for="userPhone">Input Phone Number<sup style="color:red;">*</sup></label>
					<input type="phone" name="userPhone" class="form-control" max-length="10" style="width:60%;" id="userPhone"  value="<?php echo $userPhone ; ?>">
					<span> <?php echo $userPhoneErr; ?> </span>
				</div>
				<div class="form-group">
					<label for="userGender">Select Gender<sup style="color:red;">*</sup></label>
					<select name="userGender" class="form-control"  style="width:60%;" id="userGender">
						<option></option><option value="male">Male</option><option value="female">Female</option>
					</select>
					<span> <?php echo $userGenderErr; ?> </span>
				</div>
				<br/>

				<?php
					if (  $update === TRUE ) :
				?>
					<input type="submit" name="detailsEditUpdate" class="form-control btn btn-warning" id="detailsEditUpdate" value="Update Details" style="width:40%;">
				<?php else : ?>
				<div class="row">
					<div class="col-md">
						<input type="submit" name="detailsSubmit" class="form-control btn btn-success" id="detailsSubmit" value="Submit Details" style="width:40%;">
					</div>
					<div class="col-md">
						<input type="reset" name="reset" class="form-control reset" id="reset" style="width:40%; border:none; text-decoration:underline;">
					</div>
				</div>
			<?php endif; ?>
			</form>

		</div>

		<div class="col-md-1"></div>
	</div>
</div> -->

<br/> <br/> <br/> <br/>
.

<br/><br/>  

<footer class="footer bg-success rounded-left">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md text-center" id="footerSec1">
				<p style="text-decoration:underline;">Quick Links</p>
				<a href="#p" class="footer-links">Home</a><br/>
				<a href="#" class="footer-links">About Us</a><br/>
				<a href="#" class="footer-links">Privacy Policy</a>
			</div>
			<div class="col-md text-center" id="footerSec2">
				Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
				consequat.
			</div>
			<div class="col-md text-center" id="footerSec3">
				<p>3<sup style="color:#000;">rd</sup> Street, CBD, Nairobi, Kenya</p>
				<p>
					<img src="../../images/phonecall.png" alt="" width="20px" height="20px">
					+254 700 000 000
				</p>
				<p>
					<img src="../../images/contacticons/email/gmailemail.png" alt="" width="20px" height="20px">
					614rollingstone@gmail.com
				</p>
			</div>
			<div class="col-md-1"></div>
		</div>
	</div>
</footer> 


</body>
</html>