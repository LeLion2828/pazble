    <?php

    session_start();

    $user = $_SESSION['user_id'] ;
    $firstName = $_SESSION['Fname'];
    $lastName = $_SESSION['Lname'];

    require ('db_config.php');



    $sqlImg = "SELECT gravatar FROM users WHERE user_id = $user";
    $resultImg = mysqli_query($conn,$sqlImg);

    $path = mysqli_fetch_assoc($resultImg);

     // var_dump($path);



    // while($rowImg = mysqli_fetch_assoc($resultImg))
    // {
    //
    //     echo "<img src='".$rowImg['gravatar']."' style='width:100px;height:100px;border-radius:50%;'>";
    //
    // }

    $sqlCount = 'SELECT * FROM boss_post_job WHERE user_id = ?';

    $stmtCount = mysqli_stmt_init($conn);

        //prepare the prepared statment
    if(!mysqli_stmt_prepare($stmtCount,$sqlCount))
    {
      echo "SQL statement error";
    }
    else
    {
            //bind the parameters to the placeholder
      mysqli_stmt_bind_param($stmtCount, 'i' , $user);
            //run parameters inside database
      mysqli_stmt_execute($stmtCount);

      /* store result */
      mysqli_stmt_store_result($stmtCount);

      $numrow = mysqli_stmt_num_rows($stmtCount); 

    }



    //  $query = "SELECT COUNT(*) FROM boss_post_job WHERE user_id = $user";

    // if ($stmt = mysqli_prepare($conn, $query)) {

    //     /* execute query */
    //     mysqli_stmt_execute($stmt);

    //     /* store result */
    //     mysqli_stmt_store_result($stmt);

    //     printf("Number of rows: %d.\n", mysqli_stmt_num_rows($stmt));

    //     /* close statement */
    //     mysqli_stmt_close($stmt);
    // }

    // /* close connection */
    // mysqli_close($conn);


    ?>
    <!DOCTYPE html>
    <html style="font-size: 16px;" lang="en-MU">
    <head>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta charset="utf-8">
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="page_type" content="np-template-header-footer-from-plugin">
      <title>Speak Up</title>
      <link rel="stylesheet" href="speakcssnice.css" media="screen">
      <link rel="stylesheet" href="Speak-Up.css" media="screen">
      <link rel="stylesheet" href="bootstrap/bootstrap.min.css" media="screen">
      <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
      <meta name="generator" content="Nicepage 3.1.0, nicepage.com">
      <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
      <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
      <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>
      <script class="u-script" type="text/javascript" src="bootstrap/bootstrap.min.js" defer=""></script>
      <script class="u-script" type="text/javascript" src="bootstrap/popper.min.js" defer=""></script>
      <script class="u-script" type="text/javascript" src="js/modalup.js" defer=""></script>


      <style type="text/css">
       .toolkit1{
        padding-top: 5px;
        color: #13668f;
        font-family: 'Poppins', sans-serif;
        font-size: 24px;
        font-family: 600;
      }


      input#shareThought {
        height: -42%;
        text-align: center;
        width: 100%;
        height: calc(1.5em + 5.75rem + 2px) !important;
    }

      .button1{
        padding-bottom: 1%;
        color: white;
      }

      .button2, .button3{
        width: 200px;
        margin-bottom: 6%;
        color: white;
        border-radius: 7px;
        font-family: 'Poppins', sans-serif;
      }

      .button3{
        margin-bottom: 10%;
      }

      #whatupPic2{
        width: 125px;
        border-radius: 5px;
      }

      .location{
        width: 400%;
        padding: 2px 2px 2px;
        border-radius: 5px;
        border: 1px solid gray;
        background-color: #13668f;
        color: white;
        font-family: 'Poppins', sans-serif;
      }

      .boss1{
        border: 1px solid grey;
        margin-top: 15px;
        margin-bottom: 15px;
        border-radius: 5px;
        height: 200px;

      }

      .nameboss_worker
      {
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
      }


      .phoboss{
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
        font-size: 25px;
        color: #13668f;
      }


      .fofoboss{
        width: 150px;
        height: 150px;
        padding: 20px;
      }

      .job{
       font-family: 'Poppins', sans-serif;
       font-weight: 600;
       font-size: 14px;
       color: #13668f;
     }


     .job_one{

       font-family: 'Poppins', sans-serif;
       font-weight: 900;
       font-size: 12px;  
     }



     #output{

      height:160px;
      overflow-y: scroll;

    }

    #switch-Worker{

     font-family: 'Poppins', sans-serif;
     font-weight: 900;
     font-size: 20px; 
     color: #13668f;
     margin-top: 2px;

    }

    .switch {
      position: relative;
      display: inline-block;
      width: 30px;
      height: 17px;
    }

    .switch input { 
      opacity: 0;
      width: 0;
      height: 0;
    }

    .slider {
      position: absolute;
      cursor: pointer;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: #ccc;
      -webkit-transition: .4s;
      transition: .4s;
    }

    .slider:before {
      position: absolute;
      content: "";
      height: 13px;
      width: 13px;
      left: 2px;
      bottom: 2px;
      background-color: white;
      -webkit-transition: .4s;
      transition: .4s;
    }

    input:checked + .slider {
      background-color: #2196F3;
    }

    input:focus + .slider {
      box-shadow: 0 0 1px #2196F3;
    }

    input:checked + .slider:before {
      -webkit-transform: translateX(13px);
      -ms-transform: translateX(13px);
      transform: translateX(13px);
    }

    /* Rounded sliders */
    .slider.round {
      border-radius: 17px;
    }

    .slider.round:before {
      border-radius: 50%;
    }

    .barhappening{
      background-color: #000000;
      font-family: 'Poppins', sans-serif;
      font-weight: 900;
      color: white;
      font-size: 25px;

    }

    .rowstylehappening{
      height: 40px;
    }

    #speakupBox{
      color: white !important;
      border-radius: 6px;
    }
    textarea#message {
      width: 100%;
      border-radius: 5px;
      text-align: center;
    }
    .modal-header {
      /* text-align: center; */
      /* align-items: center; */
      justify-content: center;
    }
    </style>



    <script type="application/ld+json">{
      "@context": "http://schema.org",
      "@type": "Organization",
      "name": "Main Page",
      "url": "index.html"
    }</script>
    <meta property="og:title" content="Speak Up">
    <meta property="og:type" content="website">
    <meta name="theme-color" content="#478ac9">
    <link rel="canonical" href="index.html">
    <meta property="og:url" content="index.html">
    </head>
    <body class="u-body"><header class="u-clearfix u-header u-header" id="sec-e6ae"><div class="u-clearfix u-sheet u-sheet-1"><span class="u-custom-color-1 u-icon u-icon-circle u-spacing-7 u-icon-1" data-animation-name="tada" data-animation-duration="3250" data-animation-delay="0" data-animation-direction=""><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 512 512" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-c464"></use></svg><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xml:space="preserve" class="u-svg-content" viewBox="0 0 512 512" x="0px" y="0px" id="svg-c464" style="enable-background:new 0 0 512 512;"><g><g><path d="M256,0C115.2,0,0,115.2,0,256s115.2,256,256,256s256-115.2,256-256S396.8,0,256,0z M256,51.2    c28.16,0,48.64,23.04,46.08,51.2L281.6,307.2h-51.2l-20.48-204.8C207.36,74.24,227.84,51.2,256,51.2z M256,460.8    c-28.16,0-51.2-23.04-51.2-51.2c0-28.16,23.04-51.2,51.2-51.2s51.2,23.04,51.2,51.2C307.2,437.76,284.16,460.8,256,460.8z"></path>
    </g>
    </g></svg></span>
    <h1 class="u-align-left u-custom-font u-text u-text-custom-color-1 u-title u-text-1">pazblé</h1>
    <div alt="" class="u-image u-image-circle u-preserve-proportions u-image-1" data-image-width="181" data-image-height="200">
      <?php
      echo "<img src='".$path['gravatar']."' style='width:60px;height:60px;border-radius:80%;'>&nbsp;";
      ?>
    </div>
    <p class="u-custom-font u-small-text u-text u-text-variant u-text-2"><?php echo '<span class="title"style="color:black;">'.$firstName.' '.$lastName.'</span>'; ?>
    <p class="u-align-right u-custom-font u-small-text u-text u-text-custom-color-1 u-text-variant u-text-3">Worker Mode
      <span>
        <label class="switch">
          <input id="submiting"  type="checkbox" value="worker" checked>
          <span class="slider round"></span>
        </label>
      </span>
    </p>


    </div></header>
    <section class="u-align-left u-clearfix u-section-1" id="sec-6a2b">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-border-2 u-border-custom-color-1 u-container-style u-custom-color-1 u-expanded-width u-group u-radius-10 u-shape-round u-group-1">
          <div class="u-container-layout u-container-layout-1"><span id='modal_up' class="u-custom-color-3 u-icon u-icon-circle u-spacing-8 u-icon-1" data-animation-name="pulse" data-animation-duration="3250" data-animation-delay="0" data-animation-direction=""><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 409.143 409.143" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-8360"></use></svg><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xml:space="preserve" class="u-svg-content" viewBox="0 0 409.143 409.143" x="0px" y="0px" id="svg-8360" style="enable-background:new 0 0 409.143 409.143;"><g><g><g><rect x="8.589" y="338.509" transform="matrix(-0.7071 -0.7071 0.7071 -0.7071 -160.1245 654.5792)" width="93.832" height="43.886"></rect><path d="M281.869,121.27c2.672,3.03,7.294,3.32,10.324,0.648c0.229-0.202,0.446-0.419,0.648-0.648l59.037-59.037     c3.463-2.597,4.164-7.509,1.567-10.971c-2.597-3.462-7.509-4.164-10.971-1.567c-0.594,0.446-1.122,0.973-1.567,1.567     l-59.037,59.037C278.882,113.345,278.882,118.222,281.869,121.27z"></path><path d="M245.825,84.105c0.497,0.257,1.021,0.456,1.563,0.593H250c3.294-0.031,6.216-2.119,7.314-5.224l26.122-70.008     c0.899-4.234-1.804-8.395-6.038-9.294c-3.453-0.733-6.971,0.933-8.591,4.069l-26.122,70.008     C240.831,77.838,242.236,82.251,245.825,84.105z"></path><path d="M402.103,124.4c-0.137-0.542-0.336-1.066-0.593-1.563c-1.113-3.883-5.163-6.129-9.046-5.016     c-0.3,0.086-0.594,0.191-0.88,0.314l-70.531,26.122c-3.802,1.365-5.777,5.554-4.412,9.356c0.069,0.193,0.147,0.384,0.233,0.571     c1.098,3.106,4.021,5.193,7.314,5.224h2.612l70.008-26.122C400.724,132.294,403.094,128.316,402.103,124.4z"></path><path d="M167.975,59.621c-4.24-4.047-10.911-4.047-15.151,0c-3.725,4.165-3.725,10.464,0,14.629l25.078,24.555l-130.09,200.62     l68.963,68.963l23.51-15.673l47.543,47.543c1.929,1.969,4.558,3.095,7.314,3.135c2.705-0.259,5.262-1.354,7.314-3.135     l80.457-80.457c1.969-1.929,3.095-4.558,3.135-7.314c0.104-2.937-1.034-5.781-3.135-7.837l-26.645-26.645l61.126-39.706     l24.555,25.078c1.929,1.969,4.558,3.095,7.314,3.135c2.937,0.104,5.781-1.034,7.837-3.135c3.585-4.414,3.585-10.737,0-15.151     L167.975,59.621z M260.449,312.486l-65.306,65.306l-36.571-36.571l79.412-51.722L260.449,312.486z"></path>
          </g>
        </g>
      </g></svg></span>
      <p class="u-align-center-lg u-align-center-xl u-custom-font u-large-text u-text u-text-default u-text-variant u-text-white u-text-1">Speak Up</p>
    </div>
    </div>
    <div class="u-container-style u-expanded-width-xs u-group u-radius-10 u-shape-round u-white u-group-2">
      <div class="u-container-layout u-valign-top-lg u-valign-top-md u-valign-top-sm u-container-layout-2"><span class="u-custom-color-1 u-icon u-icon-circle u-spacing-8 u-icon-2" data-animation-name="pulse" data-animation-duration="3250" data-animation-delay="0" data-animation-direction=""><svg id='whatsup' class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 512 512" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-b58f"></use></svg><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xml:space="preserve" class="u-svg-content" viewBox="0 0 512 512" id="svg-b58f"><g><path d="m462.521 294.151c-9.291-11.898-23.277-18.723-38.373-18.723h-45.145v-34.428h-339.856v102.247c0 57.441 28.855 108.261 72.823 138.753h-72.704v30h339.618v-30h-72.704c15.375-10.662 28.9-23.808 39.99-38.857h32.929c38.55 0 72.003-26.12 81.353-63.518l10.927-43.705c3.66-14.646.432-29.869-8.858-41.769zm-20.246 34.493-10.927 43.705c-6.005 24.019-27.49 40.794-52.249 40.794h-15.265c9.736-21.309 15.169-44.979 15.169-69.896v-37.818h45.145c5.794 0 11.161 2.619 14.727 7.186 3.566 4.566 4.804 10.408 3.4 16.029z"></path><path d="m209.247 118.286c-27.256 0-49.43 22.174-49.43 49.43v34.427h30v-34.427c0-10.714 8.716-19.43 19.43-19.43h137.709c65.226 0 118.29-53.064 118.29-118.29v-29.996h-30v29.996c0 48.684-39.606 88.29-88.29 88.29z"></path><path d="m120.96 172.147c0-48.684 39.606-88.29 88.29-88.29h137.709c27.256 0 49.43-22.175 49.43-49.431v-34.426h-30v34.427c0 10.714-8.716 19.431-19.43 19.431h-137.709c-65.226 0-118.29 53.064-118.29 118.29v29.995h30z"></path>
      </g></svg></span><span class="u-black u-icon u-icon-circle u-spacing-8 u-icon-3" data-animation-name="pulse" data-animation-duration="1000" data-animation-delay="0" data-animation-direction=""><svg id='profiles' class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 512 512" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-e24f"></use></svg><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xml:space="preserve" class="u-svg-content" viewBox="0 0 512 512" x="0px" y="0px" id="svg-e24f" style="enable-background:new 0 0 512 512;"><g><g><path d="M256,0c-74.439,0-135,60.561-135,135s60.561,135,135,135s135-60.561,135-135S330.439,0,256,0z"></path>
      </g>
    </g><g><g><path d="M423.966,358.195C387.006,320.667,338.009,300,286,300h-60c-52.008,0-101.006,20.667-137.966,58.195    C51.255,395.539,31,444.833,31,497c0,8.284,6.716,15,15,15h420c8.284,0,15-6.716,15-15    C481,444.833,460.745,395.539,423.966,358.195z"></path>
    </g>
    </g></svg></span><span class="u-black u-icon u-icon-circle u-spacing-8 u-icon-4" data-animation-name="pulse" data-animation-duration="1000" data-animation-delay="0" data-animation-direction=""><svg id='settings' class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 959.999 959.999" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-3c91"></use></svg><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xml:space="preserve" class="u-svg-content" viewBox="0 0 959.999 959.999" x="0px" y="0px" id="svg-3c91" style="enable-background:new 0 0 959.999 959.999;"><g><g><path d="M628.833,459.92l67.596-67.596c48.836,19.389,103.95,18.183,152.007-3.614c11.799-5.353,14.622-20.844,5.46-30.006    L733.52,238.329c-14.625-14.625-14.625-38.338,0-52.963L853.771,65.114c9.221-9.222,6.385-24.827-5.497-30.203    C776.762,2.554,689.668,15.763,630.885,74.545c-55.213,55.212-70.079,135.975-44.618,204.958l-68.926,68.926L628.833,459.92z"></path><path d="M499.665,366.106l-93.414-93.414L294.76,384.184l93.414,93.414l111.49,111.491l341.527,341.527    c4.877,4.877,11.271,7.316,17.662,7.316c6.393,0,12.785-2.439,17.662-7.316l76.166-76.166c9.755-9.756,9.755-25.57,0-35.324    L611.155,477.598L499.665,366.106z"></path><path d="M904.345,127.995l-99.869,99.869c-7.984,7.984-7.984,20.93,0,28.914l76.972,76.972c8.594,8.593,22.826,7.907,30.371-1.619    c45.178-57.037,53.729-133.579,25.659-198.004C931.75,120.981,914.483,117.855,904.345,127.995z"></path><path d="M139.613,601.295L259.988,721.67c14.625,14.625,14.625,38.338,0,52.963L139.737,894.885    c-9.221,9.221-6.385,24.828,5.497,30.203c71.512,32.355,158.606,19.148,217.39-39.635    c55.014-55.014,69.968-135.395,44.888-204.213l74.476-74.475l-111.489-111.49l-72.694,72.693    c-49.015-19.688-104.434-18.584-152.729,3.322C133.274,576.641,130.452,592.135,139.613,601.295z"></path><path d="M81.69,629.866c-45.177,57.037-53.728,133.58-25.659,198.004c5.727,13.146,22.994,16.271,33.133,6.133l99.869-99.869    c7.984-7.984,7.984-20.93,0-28.914l-76.972-76.971C103.468,619.655,89.235,620.34,81.69,629.866z"></path><path d="M138.849,461.443c11.956,11.956,31.339,11.956,43.295,0l5.772-5.772c11.956-11.955,11.956-31.339,0-43.294l-11.545-11.545    l22.731-22.73L92.309,271.308l-22.73,22.73l-11.545-11.545c-11.956-11.955-31.339-11.955-43.295,0l-5.772,5.773    c-11.956,11.956-11.956,31.339,0,43.294L138.849,461.443z"></path><path d="M304.036,65.967l105.457,105.457c121.583-81.009,189.546-13.059,96.078-106.526    C440.93,0.256,359.305,30.842,304.036,65.967z"></path><path d="M271.62,68.906c-5.978-5.978-13.812-8.967-21.647-8.967s-15.67,2.989-21.647,8.967L98.441,198.79    c-11.956,11.955-11.956,31.339,0,43.295l11.545,11.545l106.793,106.793l11.545,11.545c5.978,5.978,13.812,8.967,21.647,8.967    c1.894,0,3.788-0.179,5.655-0.528c4.374-0.817,8.603-2.592,12.352-5.324c1.272-0.929,2.491-1.965,3.64-3.113l5.462-5.462    l111.49-111.491l8.838-8.838l4.094-4.093c1.631-1.631,3.031-3.405,4.218-5.275c7.507-11.836,6.105-27.696-4.218-38.02    l-12.571-12.571L283.044,80.33L271.62,68.906z"></path>
    </g>
    </g></svg></span><span class="u-black u-icon u-icon-circle u-spacing-8 u-icon-5" data-animation-name="pulse" data-animation-duration="1000" data-animation-delay="0" data-animation-direction=""><svg id ='jobpage' class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 -32 512 512" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-9fb5"></use></svg><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xml:space="preserve" class="u-svg-content" viewBox="0 -32 512 512" id="svg-9fb5"><path d="m271 15c0-8.285156-6.714844-15-15-15s-15 6.714844-15 15v64.265625c0 8.285156 6.714844 15 15 15s15-6.714844 15-15zm0 0"></path><path d="m181.128906 105.941406c2.925782 2.925782 6.765625 4.394532 10.605469 4.394532 3.835937 0 7.675781-1.464844 10.605469-4.394532 5.855468-5.859375 5.855468-15.355468 0-21.214844l-32.136719-32.132812c-5.855469-5.859375-15.351563-5.859375-21.210937 0-5.859376 5.859375-5.859376 15.355469 0 21.214844zm0 0"></path><path d="m320.265625 110.332031c3.839844 0 7.679687-1.464843 10.605469-4.394531l32.136718-32.132812c5.855469-5.855469 5.855469-15.355469 0-21.210938-5.859374-5.859375-15.355468-5.859375-21.214843 0l-32.132813 32.132812c-5.859375 5.859376-5.859375 15.355469 0 21.210938 2.929688 2.929688 6.769532 4.394531 10.605469 4.394531zm0 0"></path><path d="m212.605469 144.914062c-.15625.128907-.304688.253907-.445313.371094l-64.851562 55.59375c-6.007813 5.148438-13.6875 7.988282-21.609375 7.988282h-46.449219c-43.769531 0-79.25 35.417968-79.25 79.25v144.621093c0 8.28125 6.714844 15 15 15h128.53125c8.289062 0 15-6.722656 15-15v-137.703125l76.328125-65.425781c3.898437-3.339844 6.140625-8.21875 6.140625-13.351563v-57.589843c0-14.648438-17.015625-22.980469-28.394531-13.753907zm0 0"></path><path d="m432.75 208.867188h-46.449219c-7.921875 0-15.601562-2.839844-21.609375-7.992188l-64.851562-55.589844c-.140625-.117187-.289063-.242187-.445313-.371094-11.378906-9.226562-28.394531-.894531-28.394531 13.753907v57.589843c0 5.132813 2.242188 10.011719 6.140625 13.351563l76.328125 65.425781v137.699219c0 8.28125 6.710938 15 15 15h128.53125c8.285156 0 15-6.714844 15-15v-144.617187c0-43.832032-35.480469-79.25-79.25-79.25zm0 0"></path><path d="m142.464844 145.664062c0-34.847656-28.351563-63.199218-63.199219-63.199218s-63.199219 28.351562-63.199219 63.199218c0 34.851563 28.351563 63.203126 63.199219 63.203126s63.199219-28.351563 63.199219-63.203126zm0 0"></path><path d="m495.933594 145.664062c0-34.847656-28.351563-63.199218-63.199219-63.199218s-63.199219 28.351562-63.199219 63.199218c0 34.851563 28.351563 63.203126 63.199219 63.203126s63.199219-28.351563 63.199219-63.203126zm0 0"></path></svg></span><span class="u-black u-icon u-icon-circle u-spacing-8 u-icon-6" data-animation-name="pulse" data-animation-duration="1000" data-animation-delay="0" data-animation-direction=""><svg id='setting' class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 512 512" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-54c5"></use></svg><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xml:space="preserve" class="u-svg-content" viewBox="0 0 512 512" x="0px" y="0px" id="svg-54c5" style="enable-background:new 0 0 512 512;"><g><g><path d="M500.6,212.6l-59.9-14.7c-3.3-10.5-7.5-20.7-12.6-30.6l30.6-51c3.6-6,2.7-13.5-2.1-18.3L414,55.4    c-4.8-4.8-12.3-5.7-18.3-2.1l-51,30.6c-9.9-5.1-20.1-9.3-30.6-12.6l-14.4-59.9C297.9,4.8,291.9,0,285,0h-60    c-6.9,0-12.9,4.8-14.7,11.4l-14.4,59.9c-10.5,3.3-20.7,7.5-30.6,12.6l-51-30.6c-6-3.6-13.5-2.7-18.3,2.1L53.4,98    c-4.8,4.8-5.7,12.3-2.1,18.3l30.6,51c-5.1,9.9-9.3,20.1-12.6,30.6l-57.9,14.7C4.8,214.1,0,220.1,0,227v60    c0,6.9,4.8,12.9,11.4,14.4l57.9,14.7c3.3,10.5,7.5,20.7,12.6,30.6l-30.6,51c-3.6,6-2.7,13.5,2.1,18.3L96,458.6    c4.8,4.8,12.3,5.7,18.3,2.1l51-30.6c9.9,5.1,20.1,9.3,30.6,12.6l14.4,57.9c1.8,6.6,7.8,11.4,14.7,11.4h60    c6.9,0,12.9-4.8,14.7-11.4l14.4-57.9c10.5-3.3,20.7-7.5,30.6-12.6l51,30.6c6,3.6,13.5,2.7,18.3-2.1l42.6-42.6    c4.8-4.8,5.7-12.3,2.1-18.3l-30.6-51c5.1-9.9,9.3-20.1,12.6-30.6l59.9-14.7c6.6-1.5,11.4-7.5,11.4-14.4v-60    C512,220.1,507.2,214.1,500.6,212.6z M255,332c-41.4,0-75-33.6-75-75c0-41.4,33.6-75,75-75c41.4,0,75,33.6,75,75    C330,298.4,296.4,332,255,332z"></path>
    </g>
    </g></svg></span><span class="u-black u-icon u-icon-circle u-spacing-8 u-icon-7" data-animation-name="pulse" data-animation-duration="1000" data-animation-delay="0" data-animation-direction=""><svg id='logouts' class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 512.00533 512" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-d09a"></use></svg><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xml:space="preserve" class="u-svg-content" viewBox="0 0 512.00533 512" id="svg-d09a"><path d="m320 277.335938c-11.796875 0-21.332031 9.558593-21.332031 21.332031v85.335937c0 11.753906-9.558594 21.332032-21.335938 21.332032h-64v-320c0-18.21875-11.605469-34.496094-29.054687-40.554688l-6.316406-2.113281h99.371093c11.777344 0 21.335938 9.578125 21.335938 21.335937v64c0 11.773438 9.535156 21.332032 21.332031 21.332032s21.332031-9.558594 21.332031-21.332032v-64c0-35.285156-28.714843-63.99999975-64-63.99999975h-229.332031c-.8125 0-1.492188.36328175-2.28125.46874975-1.027344-.085937-2.007812-.46874975-3.050781-.46874975-23.53125 0-42.667969 19.13281275-42.667969 42.66406275v384c0 18.21875 11.605469 34.496093 29.054688 40.554687l128.386718 42.796875c4.351563 1.34375 8.679688 1.984375 13.226563 1.984375 23.53125 0 42.664062-19.136718 42.664062-42.667968v-21.332032h64c35.285157 0 64-28.714844 64-64v-85.335937c0-11.773438-9.535156-21.332031-21.332031-21.332031zm0 0"></path><path d="m505.75 198.253906-85.335938-85.332031c-6.097656-6.101563-15.273437-7.9375-23.25-4.632813-7.957031 3.308594-13.164062 11.09375-13.164062 19.714844v64h-85.332031c-11.777344 0-21.335938 9.554688-21.335938 21.332032 0 11.777343 9.558594 21.332031 21.335938 21.332031h85.332031v64c0 8.621093 5.207031 16.40625 13.164062 19.714843 7.976563 3.304688 17.152344 1.46875 23.25-4.628906l85.335938-85.335937c8.339844-8.339844 8.339844-21.824219 0-30.164063zm0 0"></path></svg></span>
    </div>
    </div>
    <div class="u-expanded-width-xs u-list u-repeater u-list-1">


     <?php

     $sql = "SELECT *
     FROM happenings H,users U
     WHERE H.user_id = U.user_id
     ORDER BY H.hapen_id DESC";

     $result = $conn->query($sql);


     function humanTiming ($time)
     {

            $time = time() - $time; // to get the time since that moment
            $time = ($time<1)? 1 : $time;
            $tokens = array (
              31536000 => 'year',
              2592000 => 'month',
              604800 => 'week',
              86400 => 'day',
              3600 => 'hour',
              60 => 'minute',
              1 => 'second'
            );

            foreach ($tokens as $unit => $text)
            {
              if ($time < $unit) continue;
              $numberOfUnits = floor($time / $unit);
              return $numberOfUnits.' '.$text.(($numberOfUnits>1)?'s':'');
            }

          }


          while($row = $result->fetch_assoc())
          {

            $timeonrecord = $row['posted_time'];

            $time = strtotime($timeonrecord);

            $json_raters= json_decode($row['raters'], true);
            $raters_count = empty($json_raters)?0:count($json_raters);
            echo '<div class="u-border-2 u-border-white u-container-style u-list-item u-radius-5 u-repeater-item u-shape-round u-list-item-1">';
            echo'<div class="u-container-layout u-similar-container u-container-layout-3">';
            echo "<img src='".$row['gravatar']."' style='width:60px;height:60px;border-radius:80%;'>&nbsp;";

            echo '<h1 class="u-custom-font u-text u-text-default u-title u-text-2">'.$row['Firstname'].' '.$row['Lastname'].' posted - <span>'.humanTiming($time).' ago</span></h1>';
            echo '<p class="u-custom-font u-large-text u-text u-text-custom-color-1 u-text-default u-text-variant u-text-3">'.$row['comments'].'</p>';
            echo '<img src="images/54e2dd434b52b108f5d084609629317e113fdce15b4c704f75287cd1934ac45b_1280.jpg" alt="" class="u-expanded-width-xs u-image u-image-round u-radius-10 u-image-2" data-image-width="1280" data-image-height="850">';  
            echo '<a href="#" class="u-btn u-btn-round u-button-style u-custom-color-1 u-custom-font u-hover-black u-radius-5 u-btn-1">SHARE</a>';
            echo "<button type='button' class='u-btn u-btn-round u-button-style u-custom-color-3 u-custom-font u-hover-black u-radius-5 u-btn-2' name='add_like_".$row['hapen_id']."' >TOPO!</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
            echo '<p class="u-custom-font u-small-text u-text u-text-custom-color-3 u-text-variant u-text-4">'.$raters_count.'</p> <span class="u-icon u-icon-circle u-text-custom-color-3 u-icon-8"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 391.837 391.837" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-a082"></use></svg><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xml:space="preserve" class="u-svg-content" viewBox="0 0 391.837 391.837" x="0px" y="0px" id="svg-a082" style="enable-background:new 0 0 391.837 391.837;"><g><path style="fill:currentColor;" d="M285.257,35.528c58.743,0.286,106.294,47.836,106.58,106.58   c0,107.624-195.918,214.204-195.918,214.204S0,248.165,0,142.108c0-58.862,47.717-106.58,106.58-106.58l0,0   c36.032-0.281,69.718,17.842,89.339,48.065C215.674,53.517,249.273,35.441,285.257,35.528z"></path>
            </g></svg></span>';



            echo '';

            // echo '<div class="u-border-2 u-border-white u-container-style u-group u-radius-5 u-shape-round u-group-3">';
            // echo '<span class="u-custom-color-3 u-icon u-icon-circle u-spacing-7 u-icon-9"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 511.992 511.992" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-c428"></use></svg><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xml:space="preserve" class="u-svg-content" viewBox="0 0 511.992 511.992" x="0px" y="0px" id="svg-c428" style="enable-background:new 0 0 511.992 511.992;"><g><g><path d="M255.992,175.994h-64v-96c0-6.624-4.064-12.544-10.24-14.912c-6.112-2.432-13.152-0.768-17.6,4.16l-160,176    c-5.536,6.112-5.536,15.424,0,21.536l160,176c3.104,3.36,7.424,5.216,11.84,5.216c1.952,0,3.904-0.352,5.76-1.056    c6.176-2.4,10.24-8.32,10.24-14.944v-96h33.6c97.856,0,189.856,38.112,259.072,107.328c4.608,4.608,11.52,5.952,17.44,3.456    c5.984-2.464,9.888-8.32,9.888-14.784C511.992,290.842,397.144,175.994,255.992,175.994z"></path>
            // </g>
            // </g></svg></span>';


          // echo "<div id='theChat'>";

          // echo '<small class="text-dark" id="replied">'.$row['Firstname'].' '.$row['Lastname'].' posted - <span>'.humanTiming($time).' ago</span></small><br><br>';

          // echo "<img id='imgChat' src='".$row['gravatar']."' style='width:40px;height:40px;border-radius:50%;'><br>";

          // echo "<div id='text-chat-box'>";
          // echo "<span id='coments'>".$row['comments']."</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
          // echo "<br><br>";
          // echo "<button type='button' class='topo btn' name='add_like_".$row['hapen_id']."' >TOPO!</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
          // echo "<button class='share btn'>Share</button><br><br>";
          // echo "<i class='red material-icons'>favorite</i>&nbsp;&nbsp;&nbsp;<span class='number'>".$raters_count."</span><br><br>";

            $sqljoin = "SELECT *
            FROM happenings H, reply R, users U
            WHERE H.hapen_id = R.hapen_id
            AND R.replyuserid = U.user_id
            AND H.hapen_id = ".$row['hapen_id']."
            ORDER BY R.time_reply DESC";


            $resultjoin = $conn->query($sqljoin);

            while($rowjoin = $resultjoin->fetch_assoc())
            {

              $replytime = $rowjoin['time_reply'];

              $timeReply = strtotime($replytime);


        // echo "<div style='border:solid 2px #e7e7e8;width:90%;background-color:#e7e7e8;margin-left:20px;'>";
        // echo "<img src='".$rowjoin['gravatar']."' style='width:40px;height:40px;border-radius:50%;'>&nbsp;";
              echo '<p id="poeple" class="h6">'.$rowjoin['Firstname'].' '.$rowjoin['Lastname'].' replied <span>'.humanTiming($timeReply).'</p>' ;

              echo '<p id="messagedisplay" class="h6">'.$rowjoin['reply_message'].'</p>';
        // echo '<small class="name">&nbsp;&nbsp;'.$rowjoin['Firstname'].' '.$rowjoin['Lastname'].' replied <span>'.humanTiming($timeReply).' ago</span></small><br><br>';


        //     echo '<span style="width:90%;" class="messageStyle">'.$rowjoin['reply_message'].'</span>';
        //     echo "</div>";


            }


            echo '<form action="replyClient.php" method="post">';

            echo '<div class="form-group">';
            echo '<input type="hidden" class="form-control" value="'.$row['hapen_id'].'" name="hapen_id" id="hapen_id">';
            echo'</div>';
            echo '<div class="form-group">';

              echo ' <div class="container-fluid">'; 
              echo '<div class="row">';
              echo '<div class="col-md-8">';
              echo " <input type='text' id='shareThought'class='form-control' name='reply' placeholder='Share your thoughts...'> <br/>";
              echo '</div>';
              echo '<div class="col-md-4">';
              // echo '<span class="u-custom-color-3 u-icon u-icon-circle u-spacing-7 u-icon-9"><svg id ="sendreply"class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 511.992 511.992" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-c428"></use></svg><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xml:space="preserve" class="u-svg-content" viewBox="0 0 511.992 511.992" x="0px" y="0px" id="svg-c428" style="enable-background:new 0 0 511.992 511.992;"><g><g><path d="M255.992,175.994h-64v-96c0-6.624-4.064-12.544-10.24-14.912c-6.112-2.432-13.152-0.768-17.6,4.16l-160,176    c-5.536,6.112-5.536,15.424,0,21.536l160,176c3.104,3.36,7.424,5.216,11.84,5.216c1.952,0,3.904-0.352,5.76-1.056    c6.176-2.4,10.24-8.32,10.24-14.944v-96h33.6c97.856,0,189.856,38.112,259.072,107.328c4.608,4.608,11.52,5.952,17.44,3.456    c5.984-2.464,9.888-8.32,9.888-14.784C511.992,290.842,397.144,175.994,255.992,175.994z"></path>
              //         </g>
              //         </g></svg></span>';
              echo "<input type='submit'   id='".$row['hapen_id']."'  class='btn btn-primary' value='Reply'>" ;
              echo '</div>';
              echo '</div>';
              echo '</div>';
            
            // echo "<input type='submit' style='display:none'  id='".$row['hapen_id']."'  class='btn btn-primary' value='Reply'>" ;
            
            echo'</div>';
            echo "</form>";

            // echo'</div>';
            // echo'</div>';
            echo'</div>';
            echo'</div>';



          // echo "<img src='".$row['gravatar']."' style='width:40px;height:40px;border-radius:50%;'>&nbsp;";
          // echo '<span class="text-dark">'.$row['Firstname'].' '.$row['Lastname'].' Posted <span>'.humanTiming($time).' ago</span></span><br><br>';
          // echo "<textarea disabled class='posting' style='width:90%;'>";
          // echo ''.$row['comments'].' ';
          // echo '</textarea><br><br>';
          // echo "<a type='submit' href='#forms' rel='modal:open' id=".$row['hapen_id']."  class='replying btn btn-primary'>Reply<a><br><br>" ;


          }

          ?>



            </div>
