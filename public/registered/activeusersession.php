<?php	
	$profileName = $_SESSION['activeuser'] ;
	$fetchRecords = "SELECT *  FROM users WHERE sName='$profileName' " ;
										$fetchRecordsResult = mysqli_query($conn,$fetchRecords) ;

									if ($fetchRecordsResult->num_rows > 0) {
								   	 while($rowFetch = $fetchRecordsResult->fetch_array()) {
								 $profileName = $rowFetch['sName'] ;  	 	

?>
 