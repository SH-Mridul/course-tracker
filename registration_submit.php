<?php
include'./db.php';
include './session_settings.php';

if($_POST["name"] == '' ||  $_POST["email"] == '' || $_POST["pass"] == ""){
	$_SESSION["error"] = "something is wrong!";
	unset($_SESSION['success']);
	header("Location: ./login_reg_page.php");
	die();
}else{
	$name = $_POST['name'];
	$email = $_POST['email'];
	$pass = $_POST['pass'];

	$stmt = $conn->prepare("select id, user_name, user_email, user_status from users_table where user_email = ? limit 1"); 
  	$stmt->execute(array($email));
  	$user = $stmt->fetch();

  	if(empty($user)){
  		$stmt = $conn->prepare("INSERT INTO `users_table` (`user_name`, `user_email`, `user_password`) VALUES (:name, :email, :pass)"); 
  		$stmt->execute([
		':name' 	=> $name,
		':email' 	=> $email,
		':pass' 	=> $pass
		]);

		if($conn->lastInsertId()){
			$_SESSION["success"] = "successfully registered! now you can login!";
			unset($_SESSION['error']);
			header("Location: ./login_reg_page.php");
			die();
		}else{
			$_SESSION["error"] = "something is wrong!";
			unset($_SESSION['success']);
			header("Location: ./login_reg_page.php");
			die();
		}
  	}else{
  		$_SESSION["error"] = "user already exists!";
  		unset($_SESSION['success']);
		header("Location: ./login_reg_page.php");
		die();
  	}
}
?>