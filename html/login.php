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
</div>
