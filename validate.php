
<?php

session_start();

// Required if your environment does not handle autoloading
require __DIR__ . '/vendor/autoload.php';

// Use the REST API Client to make requests to the Twilio REST API
use Twilio\Rest\Client;


require('db_config.php');


if( !empty($_POST) )
{
  $FirstName = mysqli_real_escape_string($conn,$_POST['Fname']);
  $LastName = mysqli_real_escape_string($conn,$_POST['Lname']);
  $countryCode = mysqli_real_escape_string($conn,$_POST['country']);
  $mobile = mysqli_real_escape_string($conn,$_POST['phone']);
  $pass = mysqli_real_escape_string($conn,$_POST['pwd']);
  $confirmpass = mysqli_real_escape_string($conn,$_POST['conpwd']);

  // $code = uniqid();
  $status = 0;
  $_SESSION['mobile'] = $mobile;

  if(empty($FirstName) || empty($LastName) || empty($countryCode) || empty($mobile) || empty($pass) || empty($confirmpass))
  {
    header("Location: index.php?reg=empty");
    exit();
  }
  else
  {

    if(!preg_match("/^[a-zA-Z ]*$/",$FirstName) || !preg_match("/^[a-zA-Z ]*$/",$LastName) )
    {
      header("Location: index.php?reg=fname");
      exit();
    }
    else
    {

      if(!preg_match("/^(5[0-9]{7})+$/",$mobile))
      {
        header("Location: index.php?reg=phone");
        exit();
      }
      else
      {
        //Creating a template
        $sql1 = "SELECT phone From users WHERE phone = ? LIMIT 1";
        //$result= mysqli_query($conn,$sql1);

        //Create a prepare statement
        $stmt1 = mysqli_stmt_init($conn);

        //prepare the prepared statment
        if(!mysqli_stmt_prepare($stmt1,$sql1))
        {
          echo "SQL statement error";
        }
        else
        {
          //bind the parameters to the placeholder
          mysqli_stmt_bind_param($stmt1, 's' , $mobile);
          //run parameters inside database
          mysqli_stmt_execute($stmt1);

          $result = mysqli_stmt_get_result($stmt1);

          $phoneExist = mysqli_fetch_assoc($result);

          if (!empty($phoneExist) && mysqli_num_rows($result) > 0)
          {
            header("Location: index.php?reg=exist");
            exit();
          }
          else
          {

            if($pass == $confirmpass && empty($phoneExist))
            {

              $password= password_hash($pass, PASSWORD_DEFAULT);//hash password


               function RandomString($length)
      {
          $randstr = '';
          srand((double) microtime(TRUE) * 1000000);
          //our array add all letters and numbers if you wish
          $chars = array(
            'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'p',
            'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z', '1', '2', '3', '4', '5',
            '6', '7', '8', '9', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K',
            'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');

          for ($rand = 0; $rand <= $length; $rand++)
          {
              $random = rand(0, count($chars) - 1);
              $randstr .= $chars[$random];
          }
            return $randstr;
      }

               $randomNumber = RandomString(5);


              //using prepare statement - Creating a template
              $sql = "INSERT INTO users(Firstname,Lastname,countryCode,phone,password,verify_code,status_check) VALUES (?,?,?,?,?,?,?)";
              // mysqli_query($conn,$sql);

              //Create a prepare statement
              $stmt = mysqli_stmt_init($conn);

              //prepare the prepared statment
              if(!mysqli_stmt_prepare($stmt, $sql))
              {
                echo "SQL ERROR";
              }
              else
              {
                //bind the parameters to the placeholder
                mysqli_stmt_bind_param($stmt, "ssssssi" ,$FirstName,$LastName,$countryCode, $mobile, $password, $randomNumber , $status);
                //run parameters inside database
                mysqli_stmt_execute($stmt);

                //Your Account SID and Auth Token from twilio.com/console
                $sid = 'AC1be9ac991da20dab30bd7b3d22df4127';
                $token = 'fa268502dbc40f51611cb4ebabbdc6f7';
                $client = new Client($sid, $token);

                // Use the client to do fun stuff like send text messages!
                $client->messages->create(
                  // the number you'd like to send the message to
                  $countryCode.$mobile,
                  [
                    // A Twilio phone number you purchased at twilio.com/console
                    'from' => '+12055284823',
                    // the body of the text message you'd like to send
                    'body' => 'Verification Code:'.$randomNumber
                  ]
                );

                header("Location: verify.php");
                exit();
              }

            }
            else
            {
              header("Location: index.php?reg=pwdinvalid");
              exit();
            }


          }
        }

      }

    }




  }

}
