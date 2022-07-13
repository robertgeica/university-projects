<?php include './assets/php/index.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Participanti</title>

  <link rel="stylesheet" href="./assets/css/styles.css" />
</head>

<body>
  <header class="header">
    <nav class="navbar"></nav>
  </header>

  <main>
    <section class="participants-info">
      <h3>Participanti</h3>
      <p>
        Daca dupa inscriere numele tau nu apare in lista de mai jos, <a href="/Contact.php">contacteaza-ne</a> pentru a remedia problema.
      </p>
    </section>

    <section class="participants-list">

      <?php
        $result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC");

        while ($user_data = mysqli_fetch_array($result)) {
          echo "<div class='participant-info'>";
          echo "<h2>" . $user_data['name'] . "</h2>";
          echo "<p>" . $user_data['email'] . "</p>";
          echo "</div>";
        }
      ?>

    </section>
  </main>
  <footer class="footer">
  </footer>
  <script src="./assets/javascript/script.js"></script>
</body>

</html>