<?php

include ('clientheader.php');
 ?>

 <div class="col-md-9">


 	 <div class="row">

                <div class="col-md-4 text-center">

                    <form action="upload_p.php" method="post" enctype="multipart/form-data">

                        <input type="file"  name="file" required><br><br>

                    </div>

                    <div class="col-md-4 text-center">
                        <?php
                        $sqlImg = "SELECT * FROM users WHERE user_id = $user";
                        $resultImg = mysqli_query($conn,$sqlImg);
                        while($rowImg = mysqli_fetch_assoc($resultImg))
                        {
                            if($rowImg['status_check'] == 1)
                            {
                                echo "<img src='".$rowImg['gravatar']."' style='width:64px;height:64px;'>";
                            }
                            else
                            {
                                echo " error uploading pic";
                            }
                        }

                        ?>

                    </div>

                    <div class="col-md-4 text-center">

                        <button type="submit" class="btn btn-success"  name='upload'>Change Profile pic</button>

                    </div>

                </form>

            </div><br/><br>

 	<div class="row">
 		<div class="col text-center">
 			<form action="changePosition.php" method="post">
 				
 				 <label for="position" class="title">Choose your position:</label><br>

				<select name="position" id="position">
  					<option value="worker">worker</option>
				</select> <br><br>

				<button class="btn btn-success" type="submit" name='changePosition'>Change to Worker</button>

 			</form>
 		</div>
 	</div>
 	
 </div>

</div><br>

 <?php include('footer.php'); ?>


 <script type="text/javascript" src="js/changeToWorker.js"></script>

</body>
</html>

<!--  <div class="wrapper">

 	<div class="row">
 		<div class="col text-center">

 			<form action="changePosition.php" method="post">
 				
 				 <label for="cars">Choose your position:</label><br>

				<select name="position" id="position">
  					<option value="worker">worker</option>
				</select> <br><br>

				<button class="btn btn-success" type="submit" name='changePosition'>Change to Worker</button>

 			</form>
 		</div>
 	</div>
 	
 </div> -->






