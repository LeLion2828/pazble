<?php

include ('workerheader.php');

?>


<?php

// update

if(isset($_POST['update']))
{

    $bid_price = mysqli_real_escape_string($conn, $_POST['bid_price']);
    // $userid = mysqli_real_escape_string($conn,$_POST['userid']);
    $job_id = mysqli_real_escape_string($conn,$_POST['job_id']);
    $bid_id = mysqli_real_escape_string($conn,$_POST['bid_id']);
    
     
     if(empty($bid_price))
     {
        header("Location:viewbid.php?page=empty");
        exit();
     }
     else
     {

       if(!preg_match("/^[0-9 +-]*$/",$bid_price))
       {

          header("Location:viewbid.php?page=errortype");
          exit();

       }
       else
       {

          $updatesql = "UPDATE biding SET bid_price = ? WHERE bid_id = ? AND job_id = ? AND user_id = ?";

            //Create a prepare statement
            $stmt = mysqli_stmt_init($conn);

            //prepare the prepared statment
            if(!mysqli_stmt_prepare($stmt,$updatesql))
            {
                echo "SQL statement error";
            }
            else
            {
                //bind the parameters to the placeholder
                mysqli_stmt_bind_param($stmt, 'siii' , $bid_price,$bid_id, $job_id, $user );
                //run parameters inside database
                mysqli_stmt_execute($stmt);

                // header("location:viewbid.php?page=update");

            }

       }



     }

}



if(isset($_POST['delete']))
{

   // $bid_price = mysqli_real_escape_string($conn, $_POST['bid_price']);
   //  // $userid = mysqli_real_escape_string($conn,$_POST['userid']);
   //  $job_id = mysqli_real_escape_string($conn,$_POST['job_id']);
  $bid_id = mysqli_real_escape_string($conn,$_POST['bid_id']);



   $deletesql = "DELETE FROM biding Where bid_id = ?";


    //Create a prepare statement
    $stmt2 = mysqli_stmt_init($conn);

    //prepare the prepared statment
    if(!mysqli_stmt_prepare($stmt2,$deletesql))
    {
        echo "SQL statement error";
    }
    else
    {
        //bind the parameters to the placeholder
        mysqli_stmt_bind_param($stmt2, 'i' , $bid_id);
        //run parameters inside database
        mysqli_stmt_execute($stmt2);

        // header("location:viewbid.php?page=delete");

    }

}
   

?>


<div class="col-md-9">

    <div class="row">
    <div class="col">

      <p class="text-center namefont">My Bids</p>
    


              <?php

              $sql = "SELECT U.Firstname,U.Lastname,J.title,J.Description,J.Address,BJ.date_posted,B.bid_price,B.job_id,B.bid_id,B.user_id
                From users U,jobs J,boss_post_job BJ,biding B 
                WHERE U.user_id = BJ.user_id
                AND B.job_id = J.job_id
                AND J.job_id = BJ.job_id
                AND J.status = 0
                AND B.user_id = $user
                ORDER BY BJ.date_posted DESC";

              $result = $conn->query($sql);

              if ($result->num_rows > 0) 
              {

                echo "<table>";
              // output data of each row
              while($row = $result->fetch_assoc()) 
              {
                
                echo "<table class='table table-info '>";
                echo "<thead>";
                echo  "<tr>";
                echo "<th>Boss Name</th>";
                echo "<th>Job Title</th>";
                echo "<th>Description</th>";
                echo "<th>Address</th>";
                echo "<th>Date posted</th>";
                echo "<th>My Bid</th>";
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";

                echo "<tr><form action='#' method='post'>";
                echo "<td>". $row["Firstname"].' '.$row["Lastname"]."</td>";
                echo "<td>". $row["title"]."</td>";
                echo "<td>". $row["Description"]."</td>";
                echo "<td>". $row["Address"]."</td>";
                echo "<td>". $row["date_posted"]."</td>";
                echo "<td><input type='text' name='bid_price'  size='3' value='" .$row['bid_price']."'></td>";
                echo "<input type='hidden' name='job_id' size='10' value='" .$row['job_id']."'></td>";
                echo "<input type='hidden' name='bid_id' size='10' value='" .$row['bid_id']."'></td>";
                echo "<td scope='row'><input type='submit' value='Update' class='btn btn-info' name='update'></td>";
                echo "<td scope='row'><input type='submit' value='Delete' class='btn btn-danger' name='delete'></td>";
                echo "</form></tr>";   
                echo "</tbody>";

                // <td>" . $row["Address"]."</td></tr>";
              }

              echo "</table>";
              } 
              else 
              { 
                echo "<p style='color:white;'>0 results</p>"; 
              }
              $conn->close();

              ?>

  </div>
</div><br>


  <div class="row">
                <div class="col text-center">
                    <?php
                    $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                    // var_dump($fullUrl);

                    if(strpos($fullUrl,"page=empty") == true)
                    {
                        echo "<h4 class='text-white'>The bid price was empty</h4>";

                    }
                    elseif(strpos($fullUrl,"page=errortype") == true)
                    {
                        echo "<h4 class='text-white'>bid Price must contain number only</h4>";

                    }
                    elseif(strpos($fullUrl,"page=update") == true)
                    {
                        echo "<h4 class='text-white'>Record updated successfully</h4>";

                    }
                     elseif(strpos($fullUrl,"page=delete") == true)
                    {
                        echo "<h4 class='text-white'>Record deleted successfully</h4>";

                    }

                    ?>
                </div>
            </div><br/>
  
</div>
<div class="col-md-1"></div>

</div>




<div class="row">
  <div class="col">
  

<?php

include('footer.php'); 


?>


 <script type="text/javascript" src="js/changeType.js"></script>


</body>
</html>
