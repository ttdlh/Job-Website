<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Jobs</title>
  <!-- css -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
</head>
<body>
  <?
    require_once("html/header.php");
  ?>
  <div class="addjob">
    <div class="container">
      <form action="php/login.php" method="">
        <div class="form-group row">
          <label class="form-control-label col-3">Username</label>
          <input class="form-control col-9" type="username" name="username" placeholder="Please enter your username here">
        </div>
        <div class="form-group row">
          <label class="form-control-label col-3">Password</label>
          <input class="form-control col-9" type="password" name="username" placeholder="Please enter your username here">
        </div>
      </form><!-- form -->
    </div><!-- .container -->
  </div><!-- .login -->
  <!-- Javascript -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="js/tether.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
