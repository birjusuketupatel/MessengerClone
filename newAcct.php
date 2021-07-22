<?php
  session_start();
?>

<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width = device-width, initial-scale = 1">
    <title>New Account | My Messenger</title>
    <link rel="icon" type="image/png" href="images/favicon.png">
  </head>

  <body>
    <div class="login-container">
        <h1>Create An Account</h1>

        <?php
          if(isset($_GET['createAcct']) && $_GET['createAcct'] == "fail"){
            echo "<p class='fail-message'>username already exists</p>";
          }
        ?>

        <form method="post" action="createAcct.php">
          <label for="firstName">First Name</label>
          <br>
          <input id="firstName" class="text-input" type="text" name="firstName" required>
          <br>

          <label for="lastName">Last Name</label>
          <br>
          <input id="lastName" class="text-input" type="text" name="lastName" required>
          <br>

          <label for="username">New Username</label>
          <br>
          <input id="username" class="text-input" type="text" name="username" required>
          <br>

          <label for="password">New Password</label>
          <br>
          <input id="password" class="text-input" type="password" name="password" required>
          <br>

          <input class="submit-button" type="submit" value="Submit">
        </form>
    </div>
  </body>
</html>
