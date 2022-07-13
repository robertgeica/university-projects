<?php include './assets/php/index.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Noutati</title>

  <link rel="stylesheet" href="./assets/css/styles.css" />
</head>

<body>
  <header class="header">
    <nav class="navbar"></nav>
  </header>

  <main>
    <section class="news-info">
      <h3>Ultimele anunturi</h3>
      <p>
        Verifica des aceasta pagina pentru a nu pierde detalii si anunturi importante despre acest concurs de programare.
      </p>
      <p>
        Pentru a te inregistra viziteaza pagina <a href="/Inregistrare.html">asta</a>!
      </p>
    </section>

    <section class="news-list">

      <?php
      $result = mysqli_query($mysqli, "SELECT * FROM news ORDER BY id DESC");

      while ($news = mysqli_fetch_array($result)) {
        echo "<div class='news-element'>";
        echo "<h4>" . $news['title'] . "</h4>";
        echo "<span>" . $news['created_at'] . "</span>";
        echo "<p>" . $news['body'] . "</p>";
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