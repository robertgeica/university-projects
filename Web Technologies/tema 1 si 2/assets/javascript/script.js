const navbarTemplate = `
  <ul class="navbar-list">
    <li><a href="Home.php">Home</a></li>
    <li><a href="./Regulament.html">Regulament</a></li>
    <li><a href="./Organizatori.html">Organizatori</a></li>
    <li><a href="./Sponsori.html">Sponsori</a></li>
    <li><a href="./Noutati.php">Noutati</a></li>
    <li><a href="./Participanti.php">Participanti</a></li>
    <li><a href="./Subiecte.html">Subiecte</a></li>
    <li><a href="./Rezultate.php">Rezultate</a></li>
    <li><a href="./Contact.php">Contact</a></li>
  </ul>
`;

const navbarDOMList = document.getElementsByClassName("navbar");
navbarDOMList[0].innerHTML = navbarTemplate;


const footerTemplate = `
  <ul>
    <li><a href="/">FAQ</a></li>
    <li><a href="/">Code of Conduct</a></li>
    <li><a href="/">Privacy Policy</a></li>
  </ul>

  <p>Copyright - All rights reserved.</p>
`;

const footerDOMList = document.getElementsByClassName('footer');
footerDOMList[0].innerHTML = footerTemplate;