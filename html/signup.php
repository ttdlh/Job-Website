<?php


  if(isset($_SESSION['username'])){
    //header('Location: index.php');
  }
  $_POST['signupError']= 0;
  $reguser= '';
  $regemail= '';
  $regphone= '';
  $regaddress= '';
  $signupERR= '';

  if(isset($_POST['signup'])){
    require_once('php/database_connection.php');

    $query='select username from users where username ="' . $_POST['username'] . '"';
    $response= mysqli_query($dbc, $query);

    if(!(mysqli_num_rows($response))){#1
      if($_POST['username'] != ''){#2
        if($_POST['password'] != ''){#3
          if($_POST['cpassword'] != ''){#4
            if($_POST['email'] != ''){#5
              if(is_numeric($_POST['tel'])){#6
                if($_POST['address'] != ''){#7
                  $query= 'insert into users VALUES("'. $_POST["username"] .'", "'. $_POST["password"] .'", "'.
                   $_POST["tel"] .'", '. $_POST["address"] .', "'. $_POST["email"] .'" )';
                  mysqli_query($dbc, $query);
                  header('Location: index.php');
                }else{#7
                  $signupERR= '<p>Please enter your address</p>';
                }
              }else{#6
                $signupERR= '<p>Please enter your phone number</p>';
              }
            }else{#5
              $signupERR= '<p>Please enter your email</p>';
            }
          }else{#4
            $signupERR= '<p>Please confirm the password</p>';
          }
        }else{#3
          $signupERR= '<p>Please enter a password</p>';
        }
      }else{#2
        $signupERR= '<p>Please enter a username</p>';
      }
    }else{#1
      $signupERR= 'user already exist';
    }
    $_POST['signupError']= 1;
    $reguser= $_POST['username'];
    $regemail= $_POST['email'];
    $regphone= $_POST['tel'];
    $regaddress= $_POST['address'];

  }
?>


<div id="signup" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="text-right">Sign up</h4>
      </div>
      <div class="modal-body">
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
        <div class="form-group row" id="signuperr" style="display: none; color: red;">
          <label class="form-control-label col-12 text-center"><?php echo $signupERR; ?></label>
        </div>
        <div class="form-group row">
          <label class="form-control-label col-3">Username</label>
          <input class="form-control col-9" type="username" name="username" placeholder="Please enter your username here" value=<?php echo $reguser; ?>>
        </div>
        <div class="form-group row">
          <label class="form-control-label col-3">Password</label>
          <input class="form-control col-9" type="password" name="password" placeholder="Please enter your password here">
        </div>
        <div class="form-group row">
          <label class="form-control-label col-3">Password</label>
          <input class="form-control col-9" type="password" name="cpassword" placeholder="Please enter your password again">
        </div>
        <div class="form-group row">
          <label class="form-control-label col-3">Email</label>
          <input class="form-control col-9" type="email" name="email" placeholder="Please enter your email here" value=<?php echo $regemail; ?>>
        </div>
        <div class="form-group row">
          <label class="form-control-label col-3">Phone</label>
          <input class="form-control col-9" type="tel" name="tel" placeholder="Please enter your telephone number here" value=<?php echo $regphone; ?>>
        </div>
        <div class="form-group row">
          <label class="form-control-label col-3">Address</label>
          <input class="form-control col-9" type="address" name="address" placeholder="Please enter your address here" value=<?php echo $regaddress; ?>>
        </div>
        <div class="form-group row">
        <button class="btn btn-info offset-4 col-4 text-center" type="submit" name="signup">Sign up</button>
        </div>
      </form><!-- form -->
      </div>
      <div class="modal-footer">
      <p class="float-right">you already have an account?
      <a data-dismiss="modal" data-toggle="modal" data-target="#login" href="#">Login</a>
      </p>
      <button type="button" class="btn" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script>var signuperror=<?php echo $_POST['signupError'];?>;</script><!-- signup wrong crids-->
