<?php
session_start();
session_unset();
session_destroy();
header("Location: course_tracker/login_reg_page.php");
die();