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
    <title>Profile (Worker) List</title>
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
      @media (max-width: 575px){
    .u-section-1 .u-group-1 {
        width: auto;
        min-height: auto;
        margin-top: 33px;
    }
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
.u-section-1 .u-group-2 {
    width: 80px;
    box-shadow: 0px 0px 4px 1px rgba(0,0,0,0.4);
    text-shadow: 0px 0px 4px rgba(0,0,0,0);
    min-height: 418px;
    /* height: auto; */
    margin: -488px 0 0 auto;
}
@media (max-width: 575px){
.u-section-1 .u-group-2 {
    min-height: 430px;
    margin-top: 16px;
    margin-left: -5px;
    margin-right: -5px;
}
}
@media (max-width: 575px){
.u-section-1 .u-sheet-1 {
    min-height: auto;
  }
}
input[type="text"] {
    width: 100%;
    border-radius: 12px;
        text-align: center;
    color: black;
    font-size: 20px;
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
              if(isset($_POST['search']))
                {
                    $search_info = $_POST['search_info'];
                    $sql = "SELECT * FROM users WHERE CONCAT(Firstname,Lastname) LIKE '%".$search_info."%' AND  usertype = 'worker'";
                    $result =$conn->query($sql);
                    
                }
                 else {
                    $sql = "SELECT * FROM users WHERE usertype = 'worker'";
                    $result = $conn->query($sql);
}


            ?>

            <form action="profileworkerviewlist.php" method="post" class="title_container text-center">
              <div class="input-group">
            <input type="text" name="search_info" placeholder="Search Workers"><br><br>
             </div>
            <br/>
            <input class="btn btn-primary"type="submit" name="search" value="Search"><br><br>
          </form>
          <table class="table table-dark">
          <thead>
            <tr>
                  <th>Firstname</th>
                  <th>Lastname</th>
                  <th>Action</th>
            </tr>
          </thead>
          <tbody>
             <?php while ($row = mysqli_fetch_array($result)) { ?>
            <tr>
             <td><?php echo $row['Firstname']; ?></td>
                  <td><?php echo $row['Lastname']; ?></td>
                  <td>
                    <a href="otherviewprofileworker.php?view=<?php echo $row['user_id']; ?>" class="edit_btn" >View</a>
                  </td>
            </tr>
          </tbody>
           <?php } ?>
        </table>



          </div>
        </div>
        <div class="u-container-style u-expanded-width-xs u-group u-radius-10 u-shape-round u-white u-group-2 te">
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

  
    
    <br/>
    
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