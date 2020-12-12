<?php

DEFINE('DB_USER','root');
DEFINE('DB_PASSWORD','access123');
DEFINE('DB_HOST','localhost');
DEFINE('DB_NAME','pazble');

function getTitle($id)
{
  //connecting to the database
  $conn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) OR die('could not connect to my MySQL: '.mysqli_connect_error(1));

// sql query from two table(join)
  $query="Select U.user_id,U.Firstname,U.Lastname,J.title,J.Description,J.Address,J.Status,BJ.date_posted 
  From users U,jobs J,boss_post_job BJ 
  WHERE U.user_id = BJ.user_id
  AND J.job_id = BJ.job_id
  AND U.user_id = $id";

   //Performs a query on the database
  $result= mysqli_query($conn,$query);

  $jobs = [];

  if($result)
  {
    //Fetch a result row as an associative, a numeric array, or both
      while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
      {
        //row['poster']
        //row['id']
        // $movie_details['id']=$row['id'];
        // $book_details['title']=$row['title'];
        // $book_details['description']=$row['description'];
        // $book_details['publication_Year']=$row['publication_Year'];
        // $book_details['ISBN']=$row['ISBN'];
        // $book_details['quantity_Sold']=$row['quantity_Sold'];
        // $book_details['coverphoto']=$row['coverphoto'];
        // $book_details['author']=$row['name'];

        // push (insert at end of array) into array current $row.
        $jobs[] = $row;
        // yield $book_details;

      }
  }

  return $jobs;
}



function getJob($job)
{
  //connecting to the database
  $conn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) OR die('could not connect to my MySQL: '.mysqli_connect_error(1));

// sql query from two table(join)
  $query="Select U.user_id,U.Firstname,U.Lastname,U.phone,J.job_id,J.title,J.Description,J.Address,BJ.date_posted,BJ.postjob_id
  From users U,jobs J,boss_post_job BJ 
  WHERE U.user_id = BJ.user_id
  AND J.job_id = BJ.job_id
  ORDER BY BJ.date_posted DESC";

   //Performs a query on the database
  $result= mysqli_query($conn,$query);

  $jobs = [];

  if($result)
  {
    //Fetch a result row as an associative, a numeric array, or both
      while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
      {
        //row['poster']
        //row['id']
        // $movie_details['id']=$row['id'];
        // $book_details['title']=$row['title'];
        // $book_details['description']=$row['description'];
        // $book_details['publication_Year']=$row['publication_Year'];
        // $book_details['ISBN']=$row['ISBN'];
        // $book_details['quantity_Sold']=$row['quantity_Sold'];
        // $book_details['coverphoto']=$row['coverphoto'];
        // $book_details['author']=$row['name'];

        // push (insert at end of array) into array current $row.
        $jobs[] = $row;
        // yield $book_details;

      }
  }

  return $jobs;
}


function getSearchJob($job)
{
  //connecting to the database
  $conn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) OR die('could not connect to my MySQL: '.mysqli_connect_error(1));

// sql query from two table(join)
  $query="Select U.user_id,U.Firstname,U.Lastname,U.phone,J.job_id,J.title,J.Description,J.Address,BJ.postjob_id,BJ.date_posted,BJ.postjob_id
  From users U,jobs J,boss_post_job BJ 
  WHERE U.user_id = BJ.user_id
  AND J.job_id = BJ.job_id
  AND J.title LIKE '%$job%'
  ORDER BY BJ.date_posted DESC";

   //Performs a query on the database
  $result= mysqli_query($conn,$query);

  $jobs = [];

  if($result)
  {
    //Fetch a result row as an associative, a numeric array, or both
      while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
      {
        //row['poster']
        //row['id']
        // $movie_details['id']=$row['id'];
        // $book_details['title']=$row['title'];
        // $book_details['description']=$row['description'];
        // $book_details['publication_Year']=$row['publication_Year'];
        // $book_details['ISBN']=$row['ISBN'];
        // $book_details['quantity_Sold']=$row['quantity_Sold'];
        // $book_details['coverphoto']=$row['coverphoto'];
        // $book_details['author']=$row['name'];

        // push (insert at end of array) into array current $row.
        $jobs[] = $row;
        // yield $book_details;

      }
  }

  return $jobs;
}



function getcomments($comment)
{
  //connecting to the database
  $conn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) OR die('could not connect to my MySQL: '.mysqli_connect_error(1));

// sql query from two table(join)
  $query="SELECT * 
  FROM happenings
  WHERE LIKE '%$comment%'";

   //Performs a query on the database
  $result= mysqli_query($conn,$query);

  $jobs = [];

  if($result)
  {
    //Fetch a result row as an associative, a numeric array, or both
      while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
      {
        //row['poster']
        //row['id']
        // $movie_details['id']=$row['id'];
        // $book_details['title']=$row['title'];
        // $book_details['description']=$row['description'];
        // $book_details['publication_Year']=$row['publication_Year'];
        // $book_details['ISBN']=$row['ISBN'];
        // $book_details['quantity_Sold']=$row['quantity_Sold'];
        // $book_details['coverphoto']=$row['coverphoto'];
        // $book_details['author']=$row['name'];

        // push (insert at end of array) into array current $row.
        $jobs[] = $row;
        // yield $book_details;

      }
  }

  return $jobs;
}



function followers($follow)
{
  //connecting to the database
  $conn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) OR die('could not connect to my MySQL: '.mysqli_connect_error(1));

// sql query from two table(join)
  $query="SELECT * FROM users
  WHERE Firstname LIKE '%$follow%' OR Lastname LIKE '%$follow%' ";

   //Performs a query on the database
  $result= mysqli_query($conn,$query);

  $jobs = [];

  if($result)
  {
    //Fetch a result row as an associative, a numeric array, or both
      while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
      {
        //row['poster']
        //row['id']
        // $movie_details['id']=$row['id'];
        // $book_details['title']=$row['title'];
        // $book_details['description']=$row['description'];
        // $book_details['publication_Year']=$row['publication_Year'];
        // $book_details['ISBN']=$row['ISBN'];
        // $book_details['quantity_Sold']=$row['quantity_Sold'];
        // $book_details['coverphoto']=$row['coverphoto'];
        // $book_details['author']=$row['name'];

        // push (insert at end of array) into array current $row.
        $jobs[] = $row;
        // yield $book_details;

      }
  }

  return $jobs;
}