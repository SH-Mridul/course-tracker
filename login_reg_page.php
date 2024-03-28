<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Course Tracker</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: rgb(2,0,36);
      background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(42,130,118,1) 50%, rgba(7,111,132,1) 100%);
      margin: 0;
      padding: 0;
    }

    .header {
/*      background-color: #007bff;*/
      color: #fff;
      padding: 20px 0;
      text-align: center;
    }

    .container {
      max-width: 500px;
      margin: 20px auto;
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      overflow: hidden;
    }

    .tabs {
      display: flex;
      justify-content: space-around;
      margin-bottom: 20px;
    }

    .tab {
      padding: 15px 20px;
      cursor: pointer;
      background-color: #ddd;
      flex-grow: 1;
      text-align: center;
    }

    .active {
      background-color: #ccc;
    }

    .content {
      padding: 20px;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      margin-bottom: 5px;
    }

    .form-group input {
      width: 95%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    .form-group button {
      width: 100%;
      padding: 10px;
      border: none;
      border-radius: 5px;
      background: rgb(2,0,36);
      background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(42,130,118,1) 50%, rgba(7,111,132,1) 100%);
      color: #fff;
      cursor: pointer;
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

    @media only screen and (max-width: 600px) {
      .container {
        max-width: 90%;
      }
    }
  </style>
</head>
<body>

<div class="header">
  <h1>Course Tracker</h1>
  <p>[Track your progress in your courses]</p>
</div>

<div class="container">
  <div class="tabs">
    <div class="tab" id="loginTab" onclick="openTab('login')">Login</div>
    <div class="tab" id="registerTab" onclick="openTab('register')">Register</div>
  </div>
  <div class="content" id="loginContent">
    <h2 style="text-align: center;">Login</h2>

    <?php if(isset($_SESSION["error"]) && !empty($_SESSION["error"])){ ?> 
    <div class="alert">
    <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
    <?php echo $_SESSION["error"]; ?>
    </div> 
    <?php  unset($_SESSION['error']); } ?>

    <?php if(isset($_SESSION["success"]) && !empty($_SESSION["success"])){ ?> 
      <div class="success_alert">
      <span class="succ_closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
    <?php echo $_SESSION["success"]; ?>
      </div> 
    <?php  unset($_SESSION['success']); } ?>

    <form id="loginForm" autocomplete="off" action="login_submit.php" method="POST">
      <div class="form-group">
        <label for="loginEmail">Email:</label>
        <input type="email" autocomplete="off" id="loginEmail" name="login_email" placeholder="example@gmail.com" required>
      </div>
      <div class="form-group">
        <label for="loginPassword">Password:</label>
        <input type="password" autocomplete="off" id="loginPassword" name="login_pass" placeholder="*********" required>
      </div>
      <div class="form-group">
        <button type="submit">Login</button>
      </div>
    </form>
  </div>
  <div class="content" id="registerContent" style="display: none;">
    <h2 style="text-align: center;">Register</h2>
    <form id="registerForm" action="registration_submit.php" autocomplete="off" method="POST">
      <div class="form-group">
        <label for="registerName">Name:</label>
        <input autocomplete="off" type="text" id="registerName" name="name" placeholder="maru" required>
      </div>
      <div class="form-group">
        <label for="registerEmail">Email:</label>
        <input autocomplete="off" type="email" id="registerEmail" name="email" placeholder="example@gmail.com" required>
      </div>
      <div class="form-group">
        <label for="registerPassword">Password:</label>
        <input autocomplete="off" type="password" id="registerPassword" placeholder="*********" name="pass" required>
      </div>
      <div class="form-group">
        <button type="submit">Register</button>
      </div>
    </form>
  </div>
</div>

<script>
  function openTab(tabName) {
    var i, contentTab, tabLinks;
    contentTab = document.getElementsByClassName("content");
    for (i = 0; i < contentTab.length; i++) {
      contentTab[i].style.display = "none";
    }
    tabLinks = document.getElementsByClassName("tab");
    for (i = 0; i < tabLinks.length; i++) {
      tabLinks[i].classList.remove("active");
    }
    document.getElementById(tabName + "Content").style.display = "block";
    document.getElementById(tabName + "Tab").classList.add("active");
  }
</script>
</body>
</html>
