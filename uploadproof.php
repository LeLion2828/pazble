<?php

session_start();
require('db_config.php');


// $fullname= $_SESSION['name'].$_SESSION['surname'];
$user_id = $_SESSION['user_id'];
$staus_proof = 0;

// var_dump($user_id);
// var_dump($fullname);

if(isset($_POST['uploadProof']))
{
    $file = $_FILES['proof'];

    //print_r($file);

    $fileName = $_FILES['proof']['name'];
    $fileTmpName = $_FILES['proof']['tmp_name'];
    $fileSize = $_FILES['proof']['size'];
    $fileType = $_FILES['proof']['type'];
    $fileError = $_FILES['proof']['error'];

    $filesExt = explode('.',  $fileName);

    $fileActualExt = strtolower(end($filesExt));

    $allowed = array('jpg' , 'jpeg' , 'png');

    $myname = 'proof';

    if(in_array($fileActualExt, $allowed))
    {
        if ($fileError === 0)
        {
            if($fileSize < 1000000)
            {

                $fileNameNew = uniqid($myname , true).".".$fileActualExt;

                mkdir('uploadproof/'.$user_id);

                $fileDestination = 'uploadproof/'.$user_id.'/'.$fileNameNew;

                move_uploaded_file($fileTmpName, $fileDestination);

                $sqlINSERT = "INSERT INTO uploadproof(paths,status_proof,user_id) VALUES (?,?,?)";

                $stmt = mysqli_stmt_init($conn);


              if(!mysqli_stmt_prepare($stmt, $sqlINSERT))
              {
                echo "SQL ERROR";
              }
              else
              {
                //bind the parameters to the placeholder
                mysqli_stmt_bind_param($stmt, "sii" ,$fileDestination,$staus_proof,$user_id);
                //run parameters inside database
                mysqli_stmt_execute($stmt);


                header("location:workerprofile.php?uploadsuccess");
            }




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



                // }


            }
            else
            {
                header("location:workerprofile.php?upload=large");
                // echo "file is too large!";
            }

        }
        else
        {
            header("location:workerprofile.php?upload=error");
            // echo "There was an error uploading your file!";
        }

    }
    else
    {
        header("location:workerprofile.php?upload=type");
        // echo "you cannot upload file of this type";

        // echo $fileActualExt;
    }
}

?>
