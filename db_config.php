<?php

DEFINE('DB_USER','root');
DEFINE('DB_PASSWORD','access123');
DEFINE('DB_HOST','localhost');
DEFINE('DB_NAME','pazble');


//connect to the database
$conn = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME) OR die('could not connect to my MySQL: '.mysqli_connect_error(1));


 ?>
