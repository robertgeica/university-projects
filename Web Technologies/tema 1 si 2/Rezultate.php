<?php include './assets/php/index.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Rezultate</title>

  <link rel="stylesheet" href="./assets/css/styles.css" />
</head>

<body>
  <header class="header">
    <nav class="navbar"></nav>
  </header>

  <main>
    <section class="results-info">
      <h3>Rezultate</h3>
      <p>
        Mai jos puteti gasi punctajul pe subiecte pentru fiecare student, dar si punctajul general.
      </p>
    </section>

    <section class="results-table">
      <table>
        <tr>
          <th>Student</th>
          <th>Rezultat S1</th>
          <th>Rezultat S2</th>
          <th>Rezultat S3</th>
          <th>Rezultat S4</th>
          <th>Rezultat S5</th>
          <th>Rezultat general</th>
        </tr>
        <?php
          $result = mysqli_query($mysqli, "SELECT * FROM results ORDER BY id DESC");

          while ($results = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $results['student'] . "</td>";
            echo "<td>" . $results['s1'] . "</td>";
            echo "<td>" . $results['s2'] . "</td>";
            echo "<td>" . $results['s3'] . "</td>";
            echo "<td>" . $results['s4'] . "</td>";
            echo "<td>" . $results['s5'] . "</td>";


            echo "<td>" . $results['s1'] . "</td>";
            echo "</tr>";
          }
        ?>
      </table>
    </section>

  </main>

  <script src="./assets/javascript/script.js"></script>
</body>

</html>