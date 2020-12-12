<?php

session_start();

require('db_config.php');

$user_id = $_SESSION['user_id'];


if(!empty($_POST))
{
   $userType = mysqli_real_escape_string($conn,$_POST['user']);

   if ($userType === 'client')
   {
      $sqlclient = "UPDATE users SET usertype = ? WHERE user_id = ?";

      $clientstmt = mysqli_stmt_init($conn);

      if(!mysqli_stmt_prepare($clientstmt,$sqlclient))
      {
         echo "SQL Update client ERROR";
      }
      else
      {
        mysqli_stmt_bind_param($clientstmt,'si', $userType,$user_id);

        mysqli_stmt_execute($clientstmt);

        header("Location:client.php");

      }
   }
   elseif($userType === 'worker')
   {
      $sqlworker = "UPDATE users SET usertype = ? WHERE user_id = ?";

      $workerstmt = mysqli_stmt_init($conn);

      if(!mysqli_stmt_prepare($workerstmt,$sqlworker))
      {
         echo "SQL Update worker ERROR";
      }
      else
      {
        mysqli_stmt_bind_param($workerstmt,'si',$userType,$user_id);

        mysqli_stmt_execute($workerstmt);

             $service = mysqli_real_escape_string($conn,$_POST['service']);
             $category = mysqli_real_escape_string($conn,$_POST['category']);
             $desc = mysqli_real_escape_string($conn,$_POST['desc']);
             $rate = mysqli_real_escape_string($conn,$_POST['rate']);

             $sqlinsert = "INSERT INTO profiles(service,category,description,rate,user_id) VALUES (?,?,?,?,?)";

             $insertstmt = mysqli_stmt_init($conn);

             if(!mysqli_stmt_prepare($insertstmt,$sqlinsert))
             {
                echo "insert sql error";
             }
             else
             {
               mysqli_stmt_bind_param($insertstmt,'ssssi',$service,$category,$desc,$rate,$user_id);

               mysqli_stmt_execute($insertstmt);
             }


          header("Location:worker.php");

      }
   }

}
