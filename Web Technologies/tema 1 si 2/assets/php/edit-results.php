<?php
include_once("config.php");

if (isset($_POST['update'])) {
  $id = $_POST['id'];
  $student = $_POST['student'];
  $s1 = $_POST['s1'];
  $s2 = $_POST['s2'];
  $s3 = $_POST['s3'];
  $s4 = $_POST['s4'];
  $s5 = $_POST['s5'];

  $result = mysqli_query($mysqli, "UPDATE results SET student='$student',s1='$s1',s2='$s2',s3='$s3',s4='$s4',s5='$s5' WHERE id=$id");

  header("Location: ../../admin.php");
}
?>

<?php
$id = $_GET['id'];
$result = mysqli_query($mysqli, "SELECT * FROM results WHERE id=$id");

while ($results = mysqli_fetch_array($result)) {
  $student = $results['student'];
  $s1 = $results['s1'];
  $s2 = $results['s2'];
  $s3 = $results['s3'];
  $s4 = $results['s4'];
  $s5 = $results['s5'];
}
?>

<html>

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Editare rezultat</title>
  <link rel="stylesheet" href="../css/styles.css" />

</head>

<body>

  <div class="register-container">
    <a class="button" href="../../admin.php">Back</a>

    <br></br>
    <form method="post" action="edit-results.php">
      <div class="input-group">
        <label>Student</label>
        <input type="text" name="student" value=<?php echo $student; ?>>
      </div>


      <div class="input-group">
        <label>Subiect 1</label>
        <input type="text" name="s1" value=<?php echo $s1; ?>>
      </div>

      <div class="input-group">
        <label>Subiect 2</label>
        <input type="text" name="s2" value=<?php echo $s2; ?>>
      </div>

      <div class="input-group">
        <label>Subiect 3</label>
        <input type="text" name="s3" value=<?php echo $s3; ?>>
      </div>

      <div class="input-group">
        <label>Subiect 4</label>
        <input type="text" name="s4" value=<?php echo $s4; ?>>
      </div>

      <div class="input-group">
        <label>Subiect 5</label>
        <input type="text" name="s5" value=<?php echo $s5; ?>>
      </div>

      <div class="input-group">
        <td><input type="hidden" name="id" value=<?php echo $_GET['id']; ?>></td>
        <input class="button" type="submit" name="update" value="Update">
      </div>
    </form>
  </div>
</body>

</html>