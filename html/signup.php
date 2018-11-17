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
          <label class="form-control-label col-3">Password</label>
          <input class="form-control col-9" type="password" name="cpassword" placeholder="Please enter your password again">
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
