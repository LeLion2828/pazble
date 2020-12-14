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
                $token = 'fa268502dbc40f51611cb4ebabbdc6f7';
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
<link rel="stylesheet" href="bootstrap/bootstrap.min.css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
        <script class="u-script" type="text/javascript" src="js/forgetpwd.js" defer=""></script>
            <script class="u-script" type="text/javascript" src="bootstrap/bootstrap.min.js" defer=""></script>
    <script class="u-script" type="text/javascript" src="bootstrap/popper.min.js" defer=""></script>
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
                      
                      <option value="" disabled="" class="Fbuif _2UHxr"></option>
<option value="+93" class="Fbuif">Afghanistan +93</option><option value="+355" class="Fbuif">Albania +355</option><option value="+213" class="Fbuif">Algeria +213</option><option value="+684" class="Fbuif">American Samoa +684</option><option value="+376" class="Fbuif">Andorra +376</option><option value="+244" class="Fbuif">Angola +244</option><option value="+264" class="Fbuif">Anguilla +264</option><option value="+672" class="Fbuif">Antarctica +672</option><option value="+268" class="Fbuif">Antigua and Barbuda +268</option><option value="+54" class="Fbuif">Argentina +54</option><option value="+374" class="Fbuif">Armenia +374</option><option value="+297" class="Fbuif">Aruba +297</option><option value="+61" class="Fbuif">Australia +61</option><option value="+43" class="Fbuif">Austria +43</option><option value="+994" class="Fbuif">Azerbaijan +994</option><option value="+1" class="Fbuif">Bahamas +1</option><option value="+973" class="Fbuif">Bahrain +973</option><option value="+880" class="Fbuif">Bangladesh +880</option><option value="+246" class="Fbuif">Barbados +246</option><option value="+375" class="Fbuif">Belarus +375</option><option value="+32" class="Fbuif">Belgium +32</option><option value="+501" class="Fbuif">Belize +501</option><option value="+229" class="Fbuif">Benin +229</option><option value="+1(Duplicate_1)" class="Fbuif">Bermuda +1</option><option value="+975" class="Fbuif">Bhutan +975</option><option value="+591" class="Fbuif">Bolivia +591</option><option value="+387" class="Fbuif">Bosnia and Herzegovina +387</option><option value="+267" class="Fbuif">Botswana +267</option><option value="+55" class="Fbuif">Brazil +55</option><option value="+246(Duplicate_1)" class="Fbuif">British Indian Ocean Territory +246</option><option value="+1(Duplicate_2)" class="Fbuif">British Virgin Islands +1</option><option value="+673" class="Fbuif">Brunei +673</option><option value="+359" class="Fbuif">Bulgaria +359</option><option value="+226" class="Fbuif">Burkina Faso +226</option><option value="+257" class="Fbuif">Burundi +257</option><option value="+855" class="Fbuif">Cambodia +855</option><option value="+237" class="Fbuif">Cameroon +237</option><option value="+1(Duplicate_3)" class="Fbuif">Canada +1</option><option value="+238" class="Fbuif">Cape Verde +238</option><option value="+345" class="Fbuif">Cayman Islands +345</option><option value="+236" class="Fbuif">Central African Republic +236</option><option value="+235" class="Fbuif">Chad +235</option><option value="+56" class="Fbuif">Chile +56</option><option value="+86" class="Fbuif">China +86</option><option value="+61(Duplicate_1)" class="Fbuif">Christmas Island +61</option><option value="+61(Duplicate_2)" class="Fbuif">Cocos Islands +61</option><option value="+57" class="Fbuif">Colombia +57</option><option value="+269" class="Fbuif">Comoros +269</option><option value="+682" class="Fbuif">Cook Islands +682</option><option value="+506" class="Fbuif">Costa Rica +506</option><option value="+385" class="Fbuif">Croatia +385</option><option value="+53" class="Fbuif">Cuba +53</option><option value="+599" class="Fbuif">Curacao +599</option><option value="+357" class="Fbuif">Cyprus +357</option><option value="+420" class="Fbuif">Czech Republic +420</option><option value="+243" class="Fbuif">Democratic Republic of the Congo +243</option><option value="+45" class="Fbuif">Denmark +45</option><option value="+253" class="Fbuif">Djibouti +253</option><option value="+767" class="Fbuif">Dominica +767</option><option value="+1(Duplicate_4)" class="Fbuif">Dominican Republic +1</option><option value="+670" class="Fbuif">East Timor +670</option><option value="+593" class="Fbuif">Ecuador +593</option><option value="+20" class="Fbuif">Egypt +20</option><option value="+503" class="Fbuif">El Salvador +503</option><option value="+240" class="Fbuif">Equatorial Guinea +240</option><option value="+291" class="Fbuif">Eritrea +291</option><option value="+372" class="Fbuif">Estonia +372</option><option value="+251" class="Fbuif">Ethiopia +251</option><option value="+500" class="Fbuif">Falkland Islands +500</option><option value="+298" class="Fbuif">Faroe Islands +298</option><option value="+679" class="Fbuif">Fiji +679</option><option value="+358" class="Fbuif">Finland +358</option><option value="+33" class="Fbuif">France +33</option><option value="+689" class="Fbuif">French Polynesia +689</option><option value="+241" class="Fbuif">Gabon +241</option><option value="+220" class="Fbuif">Gambia +220</option><option value="+995" class="Fbuif">Georgia +995</option><option value="+49" class="Fbuif">Germany +49</option><option value="+233" class="Fbuif">Ghana +233</option><option value="+350" class="Fbuif">Gibraltar +350</option><option value="+30" class="Fbuif">Greece +30</option><option value="+299" class="Fbuif">Greenland +299</option><option value="+1(Duplicate_5)" class="Fbuif">Grenada +1</option><option value="+1(Duplicate_6)" class="Fbuif">Guam +1</option><option value="+502" class="Fbuif">Guatemala +502</option><option value="+44" class="Fbuif">Guernsey +44</option><option value="+224" class="Fbuif">Guinea +224</option><option value="+245" class="Fbuif">Guinea-Bissau +245</option><option value="+592" class="Fbuif">Guyana +592</option><option value="+509" class="Fbuif">Haiti +509</option><option value="+504" class="Fbuif">Honduras +504</option><option value="+852" class="Fbuif">Hong Kong +852</option><option value="+36" class="Fbuif">Hungary +36</option><option value="+354" class="Fbuif">Iceland +354</option><option value="+91" class="Fbuif">India +91</option><option value="+62" class="Fbuif">Indonesia +62</option><option value="+98" class="Fbuif">Iran +98</option><option value="+964" class="Fbuif">Iraq +964</option><option value="+353" class="Fbuif">Ireland +353</option><option value="+44(Duplicate_1)" class="Fbuif">Isle of Man +44</option><option value="+972" class="Fbuif">Israel +972</option><option value="+39" class="Fbuif">Italy +39</option><option value="+225" class="Fbuif">Ivory Coast +225</option><option value="+876" class="Fbuif">Jamaica +876</option><option value="+81" class="Fbuif">Japan +81</option><option value="+44(Duplicate_2)" class="Fbuif">Jersey +44</option><option value="+962" class="Fbuif">Jordan +962</option><option value="+7" class="Fbuif">Kazakhstan +7</option><option value="+254" class="Fbuif">Kenya +254</option><option value="+686" class="Fbuif">Kiribati +686</option><option value="+383" class="Fbuif">Kosovo +383</option><option value="+965" class="Fbuif">Kuwait +965</option><option value="+996" class="Fbuif">Kyrgyzstan +996</option><option value="+856" class="Fbuif">Laos +856</option><option value="+371" class="Fbuif">Latvia +371</option><option value="+961" class="Fbuif">Lebanon +961</option><option value="+266" class="Fbuif">Lesotho +266</option><option value="+231" class="Fbuif">Liberia +231</option><option value="+218" class="Fbuif">Libya +218</option><option value="+423" class="Fbuif">Liechtenstein +423</option><option value="+370" class="Fbuif">Lithuania +370</option><option value="+352" class="Fbuif">Luxembourg +352</option><option value="+853" class="Fbuif">Macau +853</option><option value="+389" class="Fbuif">Macedonia +389</option><option value="+261" class="Fbuif">Madagascar +261</option><option value="+265" class="Fbuif">Malawi +265</option><option value="+60" class="Fbuif">Malaysia +60</option><option value="+960" class="Fbuif">Maldives +960</option><option value="+223" class="Fbuif">Mali +223</option><option value="+356" class="Fbuif">Malta +356</option><option value="+692" class="Fbuif">Marshall Islands +692</option><option value="+222" class="Fbuif">Mauritania +222</option><option selected="" value="+230" class="Fbuif">Mauritius +230</option><option value="+262" class="Fbuif">Mayotte +262</option><option value="+52" class="Fbuif">Mexico +52</option><option value="+691" class="Fbuif">Micronesia +691</option><option value="+373" class="Fbuif">Moldova +373</option><option value="+377" class="Fbuif">Monaco +377</option><option value="+976" class="Fbuif">Mongolia +976</option><option value="+382" class="Fbuif">Montenegro +382</option><option value="+1(Duplicate_7)" class="Fbuif">Montserrat +1</option><option value="+212" class="Fbuif">Morocco +212</option><option value="+258" class="Fbuif">Mozambique +258</option><option value="+95" class="Fbuif">Myanmar +95</option><option value="+264(Duplicate_1)" class="Fbuif">Namibia +264</option><option value="+674" class="Fbuif">Nauru +674</option><option value="+977" class="Fbuif">Nepal +977</option><option value="+31" class="Fbuif">Netherlands +31</option><option value="+599(Duplicate_1)" class="Fbuif">Netherlands Antilles +599</option><option value="+687" class="Fbuif">New Caledonia +687</option><option value="+64" class="Fbuif">New Zealand +64</option><option value="+505" class="Fbuif">Nicaragua +505</option><option value="+227" class="Fbuif">Niger +227</option><option value="+234" class="Fbuif">Nigeria +234</option><option value="+683" class="Fbuif">Niue +683</option><option value="+850" class="Fbuif">North Korea +850</option><option value="+1(Duplicate_8)" class="Fbuif">Northern Mariana Islands +1</option><option value="+47" class="Fbuif">Norway +47</option><option value="+968" class="Fbuif">Oman +968</option><option value="+92" class="Fbuif">Pakistan +92</option><option value="+680" class="Fbuif">Palau +680</option><option value="+970" class="Fbuif">Palestine +970</option><option value="+507" class="Fbuif">Panama +507</option><option value="+675" class="Fbuif">Papua New Guinea +675</option><option value="+595" class="Fbuif">Paraguay +595</option><option value="+51" class="Fbuif">Peru +51</option><option value="+63" class="Fbuif">Philippines +63</option><option value="+64(Duplicate_1)" class="Fbuif">Pitcairn +64</option><option value="+48" class="Fbuif">Poland +48</option><option value="+351" class="Fbuif">Portugal +351</option><option value="+1(Duplicate_9)" class="Fbuif">Puerto Rico +1</option><option value="+974" class="Fbuif">Qatar +974</option><option value="+242" class="Fbuif">Republic of the Congo +242</option><option value="+262(Duplicate_1)" class="Fbuif">Reunion +262</option><option value="+40" class="Fbuif">Romania +40</option><option value="+7(Duplicate_1)" class="Fbuif">Russia +7</option><option value="+250" class="Fbuif">Rwanda +250</option><option value="+590" class="Fbuif">Saint Barthelemy +590</option><option value="+290" class="Fbuif">Saint Helena +290</option><option value="+869" class="Fbuif">Saint Kitts and Nevis +869</option><option value="+758" class="Fbuif">Saint Lucia +758</option><option value="+590(Duplicate_1)" class="Fbuif">Saint Martin +590</option><option value="+508" class="Fbuif">Saint Pierre and Miquelon +508</option><option value="+784" class="Fbuif">Saint Vincent and the Grenadines +784</option><option value="+685" class="Fbuif">Samoa +685</option><option value="+378" class="Fbuif">San Marino +378</option><option value="+239" class="Fbuif">Sao Tome and Principe +239</option><option value="+966" class="Fbuif">Saudi Arabia +966</option><option value="+221" class="Fbuif">Senegal +221</option><option value="+381" class="Fbuif">Serbia +381</option><option value="+248" class="Fbuif">Seychelles +248</option><option value="+232" class="Fbuif">Sierra Leone +232</option><option value="+65" class="Fbuif">Singapore +65</option><option value="+599(Duplicate_2)" class="Fbuif">Sint Maarten +599</option><option value="+421" class="Fbuif">Slovakia +421</option><option value="+386" class="Fbuif">Slovenia +386</option><option value="+677" class="Fbuif">Solomon Islands +677</option><option value="+252" class="Fbuif">Somalia +252</option><option value="+27" class="Fbuif">South Africa +27</option><option value="+82" class="Fbuif">South Korea +82</option><option value="+211" class="Fbuif">South Sudan +211</option><option value="+34" class="Fbuif">Spain +34</option><option value="+94" class="Fbuif">Sri Lanka +94</option><option value="+249" class="Fbuif">Sudan +249</option><option value="+597" class="Fbuif">Suriname +597</option><option value="+47(Duplicate_1)" class="Fbuif">Svalbard and Jan Mayen +47</option><option value="+268(Duplicate_1)" class="Fbuif">Swaziland +268</option><option value="+46" class="Fbuif">Sweden +46</option><option value="+41" class="Fbuif">Switzerland +41</option><option value="+963" class="Fbuif">Syria +963</option><option value="+886" class="Fbuif">Taiwan +886</option><option value="+992" class="Fbuif">Tajikistan +992</option><option value="+255" class="Fbuif">Tanzania +255</option><option value="+66" class="Fbuif">Thailand +66</option><option value="+228" class="Fbuif">Togo +228</option><option value="+690" class="Fbuif">Tokelau +690</option><option value="+676" class="Fbuif">Tonga +676</option><option value="+868" class="Fbuif">Trinidad and Tobago +868</option><option value="+216" class="Fbuif">Tunisia +216</option><option value="+90" class="Fbuif">Turkey +90</option><option value="+993" class="Fbuif">Turkmenistan +993</option><option value="+1(Duplicate_10)" class="Fbuif">Turks and Caicos Islands +1</option><option value="+688" class="Fbuif">Tuvalu +688</option><option value="+1(Duplicate_11)" class="Fbuif">U.S. Virgin Islands +1</option><option value="+256" class="Fbuif">Uganda +256</option><option value="+380" class="Fbuif">Ukraine +380</option><option value="+971" class="Fbuif">United Arab Emirates +971</option><option value="+44(Duplicate_3)" class="Fbuif">United Kingdom +44</option><option value="+1(Duplicate_12)" class="Fbuif">United States +1</option><option value="+598" class="Fbuif">Uruguay +598</option><option value="+998" class="Fbuif">Uzbekistan +998</option><option value="+678" class="Fbuif">Vanuatu +678</option><option value="+379" class="Fbuif">Vatican +379</option><option value="+58" class="Fbuif">Venezuela +58</option><option value="+84" class="Fbuif">Vietnam +84</option><option value="+681" class="Fbuif">Wallis and Futuna +681</option><option value="+212(Duplicate_1)" class="Fbuif">Western Sahara +212</option><option value="+967" class="Fbuif">Yemen +967</option><option value="+260" class="Fbuif">Zambia +260</option><option value="+263" class="Fbuif">Zimbabwe +263</option>
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

        <!---- START VALIDATION CORRECTIONS [ PILLS & SKY ] ---->
        <button type="button" class="btn btn-primary" id="trigger_form_forget_modal" data-toggle="modal" data-target="#form_forget_modal" style="display:none;"></button>

        <!-- Modal -->
        <div class="modal fade" id="form_forget_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                  <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                </div>
              </div>
              <div class="modal-body">
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal" id="clear_input_register">Understood</button>
              </div>
            </div>
          </div>
        </div>
    <!-- END -->

  </body>
</html>
