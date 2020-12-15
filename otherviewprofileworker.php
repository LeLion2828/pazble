    <?php

    session_start();

    $user = $_SESSION['user_id'] ;
    $firstName = $_SESSION['Fname'];
    $lastName = $_SESSION['Lname'];

    require ('db_config.php');
    if (isset($_GET['view'])) {
        $id = $_GET['view'];
        $sql ="SELECT * FROM users WHERE user_id=$id";
        $results =$conn->query($sql);
        while ($n = mysqli_fetch_array($results)) {
          $id1=$n['user_id'];
          $FirstName1 = $n['Firstname'];
          $LastName1 = $n['Lastname'];
          $phone1 = $n['phone'];
  
    
    }
    }

  


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
    <title>Profile (Worker)</title>
    <link rel="stylesheet" href="Profile-(Workers).css" media="screen">
<link rel="stylesheet" href="Profile-(Worker).css" media="screen">
    <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
    <meta name="generator" content="Nicepage 3.1.0, nicepage.com">
    <link id="u-theme-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i">
    <link id="u-page-google-font" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
          <link rel="stylesheet" href="bootstrap/bootstrap.min.css" media="screen">
      <script class="u-script" type="text/javascript" src="jquery.js" defer=""></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
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
    border-radius: 8px;
    height: 100px;
}
    .modal-header {
      justify-content: center;
      border-bottom: 0px solid #dee2e6 !important;
    }
    .modal-content {
    background-color: #298ad8;
}
.modal_text_head {
    color: white;
    font-size: 24px;
}
.modal_text_heads {
    color: white;
    font-size: 16px;
}
.modal-footer {
    border-top: 0px solid #dee2e6 !important;
}
.u-section-4 .u-text-10 {
    /* font-family: Poppins; */
    font-weight: 600;
    font-size: 1.55rem;
    margin: -60px 42px 23px 102px;
}
.u-section-4 .u-text-4 {
    font-family: Poppins;
    font-weight: 600;
    font-size: 1.25rem;
    margin: 8px auto -11px 50px;
}

.u-section-4 .u-icon-5 {
    height: 41px;
    width: 41px;
    margin: -31px auto 0 90px;
}
</style>
    
    
    
    
    <script type="application/ld+json">{
		"@context": "http://schema.org",
		"@type": "Organization",
		"name": "Main Page",
		"url": "index.html"
}</script>
    <meta property="og:title" content="Profile (Worker)">
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
        <p class="u-custom-font u-small-text u-text u-text-variant u-text-2"><?php echo '<span class="title"style="color:black;">'.$firstName.' '.$lastName.'</span>'; ?></p>
    <p class="u-align-right u-custom-font u-small-text u-text u-text-custom-color-1 u-text-variant u-text-3" >Worker Mode
      <span>
        <label class="switch">
          <input id="submiting"  type="checkbox" value="worker" checked>
          <span class="slider round"></span>
        </label>
      </span>
    </p>
      </div></header>
    <section class="u-clearfix u-section-1" id="sec-6a2b">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-border-2 u-border-custom-color-1 u-custom-color-1 u-radius-10 u-shape u-shape-round u-shape-1"></div>
        <h1 class="u-align-center-xl u-custom-font u-text u-text-white u-title u-text-1">Worker Mode</h1>
        <div class="u-align-left u-border-2 u-border-custom-color-1 u-container-style u-custom-color-1 u-group u-radius-10 u-shape-round u-group-1">
          <div class="u-container-layout u-container-layout-1">
             <?php
            echo ' <img src="'.$path['gravatar'].'" alt="" class="u-image u-image-round u-preserve-proportions u-radius-10 u-image-1" data-image-width="181" data-image-height="200">';
            ?>
            <div class="u-black u-border-2 u-border-black u-container-style u-group u-radius-10 u-shape-round u-group-2">
              <div class="u-container-layout u-container-layout-2">
                <h1 class="u-align-center u-custom-font u-text u-title u-text-2">Toolkit</h1>
                <a href="newsfeedclient.php" class="u-align-center u-border-2 u-border-black u-btn u-btn-round u-button-style u-custom-color-2 u-custom-font u-hover-custom-color-1 u-radius-10 u-btn-1">SPEAK UP</a>
                <a href="#" class="u-align-center u-border-2 u-border-black u-btn u-btn-round u-button-style u-custom-color-3 u-custom-font u-hover-custom-color-1 u-radius-10 u-btn-2">WORK-SHOP</a>
                <a href="#" class="u-align-center u-border-2 u-border-black u-btn u-btn-round u-button-style u-custom-color-1 u-custom-font u-hover-custom-color-1 u-radius-10 u-btn-3">NET-WORK</a>
                <a href="#" class="u-align-center u-border-2 u-border-black u-btn u-btn-round u-button-style u-custom-color-2 u-custom-font u-hover-custom-color-1 u-radius-10 u-btn-4">MANAGE JOBS</a>
                <p class="u-align-center u-custom-font u-text u-text-3"><span class="u-icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xml:space="preserve" class="u-svg-content" viewBox="0 0 300 300" x="0px" y="0px" style="width: 1em; height: 1em;"><g><g><path d="M149.996,0C67.157,0,0.001,67.161,0.001,149.997S67.157,300,149.996,300s150.003-67.163,150.003-150.003    S232.835,0,149.996,0z M221.302,107.945l-14.247,14.247l-29.001-28.999l-11.002,11.002l29.001,29.001l-71.132,71.126    l-28.999-28.996L84.92,186.328l28.999,28.999l-7.088,7.088l-0.135-0.135c-0.786,1.294-2.064,2.238-3.582,2.575l-27.043,6.03    c-0.405,0.091-0.817,0.135-1.224,0.135c-1.476,0-2.91-0.581-3.973-1.647c-1.364-1.359-1.932-3.322-1.512-5.203l6.027-27.035    c0.34-1.517,1.286-2.798,2.578-3.582l-0.137-0.137L192.3,78.941c1.678-1.675,4.404-1.675,6.082,0.005l22.922,22.917    C222.982,103.541,222.982,106.267,221.302,107.945z"></path>
