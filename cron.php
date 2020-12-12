<?php

DEFINE('DB_USER','root');
DEFINE('DB_PASSWORD','');
DEFINE('DB_HOST','localhost');
DEFINE('DB_NAME','pazbleFinal');


//connect to the database
$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) OR die('could not connect to my MySQL: '.mysqli_connect_error(1));



if(!empty($_POST))
{
    
     $name = mysqli_real_escape_string($conn,$_POST['firstname']); 

    $user = 1;
    

    $sql = "UPDATE  users SET Firstname = ? WHERE user_id = ?";

    $stmt = mysqli_stmt_init($conn);

              //prepare the prepared statment
              if(!mysqli_stmt_prepare($stmt, $sql))
              {
                echo "SQL ERROR";
              }
              else
              {
                //bind the parameters to the placeholder
                mysqli_stmt_bind_param($stmt, "si", $name,$user);
                //run parameters inside database
                mysqli_stmt_execute($stmt); 

              }

}

 ?>



<!DOCTYPE html>
<html lang="en">
<head>
	<title>cron</title>
</head>
<body>


	<form action="#" method="post"> 

		<input type="text" name="firstname"><br><br>
		<input type="submit" name="btnsub">

	</form>

</body>
</html>