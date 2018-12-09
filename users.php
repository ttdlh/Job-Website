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
  <div class="container">
    <ul class="list-group">
      <?php
        require_once('php/database_connection.php');
        $query= 'select * from users';
        $response= mysqli_query($dbc, $query);
        while($row= mysqli_fetch_array($response)){
          echo '<li class="list-group-item">';
          echo '<p class="float-left">'. $row['username'] .'</p>';
          echo '
            <div class="text-right">
              <form method="GET" action="userscontrol.php">
                <input type="hidden" name="username" value="'. $row['username'] .'">
                <button class="btn btn-primary" type="submit" name="show">Show</button>
                <button class="btn btn-info" type="submit" name="edit">Edit</button>
                <button class="btn btn-danger" type="submit" name="delete">Delete</button>
              </form>
            </div>
          ';
          echo '</li>';
        }
      ?>
    </ul>
  </div>

  <!-- Javascript -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="js/tether.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
</body>
</html>
