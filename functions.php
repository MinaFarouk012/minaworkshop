<?php 

if(!isset($_SESSION)){ 
      session_start(); 
  }  
$db_name = "employee";
$db_username = "mina";
$db_password = "mina12";
$db_server = "localhost";

$con = new mysqli($db_server,$db_username,$db_password,$db_name);

if($con->connect_error)
{
    die($con->connect_error);
}

function validate_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  $data = substr($data, 0, 255);
  return $data;
}

$app_id = "1055614";
$key = "25e0cc929c639cd3a5f6";
$secret = "a14285331a6b3247716e";
$cluster = "mt1";


function validate_input_number($data) {
  $data = is_int($data);
  $data = substr($data, 0, 250);
  if ($data = TRUE) {
    return $data;
  }
  return FALSE;
}

