<?
  session_start();

  if((isset($_SESSION['username']))){
    header('Location: index.php');
  }

  if(isset($_POST['signup'])){
    require_once('database_connection.php');

    $query="select username from users";
    $response= mysqli_query($dbc, $query);
    if(!(mysqli_fetch_array($response))){
      if($_POST['username'] != ''){
        if($_POST['password'] != ''){
          if($_POST['cpassword'] != ''){
            if($_POST['email'] != ''){
              if(isset($_POST['phone'])){
                if($_POST['address'] != ''){
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
    }else{
      echo 'user already exist';
    }
  }
?>
