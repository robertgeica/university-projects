<?php include './assets/php/index.php'; ?>
<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
  header("location: ../../AdminLogin.php");
  exit;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Administrator</title>

  <link rel="stylesheet" href="./assets/css/styles.css" />
</head>

<body>
  <header class="header">
    <nav class="navbar"></nav>
  </header>

  <main>
    <section class="admin-info">
      <h3>Logged in as <?php echo htmlspecialchars($_SESSION["email"]); ?>
      </h3>

      <a href="./assets/php/logout.php">Log out</a>
      </p>
    </section>

    <section class="admin-participants">
      <h3>Administrare participanti</h3>
      <table>
        <tr>
          <th>Nume participant</th>
          <th>Email participant</th>
          <th>Adresa participant</th>
          <th>Telefon participant</th>
          <th>Stergere</th>
        </tr>
        <?php
          $result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC");

          while ($user_data = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $user_data['name'] . "</td>";
            echo "<td>" . $user_data['email'] . "</td>";
            echo "<td>" . $user_data['address'] . "</td>";
            echo "<td>" . $user_data['phone'] . "</td>";
            echo "<td><a href='./assets/php/delete-participant.php?id=$user_data[id]'>Delete</a></td></tr>";
          }
        ?>
      </table>
    </section>

    <section class="admin-news">
      <h3>Administrare anunturi</h3>
      <form action="./assets/php/add-news.php" method="post">
        <div class="input-group">
          <label>Titlu</label>
          <input type="text" name="title" value="" />
        </div>

        <div class="input-group">
          <label>Continut</label>
          <input type="text" name="body" value="" />
        </div>

        <div class="input-group">
          <input class="button" type="submit" name="Submit" value="Adauga anunt" />
        </div>
      </form>

      <table>
        <tr>
          <td>Titlu</td>
          <td>Continut</td>
          <td>Data</td>
          <td>Actiuni</td>
        </tr>
        <?php
        $result = mysqli_query($mysqli, "SELECT * FROM news ORDER BY id DESC");

        while ($news = mysqli_fetch_array($result)) { {
            echo "<tr>";
            echo "<td>" . $news['title'] . "</td>";
            echo "<td>" . $news['body'] . "</td>";
            echo "<td>" . $news['created_at'] . "</td>";
            echo "<td>
                <a href='./assets/php/delete-news.php?id=$news[id]'>Delete</a> | <a href='./assets/php/edit-news.php?id=$news[id]'>Edit</a>
              </td>";
            echo "</tr>";
          }
        }
        ?>
      </table>
    </section>


    <section class="admin-results">
      <h3>Administrare rezultate</h3>
      <form action="./assets/php/add-results.php" method="post">
        <div class="input-group">
          <label>Student</label>
          <input type="text" name="student" value="" />
        </div>

        <div class="input-group">
          <label>s1</label>
          <input type="text" name="s1" value="" />
        </div>

        <div class="input-group">
          <label>s2</label>
          <input type="text" name="s2" value="" />
        </div>

        <div class="input-group">
          <label>s3</label>
          <input type="text" name="s3" value="" />
        </div>
        <div class="input-group">
          <label>s4</label>
          <input type="text" name="s4" value="" />
        </div>
        <div class="input-group">
          <label>s5</label>
          <input type="text" name="s5" value="" />
        </div>

        <div class="input-group">
          <input class="button" type="submit" name="Submit" value="Adauga rezultat" />
        </div>
      </form>

      <table>
        <tr>
          <td>Student</td>
          <td>Subiect 1</td>
          <td>Subiect 2</td>
          <td>Subiect 3</td>
          <td>Subiect 4</td>
          <td>Subiect 5</td>
          <td>Nota generala</td>
        </tr>
        <?php
        $result = mysqli_query($mysqli, "SELECT * FROM results ORDER BY id DESC");

        while ($results = mysqli_fetch_array($result)) { {
            echo "<tr>";
            echo "<td>" . $results['student'] . "</td>";
            echo "<td>" . $results['s1'] . "</td>";
            echo "<td>" . $results['s2'] . "</td>";
            echo "<td>" . $results['s3'] . "</td>";
            echo "<td>" . $results['s4'] . "</td>";
            echo "<td>" . $results['s5'] . "</td>";
            echo "<td>
                <a href='./assets/php/delete-results.php?id=$results[id]'>Delete</a> | <a href='./assets/php/edit-results.php?id=$results[id]'>Edit</a>
              </td>";
            echo "</tr>";
          }
        }
        ?>
      </table>

    </section>

  </main>

  <script src="./assets/javascript/script.js"></script>
</body>

</html>