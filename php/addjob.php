<?
  session_start();
  if(!(isset($_SESSION['username']))){
    header('Location: index.php');
  }

  if(isset($_POST['add'])){
    require_once("database_connection");
    #-
    $query= 'insert into job_offer(job_title, company, category, address) VALUES()';
  }
?>
