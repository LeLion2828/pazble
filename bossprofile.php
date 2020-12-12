<?php

include ('clientheader.php');

// $selectSQL = 'SELECT usertype FROM users WHERE user_id = ?';

// $stmtselect = mysqli_stmt_init($conn);

//     //prepare the prepared statment
//     if(!mysqli_stmt_prepare($stmtselect,$selectSQL))
//     {
//         echo "SQL statement error";
//     }
//     else
//     {
//         //bind the parameters to the placeholder
//         mysqli_stmt_bind_param($stmtselect, 'i' , $user);
//         //run parameters inside database
//         mysqli_stmt_execute($stmtselect);

//         $resultselect = mysqli_stmt_get_result($stmtselect);


//         if(mysqli_num_rows($resultselect) == 1 )
//         { 
             
//              $rowUserType = $resultselect->fetch_assoc();

//              if($rowUserType['usertype'] === 'client')
//              {
//                 echo 'yes';
//              }
//              elseif($rowUserType['usertype'] === 'worker')
//              {
//                  header('Location: workerprofile.php');
//              }
             
//         }

//     }

// if ($_SESSION['userType'] == 'client')
// {

//    echo '1';
//    $
// }
// elseif($_SESSION['userType'] == 'worker')
// {
//     echo '2';
// }

?>

<div class="col-md-7">

   <div class="row" style="border:2px solid grey; border-radius: 5px;">
    <div class="col-md-2 ">
      <?php
      echo "<img src='".$path['gravatar']."' id='whatupPic2' > ";
      ?> <br><br>
      <div class="location" >
        Location: Rose hill <br>
        
        # of Jobs posted: <?php echo $numrow; ?><br>

    </div><br>
    <button class="button3" style="background-color: #c03a3a"> Edit Profile</button><br>
</div>
<div class="col-md-6" >
    <h4 class='nameboss_worker'><?php echo $firstName.'  '.$lastName; ?></h4>
</div>

<div class=" col-md-4 text-center" style="border-radius: 10px;">
    <div class="boss1">
        <h4 class="toolkit1">Hiring Kit</h4>
        <a type='submit' href='#whatup' rel='modal:open' style="background-color:#13668f" class='btn button2'>SPEAK UP<a><br>
        <a type="submit" href="#post-job" rel="modal:open" class="btn button2" style="background-color: #dc3545">POST JOB</a> <br>
    </div>
</div>
</div><br>

<div class="row">
  <div class="col text-left phoboss">Photos</div>
</div>


<div class="row">
  <div class="col-md-2">
    <img class="fofoboss" src="img/worker1.jpg">
  </div>
  <div class="col-md-2">
    <img class="fofoboss" src="img/worker2.jpg">
  </div>
  <div class="col-md-2">
    <img class="fofoboss" src="img/worker3.jpg">
  </div>
  <div class="col-md-2">
    <img class="fofoboss" src="img/worker4.jpg">
  </div>
  <div class="col-md-2">
    <img class="fofoboss" src="img/worker1.jpg">
  </div>
  
  
</div><br>


<div class="row">
  <div class="col text-left phoboss">Job Post</div>
</div><br>

<div class="row" id='output'>

  <?php

         $sqlJoin = "SELECT U.user_id,U.Firstname,U.Lastname,J.title,J.Description,J.Address,
                J.Status,BJ.date_posted 
                From users U,jobs J,boss_post_job BJ 
                WHERE U.user_id = BJ.user_id
                AND J.job_id = BJ.job_id
                AND U.user_id = $user ";


                 $resultJoin = $conn->query($sqlJoin);


                 while($rowJoin = $resultJoin->fetch_assoc())
                 {
                        echo "<div class='col-md-4'>";

                        echo "<b>Title :</b> ".$rowJoin['title']." <br>";
                        // echo "<b>Boss Name :</b>: ".$rowJoin['Firstname']." ".$rowJoin['Lastname']."<br>";
                        echo "<b>Address :</b> ".$rowJoin['Address']." <br>";
                        echo "<b>Date :</b> ".$rowJoin['date_posted']." <br>";
                        echo "<b>Status :</b> ".$rowJoin['Status']." <br>";

                        echo "<br></div>";
                 }


     ?>

  

</div>


<div class="row">
  <div class="col text-left phoboss">Posts</div>
</div>


