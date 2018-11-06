<?
  if (session_status() == PHP_SESSION_NONE)
    session_start();
?>
<nav class="navbar navbar-expand">
  <div class="container">
    <a class="navbar-brand" href="index.php">Jobs</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ml-auto">
        <a class="nav-link" href="index.php">Home</a>
        <?
        if(isset($_SESSION['username'])){
          echo '<a class="nav-link" href="addjob.php">Add a Job</a>';
          echo '<a class="nav-link" href="announcements.php">My Announcements</a>';
          echo '<a class="nav-link" data-target="#signup" href="php/logout.php">Log out</a>';
        }else{
          echo '<a class="nav-link" data-toggle="modal" data-target="#login" href="#">Login</a>
                  <div id="login" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="text-right">Login</h4>
                        </div>
                        <div class="modal-body">
                        <form action="php/login.php" method="POST">
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
                  </div>';
                  echo   '<a class="nav-link" data-toggle="modal" data-target="#signup" href="#">Sing up</a>
                    <div id="signup" class="modal fade" role="dialog">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="text-right">Sign up</h4>
                          </div>
                          <div class="modal-body">
                          <form action="php/signup.php" method="POST">
                            <div class="form-group row">
                              <label class="form-control-label col-3">Username</label>
                              <input class="form-control col-9" type="username" name="username" placeholder="Please enter your username here">
                            </div>
                            <div class="form-group row">
                              <label class="form-control-label col-3">Password</label>
                              <input class="form-control col-9" type="password" name="password" placeholder="Please enter your password here">
                            </div>
                            <div class="form-group row">
                              <label class="form-control-label col-3">Email</label>
                              <input class="form-control col-9" type="email" name="email" placeholder="Please enter your email here">
                            </div>
                            <div class="form-group row">
                              <label class="form-control-label col-3">Phone</label>
                              <input class="form-control col-9" type="tel" name="tel" placeholder="Please enter your telephone number here">
                            </div>
                            <div class="form-group row">
                              <label class="form-control-label col-3">Address</label>
                              <input class="form-control col-9" type="address" name="address" placeholder="Please enter your password here">
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
                    </div>';
                  }
        ?>
      </ul>
    </div>
  </div>
</nav><!-- nav -->
