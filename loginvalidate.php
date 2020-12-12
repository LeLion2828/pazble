<?php


session_start();
//connecting the database
require('db_config.php');

$error= false;

if(!empty($_POST))
{
    $phonelog = mysqli_real_escape_string($conn,$_POST['mobilenum']);
    $passlog = mysqli_real_escape_string($conn,$_POST['pwdlog']);

    if(empty($phonelog) || empty($passlog) )
  	{
    	header("Location: index.php?login=empty");
    	exit();
  	}
  	else
  	{

  		if(preg_match("/^[a-zA-Z ]*$/",$phonelog))
  		{
  			header("Location: index.php?phone=numbervalue");
    		exit();
  		}
  		else
  		{


  			//created a template
    $sql = "SELECT * FROM users WHERE phone = ? ";
    //$result = mysqli_query($conn,$sql);

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
        mysqli_stmt_bind_param($stmt, 's' , $phonelog);
        //run parameters inside database
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        if(mysqli_num_rows($result) == 1 )
        {
            //Returns an associative array that corresponds to the fetched row or FALSE if there are no more rows.
            $row = $result->fetch_assoc();

            $_SESSION['Fname'] = $row['Firstname'];
            $_SESSION['Lname'] = $row['Lastname'];
            $_SESSION['user_id'] = $row['user_id'];
            // $_SESSION['userType'] = $row['usertype'];

            //retrieving the hashed password from database and storing in a variable
            $hashed_password = $row['password'];
              
            if(password_verify($passlog, $hashed_password) && $row['status_check'] == 1 && $row['usertype'] == null )
            {
              
                header("location:setup.php"); //redirect to
            }
            elseif(password_verify($passlog, $hashed_password) && $row['status_check'] == 1 && $row['usertype'] == 'client')
            {
              
                 header("location:newsfeedclient.php");
            }
            elseif(password_verify($passlog, $hashed_password) && $row['status_check'] == 1 && $row['usertype'] == 'worker')
            {

                 header("location:newsfeedworker.php");
            }
           
        }
        else
        {

          header("Location: index.php?log=error");
          exit();
           
        }

    }
            
  		}

  	}

}
