<?php
include'./db.php';
include './login_check.php';
$id = $_GET['id'];
if($id){
	$stmt = $conn->prepare("update courses_table set is_delete = '1' where id = ?;"); 
	$stmt->execute(array($id));
	$stmt->setFetchMode(PDO::FETCH_BOTH);
if ($stmt->rowCount() > 0) {
    $_SESSION["success"] = "successfully deleted!";
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
