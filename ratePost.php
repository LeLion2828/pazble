<?php

session_start();
require('db_config.php');


$hapen_id = explode("_", $_REQUEST['hapen_id']);
$hapen_id = intval($hapen_id[count($hapen_id) - 1]);

$raters = select($conn, "SELECT raters FROM happenings WHERE hapen_id = ?", [$hapen_id]);
$raters = json_decode($raters[0], true);
$raters = empty($raters)?[]:$raters;

if(!in_array($_SESSION['user_id'], $raters)){
    $raters[$_SESSION['user_id']] = $_SESSION['user_id'];

    $raters = array_filter($raters, function($value){
      return !empty($value);
    });

    $sql = "UPDATE happenings SET raters = ? WHERE hapen_id = ? ";
    exec_sql($conn, $sql, [ json_encode($raters), $hapen_id]);

    echo json_encode(["has_added" => true]);
}else{
    echo json_encode(["has_added" => false]);
}


//exec_sql, insert, delete or update dataset of a specified table
function exec_sql($connection, $sql, $data){
    isset_connection($connection);

    $stmt = $connection->prepare($sql);
    $stmt->bind_param(types($data), ...$data);
    $stmt->execute();

    $stmt->close();
}

function types($sets){
      $type_ref = ["integer" => "i", "double" => "d", "string" => "s", "blob" => "b"];
      $types = "";

      foreach($sets as $set){
          if(array_key_exists(gettype($set), $type_ref)){
              $types .= $type_ref[gettype($set)];
          }
      }

      return $types;
}

//select, return result set matching sql statement
function select($connection, $sql, $operands){
    isset_connection($connection);

    $stmt = $connection->prepare($sql);
    //uses the splat operator to unpack the array as arguments
    $stmt->bind_param(types($operands), ...$operands);
    $stmt->execute();

    //create variables dynamicaly and unpack it using splat operator
    $variable_ref = create_variables($stmt->field_count);
    $stmt->bind_result(...$variable_ref);
    $stmt->fetch();
    $stmt->close();

    return $variable_ref;
}

function isset_connection($connection){
    if(empty($connection)){
        throw new Exception('[FAILED] Connection to database could not be retrieved');
    }
}

//create_variables, dynamically create and init variables
function create_variables($amount){
    $variable_ref = [];

    for($i = 0; $i < $amount; $i++){
        ${'var_'.$i} = null;
        array_push($variable_ref, ${'var_'.$i});
    }

    return $variable_ref;
}

function db_disconnect($connection){
    $connection->close();
}
