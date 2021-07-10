<?php 
session_start() ;
require '../../connection.php' ;

// require_once '../registered/activeusersession.php' ;
 

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
			// $_SESSION['loggedin'] ; 
			$_SESSION['user_name'] = $userloginLastName ;   

			if(!empty($_POST["remember"])) {
				setcookie('userloginphone', $_POST['userloginphone'], time( ) +  (86400 * 2), "/");
				setcookie('userloginLastName', $_POST['userloginLastName'], time( ) +  (86400 * 2), "/");
				setcookie('userloginpassword', $_POST['userloginpassword'], time( ) +  (86400 * 2), "/");
			} else {
				setcookie('userloginphone',"");
				setcookie('userloginLastName', $_POST['userloginLastName'], time( ) +  (86400 * 2), "/");
				setcookie('userloginpassword',"");
			}

			header('location: ../registered/homeregistered.php?#') ;  
			exit() ;
		}
	} else {
			$_SESSION['failCred'] ;
			$_SESSION['classTypeError'] ;
			header('location: homeguests.php?credentialsReject') ;
			exit() ; 
		}

 





}





?>




</body>
</html>