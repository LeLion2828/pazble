<?php
include ('workerheader.php');


 $sqlRating = "SELECT CAST(AVG(`rating`) as decimal(10,1)) AS ratingwork from ratingworkers WHERE worker_id = $user";

 $resultrating = mysqli_query($conn,$sqlRating);

 $ratingWorker = mysqli_fetch_assoc($resultrating);



 $ratingreceived = "SELECT Count(rating) AS Counting FROM ratingworkers WHERE worker_id = $user";

 $countRate = mysqli_query($conn,$ratingreceived);

 $receivedRate = mysqli_fetch_assoc($countRate);



?> 
<div class="col-md-8">

 <div class="row top bg-worker-div" style="border:2px solid white; border-radius: 5px;">
  <div class="col-md-2 ">
    <?php
    echo "<img src='".$path['gravatar']."' id='whatupPic2' > ";
    ?> 


    <div class="verifiedstatus">
      <p class="statusver" style="padding-top:1%; ">Verified Status: </p>
      <p>ID <i class="fas fa-times" style=" color:#e1244c;"></i></p> 
      <p>Proof of Address <i class="fas fa-close" style=" color:#f76659"></i></p>
    </div>


  </div>
  <div class="col-md-6 seconddiv bg-worker-div" >
   <h4 class='nameboss_worker'><?php echo $firstName.'  '.$lastName; ?></h4>
   Nick: Rambo Ramba <br>
   Skills: Plumber <br> <hr class="new5">
   Location: Rose Hill <br>
   Coverage: 5 Km <br>
   # of jobs completed: 100<br><br>


   <div class="row">
     <div class="col-md-4">
       <a class='btn button5'>
        Rating: 

        <?php

               if($ratingWorker['ratingwork'] >= 0 && $ratingWorker['ratingwork'] <1)
               {
                    echo "<i class='fas fa-crown'></i>
                          <i class='fas fa-crown' ></i>
                          <i class='fas fa-crown' ></i>
                          <i class='fas fa-crown'></i>
                          <i class='fas fa-crown' ></i><span class='rating'>&nbsp;".$ratingWorker['ratingwork']."</span></a>";
               }
               elseif($ratingWorker['ratingwork'] >= 1 && $ratingWorker['ratingwork'] <2)
               {
                echo "<i class='fas fa-crown' style='color:red'></i>
                          <i class='fas fa-crown' ></i>
                          <i class='fas fa-crown' ></i>
                          <i class='fas fa-crown'></i>
                          <i class='fas fa-crown' ></i><span class='rating'>&nbsp;".$ratingWorker['ratingwork']."</span></a>";  
               }
               elseif($ratingWorker['ratingwork'] >= 2 && $ratingWorker['ratingwork'] <3)
               {
                     echo "<i class='fas fa-crown' style='color:red'></i>
                          <i class='fas fa-crown' style='color:red' ></i>
                          <i class='fas fa-crown' ></i>
                          <i class='fas fa-crown'></i>
                          <i class='fas fa-crown' ></i><span class='rating'>&nbsp;".$ratingWorker['ratingwork']."</span></a>";  

               }
                elseif($ratingWorker['ratingwork'] >= 3 && $ratingWorker['ratingwork'] <4)
               {
                     echo "<i class='fas fa-crown' style='color:red'></i>
                          <i class='fas fa-crown' style='color:red'></i>
                          <i class='fas fa-crown' style='color:red'></i>
                          <i class='fas fa-crown'></i>
                          <i class='fas fa-crown' ></i><span class='rating'>&nbsp;".$ratingWorker['ratingwork']."</span></a>";  

               }
               elseif($ratingWorker['ratingwork'] >= 4.0 && $ratingWorker['ratingwork'] <5)
               {
                     echo "<i class='fas fa-crown' style='color:red'></i>
                          <i class='fas fa-crown' style='color:red'></i>
                          <i class='fas fa-crown' style='color:red'></i>
                          <i class='fas fa-crown' style='color:red'></i>
                          <i class='fas fa-crown' ></i><span class='rating'>&nbsp;".$ratingWorker['ratingwork']."</span></a>";  

               }
               elseif($ratingWorker['ratingwork'] >= 5)
               {
                     echo "<i class='fas fa-crown' style='color:red'></i>
                          <i class='fas fa-crown' style='color:red'></i>
                          <i class='fas fa-crown' style='color:red'></i>
                          <i class='fas fa-crown' style='color:red'></i>
                          <i class='fas fa-crown' style='color:red' ></i><span class='rating'>&nbsp;".$ratingWorker['ratingwork']."</span></a>"; 
               }
           ?>


        
      </div>

      <div class="col-md-2"></div>

      <div class="col-md-4">
        <a class='btn button5'>
          # of Rating Received: <span class='rating'>&nbsp;<?php echo $receivedRate['Counting']; ?></span> </a></div>
        </div>


      </div>


      <div class="col-md-4 text-center" style="color: white;border-radius: 10px;">
        <div class="boss1" style="background-color: black;">
          <h4 class="toolkit1">Toolkit</h4>
          <a type='submit' href='#whatup' rel='modal:open' style="background-color: #17a2b8" class='btn button2'>SPEAK UP</a><br>
          <a type='submit' href='#work-search' rel='modal:open' style="background-color: #dc3545" class='btn button2'>WORK - SHOP</a><br>
          <button class="btn button2" style="background-color: #13668f"><i class="fas fa-search"></i> SEARCH PAZBLE</button><br>
          <span id="switch-Worker2"> Switch to Boss mode</span>
          <span>
            <label class="switch">
              <input id="submiting"  type="checkbox" value="client" checked>
              <span class="slider round"></span>
            </label>
          </span>

          <div class="editt" style="float: right; padding-right: 3%;">
            <p style="font-weight: bold;"> <i class="fas fa-edit" style="color: #c03a3a;"></i> Edit Profile</p>
          </div>
        </div>
      </div>

      <a type='submit'  style="background-color: #dc3545; width: 120px; height:35px; margin-right: 1%; border-radius: 20px; margin-left: 2%;" href='#uploadID' rel='modal:open' class='btn btnupload'><i class="fas fa-plus"></i>Upload</a> <p class="getverified"> Get verified by uploading your ID and Proof of Address (Utility Bill, Bank Statement,  Bank Reference)</p>
    </div><br>


    <div class="row top bg-worker-div" style="border:2px solid white; border-radius: 5px;">
      <div>
        <h4 style="margin-left: 12%; width: 120px;">Net-Work</h4>
        <p style="margin-left: 12%;">My Followers</p>
        <p style="margin-left: 12%; font-size: 12px;">1,200 </p>
      </div>


      <div class="row" style="padding-left: 2%;padding-right: 2%; padding-bottom: 2%;">


        <?php

          $sqlJoin = "SELECT Firstname,Lastname,gravatar
                      FROM users U,followsystem F
                      WHERE U.user_id = F.user_id_follower
                      AND status_follow = 1;";


                    $here = mysqli_query($conn,$sqlJoin);

                    $test = mysqli_fetch_assoc($here);






         ?>

        <div class="col-md-3">
          <div class="thumbnail">

            <?php 
            

            echo '<img src="'.$test['gravatar'].'" alt="" style="width: 170px; height: 170px;">';
            echo"<div class='caption text-center'><p>" .$test['Firstname']." ".$test['Lastname']."</p></div>"; 

            ?>

          </div>
        </div>


        <!-- <div class="col-md-3">
          <div class="thumbnail">
            <img src="img/worker2.jpg" alt="worker" style="width: 170px; height: 170px;">
            <div class="caption text-center">
              <p>Zoli Mamzel</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="thumbnail">
            <img src="img/worker3.jpg" alt="worker" style="width: 170px; height: 170px;">
            <div class="caption text-center">
              <p>Za Rico</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="thumbnail">
            <img src="img/worker4.jpg" alt="worker" style="width: 170px; height: 170px;">
            <div class="caption text-center">
              <p>Papi ChukChuk</p>
            </div>
          </div>
        </div> -->

        <div class="col-md-9">
        </div>
        <div class="col-md-3">
          <a href="#" style="color: #91cfea; float: right;">See all followers</a>
        </div> <br><br>
        <hr style="border: white;">

        <div class="col-md-12">
          <hr style="border: 2px solid white;">
          <p style=" ">Follow</p>
          <p style="font-size: 12px;">1,200 </p>
        </div>

        <div class="col-md-3">
          <div class="thumbnail">
            <img src="img/worker1.jpg" alt="worker" style="width: 170px; height: 170px;">
            <div class="caption text-center">
              <p>Zean Retard</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="thumbnail">
            <img src="img/worker2.jpg" alt="worker" style="width: 170px; height: 170px;">
            <div class="caption text-center">
              <p>Zoli Mamzel</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="thumbnail">
            <img src="img/worker3.jpg" alt="worker" style="width: 170px; height: 170px;">
            <div class="caption text-center">
              <p>Za Rico</p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="thumbnail">
            <img src="img/worker4.jpg" alt="worker" style="width: 170px; height: 170px;">
            <div class="caption text-center">
              <p>Papi ChukChuk</p>
            </div>
          </div>
        </div>

        <div class="col-md-12">
          <a href="#" style="color: #91cfea; float: right;">See All Follow</a>
        </div> <br><br>
      </div>
    </div><br><br>














    <div class="row top bg-worker-div" style="border:2px solid white; border-radius: 5px;">
      <h4 style="font-weight: bold; padding-left: 2%;">Photos</h4>

      <div class="row" style="padding-left: 2%;padding-right: 2%; padding-bottom: 2%;">
        <div class="col-md-3">
          <div class="thumbnail">
            <img src="img/worker1.jpg" alt="worker" style="width: 170px; height: 170px;">
          </div>
        </div>
        <div class="col-md-3">
          <div class="thumbnail">
            <img src="img/worker2.jpg" alt="worker" style="width: 170px; height: 170px;">
          </div>
        </div>
        <div class="col-md-3">
          <div class="thumbnail">
            <img src="img/worker3.jpg" alt="worker" style="width: 170px; height: 170px;">
          </div>
        </div>
        <div class="col-md-3">
          <div class="thumbnail">
            <img src="img/worker4.jpg" alt="worker" style="width: 170px; height: 170px;">
          </div>
        </div>
      </div>
    </div><br><br>

    <div style="border:2px solid white; border-radius: 5px;margin: -2% -2% 0% -2%;">
      <div class="col text-left phoworker" >Posts</div>
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


        echo "<div id='theChat' class='bg-worker-div'>";

        echo '<small class="text-white" id="replied">'.$row['Firstname'].' '.$row['Lastname'].' posted - <span>'.humanTiming($time).' ago</span></small><br><br>';
        echo "<img id='imgChat' src='".$row['gravatar']."' style='width:40px;height:40px;border-radius:50%;'><br>";

        echo "<div id='text-chat-box'>"; 
        echo "<span id='workercoments'>".$row['comments']."</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        echo "<br><br>";
        echo "<button class='topo btn'>TOPO!</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
        echo "<button class='share btn'>Share</button><br><br>";
        echo "<i class='material-icons'>favorite</i>&nbsp;&nbsp;&nbsp;<span class='number-worker'>10,000&nbsp;&nbsp;</span><br><br>";

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

          echo '<small class="nameWorker">&nbsp;&nbsp;'.$rowjoin['Firstname'].' '.$rowjoin['Lastname'].' replied <span>'.humanTiming($timeReply).' ago</span></small><br><br>';


          echo '<span style="width:90%;" class="messageStyle">'.$rowjoin['reply_message'].'</span>';
          echo "</div><br>";


        }


        echo '<form action="replyWorkerprofile.php" method="post">'; 


        echo '<input type="hidden" value="" name="hapen_id" id="hapen_id">';

        echo "<input type='text' id='shareThought' name='reply' placeholder='Share your thoughts...'>&nbsp;&nbsp;&nbsp;<input type='submit'  id=".$row['hapen_id']."  class='replyingWorker btn' value='Reply'><br><br>" ;

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
</div> <br>

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


