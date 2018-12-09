<?php
  if(isset($_POST['edit'])){
    require_once('database_connection.php');
    if($_POST['oldusername'] != $_POST['username']){
      $query= 'select * from users where username= "'. $_POST['username'] .'"';
      if($row= mysqli_fetch_array(mysqli_query($dbc, $query))){
          echo 'There is a user with the same name in the database';
      }
    }else{
      $query= 'update users SET username= "'. $_POST['username'] .'",
       password= "'. $_POST['password'] .'", tel= '. $_POST['tel'] .',
        address= "'. $_POST['address'] .'", email= "'. $_POST['email'] .'" where username= "'. $_POST['oldusername'] .'"';
      mysqli_query($dbc, $query);
      header('Location: ../users.php');
    }
  }
?>
