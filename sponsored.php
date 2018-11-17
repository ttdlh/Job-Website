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


<section id="sponsored">
  <div class="container">
    <ul class="list-group">
      <?php
        #List sponsored jobs
        $query= "select * from job_offer where type = 1 order by post_date desc";
        $adv= 1;
        require("php/list_jobs.php");
      ?>
    </ul>
  </div><!-- .container -->
</section><!-- section#sponsored -->
<!-- Javascript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="js/tether.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
