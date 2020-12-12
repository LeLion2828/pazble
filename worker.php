<?php
include ('workerheader.php');
 ?>



 <div class="col-md-9">

   <div class="row">
      
      <div class="col-md-4">


        <p id="outputList"></p>

       <!--  <?php 

            $sqlJob = "SELECT U.user_id,U.Firstname,U.Lastname,U.phone,J.job_id,J.title,
                       J.Description,J.Address,BJ.date_posted,BJ.postjob_id
                       FROM users U,jobs J,boss_post_job BJ 
                       WHERE U.user_id = BJ.user_id
                       AND J.job_id = BJ.job_id
                       ORDER BY BJ.date_posted DESC";


                       $resultJoinJob = $conn->query($sqlJob);

                       while($rowJoinJob = $resultJoinJob->fetch_assoc())
                       {
                            echo "<p style='color:black;'>";
                            echo '<b>Title:</b> '.$rowJoinJob['title'].'<br>';
                            echo '<b>Boss name:</b> '.$rowJoinJob['Firstname'].' '.$rowJoinJob['Lastname'].'<br>';
                            echo '<b>phone :</b> '.$rowJoinJob['phone'].'<br>';
                            echo '<b>Description:</b> '.$rowJoinJob['Description'].'<br>';
                            echo '<b>Address:</b> '.$rowJoinJob['Address'].'<br>';
                            echo '<b>Job Posted: </b> '.$rowJoinJob['date_posted'].'<br>';
                            echo '</p><br>';

                            echo "<a id=".$rowJoinJob['job_id']." data-postid=".$rowJoinJob['postjob_id']." class='bidding btn btn-info'  href='#forms' rel='modal:open'>Bidding</a><br/><br/>";
                       }
                 


           // echo "<p style='background-color:black;'>yes</p>";
        ?> -->
         
      </div>

      <div class="col-md-8">

      <input class="registerinput" id="typing" type="text">
      <button type="submit" class='btn btn-info' onclick="jobsearch()">Search</button>
      <p id="outputSearch"></p>

       <div id="forms" class="modal">

        <form action="bidValidate.php" method="post">
          <label>Biding Price</label><br>
          <input class="registerinput" type="text" name="bid_price" placeholder="bid your price"><br><br>
          <input type="hidden" value="" name="job_id" id="job_id">
          <input type="hidden" value="" name="postjob_id" id="postjob_id">
          <button type="submit" class="btn btn-success">Submit</button><br>

        </form><br>

        <a class="btn btn-danger" href="#" rel="modal:close">Close</a>
        
      </div>
        
      </div>

     
   </div>

 </div>
 <div class="col-md-1"></div>

</div>

<!-- <div class="wrapper">
  <div class="row">
	   <div class='col-md-4'>
		   <p id="outputList"></p>
	   </div>
     <div class='col-md-8'>
      
      <input class="registerinput" id="typing" type="text">
      <button type="submit" class='btn btn-info' onclick="jobsearch()">Search</button>
      <p id="outputSearch"></p>


      <div id="forms" class="modal">

        <form action="bidValidate.php" method="post">
          <label>Biding Price</label><br>
          <input class="registerinput" type="text" name="bid_price" placeholder="bid your price"><br><br>
          <input type="hidden" value="" name="job_id" id="job_id">
          <input type="hidden" value="" name="postjob_id" id="postjob_id">
          <button type="submit" class="btn btn-success">Submit</button><br>

        </form><br>

        <a class="btn btn-danger" href="#" rel="modal:close">Close</a>
      </div> -->


<!-- Link to open the modal -->
<!-- <a class='btn btn-info'  href='#forms' rel='modal:open'>Bidding</a> -->


  <!--    </div>
     
  </div>
</div> -->


<?php include('footer.php'); ?>



<script type="text/javascript">

	// $("#btnPostJob").click(function(){
 //        $("#form1").toggle();
 //    });

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

      $(document).on("click", '.bidding', function(event) { 
          $("#job_id").val($(this).attr('id'));

          $("#postjob_id").val($(this).attr('data-postid'));
      });
</script>


 <script type="text/javascript" src="js/changeType.js"></script>


</body>
</html>
