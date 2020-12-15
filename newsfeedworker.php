<?php
include ('workerheader.php');
 ?>


<div class="col-md-7">

  <div class="row">
    <div class="col">
        <div id='speakupBox'><br>
          <!-- <div id="speaker-two"> -->
          <?php
           echo "<img src='".$path['gravatar']."' id='whatupPic'> &nbsp;&nbsp;&nbsp;
            <span id='Standup'>Speak up...Stand up...</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a type='submit' href='#whatup' rel='modal:open' class='btn button-style'>SPEAK UP<a><br><br>  ";
          ?>

        <!--   </div> -->
        </div>
    </div>
  </div><br><br>

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


      echo '<form action="replyClient.php" method="post">';


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




  <!--  <div id="forms" class="modal">

        <form action="replyClient.php" method="post">
          <label>Reply to this comment</label><br>

          <input class="registerinput" type="text" name="reply" placeholder="Reply"><br><br>
          <input type="hidden" value="" name="hapen_id" id="hapen_id">

          <button type="submit" class="btn btn-success">Send</button>&nbsp;&nbsp;

          <a class="btn btn-danger" href="#" rel="modal:close">Close</a>

        </form>



      </div> -->


</div>

<div class="col-md-3">

  <div id="scoreBoard">

    <h4 class="text-center scoretext">Score Board</h4>


  </div>


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
    error: function(err){
      console.log(err);
    }
    success: function(data){
      console.log(data);
    }
  });


});


    $(document).on("click", '.replying', function(event) {

         $("#hapen_id").val($(this).attr('id'));

      });



</script>

 <script type="text/javascript" src="js/changeToWorker.js"></script>


</body>
</html>
