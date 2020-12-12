<?php

session_start();
//connecting the database
require('db_config.php');

$user = $_SESSION['user_id'] ;

if(!empty($_POST))
{
	$title = mysqli_real_escape_string($conn,$_POST['title']);
	$desc = mysqli_real_escape_string($conn,$_POST['desc']);
	$address = mysqli_real_escape_string($conn,$_POST['address']);
	$status = 0;

	// var_dump($title, $desc, $address);

	if (empty($title) || empty($desc) || empty($address))
	{

		header("Location: client.php?jobpost=empty");
		exit();

	}
	else
	{

		if(!preg_match("/^[a-zA-Z ]*$/",$title) ||  !preg_match("/^[a-zA-Z ]*$/",$desc))
		{

			header("Location: client.php?jobpost=mistype");
			exit();
		}
		else
		{

			$sql = "INSERT INTO jobs(title,Description,Address,Status) values (?,?,?,?)";

			$stmt = mysqli_stmt_init($conn);

			if(!mysqli_stmt_prepare($stmt, $sql))
			{
				echo "SQL INSERT ERROR";
			}
			else
			{
				//bind the parameters to the placeholder
				mysqli_stmt_bind_param($stmt, "sssi" , $title, $desc, $address, $status);
				//run parameters inside database
				mysqli_stmt_execute($stmt);



				$sqlSelect = "SELECT job_id FROM jobs WHERE title= ? AND Description = ? AND Address = ? AND Status = ?";


				$stmtSelect = mysqli_stmt_init($conn);

				if(!mysqli_stmt_prepare($stmtSelect, $sqlSelect))
				{
					echo "SQL SELECT ERROR";
				}
				else
				{


					mysqli_stmt_bind_param($stmtSelect, "sssi" , $title, $desc, $address, $status);
					//run parameters inside database
					mysqli_stmt_execute($stmtSelect);

					$result = mysqli_stmt_get_result($stmtSelect);

					if(mysqli_num_rows($result) == 1 )
					{

						$row = $result->fetch_assoc();

						$job = $row['job_id'];


						$sqljob_post = "INSERT INTO boss_post_job(job_id,user_id,date_posted) VALUES (?,?,?)";

						$stmtfkpk = mysqli_stmt_init($conn);


						if(!mysqli_stmt_prepare($stmtfkpk,$sqljob_post))
						{

							echo "SQL post_job table ERROR";

						}
						else
						{

							$today = date("Y-m-d H:i:s");

							var_dump($today);



							// bind the parameters to the placeholder
							mysqli_stmt_bind_param($stmtfkpk, "iis" , $job, $user,$today);
							//run parameters inside database
							mysqli_stmt_execute($stmtfkpk);


							header("Location: bossprofile.php?jobpost=success");
							exit();

						}

					}


				}



			}

		}

	}

}
