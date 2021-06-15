<?php 
session_start() ;
require '../../connection.php' ;

require_once '../registered/activeusersession.php' ;

// $_SESSION['activeuser'] = "$userloginphone" ;
$_SESSION['failCred'] = "Check Credentials" ;
$_SESSION['classTypeError'] = "danger" ;

$userloginphone = $userloginLastName = $userloginpassword = $userloginencryptpassword = '' ;
$userloginphoneErr = $userloginLastNameErr = $userloginpasswordErr = '' ;

if ( isset($_POST['loginSubmit']) ) {
	if ( empty($_POST['userloginphone']) ) {
		$userloginphoneErr = "Incorrect Phone Details" ;
	} else {
		$userloginphone = $_POST['userloginphone'] ;
	}
	if ( empty($_POST['userloginLastName']) ) {
		$userloginLastNameErr = "Incorrect Last Name" ;
	} else {
		$userloginLastName = $_POST['userloginLastName'] ;
	}
	if ( empty($_POST['userloginpassword']) ) {
		$userloginpasswordErr = "Incorrect Password" ;
	} else {
		$userloginpassword = $_POST['userloginpassword'] ;
	}

	$loginSql = " SELECT * FROM users WHERE userPhone='$userloginphone' && sName='$userloginLastName' && userPassword='".md5($userloginpassword)."' " ;
	$loginResult = mysqli_query($conn,$loginSql) ;
	$loginNum = mysqli_num_rows($loginResult) ;

	if ( $loginNum == 1 ) {
		if ( empty($userloginphoneErr) && empty($userloginLastNameErr) && empty($userloginpasswordErr) ) {
			$_SESSION['activeuser'] = $userloginLastName ;
			constant($_SESSION['activeuser']) ;
			header('location: ../registered/homeregistered.php?logged') ;
		}
	} else {
			$_SESSION['failCred'] ;
			$_SESSION['classTypeError'] ;
			header('location: homeguests.php?credentialsReject') ;
		}


}

?>




</body>
</html>