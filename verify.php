<?php

session_start();

$_SESSION['mobile'];

require('db_config.php');

if(!empty($_POST))
{
   $code_checking = mysqli_real_escape_string($conn,$_POST['code']);
   $status = 0;
   $statuschecked = 1;

       $sql = "SELECT * FROM users WHERE phone = ? and verify_code = ? and status_check = ? ";
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

                 mysqli_stmt_bind_param($stmt, 'ssi' , $_SESSION['mobile'],$code_checking,$status);
                 //run parameters inside database
                 mysqli_stmt_execute($stmt);

                 $result = mysqli_stmt_get_result($stmt);

                 if(mysqli_num_rows($result) == 1 )
                 {

                   $sqlupdate = "UPDATE users SET status_check= ? WHERE phone = ? and verify_code =? and status_check= ? ";

                   $stmtupdate = mysqli_stmt_init($conn);

                   //prepare the prepared statment
                   if(!mysqli_stmt_prepare($stmtupdate,$sqlupdate))
                   {
                       echo "SQL statement error";
                   }
                   else
                   {

                     mysqli_stmt_bind_param($stmtupdate, 'issi' , $statuschecked,$_SESSION['mobile'],$code_checking,$status);
                     //run parameters inside database
                     mysqli_stmt_execute($stmtupdate);

                   }

                      header("location: index.php?check=success");
                 }
                 else
                 {
                   echo "<p class='text-white errormsg'>code does not match try again</p>";
                 }

       }
}



 ?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;600;700&display=swap" rel="stylesheet"> 


    <link href="css/form.css" rel="stylesheet">

    <title>menu</title>

    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <script src="bootstrap/jquery.min.js"></script>
    <script src="bootstrap/popper.min.js"></script>
    <script src="bootstrap/bootstrap.min.js"></script>

    <!-- CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <link rel="icon" href="">
</head>


<body class="container back">


 <div class="row">
     <div class="col text-center text-white errormsg"><h3>Verification</h3></div>
 </div><br/>


 <div class="row">

     <div class="col-md-3"></div>

     <div class="col-md-6 text-center">

         <div class="container-fluid">

             <form method="post" action="#">

                 <div class="form-input">

                     <i class="fa fa-user-secret fa-2x customize" aria-hidden="true"></i>
                     <input type="text" name="code" placeholder="Enter the code"><br/>
                     <input class="btn btn-primary" type="submit" name="code_v" value="send code"><br/>

                 </div>

             </form>

         </div>

         <div class="col-md-3"></div>

     </div>
 </div>

</body>
</html>
