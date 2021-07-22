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

  //if username is unique, add new account to database
  //else mark as failed
  if(isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['username']) && isset($_POST['password'])){
    $fName = $_POST['firstName'];
    $lName = $_POST['lastName'];
    $uName = $_POST['username'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$uName'";
    $result = $connection->query($sql);

    if($result->num_rows == 0){
      $sql = "INSERT INTO users (firstName, lastName, username, password)
      VALUES ('$fName', '$lName', '$uName', '$pass')";
      $connection->query($sql);
      header("location:index.php?createAcct=success");
    }
    else{
      header("location:newAcct.php?createAcct=fail");
    }
  }
  else{
    header("location:newAcct.php?createAcct=fail");
  }
?>
