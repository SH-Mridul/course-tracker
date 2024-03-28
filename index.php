<?php 
include './db.php';
include './login_check.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Course Tracker</title>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" integrity="sha384-4LISF5TTJX/fLmGSxO53rV4miRxdg84mZsxmO8Rx5jGtp/LbrixFETvWa5a6sESd" crossorigin="anonymous">
<style>
  body{
    font-family: Arial, sans-serif;
    background: rgb(2,0,36);
    background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(42,130,118,1) 50%, rgba(7,111,132,1) 100%);
    color: #fff;
  }
  
  .header {
   /* background-color: #007bff;
    color: #fff;*/
    padding: 20px 0;
    text-align: center;
  }

  .user-info {
    margin-right: 20px;
  }

  @media (max-width: 576px) {
    .user-info {
      margin-right: 0;
      margin-top: 10px;
    }
  }
  
  table thead{
    color: #fff;
  }
  
  .btnS{
     font-family: Arial, sans-serif;
    background: rgb(2,0,36);
    background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(42,130,118,1) 50%, rgba(7,111,132,1) 100%);
    color: #fff;
    border: none;
    outline: none;
  }
  .btnS:hover{
    border-color: #ff9800;
    color: black;
    background: #bdddae;
    border: none;
    outline: none;
  }
  .nav-link{
   color: #fff;
  }

  .nav-link:hover{
   background: #bdddae;
   color: black;
  }
  .table-dark{
    background-color:transparent;
  }

  .alert {
      border-radius: 4px;
      padding: 5px;
      margin-bottom: 15px;
      background-color: #f44336;
      color: white;
      text-align: center;
    }

    .closebtn {
      margin-left: 15px;
      color: white;
      font-weight: bold;
      float: right;
      font-size: 22px;
      line-height: 20px;
      cursor: pointer;
      transition: 0.3s;
    }

    .closebtn:hover {
      color: black;
    }

    .success_alert {
      border-radius: 4px;
      padding: 5px;
      margin-bottom: 15px;
      background-color: #45ffb4;
      color: white;
      text-align: center;
    }

    .succ_closebtn {
      margin-left: 15px;
      color: white;
      font-weight: bold;
      float: right;
      font-size: 22px;
      line-height: 20px;
      cursor: pointer;
      transition: 0.3s;
    }


    .succ_closebtn:hover {
      color: black;
    }
    table {
      text-align: center;
    }
  
</style>
</head>
<body>

<div class="container-fluid">
  <div class="row">
    <div class="col-12 header">
      <h1>Course Tracker</h1>
      <div class="float-right user-info">
        <div class="dropdown">
          <button class="btn dropdown-toggle btnS" type="button" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php if($_SESSION["is_login"] == "true"){ echo $_SESSION["user_name"];} ?> 
          </button>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-12">
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#assignCourse">Assign Course</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" href="#currentCourse">Current Courses</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#incompleteCourse">Incomplete Courses</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#retakeCourse">Failed Courses</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#completedCourse">Completed Courses</a>
        </li>
      </ul>
    </div>
  </div>
