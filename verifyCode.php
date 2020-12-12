<?php

session_start();

$phone = $_SESSION['checkPhone'];

require('db_config.php');

if(!empty($_POST))
{

  $codeCheck = mysqli_real_escape_string($conn,$_POST['code']);

   $sqlSELECT = "SELECT * FROM forgetpwds WHERE mobile_num = ? AND code = ?";

     //Create a prepare statement
    $stmtSELECT = mysqli_stmt_init($conn);

    //prepare the prepared statment
    if(!mysqli_stmt_prepare($stmtSELECT,$sqlSELECT))
    {
        echo "SQL statement error";
    }
    else
    {
        //bind the parameters to the placeholder
        mysqli_stmt_bind_param($stmtSELECT, 'ss' ,$phone, $codeCheck);
        //run parameters inside database
        mysqli_stmt_execute($stmtSELECT);

         $resultCheck = mysqli_stmt_get_result($stmtSELECT);


          if(mysqli_num_rows($resultCheck) == 1 )
        {
           
           header("Location:resetPwd.php");
             exit();

        }
        else
        {
             header("Location:verifyCode.php?code=error");
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
    <title>verificationcode</title>

     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;600;700&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="css/allnicepage.css" media="screen">
    <link rel="stylesheet" href="css/verificationcode.css" media="screen">

    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
   <!--  <script class="u-script" type="text/javascript" src="nicepage.js" defer=""></script> -->
    <meta name="generator" content="Nicepage 3.1.0, nicepage.com">
   


    
    
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "",
		"url": "index.html"
}</script>
    <meta property="og:title" content="verificationcode">
    <meta property="og:type" content="website">
    <meta name="theme-color" content="#478ac9">
    <link rel="canonical" href="index.html">
    <meta property="og:url" content="index.html">
  </head>
  <body class="u-body">

    <header class="u-clearfix u-header" id="sec-cf3c">
      <div class="u-clearfix u-sheet u-sheet-1">
        <h1 class="u-custom-font u-text u-text-custom-color-2 u-text-default u-text-1">pazblé</h1>
      <!--   <h5 class="u-custom-font u-text u-text-custom-color-2 u-text-default u-text-2">Name </h5>
        <img src="images/mflag.png" alt="" class="u-image u-image-default u-image-1" data-image-width="400" data-image-height="267">
        <h5 class="u-custom-font u-text u-text-custom-color-3 u-text-3">Switch to Boss Mode</h5> -->
      </div>
    </header>
    <section class="u-clearfix u-custom-color-2 u-section-1" id="sec-e425">
      <div class="u-clearfix u-sheet u-valign-middle-xl u-sheet-1">
        <h1 class="u-custom-font u-text u-text-custom-color-5 u-title u-text-1">Have you received a verification code from us?</h1>
        <h3 class="u-custom-font u-text u-text-custom-color-4 u-text-2">If yes, please enter the code below.</h3>
        <div class="u-border-1 u-border-custom-color-6 u-container-style u-expanded-width-xs u-group u-radius-7 u-shape-round u-group-1">
          <div class="u-container-layout u-valign-middle-lg u-valign-middle-xl u-valign-middle-xs u-valign-top-md u-valign-top-sm u-container-layout-1">
            <div class="u-form u-form-1">
              <form action="#" method="POST" class="u-clearfix u-form-spacing-15 u-form-vertical u-inner-form" style="padding: 15px;" source="custom" name="form">

                <div class="u-form-group">
                  <label for="email-6797" class="u-custom-font u-form-control-hidden u-label u-text-custom-color-4 u-label-1">Email</label>
                  <input type="text" placeholder="Verification Code" id="email-6797" name="code" class="u-border-1 u-border-custom-color-5 u-custom-font u-input u-input-rectangle u-radius-7 u-text-custom-color-5 u-white u-input-1" required="required">
                </div>


                <div class="u-align-left u-form-group u-form-submit">
                  <input type="submit" class="u-btn u-btn-round u-btn-submit u-button-style u-custom-color-3 u-custom-font u-hover-black u-radius-7 u-btn-1" value="CHECK">

                  <!-- <input type="submit" value="submit" class="u-form-control-hidden"> -->
                </div>
                <!-- <div class="u-form-send-message u-form-send-success">Thank you! Your message has been sent.</div>
                <div class="u-form-send-error u-form-send-message">Unable to send your message. Please fix errors then try again.</div>
                <input type="hidden" value="" name="recaptchaResponse"> -->
              </form>
            </div>
          </div>
        </div>
        <p class="u-align-left-lg u-align-left-md u-align-left-sm u-align-left-xs u-custom-font u-text u-text-3">If you are not receiving the&nbsp;verification code, please go back to the home page and try again. If it's still not going through, please&nbsp;<span style="text-decoration: underline !important; font-weight: 700;">report</span>&nbsp;it to us.&nbsp;
        </p>
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


    <!-- <section class="u-backlink u-clearfix u-grey-80">
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