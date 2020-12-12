<?php

session_start();
//connecting the database
require('db_config.php');


// Required if your environment does not handle autoloading
require __DIR__ . '/vendor/autoload.php';

// Use the REST API Client to make requests to the Twilio REST API
use Twilio\Rest\Client;


if(!empty($_POST))
{

   $phoneCheck = mysqli_real_escape_string($conn,$_POST['mobileNum']);
   $codeCountry = mysqli_real_escape_string($conn,$_POST['country']);

   $sqlCheck = 'SELECT * FROM users WHERE phone = ?';

    //Create a prepare statement
    $stmtCheck = mysqli_stmt_init($conn);

    //prepare the prepared statment
    if(!mysqli_stmt_prepare($stmtCheck,$sqlCheck))
    {
        echo "SQL statement error";
    }
    else
    {
        //bind the parameters to the placeholder
        mysqli_stmt_bind_param($stmtCheck, 's' , $phoneCheck);
        //run parameters inside database
        mysqli_stmt_execute($stmtCheck);

        $result = mysqli_stmt_get_result($stmtCheck);


         if(mysqli_num_rows($result) == 1 )
        {
           $rowCheck = $result->fetch_assoc();

           $_SESSION['user_id'] = $rowCheck['user_id'];
           $_SESSION['checkPhone'] = $rowCheck['phone'];


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

               // echo $randomNumber;


               $userID = $_SESSION['user_id'];
               // $statos = 0;

               // var_dump($userID);

               $sqlInsert = 'INSERT INTO forgetpwds(mobile_num,user_id,code) VALUES (?,?,?)';

                //Create a prepare statement
              $stmtInsert = mysqli_stmt_init($conn);

               //prepare the prepared statment
              if(!mysqli_stmt_prepare($stmtInsert, $sqlInsert))
              {
                echo "SQL ERROR";
              }
              else
              {

                //bind the parameters to the placeholder
                mysqli_stmt_bind_param($stmtInsert, "sis" , $phoneCheck,$userID, $randomNumber);
                //run parameters inside database
                mysqli_stmt_execute($stmtInsert);

                 // Your Account SID and Auth Token from twilio.com/console
                $sid = 'AC1be9ac991da20dab30bd7b3d22df4127';
                $token = '59ae4b500380ac4bb753dcac93b104e1';
                $client = new Client($sid, $token);

                // Use the client to do fun stuff like send text messages!
                $client->messages->create(
                  // the number you'd like to send the message to
                  $codeCountry.$phoneCheck,
                  [
                    // A Twilio phone number you purchased at twilio.com/console
                    'from' => '+12055284823',
                    // the body of the text message you'd like to send
                    'body' => 'verification code:'.$randomNumber
                  ]
                );





                header("Location:verifyCode.php");
                exit();

              }



        }
        else
        {
             header("Location:forgetpwd.php?mobile=notExist");
              exit();
        }
  }
  
}

?>


