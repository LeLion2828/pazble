<?php
include ('workerheader.php');
 ?>


 <div class="col-md-9">

  <div class="row">
 <div class="col">

  <p class='text-center namefont'>Work Obtained</p>
  
  <?php

$sql ="SELECT U.Firstname,U.Lastname,J.title,J.Description,B.bid_price,U.Phone
FROM acceptingBid A, biding B, users U,jobs J
WHERE A.user_id = U.user_id
AND A.bid_id = B.bid_id
AND J.Status = 1
AND J.job_id =B.job_id
AND B.user_id = $user";


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
  echo "<th>Boss Name</th>";
  echo "<th>Job given</th>";
  echo "<th>Phone</th>";
  echo "<th>Description</th>";
  echo "<th>Job Price(Rs)</th>";
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
</div>
   


 </div>
 <div class="col-md-1"></div>

</div><br>

<?php include('footer.php'); ?>



 <script type="text/javascript" src="js/changeType.js"></script>

</body>
</html>
