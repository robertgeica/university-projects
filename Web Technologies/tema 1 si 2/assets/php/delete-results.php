<?php
include_once("config.php");

$id = $_GET['id'];
$result = mysqli_query($mysqli, "DELETE FROM results WHERE id=$id");

header("Location:../../admin.php");
?>