</g>
</g></svg><img></span>&nbsp;EDIT PROFILE
                </p>
                <p class="u-align-center u-custom-font u-text u-text-custom-color-4 u-text-4"><span class="u-icon u-icon-rectangle u-text-custom-color-4"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xml:space="preserve" class="u-svg-content" viewBox="0 0 512 512" style="width: 1em; height: 1em;"><g><path d="m328 377h-80c-8.284 0-15 6.716-15 15s6.716 15 15 15h80c8.284 0 15-6.716 15-15s-6.716-15-15-15z"></path><path d="m248 343h56c8.284 0 15-6.716 15-15s-6.716-15-15-15h-56c-8.284 0-15 6.716-15 15s6.716 15 15 15z"></path><path d="m512 160c0-65.617-53.383-119-119-119-51.962 0-96.246 33.48-112.429 80h-235.571c-24.813 0-45 20.187-45 45v260c0 24.813 20.187 45 45 45h373c24.813 0 45-20.187 45-45v-169.829c29.677-21.661 49-56.699 49-96.171zm-119-89c49.075 0 89 39.925 89 89s-39.925 89-89 89-89-39.925-89-89 39.925-89 89-89zm40 355c0 8.271-6.729 15-15 15h-373c-8.271 0-15-6.729-15-15v-260c0-8.271 6.729-15 15-15h229.339c-.223 2.972-.339 5.973-.339 9 0 65.617 53.383 119 119 119 14.028 0 27.493-2.447 40-6.924z"></path><path d="m363.583 190.708c2.264 4.528 6.659 7.608 11.687 8.192.579.066 1.156.1 1.731.1 4.421 0 8.654-1.956 11.522-5.397l40-48c5.303-6.364 4.443-15.822-1.921-21.126-6.363-5.303-15.822-4.443-21.126 1.921l-25.317 30.381-5.743-11.486c-3.705-7.41-12.716-10.415-20.125-6.708-7.41 3.704-10.413 12.715-6.708 20.124z"></path><path d="m167.088 302.647c9.83-9.941 15.912-23.595 15.912-38.647 0-30.327-24.673-55-55-55s-55 24.673-55 55c0 15.052 6.082 28.706 15.912 38.647-14.552 11.55-23.912 29.374-23.912 49.353v40c0 8.284 6.716 15 15 15h96c8.284 0 15-6.716 15-15v-40c0-19.979-9.36-37.803-23.912-49.353zm-64.088-38.647c0-13.785 11.215-25 25-25s25 11.215 25 25-11.215 25-25 25-25-11.215-25-25zm58 113h-66v-25c0-18.196 14.804-33 33-33s33 14.804 33 33z"></path>
