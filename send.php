<?php
  session_start();
  $server = "localhost";
  $database = "messenger";
  $username = "root";
  $password = "root";
  $connection = new mysqli($server, $username, $password, $database);

  //check connection is good
  if($connection->connect_error){
    die("Connection failed: ".$connection->connect_error);
  }

  //inserts message into database
  $senderId = $_SESSION['senderId'];
  $msg = $_POST['newMessage'];

  //if message has text, send to server
  if(strlen($msg) > 0){
    $sqlInsert = "INSERT INTO messages (senderId, message) VALUES ('$senderId', '$msg')";
    $result = $connection->query($sqlInsert);

    if($result){
      header("location:home.php?send=success");
    }
    else{
      header("location:home.php?send=fail");
    }
  }
  else{
      header("location:home.php");
  }

?>