<!--             <div class="u-border-2 u-border-custom-color-1 u-container-style u-custom-color-1 u-expanded-width-xs u-group u-radius-5 u-shape-round u-group-7">
              <div class="u-container-layout u-container-layout-11">
                <p class="u-custom-font u-text u-text-default u-text-14"><span class="u-icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xml:space="preserve" class="u-svg-content" viewBox="0 0 512 512" style="width: 1em; height: 1em;"><g><g><path d="m359.801 429.3-103.801-30-103.801 30c-.899 1.8-1.199 3.6-1.199 5.7v62h210v-62c0-2.1-.3-3.9-1.199-5.7z" fill="#646d73"></path>
                </g><path d="m361 497v-62c0-2.1-.3-3.9-1.199-5.7l-103.801-30v97.7z" fill="#474f54"></path><path d="m497 30h-76.645c.132-5.067.645-9.84.645-15 0-8.401-6.599-15-15-15h-300c-8.401 0-15 6.599-15 15 0 5.16.513 9.933.643 15h-76.643c-8.291 0-15 6.709-15 15v37.998c0 83.754 67.092 151.791 149.773 156.171 17.225 23.716 37.668 41.316 60.927 51.231-3.6 72.9-45.3 123.6-55.199 134.101-1.501 1.199-2.701 2.999-3.301 4.799h207.601c-.601-1.8-1.8-3.6-3.301-4.799-10.2-10.501-51.6-60.901-55.2-134.101 23.264-9.917 43.83-27.521 61.069-51.246 82.61-4.451 149.631-72.449 149.631-156.156v-37.998c0-8.291-6.709-15-15-15zm-467 52.998v-22.998h62.93c3.893 49.578 14.644 102.086 37.24 146.708-56.64-12.755-100.17-63.265-100.17-123.71zm452 0c0 60.414-43.491 110.9-100.089 123.684 22.417-44.621 33.228-96.621 37.159-146.682h62.93z" fill="#fed843"></path><path d="m497 30h-76.645c.132-5.067.645-9.84.645-15 0-8.401-6.599-15-15-15h-150v429.3h103.801c-.601-1.8-1.8-3.6-3.301-4.799-10.2-10.501-51.6-60.901-55.2-134.101 23.264-9.917 43.83-27.521 61.069-51.246 82.61-4.451 149.631-72.449 149.631-156.156v-37.998c0-8.291-6.709-15-15-15zm-15 52.998c0 60.414-43.491 110.9-100.089 123.684 22.419-44.621 33.23-96.621 37.159-146.682h62.93z" fill="#fabe2c"></path><g id="Trophy_31_"><g><path d="m279.936 190.796-23.936-12.437-23.936 12.437c-5.01 2.578-11.133 2.153-15.732-1.172-4.6-3.34-6.914-8.994-5.977-14.59l4.395-26.646-19.189-18.94c-4.177-4.072-5.454-10.109-3.75-15.322 1.758-5.391 6.416-9.346 12.041-10.195l26.66-4.014 12.07-24.126c5.098-10.166 21.738-10.166 26.836 0l12.07 24.126 26.66 4.014c5.625.85 10.283 4.805 12.041 10.195 1.758 5.405.322 11.338-3.75 15.322l-19.189 18.94 4.395 26.646c.938 5.596-1.377 11.25-5.977 14.59-4.569 3.311-10.681 3.8-15.732 1.172z" fill="#fabe2c"></path>
                </g>
              </g><path d="m279.936 190.796c5.052 2.628 11.164 2.139 15.732-1.172 4.6-3.34 6.914-8.994 5.977-14.59l-4.395-26.646 19.189-18.94c4.072-3.984 5.508-9.917 3.75-15.322-1.758-5.391-6.416-9.346-12.041-10.195l-26.66-4.014-12.07-24.126c-2.549-5.083-7.983-7.625-13.418-7.625v110.193z" fill="#ff9100"></path><g><path d="m376 512h-240c-8.291 0-15-6.709-15-15s6.709-15 15-15h240c8.291 0 15 6.709 15 15s-6.709 15-15 15z" fill="#474f54"></path>
              </g><path d="m376 482h-120v30h120c8.291 0 15-6.709 15-15s-6.709-15-15-15z" fill="#32393f"></path>
            </g></svg><img></span>&nbsp;pazblé Master
          </p>
          <p class="u-align-center u-custom-font u-text u-text-default u-text-15">Compete and become a pazblé Master! Read the rules here.</p>
          <p class="u-align-center u-custom-font u-text u-text-default u-text-16">SEE ALL</p>
        </div>
      </div>
      <div class="u-list u-repeater u-list-2">
        <div class="u-container-style u-custom-color-1 u-list-item u-repeater-item u-list-item-5">
          <div class="u-container-layout u-similar-container u-container-layout-12">
            <div alt="" class="u-image u-image-circle u-preserve-proportions u-image-9" data-image-width="1024" data-image-height="1024"></div>
            <p class="u-custom-font u-text u-text-17">User 1</p>
            <p class="u-custom-font u-text u-text-18">40</p>
          </div>
        </div>
        <div class="u-container-style u-custom-color-1 u-list-item u-repeater-item u-list-item-6">
          <div class="u-container-layout u-similar-container u-container-layout-13">
            <div alt="" class="u-image u-image-circle u-preserve-proportions u-image-10" data-image-width="1024" data-image-height="1024"></div>
            <p class="u-custom-font u-text u-text-19">User 2</p>
            <p class="u-custom-font u-text u-text-20">35</p>
          </div>
        </div>
        <div class="u-container-style u-custom-color-1 u-list-item u-repeater-item u-list-item-7">
          <div class="u-container-layout u-similar-container u-container-layout-14">
            <div alt="" class="u-image u-image-circle u-preserve-proportions u-image-11" data-image-width="1024" data-image-height="1024"></div>
            <p class="u-custom-font u-text u-text-21">User 3<br>
            </p>
            <p class="u-custom-font u-text u-text-22">20<br>
            </p>
          </div>
        </div>
        <div class="u-container-style u-custom-color-1 u-list-item u-repeater-item u-list-item-8">
          <div class="u-container-layout u-similar-container u-container-layout-15">
            <div alt="" class="u-image u-image-circle u-preserve-proportions u-image-12" data-image-width="1024" data-image-height="1024"></div>
            <p class="u-custom-font u-text u-text-23">User 1</p>
            <p class="u-custom-font u-text u-text-24">40</p>
          </div>
        </div>
      </div>
    </div> -->
    </section>


