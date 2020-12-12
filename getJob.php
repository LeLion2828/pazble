<?php

header("Content-Type:application/json");
include ("jobFunction.php");

// check if url/?title exists and has a value
if(!empty($_GET['job']))
{
  // use title to get data from getTitle
   $jobs=getJob($_GET['job']);

   //$book contains no information
  if(empty($jobs))
  {
    deliver_response('200','No Job Found',null);
  }
  else
  {
    // $book contains information
    deliver_response('200',' Job Found',$jobs);
  }
}
  else
  {
    deliver_response('404','bad request',null);
  }

  function deliver_response($status, $statusMessage, $data)
{
    header("HTTP/1.1 $status $statusMessage");

   $response['status']=$status;
   $response['statusMessage']=$statusMessage;
   $response['data']=$data;

   // Changes character encoding to utf8.
   function utf8ize( $mixed )
   {
     // checks if $mixed is an array
    if (is_array($mixed))
    {
      // loop over array
        foreach ($mixed as $key => $value)
        {
            // pass back value to this function
            $mixed[$key] = utf8ize($value);
        }
    }
    elseif (is_string($mixed))
    {
      // if $mixed is string, convert the value character encoding
        return mb_convert_encoding($mixed, "UTF-8", "UTF-8");
    }
    return $mixed;
  }

   //Returns a string containing the JSON representation of the supplied value
   $json_response = json_encode(utf8ize($response),JSON_UNESCAPED_SLASHES);
   echo $json_response;
}


 ?>
