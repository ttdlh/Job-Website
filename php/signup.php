<?
  session_start();

  if((isset($_SESSION['username']))){
    header('Location: index.php');
  }

  if(isset($_POST['signup'])){
    require_once('database_connection.php');

    if(isset($_POST['username'])){
      if(isset($_POST['password'])){
        if(isset($_POST['cpassword'])){
          if(isset($_POST['email'])){
            if(isset($_POST['phone'])){
              if(isset($_POST['address']){
                echo 'success';
              }else{
                echo '<p>Please enter your address</p>';
              }
            }else{
              echo '<p>Please enter your phone number</p>';
            }
          }else{
            echo '<p>Please enter your email</p>';
          }
        }else{
          echo '<p>Please confirm the password</p>';
        }
      }else{
        echo '<p>Please enter a password</p>';
      }
    }else{
      echo '<p>Please enter a username</p>';
    }
  }
?>
