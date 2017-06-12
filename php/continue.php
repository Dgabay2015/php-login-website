<?php // continue.php
  session_start();

  if (isset($_SESSION['userid']))
  {
    $username = $_SESSION['userid'];
    $password = $_SESSION['password'];

    echo "Welcome back .<br>
          Your full name is e.<br>
          Your username is '$username'
          and your password is '$password'.";
  }
  else echo "Please <a href='auth.php'>click here</a> to log in.";
?>
