<?php
include_once("config.php");

if (isset($_POST['update'])) {
  $id = $_POST['id'];
  $title = $_POST['title'];
  $body = $_POST['body'];

  $result = mysqli_query($mysqli, "UPDATE news SET title='$title',body='$body' WHERE id=$id");

  header("Location: ../../admin.php");
}
?>

<?php
$id = $_GET['id'];
$result = mysqli_query($mysqli, "SELECT * FROM news WHERE id=$id");

while ($news = mysqli_fetch_array($result)) {
  $title = $news['title'];
  $body = $news['body'];
}
?>

<html>

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Editare anunt</title>

  <link rel="stylesheet" href="../css/styles.css" />

</head>

<body>

  <div class="register-container">
    <a class="button" href="../../admin.php">Back</a>

    <br></br>
    <form method="post" action="edit-news.php">
      <div class="input-group">
        <label>Titlu</label>
        <input type="text" name="title" value=<?php echo $title; ?>>
      </div>


      <div class="input-group">
        <label>Continut</label>
        <input type="text" name="body" value=<?php echo $body; ?>>
      </div>

      <div class="input-group">
        <td><input type="hidden" name="id" value=<?php echo $_GET['id']; ?>></td>
        <input class="button" type="submit" name="update" value="Update">
      </div>
    </form>
  </div>
</body>

</html>