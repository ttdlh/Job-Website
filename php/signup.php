<?php
  session_start();

  if((isset($_SESSION['username']))){
    header('Location: index.php');
  }

  if(isset($_POST['signup'])){
    require_once('database_connection.php');

    $query='select username from users where username ="' . $_POST['username'] . '"';
    $response= mysqli_query($dbc, $query);
    if(!(mysqli_num_rows($response))){#1
      if($_POST['username'] != ''){#2
        if($_POST['password'] != ''){#3
          if($_POST['cpassword'] != ''){#4
            if($_POST['email'] != ''){#5
              if(isset($_POST['phone'])){#6
                if($_POST['address'] != ''){#7
                  echo 'success';
                }else{#7
                  echo '<p>Please enter your address</p>';
                }
              }else{#6
                echo '<p>Please enter your phone number</p>';
              }
            }else{#5
              echo '<p>Please enter your email</p>';
            }
          }else{#4
            echo '<p>Please confirm the password</p>';
          }
        }else{#3
          echo '<p>Please enter a password</p>';
        }
      }else{#2
        echo '<p>Please enter a username</p>';
      }
    }else{#1
      echo 'user already exist';
    }
  }
?>
