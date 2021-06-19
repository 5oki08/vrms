<?php

require '../../connection.php' ;

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


.d-sm-table-cell { padding-left: 10px; padding-right: 10px; }



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
		<div class="col-md-2 bg-light text-left">
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
					    <li class="active"> <a href="fourwheeleradmin.php" class="text-dark bg-light font-weight-bold">Four Wheeler Vehicles</a> </li>
					    <li> <a href="#" class="text-dark">Bookings</a> </li>
						 <li> <a href="../registered/logoutregistered.php" class="text-dark">Log Out</a> </li>  
				      </ul>
				    </div> 
				  </div>
				</nav>
 
			</header>
		</div>

		<div class="col-md-10">
			
			<header class=" text-center w-100">
				<nav  class="navbar navbar-inverse bg-light  border border-top-0 border-left-0 border-right-0">
					
				    <div class=" navbar-expand bg-light d-table" id="twowheelNav">
				      <ul class="nav navbar-nav text-nowrap d-table-row">
				        <li class=" d-sm-table-cell"> <a href="fourwheeleradmin.php" class="text-dark bg-light">Aston Martin</a> </li>
				        <li class="active d-sm-table-cell"> <a href="fourwheeleradminMitsubishi.php" class="text-dark bg-light">Mitsubishi</a> </li>
						<li class=" d-sm-table-cell"> <a href="fourwheeleradminJeep.php" class="text-dark bg-light">Jeep</a> </li> 
						<li class=" d-sm-table-cell"> <a href="fourwheeladminAddNew.php" class="text-light bg-success font-weight-bold btn btn-lg btn-outline-success">Add New</a> </li>    
				      </ul>
				    </div> 
				</nav>
			</header>

			<div class="container-fluid">
				
				<div class="card-deck"> 
					<?php
					$id = 0 ;
						$adminFetchRecords = "SELECT * FROM fourwheel WHERE brand='Mitsubishi' " ;
						$adminFetchRecordsResult = mysqli_query($conn,$adminFetchRecords) ;

						if ($adminFetchRecordsResult->num_rows > 0) {
					   	 while($rowFetch = $adminFetchRecordsResult->fetch_assoc()) {
					   	 	$id++ ;
					   	 	
					?>
					<div class="card">
						<!--<img src="../../images/adminFourwheel/evo6.jpg" id="fourwheelercardimg" class="card-img-top w-25">  php to insert image --> 
						<div class="card-body" style="height: 100%;">
							<p class="text-center">
								<p hidden> <?php echo $rowFetch['id'] ; ?> </p>
								<p class="text-center font-weight-bold h3"> <?php echo $rowFetch['FourwheelName'] ; ?> </p>
								<hr style="width: 50%;" />
							</p> <br/>
							  <?php switch($id): 
								case 1: ?>
								    <div>
								    <!-- <?php echo "<img src='fourwheel/".$rowFetch['carImage']."' >";	?> -->
								    <a href="fourwheeleradminMitsubishievo6.php" class="btn btn-lg text-center btn-outline-primary text-dark font-weight-bold w-50 h-25" id="fourwheelermoreinfo">More Info</a>
								    </div> 
								<?php break; ?>
								<?php endswitch; ?>
						</div> 
					</div>
					<?php  }
					} ?>
				</div>  
				
			</div>

		</div>
 
	</div>
</div>


  
 



</body>
</html>