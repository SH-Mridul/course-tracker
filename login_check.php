<?php
	session_start();
	if($_SESSION["user_name"] == "" || $_SESSION["user_id"] == "0" || $_SESSION["user_password"] == "false" ||$_SESSION["is_login"] == "false" || $_SESSION["login_status"] == "false" || $_SESSION["user_email"] == ""){
		header("Location: ./login_reg_page.php");
		die();
	}