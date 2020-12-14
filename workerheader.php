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



?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>pazbleWorker</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="css/pazble1.css" rel="stylesheet">
  <!-- CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

  <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
  <script src="bootstrap/jquery.min.js"></script>
  <script src="bootstrap/popper.min.js"></script>
  <script src="bootstrap/bootstrap.min.js"></script>

  <link rel="stylesheet" type="text/css" href="css/switch.css">


  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;600;700&display=swap" rel="stylesheet">

  <!-- for geolocation API -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>


  <!-- jQuery Modal -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />

  <link rel="stylesheet" type="text/css" href="css/worker.css">
  <link rel="stylesheet" type="text/css" href="css/sidemenu.css">
  <link rel="stylesheet" type="text/css" href="css/whatupClient.css">

  <style type="text/css">

    .top{
      padding-top: 2%;
    }

    .uploadbutton{
      margin-left: 2%;
      margin-bottom: 2%;
      background-color: #c03a3a;
      color: white;
      border-radius: 50%;
    }


    .getverified{
      font-size: 12px;
      padding-top: 1%;
    }

    hr.new5 {
      border: 1px solid white;
      border-radius: 5px;
    }

    .verifiedstatus{
      width: 150px;
    }

    .toolkit1{
      padding-top: 5px;
    }

    .statusver{
      font-weight:  bold;
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
    }

    .button2:hover{
      color:white !important;
      background-color: black !important;
    }

    .btnupload{
      width: 200px;
      margin-bottom: 5%;
      color: white;
      border-radius: 7px
    }

    .btnupload:hover{
      color:white !important;
      background-color: #1e90c8 !important;
    }

    .button5{
       width: 180px;
       font-size: 12px;
       background-color: #17a2b8;
       color: black !important;
       font-weight: 800;
       height: 38px;
       border-radius: 15px;
       box-shadow:1px 1px 1px black;
    }

    .rating{
      color: white;
    }

    .button3{
      margin-bottom: 10%;
    }

    #whatupPic2{
      width: 150px;
      border-radius: 5px;
    }

    .location{
      width: 400%;
      padding: 2px 2px 2px;
      border-radius: 5px;
      border: 1px solid gray;
    }

    .nameboss_worker
    {
      font-family: 'Poppins', sans-serif;
      font-weight: 600;
    }


    .phoworker{

      font-family: 'Poppins', sans-serif;
      font-weight: 600;
      font-size: 25px;

    }



    .seconddiv{
      padding-left: 7%;
      font-weight: 700;
    }

    .fofoboss{
      width: 150px;
      height: 150px;
      padding: 20px;
    }


    .boss1{
      border: 1px solid grey;
      margin-top: 15px;
      margin-bottom: 15px;
      border-radius: 5%;
      height: 260px;
    }

    #outputSearch,#outputList{
      color: #000;
    }

    #outputSearch{
      background-color: lightblue;
    }

    #work-search{
      overflow-y: scroll;
    }

    #switch-Worker{
     font-family: 'Poppins', sans-serif;
     font-weight: 600;
     font-size: 18px; 
     color: #C03A3A;
     margin-top: 2px;

   }

       #switch-Worker2{
     font-family: 'Poppins', sans-serif;
     font-weight: 900;
     font-size: 16px; 
     color: red;
     opacity: 0.6;
     margin-top: 2px;
     opacity: 0.7;
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
    background-color: #c03a3a;
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

  .bg-worker-div{
     background-color: rgb(19,102,143);
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


#Standup{

   font-family: 'Poppins', sans-serif;
   font-weight: 600;
   font-size: 19px;
}

#speakupBox{
  border-radius: 6px;
}

#scoreBoard{
  border-radius: 6px;
  background-color:  rgb(19,102,143);
  height: 300px;
}

.scoretext{
  font-family: 'Poppins', sans-serif;
  font-weight: 600;
  font-size: 19px;
  padding-top: 10px;
}

</style>
</head>

<body class="container-fluid" onload="jobList()" >


 <div class="row">
   <div class="col"></div>
 </div><br>


  <!--Image on right-->
  <div class='row pazblehead' style='height:80px;background-color: white;'>
    <div class="col-md-3 pazlogo text-right">pazbl&eacute;</div>
    <div class='col-md-9 text-center'>
      <?php
      echo "<img src='".$path['gravatar']."' style='width:60px;height:60px;border-radius:80%;'>&nbsp;";
      ?></a>
      <a style="text-decoration: none;" href="#"><?php echo '<span class="title" style="color:#000">'.$firstName.' '.$lastName.'</span>'; ?></a>
    </div>
  </div><br>

