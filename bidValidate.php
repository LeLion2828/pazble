<?php

session_start();

require('db_config.php');

$user = $_SESSION['user_id'];

// var_dump($_POST);


if(!empty($_POST))
{

	 $bidprice = mysqli_real_escape_string($conn,$_POST['bid_price']);
	 // $jobID = mysqli_real_escape_string($conn,$_POST['bid_price']);
	 $job_id = mysqli_real_escape_string($conn,$_POST['job_id']);
	 $postjob_id= mysqli_real_escape_string($conn,$_POST['postjob_id']);

	 // var_dump($bidprice);

	 if(empty($bidprice))
	 {
	 	header("Location: worker.php?price=empty");
    	exit();
	 }
	 else
	 {

	 	$sql = "INSERT INTO biding(user_id,job_id,bid_price,postjob_id) VALUES (?,?,?,?)";

	 	$stmt = mysqli_stmt_init($conn);

	 	if(!mysqli_stmt_prepare($stmt,$sql))
	 	{

	 		echo 'Error in insert sql';

	 	}
	 	else
	 	{

	 		 mysqli_stmt_bind_param($stmt, "iisi" , $user, $job_id, $bidprice,$postjob_id);
             //run parameters inside database
             mysqli_stmt_execute($stmt);

             header("Location: worker.php?success");
    		 exit();

	 	}

	 }


}