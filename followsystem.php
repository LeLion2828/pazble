<?php

include ('workerheader.php');

?>


<div class="col-md-7">

	<div class="row">



<div class="col text-center">
     <input class="registerinput" id="typing" type="text">
      <button type="submit" class='btn' style='background-color:#13668f;color:white;' onclick="followerSearch()">Search by Names</button>
</div>
       
     

		             <!--   <div class="col-md-2"></div>

		               <form action="followInsert.php" method="post">

		 			<?php

                        $sqlImg = "SELECT * FROM users WHERE user_id != $user AND user_id = 5";
                        $resultImg = mysqli_query($conn,$sqlImg);


                        while($rowImg = mysqli_fetch_assoc($resultImg))
                        {
                            if($rowImg['status_check'] == 1)
                            {
                                echo " <div class='col-md-6 text-dark'><img src='".$rowImg['gravatar']."' style='width:64px;height:64px;'><br>
                                        ".$rowImg['Firstname'].' '.$rowImg['Lastname']."

                                        <input value='".$rowImg['user_id']."' name='followerID' hidden>

                                     <button id='".$rowImg['user_id']."' class='submiting' type='submit'>Follow</button></div><br>";
                            }
                            else
                            {
                                echo "";
                            }
                        }

                        ?>


                        </form>
 -->


      <!-- <script type="text/javascript" src="js/follower.js"></script> -->
     
  
		
	</div>

    <div class="row">
        <div class="col text-center">
             <p id="outputSearch"></p>
        </div>
    </div>

	

</div>
	

</div>


<?php include('footer.php'); ?>


<script type="text/javascript">

    function followerSearch()
      {
        //store the value the user input in b_name
        var b_name= document.getElementById("typing").value;
        //The encodeURI() function is used to encode a URI.
        var url= encodeURI("getfollow.php?follow="+b_name);

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

              "<br/>"+myObj.data[x].Firstname+" "+myObj.data[x].Lastname+
              " <br/><img style='width:120px;height:100px;' src='" + myObj.data[x].gravatar+
              "'><br/><br><a id="+myObj.data[x].user_id+" class='follow btn btn-info' style='background-color:#13668f;color:white;'>Follow</a><br/><br/>";

            }


          }
        };

        // open http connection request
        xmlhttp.open("GET",url, true);
        // send data via the above connection
        xmlhttp.send();

      }


      $(document).on("click",'.follow',function(event){

      var id_follower = $(this).attr("id");

      console.log(id_follower);

      $.ajax({
                url:'followInsert.php',
                type:'post',
                data:{
                'follower': id_follower
                  },
                  success: function(data){
                  console.log(data);

                  // location.href = 'workerprofile.php';
                }
             });

            });
    
</script>



</body>
</html>