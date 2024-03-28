<?php
include'./db.php';
include './login_check.php';
$id = $_GET['id'];
if($id){
	$stmt = $conn->prepare("update courses_table set final_exam = '1', course_status = 0 where id = ?;"); 
	$stmt->execute(array($id));
	$stmt->setFetchMode(PDO::FETCH_BOTH);
if ($stmt->rowCount() > 0) {
    $_SESSION["success"] = "successfully updated!";
	unset($_SESSION["error"]);
	header("Location: ./index.php");
	die();
} else {
    $_SESSION["error"] = "something is wrong!";
	unset($_SESSION['success']);
	header("Location: ./index.php");
	die();
}
 }else{
 	$_SESSION["error"] = "something is wrong!";
	unset($_SESSION['success']);
	header("Location: ./index.php");
	die();
 }