</g></svg><img></span>&nbsp;VERIFY
                </p>
              </div>
            </div>
            <a href="https://nicepage.com/website-design" class="u-align-center u-border-1 u-border-custom-color-1 u-btn u-btn-round u-button-style u-custom-font u-hover-custom-color-1 u-radius-10 u-white u-btn-5">+ FOLLOW</a>
            <p class="u-custom-font u-text u-text-5"><span class="u-icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xml:space="preserve" class="u-svg-content" viewBox="0 0 512 512.001" style="width: 1em; height: 1em;"><path d="m150.632812 236h40v40h-40zm0 0"></path><path d="m236 236h40v40h-40zm0 0"></path><path d="m321.367188 236h40v40h-40zm0 0"></path><path d="m340.789062 380.996094c-24.84375 16.875-54.402343 26.027344-84.789062 26.027344-83.464844 0-151.023438-67.546876-151.023438-151.023438v-15h-104.976562v15c0 141.480469 114.496094 256 256 256 58.386719 0 114.597656-19.785156 159.804688-55.988281l31.179687 31.179687 27.742187-161.691406-161.691406 27.742188zm0 0"></path><path d="m256 0c-58.25 0-114.355469 19.707031-159.511719 55.761719l-30.953125-30.953125-27.742187 161.691406 161.691406-27.742188-27.992187-27.992187c24.851562-16.921875 53.761718-25.789063 84.507812-25.789063 83.464844 0 151.023438 67.550782 151.023438 151.023438v15h104.976562v-15c0-141.480469-114.496094-256-256-256zm0 0"></path></svg><img></span>
              <span style="font-size: 0.875rem;">&nbsp;VIEW NAME AS BOSS</span>
            </p><span class="u-icon u-icon-circle u-text-white u-icon-4"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 30.743 30.744" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-b7a5"></use></svg><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xml:space="preserve" class="u-svg-content" viewBox="0 0 30.743 30.744" x="0px" y="0px" id="svg-b7a5" style="enable-background:new 0 0 30.743 30.744;"><g><path d="M28.585,9.67h-0.842v9.255c0,1.441-0.839,2.744-2.521,2.744H8.743v0.44c0,1.274,1.449,2.56,2.937,2.56h12.599l4.82,2.834   L28.4,24.669h0.185c1.487,0,2.158-1.283,2.158-2.56V11.867C30.743,10.593,30.072,9.67,28.585,9.67z"></path><path d="M22.762,3.24H3.622C1.938,3.24,0,4.736,0,6.178v11.6c0,1.328,1.642,2.287,3.217,2.435l-1.025,3.891L8.76,20.24h14.002   c1.684,0,3.238-1.021,3.238-2.462V8.393V6.178C26,4.736,24.445,3.24,22.762,3.24z M6.542,13.032c-0.955,0-1.729-0.774-1.729-1.729   s0.774-1.729,1.729-1.729c0.954,0,1.729,0.774,1.729,1.729S7.496,13.032,6.542,13.032z M13,13.032   c-0.955,0-1.729-0.774-1.729-1.729S12.045,9.574,13,9.574s1.729,0.774,1.729,1.729S13.955,13.032,13,13.032z M19.459,13.032   c-0.955,0-1.73-0.774-1.73-1.729s0.775-1.729,1.73-1.729c0.953,0,1.729,0.774,1.729,1.729S20.412,13.032,19.459,13.032z"></path>
</g></svg></span><span class="u-icon u-icon-circle u-text-white u-icon-5"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 512 512" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-6de4"></use></svg><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xml:space="preserve" class="u-svg-content" viewBox="0 0 512 512" x="0px" y="0px" id="svg-6de4" style="enable-background:new 0 0 512 512;"><g><g><path d="M436.992,74.953c-99.989-99.959-262.08-99.935-362.039,0.055s-99.935,262.08,0.055,362.039s262.08,99.935,362.039-0.055    c48.006-48.021,74.968-113.146,74.953-181.047C511.986,188.055,485.005,122.951,436.992,74.953z M387.703,356.605    c-0.011,0.011-0.022,0.023-0.034,0.034v-0.085l-12.971,12.885c-16.775,16.987-41.206,23.976-64.427,18.432    c-23.395-6.262-45.635-16.23-65.877-29.525c-18.806-12.019-36.234-26.069-51.968-41.899    c-14.477-14.371-27.483-30.151-38.827-47.104c-12.408-18.242-22.229-38.114-29.184-59.051    c-7.973-24.596-1.366-51.585,17.067-69.717l15.189-15.189c4.223-4.242,11.085-4.257,15.326-0.034    c0.011,0.011,0.023,0.022,0.034,0.034l47.957,47.957c4.242,4.223,4.257,11.085,0.034,15.326c-0.011,0.011-0.022,0.022-0.034,0.034    l-28.16,28.16c-8.08,7.992-9.096,20.692-2.389,29.867c10.185,13.978,21.456,27.131,33.707,39.339    c13.659,13.718,28.508,26.197,44.373,37.291c9.167,6.394,21.595,5.316,29.525-2.56l27.221-27.648    c4.223-4.242,11.085-4.257,15.326-0.034c0.011,0.011,0.022,0.022,0.034,0.034l48.043,48.128    C391.911,345.502,391.926,352.363,387.703,356.605z"></path>
</g>
</g></svg></span>
            <div class="u-border-2 u-border-custom-color-1 u-container-style u-custom-color-1 u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-group u-radius-10 u-shape-round u-group-3">
              <div class="u-container-layout u-container-layout-3">
                <h1 class="u-align-left u-custom-font u-text u-title u-text-6"><?php echo '<span>'.$FirstName1.' '.$LastName1.'</span>'; ?></h1>
                <h1 class="u-custom-font u-text u-text-white u-title u-text-7">Ratings:</h1>
                <h1 class="u-custom-font u-text u-text-white u-title u-text-8"># of Ratings Received:</h1>
                <h1 class="u-custom-font u-text u-text-white u-title u-text-9">10</h1>
                <h1 class="u-custom-font u-text u-text-white u-title u-text-10">Jobs Completed:</h1>
                <h1 class="u-custom-font u-text u-text-white u-title u-text-11">Skill 1&nbsp; Skill 2&nbsp; Skill 3</h1>
                <h1 class="u-custom-font u-text u-title u-text-12">Skills:</h1>
                <h1 class="u-custom-font u-text u-text-white u-title u-text-13">Location</h1>
                <p class="u-custom-font u-text u-text-white u-text-14">Location:</p>
                <h1 class="u-custom-font u-text u-text-white u-title u-text-15">20</h1>
                <h1 class="u-custom-font u-text u-text-white u-title u-text-16">Coverage (km):&nbsp;</h1><span class="u-icon u-icon-circle u-text-white u-icon-6"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 512 512" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-fc10"></use></svg><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xml:space="preserve" class="u-svg-content" viewBox="0 0 512 512" x="0px" y="0px" id="svg-fc10" style="enable-background:new 0 0 512 512;"><g><g><path d="M437.02,74.98C388.667,26.629,324.38,0,256,0S123.333,26.629,74.98,74.98C26.629,123.333,0,187.62,0,256    s26.629,132.667,74.98,181.02C123.333,485.371,187.62,512,256,512s132.667-26.629,181.02-74.98    C485.371,388.667,512,324.38,512,256S485.371,123.333,437.02,74.98z M256,70c30.327,0,55,24.673,55,55c0,30.327-24.673,55-55,55    c-30.327,0-55-24.673-55-55C201,94.673,225.673,70,256,70z M326,420H186v-30h30V240h-30v-30h110v180h30V420z"></path>
