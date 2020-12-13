<?php
include ('clientheader.php');
// var_dump($_SESSION['message']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>client</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!--changed textbox color, white to #207097 -->
  <style>

</style>

</head>
<body>
  <div class="col-md-7">

    <div class="row">

      <div class='col text-center'>

      <button id='btnPostJob' class="btn" style="background-color: #13668f;color:white;">Post a job</button><br><br>

    <form id="form1" method="post" action="jobpost.php">

      <b>Title</b><br>
      <input class="registerinput" type="text" name="title"><br><br>
      <b>Description</b><br>
      <textarea class="registerinput" cols=20 rows=4 name='desc'></textarea><br><br>
      <!-- <input class="registerinput" type="text" name="description"><br><br> -->
      <b>Address</b><br>
      <input class="registerinput" type="text" name="address"><br><br>

      <button class="btn btn-success" type="submit" name="postjob">Submit</button>

    </form><br>
    </div>

  </div>


  <div class="container-fluid" id="output1" style="display:flex; justify-content: space-around;"></div>
    <!-- two div below finishing -->
  </div>

</div>

<br>


<?php include('footer.php'); ?>


<script type="text/javascript">

$("#btnPostJob").click(function(){
  $("#form1").toggle();
});


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
      var data_threshold = myObj.data.length;
      var column_limit = 3;
      var result="";

      console.log(myObj);
      for(var i = data_threshold; i > 0; i--){
        var row_node = document.createElement("div");
        $(row_node).addClass("row");

        for(var o = 0; o < column_limit; o++){
           var div_node = document.createElement("div");
           var title_node = document.createElement("p");
           var boss_node = document.createElement("p");
           var description_node = document.createElement("p");
           var address_node = document.createElement("p");
           var job_node = document.createElement("p");
           var status_node = document.createElement("p");

           $(title_node).text(myObj.data[i - 1].title);
           $(boss_node).text(myObj.data[i - 1].Firstname+" "+myObj.data[i - 1].Lastname);
           $(description_node).text(myObj.data[i - 1].Description);
           $(address_node).text(myObj.data[i - 1].Address);
           $(job_node).text(myObj.data[i - 1].date_posted);
           $(status_node).text(myObj.data[i - 1].Status == 0?"Unavailable":"Available");

           $(div_node).append(title_node).append(boss_node).append(description_node).append(address_node).append(job_node).append(status_node);
           $(div_node).addClass("col-md-4");
           $(row_node).append(div_node);

           i--;
        }

        $("#output1").append(row_node);
      }

      // console.log(myObj);
      // for (x in myObj.data)
      // {

      //   document.getElementById("output1").innerHTML =
      //   result +=
      //   "<b>Title : </b> "+myObj.data[x].title+
      //   "<br/><b> Boss Name : </b>"+myObj.data[x].Firstname+" "+myObj.data[x].Lastname+
      //   " <br/><b> Description : </b> " + myObj.data[x].Description+
      //   "<br/><b> Address : </b>"+myObj.data[x].Address+
      //   "<br/><b> Job Posted : </b>"+myObj.data[x].date_posted+
      //   "<br/><b> Status : </b>"+myObj.data[x].Status+
      //   "</b><br/><br/>";

      // }


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

</script>

<script type="text/javascript" src="js/changeToWorker.js"></script>

<script async type="text/javascript" src="https://userlike-cdn-widgets.s3-eu-west-1.amazonaws.com/a1b7d526b6b64171acd58adc1b7fa1f9f681dd6f3b66449384228fd76cb53ebe.js"></script>


</body>
</html>
