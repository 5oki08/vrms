
<?php

					// $id = 0 ;
					$q = intval($_GET['q']); 
					// mysqli_select_db($conn,"selecteddrive");
					$adminFetchRecords = "SELECT * FROM selecteddrive WHERE id = '".$q."'" ;
					$adminFetchRecordsResult = mysqli_query($conn,$adminFetchRecords) ;

					if ($adminFetchRecordsResult->num_rows > 0) {
				   	 while($rowFetch = $adminFetchRecordsResult->fetch_array()) {
				
										echo "<tr>";
  echo "<td>" . $rowFetch['snameregistered'] . "</td>";
  echo "<td>" . $rowFetch['selectedDriveWheel'] . "</td>";
  echo "<td>" . $rowFetch['numberOfdaysHired'] . "</td>";
  echo "<td>" . $rowFetch['paymentMode'] . "</td>";
  echo "<td>" . $rowFetch['PAYCodeInput'] . "</td>";
   echo "<td>" . $rowFetch['reg_date'] . "</td>";
     echo "<td>" . $rowFetch['status'] . "</td>";
  echo "</tr>";
					  } 
						} ?>  