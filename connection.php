<?php

$servername = "localhost" ;
$username = "root" ;
$password = "" ;
$dbname = "vrms" ;
$conn = new mysqli($servername,$username,$password,$dbname) ;
// if ( $conn->error ) {
// 	echo "Connection to Db failed.";
// } else {
// 	echo "Connection to DB successful.";
// }

// $sql = " CREATE database vrms " ;
// if ( $conn->query($sql) ) {
// 	echo "Database Created, proceed with table.";
// } else {
// 	echo "Database not created" . $conn->error ;
// }

// $sql = " CREATE TABLE users (
// id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
// fName VARCHAR(250) NOT NULL,
// sName VARCHAR(250) NULL,
// userLocation VARCHAR(250) NOT NULL,
// userGender VARCHAR(250) NOT NULL,
// userAge VARCHAR(250) NOT NULL,
// userPhone VARCHAR(250) NOT NULL,
// userPassword VARCHAR(250) NOT NULL,
// reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
// ) " ;
// if ( $conn->query($sql) === TRUE ) {
// 	echo "Table Created, proceed with entries.";
// } else {
// 	echo "Table not created" . $conn->error ;
// }

// $sql = " CREATE TABLE selectedDrive (
// id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
// snameregistered VARCHAR(250) NOT NULL,
// selectedDrivetwoWheel VARCHAR(250) NOT NULL,
// numberOfdaysHired VARCHAR(250) NOT NULL,
// paymentMode VARCHAR(250) NOT NULL,
// mpesaCodeInput VARCHAR(250) NOT NULL,
// reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
// ) " ;
// if ( $conn->query($sql) === TRUE ) {
// 	echo "Table Created, proceed with entries.";
// } else {
// 	echo "Table not created" . $conn->error ;
// }

// $sql = " CREATE TABLE adminusers (
// id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
// adminfirstName VARCHAR(250) NOT NULL,
// adminSecondName VARCHAR(250) NOT NULL,
// adminEmail VARCHAR(250) NOT NULL,
// adminUniqueNumber VARCHAR(250) NOT NULL,
// reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
// ) " ;
// if ( $conn->query($sql) === TRUE ) {
// 	echo "Table Created, proceed with entries.";
// } else {
// 	echo "Table not created" . $conn->error ;
// }


// $sql = " CREATE TABLE fourwheel (
// id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
// brand VARCHAR(250) NOT NULL,
// FourwheelName VARCHAR(250) NOT NULL,
// modelyear VARCHAR(250) NOT NULL,
// fueltype VARCHAR(250) NOT NULL,
// sittingcapacity VARCHAR(250) NOT NULL,
// enginecylinders VARCHAR(250) NOT NULL,
// steeringside VARCHAR(250) NOT NULL,
// drivemodes VARCHAR(250) NOT NULL,
// transmission VARCHAR(250) NOT NULL,
// gearbox VARCHAR(250) NOT NULL,
// wheeldrive VARCHAR(250) NOT NULL,
// powersteering VARCHAR(250) NOT NULL,
// sparewheel VARCHAR(250) NOT NULL,
// horsepower VARCHAR(250) NOT NULL,
// hybrid VARCHAR(250) NOT NULL,
// priceperday VARCHAR(250) NOT NULL,
// reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
// ) " ;

// if ( $conn->query($sql) === TRUE ) {
// 	echo "Table Created, proceed with entries.";
// } else {
// 	echo "Table not created" . $conn->error ;
// }



?>