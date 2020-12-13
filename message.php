<?php

session_start();

$user = $_SESSION['user_id'] ;

require('db_config.php');

if(!empty($_POST['message']))
{
    $_SESSION['message'] = $_POST['message'];

    $message = mysqli_real_escape_string($conn,$_POST['message']);
    $today = date("F j, Y, g:i a");

    $sql = "INSERT INTO happenings(comments,posted_time,user_id) VALUES (?,?,?)";

   $stmt = mysqli_stmt_init($conn);

              //prepare the prepared statment
              if(!mysqli_stmt_prepare($stmt, $sql))
              {
                echo "SQL ERROR";
              }
              else
              {
                //bind the parameters to the placeholder
                mysqli_stmt_bind_param($stmt, "ssi", $message,$today,$user);
                //run parameters inside database
                mysqli_stmt_execute($stmt);

       //          header("Location: client.php?happen=update");
    			// exit();
                // header("Refresh:0");
                echo 'done';
              }

}
