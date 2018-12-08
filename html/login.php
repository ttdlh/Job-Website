<?php
  $_POST['loginError']= 0;
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    if((isset($_SESSION['username']))){
      header('Location: index.php');
    }
    $loginERR= '';

    if(isset($_POST['login'])){
      if($_POST['username'] != ""){
        if($_POST['password']){
          require_once('php/database_connection.php');
          $query= 'select * from users where username="' . $_POST['username'] . '"';
          $response= mysqli_query($dbc, $query);
          $row= mysqli_fetch_array($response);
          if($row['password'] == $_POST['password']){
            $_SESSION['username']= $row['username'];
            header('Location: index.php');
          }else{
            $loginERR= "the username and password do not match";
          }
        }else{
          $loginERR= "Please enter your password";
        }
      }else{
        $loginERR= "Please enter your username";
      }
      $_POST['loginError']= 1;
    }
  }
?>
<div id="login" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="text-right">Login</h4>
      </div>
      <div class="modal-body">
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
        <div class="form-group row" id="loginerr" style="display: none; color: red;">
          <label class="form-control-label col-12 text-center"><?php echo $loginERR; ?></label>
        </div>
        <div class="form-group row">
          <label class="form-control-label col-3">Username</label>
          <input class="form-control col-9" type="username" name="username" placeholder="Please enter your username here">
        </div>
        <div class="form-group row">
          <label class="form-control-label col-3">Password</label>
          <input class="form-control col-9" type="password" name="password" placeholder="Please enter your password here">
        </div>
        <div class="form-group row">
        <button class="btn btn-info offset-4 col-4 text-center type="submit" name="login"">Login</button>
        </div>
      </form><!-- form -->
      </div>
      <div class="modal-footer">
      <p class="float-right">you do not have an account?
      <a data-dismiss="modal" data-toggle="modal" data-target="#signup" href="#">Signup</a>
      </p>
      <button type="button" class="btn" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script> var loginerror=<?php echo $_POST['loginError'];?>;</script><!-- login error-->
