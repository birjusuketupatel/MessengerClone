<?php
  session_start();
?>

<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width = device-width, initial-scale = 1">
    <title>Login | My Messenger</title>
    <link rel="icon" type="image/png" href="images/favicon.png">
  </head>

  <body>
    <div class="login-container">
        <h1>My Messanger</h1>
        <img class="logo" type="image/png" src="images/email.png" alt="Login">

        <?php
          if(isset($_GET['login']) && $_GET['login'] == "fail"){
            echo "<p class='fail-message'>incorrect username or password</p>";
          }
        ?>

        <form method="post" action="login.php">
          <label for="username">Username</label>
          <br>
          <input id="username" class="text-input" type="text" name="username" required>
          <br>

          <label for="password">Password</label>
          <br>
          <input id="password" class="text-input" type="password" name="password" required>
          <br>

          <a href="newAcct.php">Create an account</a>
          <br>

          <input id="login" class="submit-button" type="submit" value="Login">
        </form>
    </div>
  </body>
</html>
