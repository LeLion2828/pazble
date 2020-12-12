<?php

session_start();

require('db_config.php');

$user = $_SESSION['user_id'] ;

if(!empty($_POST['worker']))
{
 
   $worker = mysqli_real_escape_string($conn,$_POST['worker']);

   $update = 'UPDATE users SET usertype = ? WHERE user_id = ?';


    $stmt = mysqli_stmt_init($conn);

    //prepare the prepared statment
    if(!mysqli_stmt_prepare($stmt,$update))
    {
        echo "SQL  update statement error";
    }
    else
    {
         //bind the parameters to the placeholder
        mysqli_stmt_bind_param($stmt, 'si' , $worker,$user);
        //run parameters inside database
        mysqli_stmt_execute($stmt);

    }


}



 ?>