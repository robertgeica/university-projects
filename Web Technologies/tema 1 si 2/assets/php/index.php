<?php
include_once("config.php");

$result = mysqli_query($mysqli, "SELECT * FROM admins ORDER BY id DESC");

?>
