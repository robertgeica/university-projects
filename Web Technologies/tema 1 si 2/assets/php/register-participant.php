<?php

if (isset($_POST['Submit'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];

  include_once("config.php");

  $result = mysqli_query($mysqli, "INSERT INTO users(name,email,address,phone) VALUES('$name','$email','$address','$phone')");
  header("location: ../../Participanti.php");
}
