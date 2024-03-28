<?php
include'./db.php';
include './login_check.php';

if($_POST["course_title"] == '' ||  $_POST["course_code"] == '' || $_POST["course_credit"] == "" || $_POST["course_faculty"] == ""){
	echo "wrong";
}else{
	$courseName = $_POST['course_title'];
	$courseCode = $_POST['course_code'];
	$courseCredit = $_POST['course_credit'];
	$courseFaculty = $_POST['course_faculty'];

	$stmt = $conn->prepare("select * from courses_table where course_title = ? and is_delete = ? and user_id = ? limit 1"); 
  	$stmt->execute(array($courseName,0,$_SESSION["user_id"]));
  	$course = $stmt->fetch();

  	if(empty($course)){
  		$stmt = $conn->prepare("INSERT INTO `courses_table` (`user_id`,`course_title`, `couse_credit`, `course_code`,`faculty_name`) VALUES (:id,:title, :credit, :code,:faculty)"); 
  		$stmt->execute([
  		':id' 	=> $_SESSION["user_id"],
		':title' 	=> $courseName,
		':credit' 	=> $courseCredit,
		':code' 	=> $courseCode,
		':faculty' 	=> $courseFaculty
		]);

		if($conn->lastInsertId()){
			$_SESSION["success"] = "successfully course assigned!";
			unset($_SESSION["error"]);
			header("Location: ./index.php");
			die();
		}else{
			$_SESSION["error"] = "something is wrong!";
			unset($_SESSION['success']);
			header("Location: ./index.php");
			die();
		}
  	}else{
  		$_SESSION["error"] = "course already assigned!";
  		unset($_SESSION['success']);
		header("Location: ./index.php");
		die();
  	}
}
?>