<!--
    <div class='row pazblehead'>
      <div class='col-md-3 pazlogo'>pazbl&eacute;</div>
      <div class='col-md-3'></div>
      <div class="col-md-6"></div>
    </div>
  -->
  <!--Image on right-->

  <div class="row" style="background-color: white;">
    <div class="col-md-4"></div>
    <div class="col-md-2"></div>
    <div class="col-md-6 text-left">
      <span id="switch-Worker">&nbsp;&nbsp;&nbsp;&nbsp;Switch to Boss mode</span>
      <span>
        <label class="switch">
          <input id="submiting"  type="checkbox" value="client" checked>
          <span class="slider round"></span>
        </label>
      </span></div>
    </div><br>



     <?php
        
        $urTest = $_SERVER['REQUEST_URI'];

        if(strpos($urTest, 'newsfeedworker') !== false)
     {
        echo "
        <div class='row rowstylehappening'>
          <div class='col barhappening'>
            <div class='wrapper'>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;What's happening?
            </div>
          </div>
        </div>";
     } 
     else 
     {
        echo '';
      }
   ?>




    <!--  <nav class="navbar navbar-expand-md navbar-dark" style="background-color:rgb(19,102,143);"> -->
      <!-- Brand -->
   <!-- <a class="navbar-brand disabled" href="">
    <?php
    echo "<img src='".$path['gravatar']."' style='width:40px;height:40px;border-radius:50%;'>&nbsp;";
    echo $firstName.' '.$lastName;
    ?>
  </a>  -->

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
 <!--  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="worker.php">Jobs</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="viewbid.php">View my bids</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="jobgot.php">Jobs Got</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">#</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="settingworker.php">Setting</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav><br/> -->




<div class="row">

  <div class="col-md-1"></div>

  <div class="col-md-1">

    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <!-- <a href="happeningworker.php">Happening< -->/a>
      <a href="newsfeedworker.php">NewsFeed</a>
       <a href="workerprofile.php">Profile</a>
      <a href="worker.php">Job Page</a>
      <!-- <a href="viewbid.php">View my bids</a> -->
      <!-- <a href="jobgot.php">Jobs Got</a> -->
      <a href="settingworker.php">Setting</a>
     
      <a href="logout.php">Logout</a>
    </div>



    <!-- Use any element to open the sidenav -->
    <span class="hideme" onclick="openNav()">&#9776; </span>

    <span class="showme">


      <?php

      $uri = $_SERVER['REQUEST_URI'];

     // if(strpos($uri, 'happeningworker') !== false)
     // {
     //    echo '<a style="text-decoration:none;color:#13668f;"href="happeningworker.php">Happening</a><br><br>';
     // } 
     // else 
     // {
     //    echo '<a style="text-decoration: none;color:#000;" href="happeningworker.php">Happening</a><br><br>';
     // }


     if(strpos($uri, 'newsfeedworker') !== false)
     {
         echo '<a style="text-decoration: none;color:#13668f;" href="newsfeedworker.php">Newsfeed</a><br><br>';
     }
     else
     {
        echo '<a style="text-decoration: none;color:#000;" href="newsfeedworker.php">Newsfeed</a><br><br>';
     }

      if(strpos($uri, 'workerprofile') !== false)
     {
        echo '<a style="text-decoration: none;color:#13668f;" href="workerprofile.php">Profile</a><br/><br>';
     } 
     else 
     {
        echo '<a style="text-decoration: none;color:#000;" href="workerprofile.php">Profile</a><br/><br>';
     }


      if(strpos($uri, 'paging') !== false)
     {
          echo '<a style="text-decoration: none;color:#13668f;" href="jobpaging.php">Job page</a><br/><br>';
     }
     else
     {
        echo '<a style="text-decoration: none;color:#000;" href="jobpaging.php">Job Page</a><br/><br>';
     }


      if(strpos($uri, 'followsystem') !== false)
     {
          echo '<a style="text-decoration: none;color:#13668f;" href="followsystem.php">Followers</a><br/><br>';
     }
     else
     {
        echo '<a style="text-decoration: none;color:#000;" href="followsystem.php">Followers</a><br/><br>';
     }




     //  if(strpos($uri, 'viewbid') !== false)
     // {
     //    echo '<a style="text-decoration: none;color:#13668f;" href="viewbid.php">View my bids</a><br/><br>';
     // }
     // else
     // {
     //      echo '<a style="text-decoration: none;color:#000;" href="viewbid.php">View my bids</a><br/><br>';
     // }



     //  if(strpos($uri, 'jobgot') !== false)
     // {
     //    echo '<a style="text-decoration: none;color:#13668f;" href="jobgot.php">Jobs Got</a><br/><br>';
     // }
     // else
     // {
     //    echo '<a style="text-decoration: none;color:#000;" href="jobgot.php">Jobs Got</a><br/><br>';
     // }


      if(strpos($uri, 'settingworker') !== false)
     {
        echo '<a style="text-decoration: none;color:#13668f;" href="settingworker.php">Setting</a><br/><br>';
     } 
     else 
     {
        echo '<a style="text-decoration: none;color:#000;" href="settingworker.php">Setting</a><br/><br>';
     }

     


?>

      
      
      <a style="text-decoration: none;color:#000;" href="logout.php">Logout</a>

    </span><br><br>

  </div>





  <!-- Add all page content inside this div if you want the side nav to push page content to the right (not used if you only want the sidenav to sit on top of the page -->
<!-- <div id="main">

</div>  -->

