<?php
if (isset($_POST['Submit'])) {
  $title = $_POST['title'];
  $body = $_POST['body'];

  include_once("config.php");

  $result = mysqli_query($mysqli, "INSERT INTO news(title,body) VALUES('$title','$body')");

  header("location: ../../admin.php");
}
?>
