<?php

session_start();

require('db_config.php');

$user = $_SESSION['user_id'];


if(!empty($_POST))
{
    $follower_id = mysqli_real_escape_string($conn,$_POST['follower']);

    $bool = 1;

     $sql = "INSERT INTO followsystem(user_id_follow,user_id_follower,status_follow) VALUES (?,?,?)";

     $stmt = mysqli_stmt_init($conn);

	 	if(!mysqli_stmt_prepare($stmt,$sql))
	 	{

	 		echo 'Error in insert sql';

	 	}
	 	else
	 	{

	 		 mysqli_stmt_bind_param($stmt, "iii" , $user, $follower_id, $bool);
             //run parameters inside database
             mysqli_stmt_execute($stmt);

             header("Location: workerprofile.php");
    		 exit();

	 	}
}