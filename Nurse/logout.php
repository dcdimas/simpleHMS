<?php 
  session_start();
  session_destroy();
  unset($_SESSION["username"]);
  $_SESSION = array();
  header("location: ../index.php");
?>
