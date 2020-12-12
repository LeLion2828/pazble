<?php

require('db_config.php');

if(!empty($_POST))
{
    $hapen = mysqli_real_escape_string($conn,$_POST['messageText']); 


    if(empty($hapen))
    {

    	 header("Location: client.php?happen=empty");
         exit();

    }
    else
    {

    	 $sql = "INSERT INTO happenings(comments) VALUES (?)";

    	 $stmt = mysqli_stmt_init($conn);

              //prepare the prepared statment
              if(!mysqli_stmt_prepare($stmt, $sql))
              {
                echo "SQL ERROR";
              }
              else
              {
                //bind the parameters to the placeholder
                mysqli_stmt_bind_param($stmt, "s", $hapen);
                //run parameters inside database
                mysqli_stmt_execute($stmt); 

                header("Location: client.php?happen=update");
    			exit();

              }

    }

   

}
