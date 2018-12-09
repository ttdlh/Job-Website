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
  <section id="review">
    <div class="container">
      <ul class="list-group">
        <?php
          require_once('php/database_connection.php');
          $query= 'select * from job_offer where onhold= 0';
          $response= mysqli_query($dbc, $query);
          while($row= mysqli_fetch_array($response)){
            echo '<li class="list-group-item">';
            echo '<form method="GET" action="details.php">';
            echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
            if(!($row['image'] == ''))             #place a ! or (a not) before $row
              echo '<img class="responsive-img" src="' . $row['image'] .'">';
            else
              echo '<img class="responsive-img" src="img/job.png">';
            echo '<h5>' . $row['job_title'] . '</h5>';
            echo '<button class="btn btn-primary float-right" type="submit" name="details">Details</button>';
            echo '<button class="btn btn-primary float-right" type="submit" name="accept">Accept</button>';
            echo '<button class="btn btn-primary float-right" type="submit" name="delete">Delete</button>';
            echo '</form><!-- form -->';
            echo '<p>' . $row['job_description']. '</p>';
            echo '<date class="float-right">' . $row['post_date'] . '</date>';

            echo "</li>";
          }
        ?>
      </ul>
    </div><!-- .container -->
  </section><!-- section#review -->

  <!-- Javascript -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="js/tether.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
</body>
</html>
