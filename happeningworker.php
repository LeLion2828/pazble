<?php
include ('workerheader.php');
 ?>


 <div class="col-md-9"><br><br>

 	<div class="row">
 		<div class="col">
 			
 			 <form action="" method="post">
      
          		<textarea name="messageText" placeholder="What happening?" id="message" style="width:90%;"></textarea><br><br>

          		 <button type="submit" id="postme" name='posting' class="btn btn-info">Post</button>
                 </form>

   			</form>	
 		</div>
 	</div><br>


 	 <div class="row">
      <div class="col">
         <?php

          $sql = "SELECT * 
                  FROM happenings H,users U 
                  WHERE H.user_id = U.user_id
                  AND  H.user_id = $user
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



      echo "<img src='".$row['gravatar']."' style='width:40px;height:40px;border-radius:50%;'>&nbsp;";
      echo '<span class="pazdou">'.$row['Firstname'].' '.$row['Lastname'].' Posted <span>'.humanTiming($time).' ago</span></span><br><br>';
      echo "<textarea disabled class='posting' style='width:90%;'>";
      echo ''.$row['comments'].' ';
      echo '</textarea><br><br>';
      // echo "<input type='submit' class='btn btn-primary' value='Comment'><br><br>" ;    
    }




    ?>
      </div>
    </div>


 </div>

<div class="col-md-1"></div>



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

</script>

 <script type="text/javascript" src="js/changeType.js"></script>




 </body>
</html>