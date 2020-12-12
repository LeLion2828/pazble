<?php
include ('clientheader.php');
 ?>



 <?php

 if(isset($_POST['accept']))
{

    $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
    // $userid = mysqli_real_escape_string($conn,$_POST['userid']);
    $job_id = mysqli_real_escape_string($conn,$_POST['job_id']);
    $bid_id = mysqli_real_escape_string($conn,$_POST['bid_id']);

    $status = 1;

    // var_dump($user_id,$bid_id);

    $sqlinsert = "INSERT INTO acceptingBid(bid_id,user_id) VALUES (?,?)";

     $stmt = mysqli_stmt_init($conn);

            //prepare the prepared statment
            if(!mysqli_stmt_prepare($stmt,$sqlinsert))
            {
                echo "SQL insert error";
            }
            else
            {
                //bind the parameters to the placeholder
                mysqli_stmt_bind_param($stmt, 'ii' , $bid_id,$user_id);
                //run parameters inside database
                mysqli_stmt_execute($stmt);

                

                $updatesql = "UPDATE jobs SET Status = ? WHERE job_id = ?";

                //Create a prepare statement
                $stmtupdate = mysqli_stmt_init($conn);

                //prepare the prepared statment
                if(!mysqli_stmt_prepare($stmtupdate,$updatesql))
                {
                   echo "SQL update error";
                }
                else
                {
                    //bind the parameters to the placeholder
                    mysqli_stmt_bind_param($stmtupdate, 'ii' , $status,$job_id);
                    //run parameters inside database
                    mysqli_stmt_execute($stmtupdate);

                    // header("location:bossAcceptWorker.php?page=accept");
                    // exit();

                }

            }
}



if(isset($_POST['reject']))
{

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


    }

}

 ?>


 <div class="col-md-9">
    
    <div class="row">
      <div class="col">

          <p class="text-center title">Worker Bids Price</p>

        <?php

          $sql ="SELECT B.bid_id,B.bid_price, BP.user_id, U.Firstname,U.Lastname, U.phone,J.job_id, J.title,
          J.status
          FROM biding B, boss_post_job BP,jobs J, users U
          WHERE B.user_id = U.user_id
          AND B.job_id = J.job_id
          AND B.postjob_id = BP.postjob_id
          AND J.status = 0
          AND BP.user_id = $user";


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
            // echo "<th>ID</th>";
            echo "<th>FirstName</th>";
            echo "<th>Lastname</th>";
            echo "<th>Phone</th>";
            echo "<th>Title</th>";
            // echo "<th>Status</th>";
            echo "<th>Price bid</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";

            echo "<tr><form action='#' method='post'>";
            // echo "<td>". $row["user_id"]."</td>";
            echo "<td>". $row["Firstname"]."</td>";
            echo "<td>". $row["Lastname"]."</td>";
            echo "<td>". $row["phone"]."</td>";
            echo "<td>". $row["title"]."</td>";
            // echo "<td>". $row["status"]."</td>";
            echo "<td>" .$row['bid_price']."</td>";
            echo "<input type='hidden' name='user_id' size='5' value='" .$row['user_id']."'></td>";
            echo "<input type='hidden' name='bid_id' size='5' value='" .$row['bid_id']."'></td>";
            echo "<input type='hidden' name='job_id' size='5' value='" .$row['job_id']."'></td>";
            echo "<td><input type='submit' value='Accept' class='btn btn-info' name='accept'></td>";
            echo "<td><input type='submit' value='Reject' class='btn btn-danger' name='reject'></td>";
            echo "</form></tr>";   
            echo "</tbody>";

            // <td>" . $row["Address"]."</td></tr>";
          }

          echo "</table>";
          } 
          else 
          { 
            echo "0 results"; 
          }
          $conn->close();


   ?>
        
      </div>
    </div><br>


<?php include('footer.php'); ?>


<script type="text/javascript" src="js/changeToWorker.js"></script>



</body>
</html>