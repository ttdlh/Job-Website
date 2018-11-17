<!doctype html><!-- not done -->
<html>
<head>
  <meta charset="utf-8">
  <title>Jobs</title>
  <!-- css -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
</head>
<body class="home">
  <?
    session_start();
    if(!(isset($_SESSION['username']))){
      header('Location: index.php');
    }

    require_once("html/nav.php");
  ?>
  <section id="myannouncements">
    <div class="container">
      <ul class="list-group">
        <?
          #List the jobs
          $query= 'select * from job_offer where username="' . $_SESSION['username'] . '" order by post_date desc'  ;
          $adv=0;//not Advertised
          require("php/list_jobs.php");
        ?>
      </ul>
    </div>
  </section>
  <!-- Javascript -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="js/tether.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
