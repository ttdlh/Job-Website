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
  if(isset($_GET['search'])){
    require_once('php/database_connection.php');
    $query='select * from job_offer';
    if($_GET['title'] != ''){
      $query= $query . ' where job_title LIKE \'%'. $_GET['title'] .'%\'';
      if($_GET['city']){
        $query= $query . ' and city LIKE \'%'. $_GET['city'] .'%\'';
         if(isset($_GET['category'])){
           $query= $query . ' and category = '. $_GET['category'];
         }
      }else if(isset($_GET['category'])){
        $query= $query . ' and category = '. $_GET['category'];
      }
    }else if($_GET['city'] != ''){
      $query= $query . ' where city LIKE \'%'. $_GET['city'] .'%\'';
     if(isset($_GET['category'])){
       $query= $query . ' and category = '. $_GET['category'];
     }
   }else if(isset($_GET['category'])){
     $query= $query . ' where category = '. $_GET['category'];
   }


    echo '
    <section id="jobs">
      <div class="container">
        <ul class="list-group">';
          #List the jobs
          //$query= 'select * from job_offer where job_title LIKE \'%'. $_GET['title'] .'%\'';
          $adv=0;//not Advertised
          $my=0;
          require("php/list_jobs.php");
    echo '
        </ul>
      </div><!-- .container -->
    </section><!-- section#jobs -->
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