<!DOCTYPE html>
<html style="font-size: 16px;">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="keywords" content="pazblé, Don't worry! This happens to the best of us!​">
    <meta name="description" content="">
    <meta name="page_type" content="np-template-header-footer-from-plugin">
    <title>forgotpassword</title>

    <link rel="stylesheet" href="css/allnicepage.css" media="screen">
    <link rel="stylesheet" href="css/forgotpassword.css" media="screen">

    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
  <!--   <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script> -->
    <meta name="generator" content="Nicepage 3.1.0, nicepage.com">
   

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;600;700&display=swap" rel="stylesheet">
    
    
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "",
		"url": "index.html"
}</script>
    <meta property="og:title" content="forgotpassword">
    <meta property="og:type" content="website">
    <meta name="theme-color" content="#478ac9">
    <link rel="canonical" href="index.html">
    <meta property="og:url" content="index.html">
  </head>
  <body class="u-body">

    <header class="u-clearfix u-header" id="sec-cf3c"><div class="u-clearfix u-sheet u-sheet-1">
        <h1 class="u-custom-font u-text u-text-custom-color-2 u-text-default u-text-1">pazblé</h1>
        <!-- <h5 class="u-custom-font u-text u-text-custom-color-2 u-text-default u-text-2">Name </h5>
        <img src="images/mflag.png" alt="" class="u-image u-image-default u-image-1" data-image-width="400" data-image-height="267">
        <h5 class="u-custom-font u-text u-text-custom-color-3 u-text-3">Switch to Boss Mode</h5> -->
      </div>
    </header>

    <section class="u-clearfix u-custom-color-2 u-section-1" id="sec-e425">
      <div class="u-clearfix u-sheet u-valign-middle-lg u-valign-middle-md u-sheet-1">
        <h1 class="u-custom-font u-text u-text-custom-color-5 u-title u-text-1">Don't worry! This happens to the best of us! </h1>
        <h3 class="u-custom-font u-text u-text-custom-color-4 u-text-2">Please enter your&nbsp;<span class="u-text-white">country code</span>&nbsp;and&nbsp;<span class="u-text-white">mobile number</span>&nbsp;below.
        </h3>
        <div class="u-border-1 u-border-custom-color-6 u-container-style u-group u-radius-7 u-shape-round u-group-1">
          <div class="u-container-layout u-valign-middle-lg u-valign-middle-md u-valign-middle-sm u-valign-middle-xl u-valign-top-xs u-container-layout-1">
            <div class="u-form u-form-1">
              <form action="#" method="POST" class="u-clearfix u-form-spacing-15 u-form-vertical u-inner-form" style="padding: 15px;" source="custom" name="form">
                <div class="u-form-group u-form-select u-form-group-1">
                  <label for="select-aeeb" class="u-custom-font u-form-control-hidden u-label u-text-custom-color-4 u-label-1">Select</label>
                  <div class="u-form-select-wrapper">
                    <select id="select-aeeb" name="country" class="u-border-1 u-border-custom-color-5 u-custom-font u-input u-input-rectangle u-radius-7 u-text-custom-color-5 u-white u-input-1">
                      <option value="+230">Mauritius (+230)</option>
                      <option value="Item 2">Item 2</option>
                      <option value="Item 3">Item 3</option>
                    </select>
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="12" version="1" class="u-caret"><path fill="currentColor" d="M4 8L0 4h8z"></path></svg>
                  </div>
                </div>
                <div class="u-form-group">
                  <label for="email-6797" class="u-custom-font u-form-control-hidden u-label u-text-custom-color-4 u-label-2">Email</label>
                  <input type="text" placeholder="Mobile Number" id="email-6797" name="mobileNum" class="u-border-1 u-border-custom-color-5 u-custom-font u-input u-input-rectangle u-radius-7 u-text-custom-color-5 u-white u-input-2" required="required">
                </div>
                <div class="u-align-left u-form-group u-form-submit">
                  <input type="submit" class="u-btn u-btn-round u-btn-submit u-button-style u-custom-color-3 u-custom-font u-hover-black u-radius-7 u-btn-1" value="REQUEST VERIFICATION CODE">
                 <!--  <input type="submit" value="submit" class="u-form-control-hidden"> -->
                </div>
                <!-- <div class="u-form-send-message u-form-send-success">Thank you! Your message has been sent.</div>
                <div class="u-form-send-error u-form-send-message">Unable to send your message. Please fix errors then try again.</div>
                <input type="hidden" value="" name="recaptchaResponse"> -->
              </form>
            </div>
          </div>
        </div>
        <div class="u-black u-expanded-width-sm u-expanded-width-xs u-shape u-shape-rectangle u-shape-1"></div>
      </div>
    </section>
    <section class="u-align-center u-black u-clearfix u-section-2" id="sec-ca12">
      <div class="u-clearfix u-sheet u-sheet-1">
        <h6 class="u-custom-font u-text u-text-default u-text-white u-text-1">Kreol Morisien </h6>
        <h6 class="u-custom-font u-text u-text-custom-color-1 u-text-default u-text-2">English<span style="font-style: normal;"></span>
        </h6>
        <div class="u-custom-color-6 u-expanded-width-sm u-expanded-width-xs u-shape u-shape-rectangle u-shape-1"></div>
        <h6 class="u-custom-font u-text u-text-default u-text-white u-text-3">Contact Us</h6>
        <h6 class="u-custom-font u-text u-text-default u-text-white u-text-4">Terms, Data, and Privacy Policy</h6>
        <h6 class="u-custom-font u-text u-text-white u-text-5">About Us</h6>
      </div>
    </section>
    
    
    <footer class="u-align-left u-clearfix u-footer u-white u-footer" id="sec-81b3"><div class="u-clearfix u-sheet u-sheet-1">
        <img src="images/Logo1G.webp" alt="" class="u-image u-image-default u-preserve-proportions u-image-1" data-image-width="112" data-image-height="18">
        <p class="u-custom-font u-font-open-sans u-text u-text-default u-text-1">© 2020 by pazblé</p>
        <p class="u-custom-font u-font-open-sans u-text u-text-custom-color-3 u-text-default u-text-2">Made in Mauritius.</p>
        <img src="images/mflag.png" alt="" class="u-image u-image-default u-image-2" data-image-width="400" data-image-height="267">
      </div></footer>
<!-- 
    <section class="u-backlink u-clearfix u-grey-80">
      <a class="u-link" href="https://nicepage.com/html-templates" target="_blank">
        <span>HTML Templates</span>
      </a>
      <p class="u-text">
        <span>created with</span>
      </p>
      <a class="u-link" href="https://nicepage.com/" target="_blank">
        <span>Website Builder Software</span>
      </a>. 
    </section> -->
    
  </body>
</html>