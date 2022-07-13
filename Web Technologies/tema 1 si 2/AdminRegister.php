<?php include './assets/php/signup.php';?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin</title>

  <link rel="stylesheet" href="./assets/css/styles.css" />
</head>

<body>
  <header class="header">
    <nav class="navbar"></nav>
  </header>

  <main>
    <section class="register-info">
      <h3>Register Admin</h3>
    </section>

    <section class="register-container">

      <div>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
          <div class="input-group">
            <label>Email</label>
            <input type="text" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
            <span class="invalid-feedback"><?php echo $email_err; ?></span>
          </div>

          <div class="input-group">
            <label>Password</label>
            <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
            <span class="invalid-feedback"><?php echo $password_err; ?></span>
          </div>

          <div class="input-group">

            <label>Confirm Password</label>
            <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
            <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
          </div>

          <div class="input-group">
            <input class="button" type="submit" name="Submit" value="Sign up" />
          </div>
        </form>
      </div>


      
    </section>


  </main>

  <script src="./assets/javascript/script.js"></script>
</body>

</html>