<?php
include ('clientheader.php');


if(!empty($_POST))
{   

      $worker_id = mysqli_real_escape_string($conn, $_POST['worker_id']);
      $rateme = mysqli_real_escape_string($conn, $_POST['rate']);

      // echo $rateme.' '.$worker_id;

      $sqlinsert = "INSERT INTO ratingworkers(worker_id,rating) VALUES (?,?)";

     $stmt = mysqli_stmt_init($conn);

            //prepare the prepared statment
            if(!mysqli_stmt_prepare($stmt,$sqlinsert))
            {
                echo "SQL insert error";
            }
            else
            {
                //bind the parameters to the placeholder
                mysqli_stmt_bind_param($stmt, 'ii' , $worker_id,$rateme);
                //run parameters inside database
                mysqli_stmt_execute($stmt);
                
            }
}

 ?>


        <div class="col-md-9">

          <p class="text-center title">Worker Details</p>

            <?php

                  $sql ="SELECT U.Firstname,U.Lastname, J.title, J.Description, U.Phone,
                          B.bid_price,U.user_id AS userU,BP.user_id AS userBP
                  FROM acceptingBid A, biding B, users U, jobs J, boss_post_job BP
                  WHERE A.bid_id = B.bid_id
                  AND B.user_id = U.user_id
                  AND BP.postjob_id = B.postjob_id
                  AND J.Status = 1
                  AND B.job_id = J.job_id
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
                    echo "<th>Employee name</th>";
                    echo "<th>Title</th>";
                    echo "<th>Phone</th>";
                    echo "<th>Description</th>";
                    echo "<th>Salary</th>";
                    // echo "<th>Status</th>";

                    echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";

                    echo "<tr><form action='#' method='post'>";
                    // echo "<td>". $row["user_id"]."</td>";
                    echo "<td>" .$row["Firstname"].' '. $row["Lastname"]."</td>";
                    echo "<td>". $row["title"]."</td>";
                    echo "<td>". $row["Phone"]."</td>";
                    echo "<td>". $row["Description"]."</td>";
                    echo "<td>". $row["bid_price"]."</td>";
                    // echo "<td>". $row["userU"]."</td>";
                    // echo "<td>". $row["userBP"]."</td>";
                    echo '<td><select name="rate" id="rate">
                          <option value=1>1</option>
                          <option value=2>2</option>
                          <option value=3>3</option>
                          <option value=4>4</option>
                          <option value=5>5</option>
                          </select></td>';

                     echo "<input type='hidden' name='worker_id' size='5' value='" .$row['userU']."'></td>";
                     echo "<td><input type='submit' value='Rating' class='btn' style='background-color:#13668f;color:white;' name='rating'></td>";
                    // echo "<td>". $row["status"]."</td>";
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