<div class="row">
    <div class="col">
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


      echo "<div id='theChat'>";

      echo '<small class="text-dark" id="replied">'.$row['Firstname'].' '.$row['Lastname'].' posted - <span>'.humanTiming($time).' ago</span></small><br><br>';
      echo "<img id='imgChat' src='".$row['gravatar']."' style='width:40px;height:40px;border-radius:50%;'><br>";
       
      echo "<div id='text-chat-box'>"; 
      echo "<span id='coments'>".$row['comments']."</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
      echo "<br><br>";
      echo "<button class='topo btn'>TOPO!</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
      echo "<button class='share btn'>Share</button><br><br>";
      echo "<i class='red material-icons'>favorite</i>&nbsp;&nbsp;&nbsp;<span class='number'>10,000&nbsp;&nbsp;</span><br><br>";
     
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


    echo "<div style='border:solid 2px #e7e7e8;width:90%;background-color:#e7e7e8;margin-left:20px;'>";
    echo "<img src='".$rowjoin['gravatar']."' style='width:40px;height:40px;border-radius:50%;'>&nbsp;";

    echo '<small class="name">&nbsp;&nbsp;'.$rowjoin['Firstname'].' '.$rowjoin['Lastname'].' replied <span>'.humanTiming($timeReply).' ago</span></small><br><br>';

     
        echo '<span style="width:90%;" class="messageStyle">'.$rowjoin['reply_message'].'</span>';
        echo "</div><br>";
      

                      }


      echo '<form action="replyBossprofile.php" method="post">'; 


      echo '<input type="hidden" value="" name="hapen_id" id="hapen_id">';

      echo "<input type='text' id='shareThought' name='reply' placeholder='Share your thoughts...'>&nbsp;&nbsp;&nbsp;<input type='submit'  id=".$row['hapen_id']."  class='replying btn' value='Reply'><br><br>" ;

      echo "</form>";

      



       


      echo "</div>";
      echo "</div><br><br><br>";



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

  <div id='whatup' class="modal">
    
     <form action="" method="post">

      <div id="logo">
        <span class='logo-nav'>Pazbl&eacute;</span>  
        <a class="btn logo-nav textClose" href="#" rel="modal:close">X</a>
    </div>

    <p>Speak up</p>
     
    <?php
      echo "<img src='".$path['gravatar']."' id='Profpic'>";
     ?> 

     <span>
       <textarea class="textStyle" name="messageText" placeholder="How's it going for you?" id="message"></textarea>
     </span><br>

     <button type="submit" id="postme" name='posting' class="btn">Speak up</button>

     </form>

      
  </div>


  <div id='post-job' class="modal">

    <h2>Post Job</h2>

   <form method="post" action="jobpost.php">


      <b>Title</b><br>
      <input  type="text" name="title"><br><br>
      <b>Description</b><br>
      <textarea  cols=20 rows=4 name='desc'></textarea><br><br>
      <!-- <input class="registerinput" type="text" name="description"><br><br> -->
      <b>Address</b><br>
      <input  type="text" name="address"><br><br>

      <button class="btn btn-success" type="submit" name="postjob">Submit</button>

    </form>

  </div>


<div class="col-md-3">

</div>

</div>

<?php include('footer.php'); ?>


<script type="text/javascript">



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

      for (x in myObj.data)
      {

        document.getElementById("output").innerHTML =
        result +=
        "<div class='col-md-4'>"+
        "<b class='job'>Title : </b><span class='job_one'> "+myObj.data[x].title+
        "</span><br/><b class='job'> Boss Name : </b><span class='job_one'>"+myObj.data[x].Firstname+" "+myObj.data[x].Lastname+
        " </span><br/><b class='job'> Description : </b><span class='job_one'> " + myObj.data[x].Description+
        "</span><br/><b class='job'> Address : </b><span class='job_one'>"+myObj.data[x].Address+
        "</span><br/><b class='job'> Job Posted : </b><span class='job_one'>"+myObj.data[x].date_posted+
        "</span><br/><b class='job'> Status : </b><span class='job_one'>"+myObj.data[x].Status+
        "<span></b><br/><br/></div>";

      }


    }
  };

  // open http connection request
  xmlhttp.open("GET",url, true);
  // send data via the above connection
  xmlhttp.send();

}



  $("#postme").on('click',function(){

  var msg = $("#message").val();


  $.ajax({
    url:'message.php',
    type:'post',
    data:{
      'message': msg
    },
    success: function(data){
      console.log(data);
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
  var url= encodeURI("/getTitle.php?title=<?php echo $user; ?>");

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



</script>


<script type="text/javascript" src="js/changeToWorker.js"></script>


</body>
</html>
