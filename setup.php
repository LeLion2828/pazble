<?php

session_start();

require('db_config.php');

$user_id = $_SESSION['user_id'];

// var_dump($user_id);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>setup</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href="css/form.css" rel="stylesheet">

	<link rel="stylesheet" href="bootstrap/bootstrap.min.css">
	<script src="bootstrap/jquery.min.js"></script>
	<script src="bootstrap/popper.min.js"></script>
	<script src="bootstrap/bootstrap.min.js"></script>

	<!-- CDN -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body class="container-fluid"><br/>


	<div class="wrapper2">

	<div class="row">
		<div class="col">
			<h1 class="text-center">Set up account</h1>
		</div>
	</div><br/>


<div class="row">
	<div class="col text-center">

		<form action="upload.php" method="post" enctype="multipart/form-data">

			<input type="file"  name="file" required><br><br>

		</div>
	</div>

	<div class="row">
		<div class="col text-center">

			<?php
			$sqlImg = "SELECT * FROM users WHERE user_id = $user_id";
			$resultImg = mysqli_query($conn,$sqlImg);
			while($rowImg = mysqli_fetch_assoc($resultImg))
			{
				if($rowImg['status_check'] == 1)
				{
					echo "<img src='".$rowImg['gravatar']."' style='width:100px;height:100px;border-radius:50%;'>";
				}
				else
				{
					echo " error uploading pic";
				}
			}

			?>

		</div>
	</div><br/>

	<div class="row">
		<div class="col text-center">


			<button type="submit" class="btn btn-success"  name='upload'>Upload image</button>

		</div>

	</form>
</div><br/>



<div class="row">
	<div class="col text-center">
		<?php
		$fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		// var_dump($fullUrl);

		if(strpos($fullUrl,"upload=type") == true)
		{
			echo "<h4 class='text-danger'>The type of the image is not accepted.</h4>";

		}
		elseif(strpos($fullUrl,"upload=error") == true)
		{
			echo "<h4 class='text-danger'>An error occured while uploading please try again</h4>";

		}
		elseif(strpos($fullUrl,"upload=large") == true)
		{
			echo "<h4 class='text-danger'>The image is too large</h4>";

		}


		?>
	</div>
</div>

<div class="row">
	<div class="col text-center">
		<form action="setupVal.php" method="post">
			<h5>Choose your perspective</h5>
											<div class="form-check form-check-inline">
													<input class="form-check-input" type="radio" name="user" id="client" value="client" onclick="mytask()"  required>
													<label class="form-check-label" for="client">
															Boss
													</label>
											</div>
											<div class="form-check form-check-inline">
													<input class="form-check-input" type="radio" name="user" id="worker"  value="worker" onclick="mytask()">
													<label class="form-check-label" for="worker">
															Worker
													</label>
											</div>


											<div class="form-group" id="output"></div>

											<input class="btn btn-info" type="submit" name="submission" value="Save"><br/>
		</form>
	</div>
</div><br/>

</div>

 <?php include('footer.php') ?>



<script>

function mytask()
{
    if(document.getElementById('client').checked)
    {
        document.getElementById("output").innerHTML= "";
    }
    else if (document.getElementById('worker').checked)
    {
        document.getElementById("output").innerHTML += '<br/> <div class="form-input">';
				document.getElementById("output").innerHTML += '<i class="fa fa-user fa-2x customize" aria-hidden="true"></i>';
				document.getElementById("output").innerHTML += '<input type="text" name="service" placeholder="Service" required><br/>';
				document.getElementById("output").innerHTML += ' <i class="fa fa-user-secret fa-2x customize" aria-hidden="true"></i>';
				document.getElementById("output").innerHTML += '<input type="text" name="category" placeholder="Category" required><br/>';
				document.getElementById("output").innerHTML += '<textarea id="desc" name="desc" rows="4" cols="50" placeholder="Description" required></textarea><br/>';
				// document.getElementById("output").innerHTML += '<i class="fa fa-user-secret fa-2x customize" aria-hidden="true"></i>';
				// document.getElementById("output").innerHTML += '<input type="text" name="desc" placeholder="Description"><br/>';
				document.getElementById("output").innerHTML += '<i class="fa fa-user-secret fa-2x customize" aria-hidden="true"></i>';
				document.getElementById("output").innerHTML += '<input type="text" name="rate" placeholder="Rate" required><br/></div>';


    }
}


</script>


</body>
</html>
