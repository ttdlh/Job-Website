<?php
  session_start();

  if((isset($_SESSION['username']))){
    unset($_SESSION['username']);
  }else if(isset($_SESSION['admin'])){
    unset($_SESSION['admin']);
  }
  header('Location: ../');
?>
