<?php

$_SESSION['classTypeAccept'] = "success" ;
$_SESSION['bookchecked'] = "Booking Status Changed. ^admin" ;
$_SESSION['enterName'] = "Enter Name" ;

require '../../connection.php' ;

$id = 0 ;
if ( isset($_GET['edit']) ) {
	$id = $_GET['edit'] ;
	$updateDecision = " UPDATE selecteddrive SET status='approved' WHERE id='$id' " ;
	$id= $_POST['id'] ;
	if ($conn->query($updateDecision) === TRUE ) {
		$_SESSION['bookchecked'] ;
		$_SESSION['classTypeAccept'] ;
		header('location: fourwheelerbookingadmin.php?recorddecision') ;
	}
} 
if ( isset($_GET['delete']) ) {
	$id = $_GET['delete'] ;
	$updateDecision = " UPDATE selecteddrive SET status='denied' WHERE id='$id' " ;
	$id= $_POST['id'] ;
	if ($conn->query($updateDecision) === TRUE ) {
		$_SESSION['bookchecked'] ;
		$_SESSION['classTypeAccept'] ;
		header('location: fourwheelerbookingadmin.php?recorddecision') ;
	}
}




?>





<!DOCTYPE html>
<html lang="en">
<head>
	<title>VRMS-admin</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> 	

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
.footer { padding: 30px;  width: 80%; justify-content: center; margin: 0 auto; }
.footer-links { color: #000; font-size: 15px; }
.footer-links:hover { font-weight: 600; color: #000; }

span { font-size: 12px; color: red; font-style: italic; }

.d-sm-table-cell { padding-left: 10px; padding-right: 10px; } 


#userListings { overflow-y: scroll; height: 160px; width: 50%; }


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
				        <li> <a href="regdusersadmin.php" class="text-dark">Users</a> </li>
					    <li> <a href="#" class="text-dark">Two Wheeler Vehicles</a> </li>   
					    <li > <a href="fourwheeleradmin.php" class="text-dark">Four Wheeler Vehicles</a> </li>
					    <li class="active"> <a href="fourwheelerbookingadmin.php" class="text-dark btn btn-lg border border-dark bg-light font-weight-bold">Bookings <sup class="badge badge-danger"><?php
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
			<p style="font-size:15px;" class="alert alert-<?php 
					if (isset($_GET['recorddecision'])) {
						echo $_SESSION['classTypeAccept'] ;
						session_unset();
						session_destroy();
						}?> w-50 text-center text-success text-nowrap font-weight-bold mx-auto " >
					<?php
						if ( isset($_GET['recorddecision']) ) {
							if (isset($_SESSION['bookchecked'])) {
								echo $_SESSION['bookchecked'] ;
								// session_unset() ;
								// session_destory() ;
							} else {
								echo "Booking Status Changed. ^admin";
							}
						}
					?>
				</p>
		 	<form action="fourwheelerbookingadmin.php" method="post">
				<input type="text" name="searchNamerecords" id="searchNamerecords" class="form-control form-control-lg w-50" placeholder="Last Name ...">
				<input type="submit" name="searchName" id="searchName" class="btn btn-lg btn-outline-success w-25" value="Search" style="margin-top:10px;">
			</form>    <br/> 

				<?php
					$name = "" ;
					if ( isset($_POST['searchName']) ) {
						if (  empty($_POST['searchNamerecords']) ) {
							$_SESSION['enterName'] ;
							if ( isset($_SESSION['enterName']) ) {
								if (isset($_SESSION['enterName'])) {
									echo $_SESSION['enterName'] ;
								}
							} ?>
								<table class="table table-hovered table-responsive-sm table-bordered w-100" id="userListings">

									<p style="font-size:15px;" class="alert alert-<?php 
										if (isset($_GET['recorddecision'])) {
											echo $_SESSION['classTypeAccept'] ;
											session_unset();
											session_destroy();
											}?> w-50 text-center text-success text-nowrap font-weight-bold mx-auto " >
										<?php
											if ( isset($_GET['recorddecision']) ) {
												if (isset($_SESSION['bookchecked'])) {
													echo $_SESSION['bookchecked'] ;
													// session_unset() ;
													// session_destory() ;
												} else {
													echo "Booking Status Changed. ^admin";
												}
											}
										?>
									</p>

									<tr class="font-weight-bold">
										<td hidden>ID</td>
										<td>S. Name</td>
										<td>Drive</td>
										<td>Days</td>
										<td>Payment Mode</td>
										<td>Transaction Code</td>
										<td>Last Update</td>
										<td>Status</td>

									</tr>
									
									<?php

										

										$adminFetchRecords = "SELECT * FROM selecteddrive  ORDER BY reg_date DESC" ;
										$adminFetchRecordsResult = mysqli_query($conn,$adminFetchRecords) ;

										if ($adminFetchRecordsResult->num_rows > 0) {
									   	 while($rowFetch = $adminFetchRecordsResult->fetch_array()) {

									?>

										

									 <tr>

											<td hidden> <?php echo $rowFetch['id'] ; ?> </td>
											<td> <?php echo $rowFetch['snameregistered'] ; ?> </td>
											<td> <?php echo $rowFetch['selectedDriveWheel'] ; ?> </td>
											<td> <?php echo $rowFetch['numberOfdaysHired'] ; ?> </td>
											<td> <?php echo $rowFetch['paymentMode'] ; ?> </td>
											 <td> <?php echo $rowFetch['PAYCodeInput'] ; ?> </td>
											<td  class="text-center"> <?php echo $rowFetch['reg_date'] ; ?> </td>
											<td class="text-center">
												<?php
													if ( $rowFetch['status'] === 'approved' ) { ?>
														<button class="btn btn-lg btn-success border border-0" style="cursor: default;">Approved</button>
											<?php		} elseif ( $rowFetch['status'] === 'denied' ) { ?>
												<button class="btn btn-lg btn-danger border border-0" style="cursor: default;">Denied</button>
											<?php } else { ?>
												<a href="fourwheelerbookingadmin.php?edit=<?php echo $rowFetch['id']?>" class="btn btn-lg btn-outline-success border border-0" onclick="confirm_change()" >approve</a>
												<a href="fourwheelerbookingadmin.php?delete=<?php echo $rowFetch['id']?>" class="btn btn-lg btn-outline-danger border border-0" onclick="confirm_change()" >deny</a>
											<?php }
												?>
											</td>
											 <td class="text-center">
											 	<?php echo $rowFetch['status'] ; ?>
											 </td> 
										</tr> 
									<?php }} ?>
									 
								</table>
						<?php } else {
							$name = $_POST['searchNamerecords'] ;


							$fetchSql = "SELECT * FROM selecteddrive WHERE snameregistered='$name'  ORDER BY reg_date DESC" ;
							$fetchSqlresult = mysqli_query($conn,$fetchSql);
							$numRows = mysqli_num_rows($fetchSqlresult) ;
							if ($numRows>0) {
								while ($row = mysqli_fetch_array($fetchSqlresult)) {
									?>
									<table class="table table-hovered table-responsive-sm table-bordered w-100" id="userListings">
										<tr class="font-weight-bold">
											<td hidden>ID</td>
											<td>S. Name</td>
											<td>Drive</td>
											<td>Days</td>
											<td>Payment Mode</td>
											<td>Transaction Code</td>
											<td>Last Update</td>
											<td>Status</td>
										</tr>
										<tr>
											<td hidden> <?php echo $row['id'] ; ?> </td>
											<td> <?php echo $row['snameregistered']; ?> </td>
											<td> <?php echo $row['selectedDriveWheel'] ; ?> </td>
											<td> <?php echo $row['numberOfdaysHired'] ; ?> </td>
											<td> <?php echo $row['paymentMode'] ; ?> </td>
											 <td> <?php echo $row['PAYCodeInput'] ; ?> </td>
											<td  class="text-center"> <?php echo $row['reg_date'] ; ?> </td>
											<td class="text-center">
												<?php
													if ( $row['status'] === 'approved' ) { ?>
														<button class="btn btn-lg btn-success border border-0" style="cursor: default;">Approved</button>
											<?php		} elseif ( $row['status'] === 'denied' ) { ?>
												<button class="btn btn-lg btn-danger border border-0" style="cursor: default;">Denied</button>
											<?php } else { ?>
												<a href="fourwheelerbookingadmin.php?edit=<?php echo $row['id']?>" class="btn btn-lg btn-outline-success border border-0" onclick="confirm_change()" >approve</a>
												<a href="fourwheelerbookingadmin.php?delete=<?php echo $row['id']?>" class="btn btn-lg btn-outline-danger border border-0" onclick="confirm_change()" >deny</a>
											<?php }
												?>
											</td>
											 <td class="text-center">
											 	<?php echo $row['status'] ; ?>
											 </td> 
										</tr> 
									</table>	
					<?php			}
							}
						}
					}
				?>


				<?php
				if ( !isset($_POST['searchName']) ) {
					if ( !isset($_POST['searchName']) ) { ?>

							<table class="table table-hovered table-responsive-sm table-bordered w-100" id="userListings">

				<tr class="font-weight-bold">
					<td hidden>ID</td>
					<td>S. Name</td>
					<td>Drive</td>
					<td>Days</td>
					<td>Payment Mode</td>
					<td>Transaction Code</td>
					<td>Last Update</td>
					<td>Status</td>

				</tr>
				
				<?php

					$adminFetchRecords = "SELECT * FROM selecteddrive ORDER BY reg_date DESC" ;
					$adminFetchRecordsResult = mysqli_query($conn,$adminFetchRecords) ;

					if ($adminFetchRecordsResult->num_rows > 0) {
				   	 while($rowFetch = $adminFetchRecordsResult->fetch_array()) {

				?>

					

				 <tr>

						<td hidden> <?php echo $rowFetch['id'] ; ?> </td>
						<td> <?php echo $rowFetch['snameregistered'] ; ?> </td>
						<td> <?php echo $rowFetch['selectedDriveWheel'] ; ?> </td>
						<td> <?php echo $rowFetch['numberOfdaysHired'] ; ?> </td>
						<td> <?php echo $rowFetch['paymentMode'] ; ?> </td>
						 <td> <?php echo $rowFetch['PAYCodeInput'] ; ?> </td>
						<td  class="text-center"> <?php echo $rowFetch['reg_date'] ; ?> </td>
						<td class="text-center">
							<?php
								if ( $rowFetch['status'] === 'approved' ) { ?>
									<button class="btn btn-lg btn-success border border-0" style="cursor: default;">Approved</button>
						<?php		} elseif ( $rowFetch['status'] === 'denied' ) { ?>
							<button class="btn btn-lg btn-danger border border-0" style="cursor: default;">Denied</button>
						<?php } else { ?>
							<a href="fourwheelerbookingadmin.php?edit=<?php echo $rowFetch['id']?>" class="btn btn-lg btn-outline-success border border-0" onclick="confirm_change()" >approve</a>
							<a href="fourwheelerbookingadmin.php?delete=<?php echo $rowFetch['id']?>" class="btn btn-lg btn-outline-danger border border-0" onclick="confirm_change()" >deny</a>
						<?php }
							?>
						</td>
						 <td class="text-center">
						 	<?php echo $rowFetch['status'] ; ?>
						 </td> 
					</tr> 
				<?php }} ?>
				 
			</table>
						
				<?php }	}

				?>

		</div>

	</div>
</div>

<br/><br/><br/>

.


<br/><br/><br/><br/><br/><br/><br/><br/>.

<script type="text/javascript">
function confirm_change() {
  return confirm('are you sure?');
}
</script> 

</body>
</html>