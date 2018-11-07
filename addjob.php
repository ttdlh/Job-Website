

<!doctype html><!-- not done -->
<html>
<head>
  <meta charset="utf-8">
  <title>Jobs</title>
  <!-- css -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
</head>
<body class="addjob">
  <?
    session_start();
    if(!(isset($_SESSION['username']))){
      header('Location: index.php');
    }

    require_once("html/header.php");
  ?>

  <div class="addjob">
    <div class="container">
      <form action="php/addjob.php" method="">
        <div class="form-group row">
          <label class="form-control-label col-3">Job Title</label>
          <input class="form-control col-9" type="text" name="job_title" placeholder="Enter the job Title here">
        </div>
        <div class="form-group row">
          <label class="form-control-label col-3">Company</label>
          <input class="form-control col-9" type="text" name="company" placeholder="Enter the Company name here">
        </div>
        <div class="form-group row">
          <label class="form-control-label col-3">Address</label>
          <input class="form-control col-9" type="address" name="address" placeholder="Enter the Company Address here">
        </div>
        <div class="form-group row">
          <label class="form-control-label col-3">Street</label>
          <input class="form-control col-9" type="text" name="street" placeholder="Enter the Street name here">
        </div>
        <div class="form-group row">
          <label class="form-control-label col-3">City</label>
          <input class="form-control col-9" type="text" name="city" placeholder="Enter the City name here">
        </div>
        <div class="form-group row">
          <label class="form-control-label col-3">Category</label>
          <div class="fourm-group col-4 row">
            <input class="form-control col-2" id="parttime" type="radio" name="category" value="0"><!-- Part time-->
            <label class="form0control-label col-10" for"parttime">Part time</lablel>
          </div>
          <div class="fourm-group col-4 row">
            <input class="form-control col-2" id="fulltime" type="radio" name="category" value="1"><!-- Full time -->
            <label class="form-control-label col-10" for"fulltime">Full time</lablel>
          </div>
        </div>
        <div class="form-group row">
          <label class="form-control-label col-3">Job Description</label>
          <textarea class="form-control col-9 desc" type="text" name="description" placeholder="Enter the Description here"></textarea>
        </div>
        <div class="form-group row">
          <label class="form-control-label col-3">Job Requirements</label>
          <textarea class="form-control col-9" type="text" name="requirements" placeholder="Enter the Job Requirements here"></textarea>
        </div>
        <div class="form-group row">
          <label class="form-control-label col-3">Contact Info</label>
          <input class="form-control col-9" type="text" name="contact" placeholder="Enter the Contact Information here">
        </div>
        <div class="form-group row">
          <label class="form-control-label col-3">Advertise?</label>
          <div class="fourm-group col-4 row">
            <input class="form-control col-2" id="notsponsored" type="radio" name="category" value="0"><!-- Not sponsored -->
            <label class="form0control-label col-10" for"notsponsored">No</lablel>
          </div>
          <div class="fourm-group col-4 row">
            <input class="form-control col-2" id="sponsored" type="radio" name="category" value="1"><!-- Sponsored -->
            <label class="form-control-label col-10" for"sponsored">Yes</lablel>
          </div>
        </div>
        <!-- PLACE IMAGE Entry here -->
        <!--<div class="form-group row">
          <label class="form-control-label col-3"></label>
          <input class="form-control col-9" type="" name="" placeholder="Enter the $ here">
        </div> -->
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
