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

  <section id="jobs">
    <div class="container">
      <ul class="list-group">
        <?php
          require_once('php/database_connection.php');
          #List the jobs
          $mostviewed= 0;
          $views= 0;
          $response= mysqli_query($dbc, 'select * from job_offer');
          while($row= mysqli_fetch_array($response)){
            $cviews= mysqli_fetch_array(mysqli_query($dbc, 'select COUNT(*) as total from views where job_offer_id='. $row['id']))['total'];
            if ($cviews > $views){
              $views= $cviews;
              $mostviewed= $row['id'];
            }
          }

          $query= "select * from job_offer where id= ". $mostviewed;
          $adv=0;//not Advertised
          $my= 0;
          require("php/list_jobs.php");
        ?>
      </ul>
    </div><!-- .container -->
  </section><!-- section#jobs -->

  <!-- Javascript -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="js/tether.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
</body>
</html>
