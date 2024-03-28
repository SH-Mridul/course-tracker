<?php 
include './db.php';
include './session_settings.php';

if($_POST["login_email"] == '' ||  $_POST["login_pass"] == ''){
	unset($_SESSION['success']);
	$_SESSION["error"] = "something is wrong!";
	header("Location: ./login_reg_page.php");
}

$userEmail = $_POST["login_email"];
$password  = $_POST["login_pass"]; 

try {
  $stmt = $conn->prepare("select id, user_name, user_email, user_status from users_table where user_email = ? and user_password = ? limit 1"); 
  $stmt->execute(array($userEmail, $password));
  $user = $stmt->fetch();

  if(empty($user)){
  	unset($_SESSION['success']);
  	$_SESSION["error"] = "email or password wrong,please check!";
  	header("Location: ./login_reg_page.php");
  	die();
  }else{
	  $_SESSION["user_name"]  	= $user['user_name'];
		$_SESSION["user_id"]    	= $user['id'];
		$_SESSION["user_email"] 	= $user['user_email'];
		$_SESSION["user_password"] 	= "true";
		$_SESSION["is_login"] 		= "true";

		if($user["user_status"]){
			$_SESSION["login_status"] = "true";
		}else{
			unset($_SESSION['success']);
			$_SESSION["error"] = "this user is blocked!";
		}

		header("Location: ./index.php");
		die();
  }

} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}

?>