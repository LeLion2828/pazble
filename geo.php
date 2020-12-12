<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://freegeoip.app/json/",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "accept: application/json",
    "content-type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}


// Calling Abstract API endpoint using CURL library (http://us3.php.net/curl)
// $ch = curl_init('https://ipgeolocation.abstractapi.com/v1/?api_key=94ddaec6bdf84c74a286eee0c596cf65&ip_address=102.115.229.89');
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// curl_setopt($ch, CURLOPT_HEADER, 0);
// $data = curl_exec($ch);
// curl_close($ch);