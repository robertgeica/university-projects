<?php

if (isset($_POST['Submit'])) {
  $student = $_POST['student'];
  $s1 = $_POST['s1'];
  $s2 = $_POST['s2'];
  $s3 = $_POST['s3'];
  $s4 = $_POST['s4'];
  $s5 = $_POST['s5'];

  include_once("config.php");

  $result = mysqli_query($mysqli, "INSERT INTO results(student, s1, s2, s3, s4, s5) VALUES('$student','$s1','$s2','$s3','$s4','$s5')");


  header("location: ../../admin.php");
}
?>
