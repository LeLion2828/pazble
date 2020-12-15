<?php

session_start();

$user = $_SESSION['user_id'] ;


require('db_config.php');


// if(!empty($_FILES['commentupload']))
// {


//      $file = $_FILES['commentupload'];

//     $fileName = $_FILES['commentupload']['name'];
//     $fileTmpName = $_FILES['commentupload']['tmp_name'];
//     $fileSize = $_FILES['commentupload']['size'];
//     $fileType = $_FILES['commentupload']['type'];
//     $fileError = $_FILES['commentupload']['error'];

//     $filesExt = explode('.',  $fileName);

//     $fileActualExt = strtolower(end($filesExt));

//     $allowed = array('jpg' , 'jpeg' , 'png');

//     $myname = $_SESSION['Fname'];





//     if(in_array($fileActualExt, $allowed))
//     {

//         if ($fileError === 0)
//         {


//             if($fileSize < 1000000)
//             {


//                 $fileNameNew = uniqid($myname , true).".".$fileActualExt;

//                 mkdir('commentupload/'.$user_id);

//                 $fileDestination = 'commentupload/'.$user_id.'/'.$fileNameNew;

//                 move_uploaded_file($fileTmpName, $fileDestination);

//                 // $fileDestination = $_SESSION['loadPic'];

//                 // header("location:newsfeedclient.php?uploadsuccess");
//               }
//               else
//               {
                        
//               }
//             }
//             else
//             {

//             }
//           }
//           else
//           {
                  
//           }
             
// }

if(!empty($_POST['message']))
{
    $_SESSION['message'] = $_POST['message'];

    $message = mysqli_real_escape_string($conn,$_POST['message']);
    // $post_pic_comment = mysqli_real_escape_string($conn,$_POST['fileCommentPost']);



             

    $today = date("F j, Y, g:i a");

    $sql = "INSERT INTO happenings(comments,posted_time,user_id,comment_post) VALUES (?,?,?,?)";

   $stmt = mysqli_stmt_init($conn);

              //prepare the prepared statment
              if(!mysqli_stmt_prepare($stmt, $sql))
              {
                echo "SQL ERROR";
              }
              else
              {
                //bind the parameters to the placeholder
                mysqli_stmt_bind_param($stmt, "ssis", $message,$today,$user,$fileDestination);
                //run parameters inside database
                mysqli_stmt_execute($stmt);

       //          header("Location: client.php?happen=update");
    			// exit();
                // header("Refresh:0");
                echo 'done';
              }

}
