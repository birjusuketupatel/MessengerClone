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

  //if username and password not in database, display message
  //if in database, send to home screen
  if(isset($_POST['username']) && isset($_POST['password'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    //correct login if there is exactly 1 entry in table with same user and pass
    $sqlQuery = "SELECT * FROM users WHERE password = '$password' AND username = '$username'";
    $result = $connection->query($sqlQuery);
    $correctLogin = $result->num_rows == 1;

    if($correctLogin){
      $_SESSION['senderId'] = $result->fetch_assoc()['id'];
      $_SESSION['username'] = $username;
      header("location:home.php?login=success");
    }
    else{
      header("location:index.php?login=fail");
    }
  }

  $connection->close();
?>
