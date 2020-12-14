<?php

session_start();

if(!isset($_SESSION['user_id']))
    {
      header('Location:index.php?logplease');
      die();
    }

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
<html>
<head>
	<meta charset="utf-8">
	<title>client</title>
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


<!-- CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

  <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
  <script src="bootstrap/jquery.min.js"></script>
  <script src="bootstrap/popper.min.js"></script>
  <script src="bootstrap/bootstrap.min.js"></script>

  <link rel="stylesheet" type="text/css" href="css/switch.css">

   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;600;700&display=swap" rel="stylesheet">

     <link href="css/pazble1.css" rel="stylesheet">

<!-- for geolocation API -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>

<link rel="stylesheet" type="text/css" href="css/sidemenu.css">

<!-- jQuery Modal -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />


<link rel="stylesheet" type="text/css" href="css/whatupClient.css">




<style type="text/css">
       .toolkit1{
        padding-top: 5px;
        color: #13668f;
        font-family: 'Poppins', sans-serif;
        font-size: 24px;
        font-family: 600;
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


</style>

</head>

<body class="container-fluid" onload="val()">

  <div class="wrapper"><br>

  <div class="row">


<!--Image on right-->
    <div class='row pazblehead' style='height:80px;'>
      <div class='col pazlogo'>pazbl&eacute;
 &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
 &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
          <?php
          echo "<img src='".$path['gravatar']."' style='width:60px;height:60px;border-radius:80%;'>&nbsp;";
          ?></a>
        <a style="text-decoration: none;" href="#"><?php echo '<span class="title"style="color:black;">'.$firstName.' '.$lastName.'</span>'; ?><br>
      </div>
    </div>
<!--
    <div class='row pazblehead'>
      <div class='col-md-3 pazlogo'>pazbl&eacute;</div>
      <div class='col-md-3'></div>
      <div class="col-md-6"></div>
    </div>
-->
<!--Image on right-->


  </div>

</div>

 <!--  <nav class="navbar navbar-expand-md navbar-dark" style="background-color:rgb(19,102,143)">

  <a class="navbar-brand disabled" href="">

  </a>


  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>


  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="client.php">Post job</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="bossAcceptWorker.php">View bids</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="workerDetails.php">Workers Detail</a>
      </li>
        <li class="nav-item">
        <a class="nav-link" href="settingClient.php">Setting</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav><br/>
 -->
   <br>
 <div class="row">
   <div class="col-md-9 text-right"><span id="switch-Worker">Switch to worker mode</span>
      <span>
        <label class="switch">
            <input id="submiting"  type="checkbox" value="worker" checked>
            <span class="slider round"></span>
        </label>
      </span>
    </div>
 </div><br><br>


 

 <?php
        
        $urTest = $_SERVER['REQUEST_URI'];

        if(strpos($urTest, 'newsfeed') !== false)
     {
        echo "
        <div class='row rowstylehappening'>
          <div class='col barhappening'>
            <div class='wrapper'>
              What's happening?
            </div>
          </div>
        </div><br><br>";
     } 
     else 
     {
        echo '';
      }
   ?>

   

<div class="row">


  <!--  <a  style="text-decoration: none;">
    <?php
    echo "<img src='".$path['gravatar']."' style='width:60px;height:60px;border-radius:80%;'>&nbsp;";
    ?></a><br><br>

  <a style="text-decoration: none;"><?php echo '<span class="title">'.$firstName.' '.$lastName.'</span>'; ?> </a><br><br>
  <a style="text-decoration: none;color:rgb(19,102,143);" href="client.php">Post job</a><br/><br>
  <a style="text-decoration: none;color:rgb(19,102,143);" href="newsfeedclient.php">Newsfeed</a><br/><br>
  <a style="text-decoration: none;color:rgb(19,102,143);" href="bossAcceptWorker.php">View bids</a><br/><br>
  <a style="text-decoration: none;color:rgb(19,102,143);" href="workerDetails.php">Worker Details</a><br/><br>
  <a style="text-decoration: none;color:rgb(19,102,143);" href="settingClient.php">Setting</a><br/><br>
  <a style="text-decoration: none;color:rgb(19,102,143);" href="logout.php">Logout</a> -->

   <div class="col-md-1"></div>

  <div class="col-md-1">

    <!-- Whatsup, Profile, Job Page, Settings, Log Out -->

<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
  <a href="newsfeedclient.php">Whatsup</a> <!-- changed newsfeed to whatsup 09/11/2020 -->
  <a href="bossprofile.php">Profile</a>
  <a href="job.php">Job Page</a>
  <!-- <a href="bossAcceptWorker.php">View bids</a> -->
  <!-- <a href="workerDetails.php">Worker Details</a> -->
  <a href="settingClient.php">Setting</a>
  
  <a href="logout.php">Logout</a>
</div>



<!-- Use any element to open the sidenav -->
<span class="hideme" onclick="openNav()">&#9776; </span>

   <span class="showme">

   <a  style="text-decoration: none;">



    <?php
    /*echo "<img src='".$path['gravatar']."' style='width:60px;height:60px;border-radius:80%;'>&nbsp;";
  </a><br>
  <a style="text-decoration: none;">
    <?php echo '<span class="namefon">'.$firstName.' '.$lastName.'</span>'; */
    ?>
<!--  </a><br><br>  -->


<?php

$uri = $_SERVER['REQUEST_URI'];

     if(strpos($uri, 'newsfeed') !== false)
     {
        echo '<a style="text-decoration: none;color:#13668f;"href="newsfeedclient.php">Whatsup</a><br/><br>';
     } 
     else 
     {
        echo '<a style="text-decoration: none;color:#000;" href="newsfeedclient.php">Whatsup</a><br/><br>';
     }

      if(strpos($uri, 'bossprofile') !== false)
     {
        echo '<a style="text-decoration: none;color:#13668f;" href="bossprofile.php">Profile</a><br/><br>';
     } 
     else 
     {
        echo '<a style="text-decoration: none;color:#000;" href="bossprofile.php">Profile</a><br/><br>';
     }

     


     if(strpos($uri, 'job') !== false)
     {
         echo ' <a style="text-decoration: none;color:#13668f;" href="job.php">Job Page</a><br><br>';
     }
     else
     {
        echo ' <a style="text-decoration: none;color:#000;" href="job.php">Job Page</a><br><br>';
     }


      if(strpos($uri, 'bossAcceptWorker') !== false)
     {
          echo' <a style="text-decoration: none;color:#13668f;" href="bossAcceptWorker.php">View bids</a><br/><br>';
     }
     else
     {
        echo ' <a style="text-decoration: none;color:#000;" href="bossAcceptWorker.php">View bids</a><br/><br>';
     }



      if(strpos($uri, 'workerDetails') !== false)
     {
        echo ' <a style="text-decoration: none;color:#13668f;" href="workerDetails.php">Worker Details</a><br/><br>';
     }
     else
     {
          echo ' <a style="text-decoration: none;color:#000;" href="workerDetails.php">Worker Details</a><br/><br>';
     }



      if(strpos($uri, 'settingClient') !== false)
     {
        echo '<a style="text-decoration: none;color:#13668f;" href="settingClient.php">Setting</a><br/><br>';
     }
     else
     {
        echo '<a style="text-decoration: none;color:#000;" href="settingClient.php">Setting</a><br/><br>';
     }


     


?>

 
  <a style="text-decoration: none;color:#000;" href="logout.php">Logout</a>

</span><br><br>

  </div>
