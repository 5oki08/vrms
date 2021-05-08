<!DOCTYPE html>
<html lang="en">
<head>
	<title>VRMS-GuestHome</title>
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
		<li class="nav-item"><a href="homeguests.php" class="nav-link" id="active">Home</a></li>
		<li class="nav-item"><a href="#" class="nav-link">About Us</a></li>
		<li class="nav-item"><a href="#" class="nav-link">Vehicle</a></li>
		<li class="nav-item"><a href="#" class="nav-link">Contact Us</a></li>
		<li class="nav-item"><a href="loginregisterguests.php" class="nav-link">Login/Register</a></li>
	</nav>
</div>
<br/>
<div class="container-fluid">
	<div class="row" style="text-align:center;">
		<div class="col-md-1"></div>
		<div class="col-md-10">
			<div class="jumbotron">
				<div class="row">
					<div class="col-md">
						<h4>Vehicle Rental Management System</h4>
					</div>
					<div class="col-md">
						<img src="../../images/vrmslogo.png">
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-1"></div>
	</div>
</div>
<br/>
<div class="container-fluid">
	<div class="row">
		<div class="col-md">
			<button type="button" class="btn btn-info btn-block wheelexpl" data-toggle="collapse" data-target="#fourwheelcollapse">Four Wheeler</button> <br/>
			<div id="fourwheelcollapse" class="collapse">
			    
			    <div class="panel-group twowheeler">
				  <div class="panel panel-default">
				  	<div class="card twowheelersamples" style="border:none;">
				  		<div class="card-header">
				  			<div class="panel-heading">
						      <h4 class="panel-title">
						        <a data-toggle="collapse" href="#fourwheelercar">Four Wheelers Available</a>
						      </h4>
						    </div>
				  		</div>
					    <div class="card-body" style="border:none;">
					    	 <div id="fourwheelercar" class="panel-collapse collapse">
						      <div class="panel-body">
						      	<figure>
						      		<img src="../../images/twowheeler/twowheeler1.png" alt="" class="twowheelerimgs">
						      		<figcaption class="twowheelercaption">ABCD</figcaption>
						      	</figure> <br/>
						      	<figure>
						      		<img src="../../images/twowheeler/twowheeler2.jpg" alt="" class="twowheelerimgs">
						      		<figcaption class="twowheelercaption">EFGH</figcaption>
						      	</figure> <br/>
						      	<figure>
						      		<img src="../../images/twowheeler/twowheeler3.jpg" alt="" class="twowheelerimgs">
						      		<figcaption class="twowheelercaption">IJKL</figcaption>
						      	</figure> <br/>
						      	<figure>
						      		<img src="../../images/twowheeler/twowheeler4.jpg" alt="" class="twowheelerimgs">
						      		<figcaption class="twowheelercaption">MNOP</figcaption>
						      	</figure> <br/>
						      	<figure>
						      		<img src="../../images/twowheeler/twowheeler5.jpg" alt="" class="twowheelerimgs">
						      		<figcaption class="twowheelercaption">QRST</figcaption>
						      	</figure>
						      </div>
						    </div>
					    </div>
					</div>    
				  </div>
				</div> 

			<br/>				
			</div>
		</div>
		<div class="col-md">
			<button type="button" class="btn btn-info btn-block wheelexpl" data-toggle="collapse" data-target="#twowheelcollapse">Two Wheeler</button> <br/>
		    <div id="twowheelcollapse" class="collapse">
			
			<div class="panel-group twowheeler">
				  <div class="panel panel-default">
				  	<div class="card twowheelersamples" style="border:none;">
				  		<div class="card-header">
				  			<div class="panel-heading">
						      <h4 class="panel-title">
						        <a data-toggle="collapse" href="#twowheelercars" class="twowheelertitles">Two Wheelers Currently Available</a>
						      </h4>
						    </div>
				  		</div>
					    <div class="card-body" style="border:none;">
					    	 <div id="twowheelercars" class="panel-collapse collapse">
						      <div class="panel-body">
						      	<figure>
						      		<img src="../../images/twowheeler/twowheeler1.png" alt="" class="twowheelerimgs">
						      		<figcaption class="twowheelercaption">ABCD</figcaption>
						      	</figure> <br/>
						      	<figure>
						      		<img src="../../images/twowheeler/twowheeler2.jpg" alt="" class="twowheelerimgs">
						      		<figcaption class="twowheelercaption">EFGH</figcaption>
						      	</figure> <br/>
						      	<figure>
						      		<img src="../../images/twowheeler/twowheeler3.jpg" alt="" class="twowheelerimgs">
						      		<figcaption class="twowheelercaption">IJKL</figcaption>
						      	</figure> <br/>
						      	<figure>
						      		<img src="../../images/twowheeler/twowheeler4.jpg" alt="" class="twowheelerimgs">
						      		<figcaption class="twowheelercaption">MNOP</figcaption>
						      	</figure> <br/>
						      	<figure>
						      		<img src="../../images/twowheeler/twowheeler5.jpg" alt="" class="twowheelerimgs">
						      		<figcaption class="twowheelercaption">QRST</figcaption>
						      	</figure>
						      </div>
						    </div>
					    </div>
					</div>    
				  </div>
				</div>     

			</div>
		</div>
	</div>
</div>

</body>
</html>