</g>
</g></svg></span>
                <h1 class="u-custom-font u-text u-text-white u-title u-text-17">Status:</h1>
                <h1 class="u-custom-font u-text u-text-white u-title u-text-18">Unverified</h1>
              </div>
            </div>
          </div>
        </div>
        <div class="u-container-style u-group u-radius-10 u-shape-round u-white u-group-4">
          <div class="u-container-layout u-container-layout-4"><span class="u-black u-icon u-icon-circle u-spacing-8 u-icon-7" data-animation-name="pulse" data-animation-duration="3250" data-animation-delay="0" data-animation-direction=""><svg data-toggle="tooltip" data-placement="top" title="Whatsup" id='whatsup'  class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 512 512" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-b58f"></use></svg><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xml:space="preserve" class="u-svg-content" viewBox="0 0 512 512" id="svg-b58f"><g><path d="m462.521 294.151c-9.291-11.898-23.277-18.723-38.373-18.723h-45.145v-34.428h-339.856v102.247c0 57.441 28.855 108.261 72.823 138.753h-72.704v30h339.618v-30h-72.704c15.375-10.662 28.9-23.808 39.99-38.857h32.929c38.55 0 72.003-26.12 81.353-63.518l10.927-43.705c3.66-14.646.432-29.869-8.858-41.769zm-20.246 34.493-10.927 43.705c-6.005 24.019-27.49 40.794-52.249 40.794h-15.265c9.736-21.309 15.169-44.979 15.169-69.896v-37.818h45.145c5.794 0 11.161 2.619 14.727 7.186 3.566 4.566 4.804 10.408 3.4 16.029z"></path><path d="m209.247 118.286c-27.256 0-49.43 22.174-49.43 49.43v34.427h30v-34.427c0-10.714 8.716-19.43 19.43-19.43h137.709c65.226 0 118.29-53.064 118.29-118.29v-29.996h-30v29.996c0 48.684-39.606 88.29-88.29 88.29z"></path><path d="m120.96 172.147c0-48.684 39.606-88.29 88.29-88.29h137.709c27.256 0 49.43-22.175 49.43-49.431v-34.426h-30v34.427c0 10.714-8.716 19.431-19.43 19.431h-137.709c-65.226 0-118.29 53.064-118.29 118.29v29.995h30z"></path>
