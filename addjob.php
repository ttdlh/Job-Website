<?php
  session_start();

  if(!(isset($_SESSION['username']))){
    header('Location: index.php');
  }
  $_POST['insertERR']= 0;
  $iError= '';
  $title= '';
  $company= '';
  $address= '';
  $street= '';
  $city= '';
  $desc= '';
  $requirements= '';
  $contact= '';
  $salary= '';
  $image= '';
  $category= 0;
  $type= 0;

  if(isset($_POST['add'])){
    if($_POST['job_title'] != ''){
      if($_POST['company'] != ''){
        if($_POST['address'] != ''){
          if($_POST['street'] != ''){
            if($_POST['city'] != ''){
              if($_POST['contact'] != ''){
                if(is_numeric($_POST['salary'])){
                  require_once("php/database_connection.php");

                  $query= 'insert into job_offer(job_title, company, category, address, street, city, job_description,
                   job_requirements, salary, contact_info, image, type, username, onhold)
                    VALUES("'. $_POST['job_title'] .'", "'. $_POST['company'] .'", '. $_POST['category'] .',
                     "'. $_POST['address'] .'", "'. $_POST['street'] .'", "'. $_POST['city'] .'",
                      "'. $_POST['description'] .'", "'. $_POST['requirements'] .'", '. $_POST['salary'] .',
                       "'. $_POST['contact'] .'", "'. $_POST['image'] .'", '. $_POST['type'] .', "'. $_SESSION['username'] .'", 0)';
                  mysqli_query($dbc, $query);
                  echo mysqli_error($dbc);
                  header('Location: .');
                }else{
                  $iError= "Please enter the job's salary";
                }
              }else{
                $iError= 'Please Enter some contact information';
              }
            }else{
              $iError= 'Please enter the city name';
            }
          }else{
            $iError= 'Please Enter the Street';
          }
        }else{
          $iError= 'Please Enter the address';
        }
      }else{
        $iError= 'Please enter the company name';
      }
    }else{
      $iError= 'Please enter a job Title';
    }
    $_POST['insertERR']= 1;

    $title= $_POST['job_title'];
    $company= $_POST['company'];
    $address= $_POST['address'];
    $street= $_POST['street'];
    $city= $_POST['city'];
    $desc= $_POST['description'];
    $requirements= $_POST['requirements'];
    $contact= $_POST['contact'];
    $salary= $_POST['salary'];
    $image= $_POST['image'];
    $category= $_POST['category'];
    $type= $_POST['type'];
  }
?>

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
  <?php
    require_once("html/nav.php");
  ?>

  <div class="addjob">
    <div class="container">
      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" enctype="multipart/form-data">
        <div class="form-group row" id="inserterr" style="display: none; color: red;">
          <label class="form-control-label col-12 text-center"><?php echo $iError; ?></label>
        </div>
        <div class="form-group row">
          <label class="form-control-label col-3">Job Title</label>
          <input class="form-control col-9" type="text" name="job_title" placeholder="Enter the job Title here" value='<?php echo $title; ?>'>
        </div>
        <div class="form-group row">
          <label class="form-control-label col-3">Company</label>
          <input class="form-control col-9" type="text" name="company" placeholder="Enter the Company name here" value='<?php echo $company; ?>'>
        </div>
        <div class="form-group row">
          <label class="form-control-label col-3">Address</label>
          <input class="form-control col-9" type="address" name="address" placeholder="Enter the Company Address here" value='<?php echo $address; ?>'>
        </div>
        <div class="form-group row">
          <label class="form-control-label col-3">Street</label>
          <input class="form-control col-9" type="text" name="street" placeholder="Enter the Street name here" value='<?php echo $street; ?>'>
        </div>
        <div class="form-group row">
          <label class="form-control-label col-3">City</label>
          <input class="form-control col-9" type="text" name="city" placeholder="Enter the City name here" value='<?php echo $city; ?>'>
        </div>
        <div class="form-group row">
          <label class="form-control-label col-3">Category</label>
          <div class="fourm-group col-4 row">
            <input class="form-control col-2" id="parttime" type="radio" name="category" value="0"
             <?php if($category == 0) echo 'checked=checked'; ?>><!-- Part time-->
            <label class="form0control-label col-10" for"parttime">Part time</lablel>
          </div>
          <div class="fourm-group col-4 row">
            <input class="form-control col-2" id="fulltime" type="radio" name="category" value="1"
             <?php if($category == 1) echo 'checked=checked'; ?>><!-- Full time -->
            <label class="form-control-label col-10" for"fulltime">Full time</lablel>
          </div>
        </div>
        <div class="form-group row">
          <label class="form-control-label col-3">Job Description</label>
          <textarea class="form-control col-9 desc" type="text" name="description" placeholder="Enter the Description here"><?php echo $desc; ?></textarea>
        </div>
        <div class="form-group row">
          <label class="form-control-label col-3">Job Requirements</label>
          <textarea class="form-control col-9" type="text" name="requirements" placeholder="Enter the Job Requirements here"><?php echo $requirements; ?></textarea>
        </div>
        <div class="form-group row">
          <label class="form-control-label col-3">Contact Info</label>
          <input class="form-control col-9" type="text" name="contact" placeholder="Enter the Contact Information here" value=<?php echo $contact; ?>>
        </div>
        <div class="form-group row">
          <label class="form-control-label col-3">Advertise?</label>
          <div class="fourm-group col-4 row">
            <input class="form-control col-2" id="notsponsored" type="radio" name="type" value="0"
             <?php if($type == 0) echo 'checked=checked'; ?>><!-- Not sponsored -->
            <label class="form0control-label col-10" for"notsponsored">No</lablel>
          </div>
          <div class="fourm-group col-4 row">
            <input class="form-control col-2" id="sponsored" type="radio" name="type" value="1"
            <?php if($type == 1) echo 'checked=checked'; ?>><!-- Sponsored -->
            <label class="form-control-label col-10" for"sponsored">Yes</lablel>
          </div>
        </div>
        <div class="form-group row">
          <label class="form-control-label col-3">salary</label>
          <input class="form-control col-9" type="text" name="salary" placeholder="Enter the job's salary" value='<?php echo $salary; ?>'>
        </div>
        <div class="form-group row">
          <label class="form-control-label col-3">Image link</label>
          <input class="form-control col" type="text" name="image" placeholder="Enter an image link(Optional)"value='<?php echo $image; ?>'>
        </div>
          <button class="btn btn-primary btn-block" type="submit" name="add">ADD JOB</button>
      </form><!-- form -->
    </div><!-- .container -->
  </div><!-- .login -->
  <!-- Javascript -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="js/tether.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script>
  var inserterror=<?php echo $_POST['insertERR'];?>;
  if(inserterror){
    document.getElementById("inserterr").style.display= "inline";
  }
  </script>
</body>
</html>