<br>

    <footer class="u-align-left u-clearfix u-footer u-white" id="sec-bb66" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction=""><div class="u-clearfix u-sheet u-sheet-1">
      <p class="u-custom-font u-text u-text-default u-text-1">© 2020 by pazblé</p>
      <p class="u-custom-font u-text u-text-default u-text-2">INTELIT<span class="u-text-custom-color-3">É</span>GEN
      </p>
      <p class="u-custom-font u-text u-text-custom-color-3 u-text-default u-text-3">Made in Mauritius.</p>
      <img src="images/mflag.png" alt="" class="u-image u-image-default u-image-1" data-image-width="400" data-image-height="267">
    </div></footer>
    </body>
    <!---- START VALIDATION CORRECTIONS [ PILLS & SKY ] ---->
    <button type="button" class="btn btn-primary" id="trigger_form_speak_modal" data-toggle="modal" data-target="#form_speak_modal" style="display:none;"></button>

    <!-- Modal -->
    <div class="modal fade" id="form_speak_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <strong>Speak up</strong>
            </div>
          </div>
          <div class="modal-body">

           <textarea class="textStyle" name="messageText" placeholder="How's it going for you?" id="message"></textarea>
         </div>
         <div class="modal-footer">
           <button type="button" id="postme" class="btn btn-success" name='posting'>Speak up</button>
           <button type="button" class="btn btn-danger" data-dismiss="modal" id="clear_input_register">Close</button>
         </div>
       </div>
     </div>
    </div>
    <!-- END -->
    <script type="text/javascript">


      $("#postme").on('click',function(){

        var msg = $('#message').val(); 
        $.ajax({
          url:'message.php',
          type:'post',
          data:{
            'message': msg
          },
          success: function(data){
            window.location.href = "newsfeedclient.php";
          }
        });

      });

      $(document).on("click", '.replying', function(event) {

       $("#hapen_id").val($(this).attr('id'));

     });

        // not really needed here, but since its called in a header file, all pages
        // will look for this.
        function val()
        {
      //store the value the user input in b_name
      // var b_name= document.getElementById("typing").value;
      //The encodeURI() function is used to encode a URI.
      var url= encodeURI("getTitle.php?title=<?php echo $user; ?>");

      //Sending an XMLHttpRequest
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function()
      {
        if(this.readyState == 4 && this.status == 200)
        {
          // process the response

          //convert text into a JavaScript object:
          //Make sure the text is written in JSON format, or else you will get a syntax error.
          var myObj = JSON.parse(this.responseText);


          var result="";

          // for (x in myObj.data)
          // {

            // document.getElementById("output1").innerHTML =
            // result +=
            // "<b>Title : </b> "+myObj.data[x].title+
            // "<br/><b> Boss Name : </b>"+myObj.data[x].Firstname+" "+myObj.data[x].Lastname+
            // " <br/><b> Description : </b> " + myObj.data[x].Description+
            // "<br/><b> Address : </b>"+myObj.data[x].Address+
            // "<br/><b> Job Posted : </b>"+myObj.data[x].date_posted+
            // "<br/><b> Status : </b>"+myObj.data[x].Status+
            // "</b><br/><br/>";

          // }


        }
      };

      // open http connection request
      xmlhttp.open("GET",url, true);
      // send data via the above connection
      xmlhttp.send();

    }

    $('[name*=add_like').click(function(){
      var botton_self = $(this);
      $.ajax({
        url: 'ratePost.php',
        data:{
          'hapen_id': $(this).attr('name')
        },
        success: function(data){
          var deserialized_response = JSON.parse(data);
          if(deserialized_response.has_added){
            $(botton_self).parent().find('.number').text(parseInt($(botton_self).parent().find('.number').text().replace(/,/g, "")) + 1);
          }
        }
      });
        window.location.href = "newsfeedclient.php";
    });
    </script>

    <script type="text/javascript" src="js/changeToWorker.js"></script>

    </html>