<br><br>
    <?php if(isset($_SESSION["error"]) && !empty($_SESSION["error"])){ ?> 
    <div class="alert">
    <span class="closebtn" onclick="this.parentElement.style.display='none';"><i class="bi bi-x-octagon-fill"></i></span> 
    <?php echo $_SESSION["error"]; ?>
    </div> 
    <?php  unset($_SESSION['error']); } ?>

    <?php if(isset($_SESSION["success"]) && !empty($_SESSION["success"])){ ?> 
      <div class="success_alert">
      <span class="succ_closebtn" onclick="this.parentElement.style.display='none';"><i class="bi bi-x-octagon-fill"></i></span> 
    <?php echo $_SESSION["success"]; ?>
      </div> 
    <?php  unset($_SESSION['success']); } ?>

  <div class="tab-content">
    <div class="tab-pane fade " id="assignCourse">
      <h6 style="text-align: center;">Assign Course</h6>
      <form autocomplete="off" action="assign_course.php" method="POST">
        <div class="form-group">
          <label for="courseTitle">Course Title</label>
          <input type="text" class="form-control" id="courseTitle" placeholder="Enter course title" name="course_title" required>
        </div>

        <div class="form-group">
          <label for="courseCode">Course Code</label>
          <input type="text" class="form-control" id="courseCode" placeholder="Enter course code" name="course_code" required>
        </div>

        <div class="form-group">
          <label for="courseCredit">Course Credit</label>
          <input type="text" class="form-control" id="courseCredit" placeholder="Enter course credit" name="course_credit" required>
        </div>
        <div class="form-group">
          <label for="facultyName">Faculty Name</label>
          <input type="text" class="form-control" id="facultyName" placeholder="Enter faculty name" name="course_faculty" required>
        </div>
        <button type="submit" class="btn btnS btn-primary">Assign</button>
      </form>
    </div>

    <div class="tab-pane fade show active" id="currentCourse">
      <h6 style="text-align: center;">Current Courses</h6>
      <table class="table table-sm table-hover table-dark">
        <thead>
          <tr>
            <th>No</th>
            <th>Course Name</th>
            <th>Course Credit</th>
            <th>Faculty Name</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody style="color:#fff;">
          <?php 
            try {
              $stmt = $conn->prepare("select * from courses_table where user_id = ? and course_status = 1 and is_delete = 0"); 
              $stmt->execute(array($_SESSION['user_id']));
              $currentCourses = $stmt->fetchAll();

              if(!empty($currentCourses)){
                $i = 1;
                foreach ($currentCourses as $course) {
                  echo "<tr>";
                    echo "<td>".$i."</td>";
                    echo "<td>".$course['course_title']."</td>";
                    echo "<td>".$course['couse_credit']."</td>";
                    echo "<td>".$course['faculty_name']."</td>";
                    echo "<td>";

                    if($course['final_exam'] == 0 && $course['course_status'] == 1 && $course['mid_exam'] == 0){
                            echo "<a href='mid_status_change.php?id=".$course['id']." type='button' class='btn btn-secondary  btn-sm'>Mid Term Done</a>&nbsp";
                    }
                     echo   "<a href='final_status_change.php?id=".$course['id']." type='button' class='btn btn-info btn-sm'>Final Term Done</a>&nbsp";

                     echo   "<a href='complete_status_change.php?id=".$course['id']." type='button' class='btn btn-success btn-sm'>Course Completed</a>";
                     if($course['final_exam'] == 0 && $course['course_status'] == 1 && $course['mid_exam'] == 0){
                      echo "<a href = 'delete_course.php?id=".$course['id']."' type='button' class='btn btn-danger btn-sm'><i class='bi bi-trash3-fill'></i></a>
                          </td>";
                        }
                  echo "</tr>";
                  $i++;
                }
              }else{
                echo "<tr><td colspan='5' style='color:#f35f5f; text-align:center;'>Not assigned any course!</td></tr>";
              }

            } catch(PDOException $e) {
              echo "Error: " . $e->getMessage();
            }         
          ?>
        </tbody>
      </table>
    </div>

    <div class="tab-pane fade" id="incompleteCourse">
      <h6 style="text-align: center;">Incomplete Courses</h6>
      <table class="table table-sm table-hover table-dark">
        <thead>
          <tr>
            <th>No</th>
            <th>Course Name</th>
            <th>Course Credit</th>
            <th>Faculty Name</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            try {
              $stmt = $conn->prepare("SELECT * FROM courses_table WHERE user_id = ? AND is_delete = 0 AND ((mid_exam = 1 AND final_exam = 0) OR (mid_exam = 0 AND final_exam = 1) OR (mid_exam = 0 AND final_exam = 0)) AND course_status = 0 AND mark_as_retake = 0;") ; 
              $stmt->execute(array($_SESSION['user_id']));
              $currentCourses = $stmt->fetchAll();

              if(!empty($currentCourses)){
                $i = 1;
                foreach ($currentCourses as $course) {
                  echo "<tr>";
                    echo "<td>".$i."</td>";
                    echo "<td>".$course['course_title']."</td>";
                    echo "<td>".$course['couse_credit']."</td>";
                    echo "<td>".$course['faculty_name']."</td>";
                    echo "<td>";

                    if($course['course_status'] == 0 && $course['mid_exam'] == 0){
                            echo "<a href='mid_status_change.php?id=".$course['id']." type='button' class='btn btn-secondary  btn-sm'>Mid Term Done</a>&nbsp";
                    }

                    if($course['course_status'] == 0 && $course['final_exam'] == 0){
                     echo   "<a href='final_status_change.php?id=".$course['id']." type='button' class='btn btn-info btn-sm'>Final Term Done</a>&nbsp";
                     }

                     echo   "<a href='failed_status_change.php?id=".$course['id']." type='button' class='btn btn-danger btn-sm'>Mark As Failed</a>
                        </td>";
                  echo "</tr>";
                  $i++;
                }
              }else{
                echo "<tr><td colspan='5' style='color:#f35f5f; text-align:center;'>There is no incompleted courses!</td></tr>";
              }

            } catch(PDOException $e) {
              echo "Error: " . $e->getMessage();
            }         
          ?>
        </tbody>
      </table>
    </div>

    <div class="tab-pane fade" id="retakeCourse">
      <h6 style="text-align: center;">Failed Courses</h6>
      <table class="table table-sm table-hover table-dark">
        <thead>
          <tr>
            <th>No</th>
            <th>Course Name</th>
            <th>Course Credit</th>
            <th>Faculty Name</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            try {
              $stmt = $conn->prepare("select * from courses_table where user_id = ? and is_delete = 0 and course_status = 0 and mark_as_retake = 1") ; 
              $stmt->execute(array($_SESSION['user_id']));
              $currentCourses = $stmt->fetchAll();

              if(!empty($currentCourses)){
                $i = 1;
                foreach ($currentCourses as $course) {
                  echo "<tr>";
                    echo "<td>".$i."</td>";
                    echo "<td>".$course['course_title']."</td>";
                    echo "<td>".$course['couse_credit']."</td>";
                    echo "<td>".$course['faculty_name']."</td>";
                    echo "<td>";

                     echo   "<a href='retake_status_change.php?id=".$course['id']." type='button' class='btn btn-success btn-sm'>Retake</a>
                        </td>";
                  echo "</tr>";
                  $i++;
                }
              }else{
                echo "<tr><td colspan='5' style='color:#f35f5f; text-align:center;'>There is no failed courses!</td></tr>";
              }

            } catch(PDOException $e) {
              echo "Error: " . $e->getMessage();
            }         
          ?>
        </tbody>
      </table>
    </div>

    <div class="tab-pane fade" id="completedCourse">
      <h6 style="text-align: center;">Completed Courses</h6>
      <table class="table table-sm table-hover table-dark">
        <thead>
          <tr>
            <th>No</th>
            <th>Course Name</th>
            <th>Course Credit</th>
            <th>Faculty Name</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            try {
              $stmt = $conn->prepare("select * from courses_table where user_id = ? and is_delete = 0 and course_status = 0 and mark_as_retake = 0 and mid_exam = 1 and final_exam = 1") ; 
              $stmt->execute(array($_SESSION['user_id']));
              $currentCourses = $stmt->fetchAll();

              if(!empty($currentCourses)){
                $i = 1;
                foreach ($currentCourses as $course) {
                  echo "<tr>";
                    echo "<td>".$i."</td>";
                    echo "<td>".$course['course_title']."</td>";
                    echo "<td>".$course['couse_credit']."</td>";
                    echo "<td>".$course['faculty_name']."</td>";
                    if($course['mark_as_passed'] == 0 ){
                    echo "<td><a href='failed_status_change.php?id=".$course['id']." type='button' class='btn btn-danger btn-sm'>Mark As Failed</a>&nbsp";
                    echo "<a href='passed_status_change.php?id=".$course['id']." type='button' class='btn btn-success btn-sm'>Mark As Passed</a></td>";
                    }else{
                      echo "<td><button type='button' class='btn btn-success btn-sm' data-placement='top' title='You passed this course'><i class='bi bi-check2-all'></i></button></td>";
                    }
                    
                  echo "</tr>";
                  $i++;
                }
              }else{
                echo "<tr><td colspan='5' style='color:#f35f5f; text-align:center;'>Not Completed any course!</td></tr>";
              }

            } catch(PDOException $e) {
              echo "Error: " . $e->getMessage();
            }         
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