<div id="uploadID" class="modal">

  <form style="color:#000;" action="uploadproof.php" method="post" enctype="multipart/form-data">

    <legend class="text-primary">Upload Proof(ID, Address Proof)</legend><br>

    <input type="file"  name="proof" required> <button type="submit" class="btn btn-info"  name='uploadProof'>Upload</button>
     
     <?php

       $sqlImg = "SELECT * FROM uploadproof WHERE user_id = $user";
                        $resultImg = mysqli_query($conn,$sqlImg);

                        echo '<br>';

                        while($rowImg = mysqli_fetch_assoc($resultImg))
                        {
                                echo "<span><img src='".$rowImg['paths']."' style='width:64px;height:64px;'></span>";
                        }

       ?>

    
  </form>



  
</div>


<div class="col-md-2"></div>

</div>


<div id="work-search" class="modal">
 <input class="registerinput" id="typing" type="text">
 <button type="submit" class='btn btn-info' onclick="jobsearch()">Search</button><br><br>

 <p class="text-center" id="outputSearch"></p>
 <p id="outputList"></p>

</div>

<?php include('footer.php'); ?>


<script type="text/javascript">


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

  $(document).on("click", '.replyingWorker', function(event) { 

   console.log($("#hapen_id").val($(this).attr('id')));


 });


  function jobList()
  {
        //store the value the user input in b_name
        // var b_name= document.getElementById("typing").value;
        //The encodeURI() function is used to encode a URI.
        var url= encodeURI("getJob.php?job=e");

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

              document.getElementById("outputList").innerHTML =
              result +=

              "<b>Title : </b> "+myObj.data[x].title+
              "<br/><b> Boss Name : </b>"+myObj.data[x].Firstname+" "+myObj.data[x].Lastname+
              " <br/><b> Contact : </b> " + myObj.data[x].phone+
              " <br/><b> Description : </b> " + myObj.data[x].Description+
              "<br/><b> Address : </b>"+myObj.data[x].Address+
              "<br/><b> Job Posted : </b>"+myObj.data[x].date_posted+
              "</b><br/><a id="+myObj.data[x].job_id+" data-postid="+myObj.data[x].postjob_id+" class='bidding btn btn-info'  href='#forms' rel='modal:open'>Bidding</a><br/><br/>";

            }


          }
        };

        // open http connection request
        xmlhttp.open("GET",url, true);
        // send data via the above connection
        xmlhttp.send();

      }


      function jobsearch()
      {
        //store the value the user input in b_name
        var b_name= document.getElementById("typing").value;
        //The encodeURI() function is used to encode a URI.
        var url= encodeURI("getJobSearch.php?jobs="+b_name);

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

              document.getElementById("outputSearch").innerHTML =
              result +=

              "<br><b>Title : </b> "+myObj.data[x].title+
              "<br/><b> Boss Name : </b>"+myObj.data[x].Firstname+" "+myObj.data[x].Lastname+
              " <br/><b> Contact : </b> " + myObj.data[x].phone+
              " <br/><b> Description : </b> " + myObj.data[x].Description+
              "<br/><b> Address : </b>"+myObj.data[x].Address+
              "<br/><b> Job Posted : </b>"+myObj.data[x].date_posted+
              "</b><br/><a id="+myObj.data[x].job_id+" data-postid="+myObj.data[x].postjob_id+" class='bidding btn btn-info'  href='#forms' rel='modal:open'>Bidding</a><br/><br/>";

            }


          }
        };

        // open http connection request
        xmlhttp.open("GET",url, true);
        // send data via the above connection
        xmlhttp.send();

      }


  </script>


  <script type="text/javascript" src="js/changeType.js"></script>

</body>
</html>
