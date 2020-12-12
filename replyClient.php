
<?php

session_start();
require('db_config.php');

$replyusers =  $_SESSION['user_id'];
$today = date("F j, Y, g:i a");


if(!empty($_POST))
{
  
  $reply = mysqli_real_escape_string($conn,$_POST['reply']);
  $hapen_id = mysqli_real_escape_string($conn,$_POST['hapen_id']);

  // var_dump($reply,$hapen_id,$users);

     $sql = "INSERT INTO reply(reply_message,hapen_id,replyuserid,time_reply) VALUES (?,?,?,?)";
        $result= mysqli_query($conn,$sql1);

        //Create a prepare statement
        $stmt = mysqli_stmt_init($conn);

        //prepare the prepared statment
        if(!mysqli_stmt_prepare($stmt,$sql))
        {
          echo "SQL statement error";
        }
        else
        {
          //bind the parameters to the placeholder
          mysqli_stmt_bind_param($stmt, 'siis' , $reply,$hapen_id,$replyusers,$today);
          //run parameters inside database
          mysqli_stmt_execute($stmt);

          header('location:newsfeedclient.php');
      	}

}