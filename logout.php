<?php
  session_start();
  unset($_SESSION['username']);
  unset($_SESSION['senderId']);
  header("location:index.php");
?>
