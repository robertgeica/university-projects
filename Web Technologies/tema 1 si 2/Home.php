<?php include './assets/php/index.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Hack your way</title>

  <link rel="stylesheet" href="./assets/css/styles.css" />
</head>

<body>
  <header class="header">
    <nav class="navbar">
    </nav>


    <div class="header-intro">
      <img src="./assets/img/logo.png" class="intro-logo" />

      <div class="header-intro-infos">
        <h1 class="intro-title">HACK YOUR WAY</h1>
        <h2 class="intro-date">7-27 Iunie, 2021</h2>

        <div class="intro-location">
          <img class="intro-location-logo" src="./assets/img/location-logo.png" />
          <h3 class="intro-location">Universitatea din Craiova</h3>
        </div>

        <p class="intro-presentation">
          Hack your way este un concurs de programare organizat de Universitatea din Craiova.
        </p>

        <a href="./Inregistrare.html" class="button intro-register">Inregistreaza-te!</a>
      </div>
    </div>
  </header>

  <main>
    <section class="content-news">
      <h3>Ce este Hack Your Way?</h3>
      <p>
      Departamentul de Informatica al Facultatii de Stiinte din cadrul Universitatii din Craiova impreuna cu „Asociatia Societatea pentru Tehnologii Computationale” organizeaza premierea celor mai buni studenti informaticieni prin acordarea a 8 burse private oferite cu sprijinul companiilor Caphyon, NetRom Software si Syncro Soft.


      </p>
      <p>
      Doritorii pot transmite dosarele de candidatura online, prin email la adresa office@inf.ucv.ro.
      </p>
      <a class="button" href="/Regulament.html">Vezi mai mult</a>
    </section>

    <section class="content-topics">
      <h3>Limbaje de programare permise</h3>

      <div class="content-topics-cards">
        <div class="topic-card">
          <a href="/Subiecte.html">
            <img class="sponsor-img" src="./assets/img/js.png" />
            <p>JavaScript</p>
          </a>
        </div>

        <div class="topic-card">
          <a href="/Subiecte.html">
            <img class="sponsor-img" src="./assets/img/python.png" />
            <p>Python</p>
          </a>
        </div>

        <div class="topic-card">
          <a href="/Subiecte.html">
            <img class="sponsor-img" src="./assets/img/php.png" />
            <p>PHP</p>
          </a>
        </div>

        <div class="topic-card">
          <a href="/Subiecte.html">
            <img class="sponsor-img" src="./assets/img/c++.png" />
            <p>C++</p>
          </a>
        </div>

        <div class="topic-card">
          <a href="/Subiecte.html">
            <img class="sponsor-img" src="./assets/img/java.png" />
            <p>Java</p>
          </a>
        </div>

        <div class="topic-card ">
          <a href="/Subiecte.html">
            <img class="sponsor-img" src="./assets/img/bash.png" />
            <p>Bash</p>
          </a>
        </div>
      </div>
    </section>

    <section class="content-sponsors">
      <h3>Sponsorii nostri</h3>

      <img class="sponsor-img" src="./assets/img/google.png" />
      <img class="sponsor-img" src="./assets/img/microsoft.png" />
      <img class="sponsor-img" src="./assets/img/canonical.png" />
      <img class="sponsor-img" src="./assets/img/apple.png" />
      <img class="sponsor-img" src="./assets/img/bitdefender.png" />
    </section>
  </main>

  <footer class="footer">
  </footer>


  <script src="./assets/javascript/script.js"></script>
</body>

</html>