</g></svg></span><span class="u-custom-color-1 u-icon u-icon-circle u-spacing-8 u-icon-8" data-animation-name="pulse" data-animation-duration="1000" data-animation-delay="0" data-animation-direction=""><svg data-toggle="tooltip" data-placement="top" title="Profiles" id='profiles' class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 512 512" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-e24f"></use></svg><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xml:space="preserve" class="u-svg-content" viewBox="0 0 512 512" x="0px" y="0px" id="svg-e24f" style="enable-background:new 0 0 512 512;"><g><g><path d="M256,0c-74.439,0-135,60.561-135,135s60.561,135,135,135s135-60.561,135-135S330.439,0,256,0z"></path>
</g>
</g><g><g><path d="M423.966,358.195C387.006,320.667,338.009,300,286,300h-60c-52.008,0-101.006,20.667-137.966,58.195    C51.255,395.539,31,444.833,31,497c0,8.284,6.716,15,15,15h420c8.284,0,15-6.716,15-15    C481,444.833,460.745,395.539,423.966,358.195z"></path>
</g>
</g></svg></span><span class="u-black u-icon u-icon-circle u-spacing-8 u-icon-9" data-animation-name="pulse" data-animation-duration="1000" data-animation-delay="0" data-animation-direction=""><svg data-toggle="tooltip" data-placement="top" title="settings" id='settings' class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 959.999 959.999" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-3c91"></use></svg><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xml:space="preserve" class="u-svg-content" viewBox="0 0 959.999 959.999" x="0px" y="0px" id="svg-3c91" style="enable-background:new 0 0 959.999 959.999;"><g><g><path d="M628.833,459.92l67.596-67.596c48.836,19.389,103.95,18.183,152.007-3.614c11.799-5.353,14.622-20.844,5.46-30.006    L733.52,238.329c-14.625-14.625-14.625-38.338,0-52.963L853.771,65.114c9.221-9.222,6.385-24.827-5.497-30.203    C776.762,2.554,689.668,15.763,630.885,74.545c-55.213,55.212-70.079,135.975-44.618,204.958l-68.926,68.926L628.833,459.92z"></path><path d="M499.665,366.106l-93.414-93.414L294.76,384.184l93.414,93.414l111.49,111.491l341.527,341.527    c4.877,4.877,11.271,7.316,17.662,7.316c6.393,0,12.785-2.439,17.662-7.316l76.166-76.166c9.755-9.756,9.755-25.57,0-35.324    L611.155,477.598L499.665,366.106z"></path><path d="M904.345,127.995l-99.869,99.869c-7.984,7.984-7.984,20.93,0,28.914l76.972,76.972c8.594,8.593,22.826,7.907,30.371-1.619    c45.178-57.037,53.729-133.579,25.659-198.004C931.75,120.981,914.483,117.855,904.345,127.995z"></path><path d="M139.613,601.295L259.988,721.67c14.625,14.625,14.625,38.338,0,52.963L139.737,894.885    c-9.221,9.221-6.385,24.828,5.497,30.203c71.512,32.355,158.606,19.148,217.39-39.635    c55.014-55.014,69.968-135.395,44.888-204.213l74.476-74.475l-111.489-111.49l-72.694,72.693    c-49.015-19.688-104.434-18.584-152.729,3.322C133.274,576.641,130.452,592.135,139.613,601.295z"></path><path d="M81.69,629.866c-45.177,57.037-53.728,133.58-25.659,198.004c5.727,13.146,22.994,16.271,33.133,6.133l99.869-99.869    c7.984-7.984,7.984-20.93,0-28.914l-76.972-76.971C103.468,619.655,89.235,620.34,81.69,629.866z"></path><path d="M138.849,461.443c11.956,11.956,31.339,11.956,43.295,0l5.772-5.772c11.956-11.955,11.956-31.339,0-43.294l-11.545-11.545    l22.731-22.73L92.309,271.308l-22.73,22.73l-11.545-11.545c-11.956-11.955-31.339-11.955-43.295,0l-5.772,5.773    c-11.956,11.956-11.956,31.339,0,43.294L138.849,461.443z"></path><path d="M304.036,65.967l105.457,105.457c121.583-81.009,189.546-13.059,96.078-106.526    C440.93,0.256,359.305,30.842,304.036,65.967z"></path><path d="M271.62,68.906c-5.978-5.978-13.812-8.967-21.647-8.967s-15.67,2.989-21.647,8.967L98.441,198.79    c-11.956,11.955-11.956,31.339,0,43.295l11.545,11.545l106.793,106.793l11.545,11.545c5.978,5.978,13.812,8.967,21.647,8.967    c1.894,0,3.788-0.179,5.655-0.528c4.374-0.817,8.603-2.592,12.352-5.324c1.272-0.929,2.491-1.965,3.64-3.113l5.462-5.462    l111.49-111.491l8.838-8.838l4.094-4.093c1.631-1.631,3.031-3.405,4.218-5.275c7.507-11.836,6.105-27.696-4.218-38.02    l-12.571-12.571L283.044,80.33L271.62,68.906z"></path>
</g>
</g></svg></span><span class="u-black u-icon u-icon-circle u-spacing-8 u-icon-10" data-animation-name="pulse" data-animation-duration="1000" data-animation-delay="0" data-animation-direction=""><svg data-toggle="tooltip" data-placement="top" title="Job Page" id ='jobpage' class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 -32 512 512" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-9fb5"></use></svg><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xml:space="preserve" class="u-svg-content" viewBox="0 -32 512 512" id="svg-9fb5"><path d="m271 15c0-8.285156-6.714844-15-15-15s-15 6.714844-15 15v64.265625c0 8.285156 6.714844 15 15 15s15-6.714844 15-15zm0 0"></path><path d="m181.128906 105.941406c2.925782 2.925782 6.765625 4.394532 10.605469 4.394532 3.835937 0 7.675781-1.464844 10.605469-4.394532 5.855468-5.859375 5.855468-15.355468 0-21.214844l-32.136719-32.132812c-5.855469-5.859375-15.351563-5.859375-21.210937 0-5.859376 5.859375-5.859376 15.355469 0 21.214844zm0 0"></path><path d="m320.265625 110.332031c3.839844 0 7.679687-1.464843 10.605469-4.394531l32.136718-32.132812c5.855469-5.855469 5.855469-15.355469 0-21.210938-5.859374-5.859375-15.355468-5.859375-21.214843 0l-32.132813 32.132812c-5.859375 5.859376-5.859375 15.355469 0 21.210938 2.929688 2.929688 6.769532 4.394531 10.605469 4.394531zm0 0"></path><path d="m212.605469 144.914062c-.15625.128907-.304688.253907-.445313.371094l-64.851562 55.59375c-6.007813 5.148438-13.6875 7.988282-21.609375 7.988282h-46.449219c-43.769531 0-79.25 35.417968-79.25 79.25v144.621093c0 8.28125 6.714844 15 15 15h128.53125c8.289062 0 15-6.722656 15-15v-137.703125l76.328125-65.425781c3.898437-3.339844 6.140625-8.21875 6.140625-13.351563v-57.589843c0-14.648438-17.015625-22.980469-28.394531-13.753907zm0 0"></path><path d="m432.75 208.867188h-46.449219c-7.921875 0-15.601562-2.839844-21.609375-7.992188l-64.851562-55.589844c-.140625-.117187-.289063-.242187-.445313-.371094-11.378906-9.226562-28.394531-.894531-28.394531 13.753907v57.589843c0 5.132813 2.242188 10.011719 6.140625 13.351563l76.328125 65.425781v137.699219c0 8.28125 6.710938 15 15 15h128.53125c8.285156 0 15-6.714844 15-15v-144.617187c0-43.832032-35.480469-79.25-79.25-79.25zm0 0"></path><path d="m142.464844 145.664062c0-34.847656-28.351563-63.199218-63.199219-63.199218s-63.199219 28.351562-63.199219 63.199218c0 34.851563 28.351563 63.203126 63.199219 63.203126s63.199219-28.351563 63.199219-63.203126zm0 0"></path><path d="m495.933594 145.664062c0-34.847656-28.351563-63.199218-63.199219-63.199218s-63.199219 28.351562-63.199219 63.199218c0 34.851563 28.351563 63.203126 63.199219 63.203126s63.199219-28.351563 63.199219-63.203126zm0 0"></path></svg></span><span class="u-black u-icon u-icon-circle u-spacing-8 u-icon-11" data-animation-name="pulse" data-animation-duration="1000" data-animation-delay="0" data-animation-direction=""><svg data-toggle="tooltip" data-placement="top" title="settings" id='setting' class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 512 512" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-54c5"></use></svg><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xml:space="preserve" class="u-svg-content" viewBox="0 0 512 512" x="0px" y="0px" id="svg-54c5" style="enable-background:new 0 0 512 512;"><g><g><path d="M500.6,212.6l-59.9-14.7c-3.3-10.5-7.5-20.7-12.6-30.6l30.6-51c3.6-6,2.7-13.5-2.1-18.3L414,55.4    c-4.8-4.8-12.3-5.7-18.3-2.1l-51,30.6c-9.9-5.1-20.1-9.3-30.6-12.6l-14.4-59.9C297.9,4.8,291.9,0,285,0h-60    c-6.9,0-12.9,4.8-14.7,11.4l-14.4,59.9c-10.5,3.3-20.7,7.5-30.6,12.6l-51-30.6c-6-3.6-13.5-2.7-18.3,2.1L53.4,98    c-4.8,4.8-5.7,12.3-2.1,18.3l30.6,51c-5.1,9.9-9.3,20.1-12.6,30.6l-57.9,14.7C4.8,214.1,0,220.1,0,227v60    c0,6.9,4.8,12.9,11.4,14.4l57.9,14.7c3.3,10.5,7.5,20.7,12.6,30.6l-30.6,51c-3.6,6-2.7,13.5,2.1,18.3L96,458.6    c4.8,4.8,12.3,5.7,18.3,2.1l51-30.6c9.9,5.1,20.1,9.3,30.6,12.6l14.4,57.9c1.8,6.6,7.8,11.4,14.7,11.4h60    c6.9,0,12.9-4.8,14.7-11.4l14.4-57.9c10.5-3.3,20.7-7.5,30.6-12.6l51,30.6c6,3.6,13.5,2.7,18.3-2.1l42.6-42.6    c4.8-4.8,5.7-12.3,2.1-18.3l-30.6-51c5.1-9.9,9.3-20.1,12.6-30.6l59.9-14.7c6.6-1.5,11.4-7.5,11.4-14.4v-60    C512,220.1,507.2,214.1,500.6,212.6z M255,332c-41.4,0-75-33.6-75-75c0-41.4,33.6-75,75-75c41.4,0,75,33.6,75,75    C330,298.4,296.4,332,255,332z"></path>
</g>
</g></svg></span><span class="u-black u-icon u-icon-circle u-spacing-8 u-icon-12" data-animation-name="pulse" data-animation-duration="1000" data-animation-delay="0" data-animation-direction=""><svg data-toggle="tooltip" data-placement="top" title="Log Out" id='logouts' class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 512.00533 512" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-d09a"></use></svg><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xml:space="preserve" class="u-svg-content" viewBox="0 0 512.00533 512" id="svg-d09a"><path d="m320 277.335938c-11.796875 0-21.332031 9.558593-21.332031 21.332031v85.335937c0 11.753906-9.558594 21.332032-21.335938 21.332032h-64v-320c0-18.21875-11.605469-34.496094-29.054687-40.554688l-6.316406-2.113281h99.371093c11.777344 0 21.335938 9.578125 21.335938 21.335937v64c0 11.773438 9.535156 21.332032 21.332031 21.332032s21.332031-9.558594 21.332031-21.332032v-64c0-35.285156-28.714843-63.99999975-64-63.99999975h-229.332031c-.8125 0-1.492188.36328175-2.28125.46874975-1.027344-.085937-2.007812-.46874975-3.050781-.46874975-23.53125 0-42.667969 19.13281275-42.667969 42.66406275v384c0 18.21875 11.605469 34.496093 29.054688 40.554687l128.386718 42.796875c4.351563 1.34375 8.679688 1.984375 13.226563 1.984375 23.53125 0 42.664062-19.136718 42.664062-42.667968v-21.332032h64c35.285157 0 64-28.714844 64-64v-85.335937c0-11.773438-9.535156-21.332031-21.332031-21.332031zm0 0"></path><path d="m505.75 198.253906-85.335938-85.332031c-6.097656-6.101563-15.273437-7.9375-23.25-4.632813-7.957031 3.308594-13.164062 11.09375-13.164062 19.714844v64h-85.332031c-11.777344 0-21.335938 9.554688-21.335938 21.332032 0 11.777343 9.558594 21.332031 21.335938 21.332031h85.332031v64c0 8.621093 5.207031 16.40625 13.164062 19.714843 7.976563 3.304688 17.152344 1.46875 23.25-4.628906l85.335938-85.335937c8.339844-8.339844 8.339844-21.824219 0-30.164063zm0 0"></path></svg></span>
          </div>
        </div>
      </div>
    </section>
    <section class="u-clearfix u-section-2" id="sec-6668">
      <div class="u-clearfix u-sheet u-valign-middle-sm u-valign-middle-xs u-sheet-1">
        <div class="u-border-2 u-border-custom-color-1 u-container-style u-custom-color-1 u-expanded-width-lg u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-group u-radius-10 u-shape-round u-group-1">
          <div class="u-container-layout u-valign-bottom-lg u-valign-top-md u-valign-top-sm u-valign-top-xs u-container-layout-1">
            <h1 class="u-align-left u-custom-font u-text u-title u-text-1">MY NET-WORK</h1>
            <h1 class="u-align-left u-custom-font u-text u-title u-text-2">My Members</h1>
            <h1 class="u-align-left u-custom-font u-text u-title u-text-3">300</h1>
            <p class="u-align-right u-custom-font u-text u-text-4">
              <a class="u-active-none u-border-none u-btn u-button-link u-button-style u-custom-font u-hover-none u-none u-text-body-alt-color u-btn-1" href="https://nicepage.com">SEE ALL MEMBERS</a>
            </p>
          </div>
        </div>
        <div class="u-expanded-width-lg u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-list u-repeater u-list-1">
          <div class="u-align-center u-container-style u-list-item u-repeater-item">
            <div class="u-container-layout u-similar-container u-container-layout-2">
              <div alt="" class="u-image u-image-circle u-image-1" data-image-width="888" data-image-height="1080"></div>
              <p class="u-custom-font u-text u-text-default u-text-white u-text-5">USER</p>
            </div>
          </div>
          <div class="u-align-center u-container-style u-list-item u-repeater-item">
            <div class="u-container-layout u-similar-container u-container-layout-3">
              <div alt="" class="u-image u-image-circle u-image-2" data-image-width="888" data-image-height="1080"></div>
              <p class="u-custom-font u-text u-text-default u-text-white u-text-6">USER</p>
            </div>
          </div>
          <div class="u-align-center u-container-style u-custom-background u-list-item u-repeater-item">
            <div class="u-container-layout u-similar-container u-container-layout-4">
              <div alt="" class="u-image u-image-circle u-image-3" data-image-width="888" data-image-height="1080"></div>
              <p class="u-custom-font u-text u-text-default u-text-white u-text-7">USER</p>
            </div>
          </div>
          <div class="u-align-center u-container-style u-list-item u-repeater-item">
            <div class="u-container-layout u-similar-container u-container-layout-5">
              <div alt="" class="u-image u-image-circle u-image-4" data-image-width="888" data-image-height="1080"></div>
              <p class="u-custom-font u-text u-text-default u-text-white u-text-8">USER</p>
            </div>
          </div>
          <div class="u-align-center u-container-style u-list-item u-repeater-item">
            <div class="u-container-layout u-similar-container u-container-layout-6">
              <div alt="" class="u-image u-image-circle u-image-5" data-image-width="888" data-image-height="1080"></div>
              <p class="u-custom-font u-text u-text-default u-text-white u-text-9">USER</p>
            </div>
          </div>
          <div class="u-align-center u-container-style u-list-item u-repeater-item">
            <div class="u-container-layout u-similar-container u-container-layout-7">
              <div alt="" class="u-image u-image-circle u-image-6" data-image-width="888" data-image-height="1080"></div>
              <p class="u-custom-font u-text u-text-default u-text-white u-text-10">USER</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="u-clearfix u-section-3" id="sec-b584">
      <div class="u-clearfix u-sheet u-sheet-1">
        <div class="u-border-2 u-border-custom-color-1 u-container-style u-custom-color-1 u-expanded-width-lg u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-group u-radius-10 u-shape-round u-group-1">
          <div class="u-container-layout u-valign-bottom-xl u-container-layout-1">
            <h1 class="u-align-left u-custom-font u-text u-title u-text-1">MY PHOTOS</h1>
            <p class="u-align-right u-custom-font u-text u-text-2">SEE ALL PHOTOS</p>
          </div>
        </div>
        <div class="u-expanded-width-md u-expanded-width-sm u-list u-repeater u-list-1">
          <div class="u-container-style u-image u-list-item u-repeater-item u-image-1" data-image-width="1280" data-image-height="850">
            <div class="u-container-layout u-similar-container u-container-layout-2"></div>
          </div>
          <div class="u-container-style u-image u-list-item u-repeater-item u-image-2" data-image-width="1280" data-image-height="850">
            <div class="u-container-layout u-similar-container u-container-layout-3"></div>
          </div>
          <div class="u-container-style u-image u-list-item u-repeater-item u-image-3" data-image-width="1280" data-image-height="850">
            <div class="u-container-layout u-similar-container u-container-layout-4"></div>
          </div>
          <div class="u-container-style u-image u-list-item u-repeater-item u-image-4" data-image-width="1280" data-image-height="850">
            <div class="u-container-layout u-similar-container u-container-layout-5"></div>
          </div>
          <div class="u-container-style u-image u-list-item u-repeater-item u-image-5" data-image-width="1280" data-image-height="850">
            <div class="u-container-layout u-similar-container u-container-layout-6"></div>
          </div>
          <div class="u-container-style u-image u-list-item u-repeater-item u-image-6" data-image-width="1280" data-image-height="850">
            <div class="u-container-layout u-similar-container u-container-layout-7"></div>
          </div>
        </div>
      </div>
    </section>
    <section class="u-align-left u-clearfix u-section-4" id="sec-e900">
      <div class="u-clearfix u-sheet u-sheet-1">
        <h1 class="u-align-left u-custom-font u-text u-text-default u-title u-text-1">MY POSTS</h1>
        <div class="u-expanded-width-sm u-expanded-width-xs u-list u-repeater u-list-1">
 <?php

     $sql = "SELECT *
     FROM happenings H,users U
     WHERE H.user_id = U.user_id
     AND  H.user_id = ". $id1."
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

            echo ' <img src="'.$path['gravatar'].'" alt="" class="u-image u-image-round u-preserve-proportions u-radius-10 u-image-1" data-image-width="181" data-image-height="200">';

            echo ' <p class="u-custom-font u-text u-text-default u-text-10">'.$row['Firstname'].' '.$row['Lastname'].' posted - <span>'.humanTiming($time).' ago</span></h1>';
            echo '<p class="u-custom-font u-large-text u-text u-text-custom-color-1 u-text-default u-text-variant u-text-3">'.$row['comments'].'</p>';
            echo '<img src="images/54e2dd434b52b108f5d084609629317e113fdce15b4c704f75287cd2924ac75e_1280.jpg" alt="" class="u-image u-image-round u-radius-10 u-image-6" data-image-width="1280" data-image-height="850">
 <p class="u-custom-font u-small-text u-text u-text-custom-color-3 u-text-variant u-text-4">'.$raters_count.'</p>
            <span class="u-icon u-icon-circle u-text-custom-color-3 u-icon-5"><svg class="u-svg-link" preserveAspectRatio="xMidYMin slice" viewBox="0 0 51.997 51.997" style=""><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-3c96"></use></svg><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xml:space="preserve" class="u-svg-content" viewBox="0 0 51.997 51.997" x="0px" y="0px" id="svg-3c96" style="enable-background:new 0 0 51.997 51.997;"><path d="M51.911,16.242C51.152,7.888,45.239,1.827,37.839,1.827c-4.93,0-9.444,2.653-11.984,6.905
    c-2.517-4.307-6.846-6.906-11.697-6.906c-7.399,0-13.313,6.061-14.071,14.415c-0.06,0.369-0.306,2.311,0.442,5.478
    c1.078,4.568,3.568,8.723,7.199,12.013l18.115,16.439l18.426-16.438c3.631-3.291,6.121-7.445,7.199-12.014
    C52.216,18.553,51.97,16.611,51.911,16.242z"></path></svg></span>';  
            echo '<a href="#" class="u-btn u-btn-round u-button-style u-custom-color-1 u-custom-font u-hover-black u-radius-5 u-btn-1">SHARE</a>';
            echo "<button type='button' class='u-btn u-btn-round u-button-style u-custom-color-3 u-custom-font u-hover-black u-radius-5 u-btn-2' name='add_like_".$row['hapen_id']."' >TOPO!</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";



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


            echo '<form action="replyProfileworker.php" method="post">';

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
      </div>
    </section>
    
    
    
    
    <footer class="u-align-left u-clearfix u-footer u-white" id="sec-bb66" data-animation-name="" data-animation-duration="0" data-animation-delay="0" data-animation-direction=""><div class="u-clearfix u-sheet u-sheet-1">
        <p class="u-custom-font u-text u-text-default u-text-1">© 2020 by pazblé</p>
        <p class="u-custom-font u-text u-text-default u-text-2">INTELIT<span class="u-text-custom-color-3">É</span>GEN
        </p>
        <p class="u-custom-font u-text u-text-custom-color-3 u-text-default u-text-3">Made in Mauritius.</p>
        <img src="images/mflag.png" alt="" class="u-image u-image-default u-image-1" data-image-width="400" data-image-height="267">
      </div></footer>
  </body>
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
            window.location.href = "Profile-(Worker).php";
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
        window.location.href = "Profile-(Worker).php";
    });
    </script>
   <script type="text/javascript" src="js/changeToWorker.js"></script>
</html>