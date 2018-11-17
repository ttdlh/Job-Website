<?
  session_start();

  if((isset($_SESSION['username']))){
    header('Location: index.php');
  }

  if(isset($_POST['signup'])){
    require_once('database_connection.php');

    if(isset($_POST['']))
    $_POST

  }
?>
