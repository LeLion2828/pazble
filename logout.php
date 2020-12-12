<?php
 session_start();
 session_destroy();

 unset($_SESSION['Fname']);
 unset($_SESSION['user_id']);
 unset($_SESSION['Lname']);

 header("location:index.php");

 ?>
