<?php
  session_start();

  if(!isset($_SESSION['username'])){
    header("location:index.php");
  }
?>

<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="css/style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width = device-width, initial-scale = 1">
    <title>Home | My Messanger</title>
    <link rel="icon" type="image/png" href="images/favicon.png">
  </head>

  <body>
    <div class="console">
      <div class="account-bar">
        <?php
          $username = $_SESSION['username'];
          $out = "<span class='currUser'>$username</span>";
          echo $out;
        ?>
        <span class="right"><a class="logout" href="logout.php">Log Out</a></span>
      </div>

      <div class="messages">
        <table>
          <tbody>
              <!-- loads all messages from server and displays them -->
              <?php
                //creates connection
                $server = "localhost";
                $database = "messenger";
                $username = "root";
                $password = "root";
                $connection = new mysqli($server, $username, $password, $database);

                if($connection->connect_error){
                  die("Connection failed: ".$connection->connect_error);
                }

                //selects all messages
                $messageQuery = "SELECT * FROM messages";
                $allMessages = $connection->query($messageQuery);

                //displays messages on screen in chronological order
                for($i = 0; $i < $allMessages->num_rows; $i++){
                  $currMessage = $allMessages->fetch_assoc();
                  $userQuery = "SELECT username FROM users WHERE id = ".$currMessage['senderId'];
                  $currUsername = $connection->query($userQuery);

                  $output = "<tr class='message'>
                              <td class='sender'>".$currUsername->fetch_array()[0]."</td>
                              <td class='text'>".$currMessage['message']."</td>
                              <td class='timestamp'>".$currMessage['timeSent']."</td>
                             </tr>";

                  echo $output;
                }
              ?>
            </tbody>
        </table>
      </div>

      <div class="controls">
        <form method="post" action="send.php">
          <textarea id="newMessage" name="newMessage" placeholder="New Message..." maxlength="1048"></textarea>
          <br>
          <input id="send" type="submit" value="Send">
        </form>
      </div>
    </div>
  </body>
</html>
