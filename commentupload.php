<?php

// session_start();
// require('db_config.php');

// var_dump($_SESSION['name']);
// var_dump($_SESSION['surname']);
// $user_id = $_SESSION['user_id'];

// if(isset($_POST['uploadComment']))
// {
//     $file = $_FILES['commentupload'];

//     // print_r($file);

//     $fileName = $_FILES['commentupload']['name'];
//     $fileTmpName = $_FILES['commentupload']['tmp_name'];
//     $fileSize = $_FILES['commentupload']['size'];
//     $fileType = $_FILES['commentupload']['type'];
//     $fileError = $_FILES['commentupload']['error'];

//     $filesExt = explode('.',  $fileName);

//     $fileActualExt = strtolower(end($filesExt));

//     $allowed = array('jpg' , 'jpeg' , 'png');

//     $myname = $_SESSION['Fullname'];

    // if(in_array($fileActualExt, $allowed))
    // {
    //     if ($fileError === 0)
    //     {
    //         if($fileSize < 1000000)
    //         {

    //             $fileNameNew = uniqid($myname , true).".".$fileActualExt;

    //             mkdir('commentupload/'.$user_id);

    //             $fileDestination = 'commentupload/'.$user_id.'/'.$fileNameNew;

    //             move_uploaded_file($fileTmpName, $fileDestination);

    //             header("location:newsfeedclient.php?uploadsuccess");



                // $sqlCheck = " SELECT * FROM users WHERE user_id = ?";

                // $stmtCheck = mysqli_stmt_init($conn);

                // if(!mysqli_stmt_prepare($stmtCheck,$sqlCheck))
                // {
                //     echo "SQL Select Error";
                // }
                // else
                // {
                //     mysqli_stmt_bind_param($stmtCheck,'i', $user_id);

                //     mysqli_stmt_execute($stmtCheck);


                //     $result = mysqli_stmt_get_result($stmtCheck);

                //     $resultExist =  mysqli_fetch_assoc($result);


                //     if(mysqli_num_rows($result) > 0)
                //     {
                //         unlink($resultExist['gravatar']);

                //         $sqlUpdate = "UPDATE users SET gravatar = ? WHERE user_id = ?";

                //         $stmtUpdate = mysqli_stmt_init($conn);

                //         if(!mysqli_stmt_prepare($stmtUpdate, $sqlUpdate))
                //         {
                //             echo "SQL Update ERROR";
                //         }
                //         else
                //         {
                //             //bind the parameters to the placeholder
                //             mysqli_stmt_bind_param($stmtUpdate, "si",$fileDestination ,$user_id);
                //             //run parameters inside database
                //             mysqli_stmt_execute($stmtUpdate);
                //         }


                //     }
                //     else
                //     {

                //         //using prepare statement - Creating a template
                //         $sql = "UPDATE users SET gravatar = ? WHERE user_id = ?";

                //         $stmt = mysqli_stmt_init($conn);

                //         if(!mysqli_stmt_prepare($stmt, $sql))
                //         {
                //             echo "SQL Update ERROR";
                //         }
                //         else
                //         {
                //             //bind the parameters to the placeholder
                //             mysqli_stmt_bind_param($stmt, "si",$fileDestination ,$user_id);
                //             //run parameters inside database
                //             mysqli_stmt_execute($stmt);
                //         }


                //     }

                // }


//             }
//             else
//             {
//                 header("location:newsfeedclient.php?upload=large");
//                 // echo "file is too large!";
//             }

//         }
//         else
//         {
//             header("location:newsfeedclient.php?upload=error");
//             // echo "There was an error uploading your file!";
//         }

//     }
//     else
//     {
//         header("location:newsfeedclient.php?upload=type");
//         // echo "you cannot upload file of this type";
//     }

// }

?>
