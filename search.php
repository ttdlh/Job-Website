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
    <form class="nav-link" method="GET" action="searchresults.php">
      <div class="form-group row">
        <label class="form-control-label offset-2 col-2">Title</label>
        <input class="form-control col-5" type="text" name="title" placeholder="job title">
      </div>
      <div class="form-group row">
        <label class="form-control-label offset-2 col-2">City</label>
        <input class="form-control col-5" type="text" name="city" placeholder="City">
      </div>
      <div class="form group row">
        <label class="form-control-label offset-2 col-2">Category</label>
        <div class="fourm-group col-3 row">
          <input class="form-control col-2" id="notsponsored" type="radio" name="category" value="0"><!-- Not sponsored -->
          <label class="form0control-label col-10" for"notsponsored">Part time</lablel>
        </div>
        <div class="fourm-group col-3 row">
          <input class="form-control col-2" id="sponsored" type="radio" name="category" value="1"><!-- Sponsored -->
          <label class="form-control-label col-10" for"sponsored">Full time</lablel>
        </div>
      </div>
      <div class="form-group text-center">
        <button class="btn btn-dark btn" type="submit" name="search">Search</button>
      </div>
    </form>
  </div>

  <!-- Javascript -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="js/tether.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
</body>
</html>
