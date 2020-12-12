<?php

session_start();
//connecting the database
require('db_config.php');


$user_id =  $_SESSION['user_id'];

if(!empty($_POST))
{

	$userType = mysqli_real_escape_string($conn,$_POST['position']);


    $sqlupdate = "UPDATE users SET usertype = ? WHERE user_id = ?";

      $updatestmt = mysqli_stmt_init($conn);

      if(!mysqli_stmt_prepare($updatestmt,$sqlupdate))
      {
         echo "SQL Update ERROR";
      }
      else
      {
        mysqli_stmt_bind_param($updatestmt,'si', $userType,$user_id);

        mysqli_stmt_execute($updatestmt);

        echo 'update';

        header("Location:logout.php");

      }
}