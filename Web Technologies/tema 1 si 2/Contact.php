<?php
header("Access-Control-Allow-Origin: *");
$rest_json = file_get_contents("php://input");
$_POST = json_decode($rest_json, true);


if ($_POST)
	{

	// set response code - 200 OK

	http_response_code(200);
	$subject = $_POST['subject'];
	$to = "geicarobert@gmail.com";
	$from = $_POST['email'];

	// data

	$msg = $_POST['name'] . $_POST['content'] ;

	// Headers

	$headers = "MIME-Version: 1.0\r\n";
	$headers.= "Content-type: text/html; charset=UTF-8\r\n";
	$headers.= "From: <" . $from . ">";
	mail($to, $subject, $msg, $headers);

	// echo json_encode( $_POST );

	echo json_encode(array(
		"sent" => true
	));
	}
  else
	{

	// tell the user about error

	echo json_encode(["sent" => false, "mesaj" => "Something went wrong"]);
	}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact</title>

  <link rel="stylesheet" href="./assets/css/styles.css" />
</head>

<body>
  <header class="header">
    <nav class="navbar"></nav>
  </header>

  <main>
    <section class="contact-info">
      <h3>Contact</h3>
      <p>
        Ai o problema sau nevoie de o informatie? Nu ezita sa ne contactezi prin formularul de mai jos!
      </p>
    </section>

    <section class="contact-container">
      <form action="/Contact.php">
        <label for="name">Numele complet</label>
        <input type="text" id="name" name="name" placeholder="Prenume Nume" />

        <label for="subject">Subiect</label>
        <input type="text" id="subject" name="subject" placeholder="Subiect" /> 
        
        <label for="email">Email</label>
        <input type="text" id="email" name="email" placeholder="Email" />

        <label for="content">Continut</label>
        <textarea id="content" name="content" placeholder="Continut" style="height: 200px"></textarea>

        <input type="submit" value="Trimite" class="button" />
      </form>
    </section>
  </main>

  <footer class="footer">
    
  </footer>

  <script src="./assets/javascript/script.js"></script>
</body>

</html>