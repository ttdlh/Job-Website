<?php
  session_start();

  if(!(isset($_SESSION['admin'])))
    header('Location: .')
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>Jobs</title>
  <!-- css -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">

</head>
<body class="home">
  <?php
  require_once("html/nav.php");
  ?>
  <?php
  require_once('php/database_connection.php');
  if(isset($_GET['delete'])){
    $query= 'delete from users where username= "'. $_GET['username'] .'"';
    mysqli_query($dbc, $query);

    $query= 'delete from job_offer where username= "'. $_GET['username'] .'"';
    mysqli_query($dbc, $query);
  }else if(isset($_GET['show'])){
    $query= 'select * from users where username= "'. $_GET['username'] .'"';
    $row= mysqli_fetch_array(mysqli_query($dbc, $query));
    echo '
      <div class="container">
        <p>Username: '. $row['username'] .'</p>
        <p>Password: '. $row['password'] .'</p>
        <p>Email: '. $row['email'] .'</p>
        <p>Address: '. $row['address'] .'</p>
        <p>Phone Number:'. $row['tel'] .'</p>
        <div class="text-right">
          <form method="GET" action="userscontrol.php">
            <input type="hidden" name="username" value="'. $row['username'] .'">
            <button class="btn btn-info" type="submit" name="edit">Edit</button>
            <button class="btn btn-danger" type="submit" name="delete">Delete</button>
          </form>
        </div>
      </div>
    ';
  }else if(isset($_GET['edit'])){
    $query= 'select * from users where username= "'. $_GET['username'] .'"';
    $row= mysqli_fetch_array(mysqli_query($dbc, $query));
    echo '
      <div class="container">
        <form action="php/useredit.php" method="POST">
          <input type="hidden" name="oldusername" value="'. $_GET['username'] .'">
          <div class="form-group row">
            <label class="form-control-label col-3">Username</label>
            <input class="form-control col-9" type="username" name="username" value="'. $row['username'] .'">
          </div>
          <div class="form-group row">
            <label class="form-control-label col-3">Password</label>
            <input class="form-control col-9" type="text" name="password" value="'. $row['password'] .'">
          </div>
          <div class="form-group row">
            <label class="form-control-label col-3">Email</label>
            <input class="form-control col-9" type="email" name="email" value="'. $row['email'] .'">
          </div>
          <div class="form-group row">
            <label class="form-control-label col-3">Phone</label>
            <input class="form-control col-9" type="tel" name="tel" value="'. $row['tel'] .'">
          </div>
          <div class="form-group row">
            <label class="form-control-label col-3">Address</label>
            <input class="form-control col-9" type="address" name="address" value="'. $row['address'] .'">
          </div>
          <div class="form-group row">
          <button class="btn btn-info offset-4 col-4 text-center" type="submit" name="edit">Edit User</button>
          </div>
        </form><!-- form -->
      </div>
    ';
  }
  ?>

  <!-- Javascript -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="js/tether.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
</body>
</html>
