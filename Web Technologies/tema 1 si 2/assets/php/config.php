<?php

$databaseHost = 'localhost';
$databaseName = 'crud_db';
$databaseUsername = 'user';
$databasePassword = 'Password123!';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

if($mysqli === false){
  die("ERROR: Could not connect. " . mysqli_connect_error());
}

?>