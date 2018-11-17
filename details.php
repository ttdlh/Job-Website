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

  <?php
  require_once("html/nav.php");
  ?>
  <div class="container">
    <ul class="list-group">
      <?phprequire_once("php/database_connection.php");

      if(isset($_GET['id'])){
        $query= 'select * from job_offer where id="' . $_GET['id'] . '"';
        $response= mysqli_query($dbc, $query);
        while($row= mysqli_fetch_array($response)){
          echo '<li class="list-group-item">';
          echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
          if(0)#$row['image'] == '')             #place a ! or (a not) before $row
            echo '<img class="responsive-img" src="' . $row['image'] .'">';
          else
            echo '<img class="responsive-img" src="img/job.png">';
          echo '<h5>' . $row['job_title'] . '</h5>';
          echo '<p>' . $row['job_description'] . '</p>';
          echo '<p>Company Name: ' . $row['company'] . '</p>';
          echo '<div class="boost">';
          echo '<p>Contact info: ' . $row['contact_info'] . '</p>';
          echo '<p>Company Address: ' . $row['address'] . '</p>';
          echo '<p>street: ' . $row['street'] . '</p>';
          echo '<p>Job Requirements: ' . $row['job_requirements'] . '</p>';
          echo '<p>Salary: $' . $row['salary'] . '</p>';
          if($row['category'] == 0){
            echo '<p>Job Category: Part time </p>';
          }else{
            echo '<p>Job Category: Full time </p>';
          }
          echo '<date class="float-right">' . $row['post_date'] . '</date>';
          echo '</div>';
          echo "</li>";
        }
      }else{
        echo 'Item does not exist';
      }
        ?>
    </ul>
  </div><!-- .container -->
  <!-- Javascript -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="js/tether.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
