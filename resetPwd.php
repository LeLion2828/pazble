<?php

session_start();

$phone = $_SESSION['checkPhone'];
$userID = $_SESSION['user_id'];

// var_dump($phone,$userID);

require('db_config.php');


if(!empty($_POST))
{

    $pwdOne = mysqli_real_escape_string($conn,$_POST['password']);
    $pwdTwo = mysqli_real_escape_string($conn,$_POST['pwd']);


    // var_dump($pwdOne, $pwdTwo);

    if(empty($pwdOne) || empty($pwdTwo))
    {
        header("Location: resetPwd.php?reset=empty");
        exit();
    }
    else
    {
      if($pwdOne != $pwdTwo)
      {
        header("Location: resetPwd.php?reset=unmatch");
           exit();
       }
       else
       {
        $sqlUpdate = "UPDATE users SET password = ? WHERE user_id = ? AND phone = ?";

             $password= password_hash($pwdOne, PASSWORD_DEFAULT);//hash password

              //Create a prepare statement
             $stmtUpdate = mysqli_stmt_init($conn);


          //prepare the prepared statment
             if(!mysqli_stmt_prepare($stmtUpdate,$sqlUpdate))
             {
                 echo "SQL update statement error";
             }
             else
             {
              //bind the parameters to the placeholder
                 mysqli_stmt_bind_param($stmtUpdate, 'sis' ,$password, $userID, $phone);
              //run parameters inside database
                 mysqli_stmt_execute($stmtUpdate);



                 $sqlDelete = 'DELETE FROM forgetpwds WHERE user_id = ?';


                 $stmtDel = mysqli_stmt_init($conn);


                 if(!mysqli_stmt_prepare($stmtDel,$sqlDelete))
                 {
                    echo "SQL delete statement error";
                }
                else
                {

              //bind the parameters to the placeholder
                    mysqli_stmt_bind_param($stmtDel, 'i' , $userID);
                //run parameters inside database
                    mysqli_stmt_execute($stmtDel);



                    header("Location: index.php?reg=resetsuccess");
                    exit();




                }


            }

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
    <title>newpassword</title>

     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;600;700&display=swap" rel="stylesheet">
     
    <link rel="stylesheet" href="css/allnicepage.css" media="screen">
    <link rel="stylesheet" href="css/newpassword.css" media="screen">


    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
   <!--  <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script> -->
    <meta name="generator" content="Nicepage 3.1.0, nicepage.com">
    
    
    
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "",
		"url": "index.html"
}</script>
    <meta property="og:title" content="newpassword">
    <meta property="og:type" content="website">
    <meta name="theme-color" content="#478ac9">
    <link rel="canonical" href="index.html">
    <meta property="og:url" content="index.html">
  </head>
  <body class="u-body">
    <header class="u-clearfix u-header" id="sec-cf3c">
      <div class="u-clearfix u-sheet u-sheet-1">
        <h1 class="u-custom-font u-text u-text-custom-color-2 u-text-default u-text-1">pazblé</h1>
       <!--  <h5 class="u-custom-font u-text u-text-custom-color-2 u-text-default u-text-2">Name </h5>
        <img src="images/mflag.png" alt="" class="u-image u-image-default u-image-1" data-image-width="400" data-image-height="267">
        <h5 class="u-custom-font u-text u-text-custom-color-3 u-text-3">Switch to Boss Mode</h5> -->
      </div>
    </header>
    <section class="u-clearfix u-custom-color-2 u-section-1" id="sec-e425">
      <div class="u-clearfix u-sheet u-valign-middle-sm u-sheet-1">
        <h1 class="u-custom-font u-text u-text-custom-color-5 u-title u-text-1">Pick your new password!</h1>
        <div class="u-border-1 u-border-custom-color-6 u-container-style u-expanded-width-xs u-group u-radius-7 u-shape-round u-group-1">
          <div class="u-container-layout u-valign-middle-lg u-valign-middle-xl u-container-layout-1">
            <div class="u-form u-form-1">

              <form action="#" method="POST" class="u-clearfix u-form-spacing-15 u-form-vertical u-inner-form" style="padding: 15px;" source="custom" name="form">

                <div class="u-form-group">
                  <label for="email-6797" class="u-custom-font u-form-control-hidden u-label u-text-custom-color-4 u-label-1">Email</label>
                  <input type="password" placeholder="New Password" id="email-6797" name="password" class="u-border-1 u-border-custom-color-5 u-custom-font u-input u-input-rectangle u-radius-7 u-text-custom-color-5 u-white u-input-1" required="required">
                </div>

                <div class="u-form-group u-form-group-2">
                  <label for="text-1805" class="u-custom-font u-form-control-hidden u-label u-text-custom-color-4 u-label-2"></label>
                  <input type="password" placeholder="Confirm Password" id="text-1805" name="pwd" class="u-border-1 u-border-custom-color-5 u-custom-font u-input u-input-rectangle u-radius-7 u-text-custom-color-5 u-white u-input-2">
                </div>


                <div class="u-align-left u-form-group u-form-submit">
                  <input type="submit" class="u-btn u-btn-round u-btn-submit u-button-style u-custom-color-3 u-custom-font u-hover-black u-radius-7 u-btn-1" value="READY TO ROLL!">
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

  <!--   <section class="u-backlink u-clearfix u-grey-80">
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