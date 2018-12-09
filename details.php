<?PHP
  function getUserIP() { // Get real visitor IP behind CloudFlare network
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
      $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
      $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    }
    $client = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote = $_SERVER['REMOTE_ADDR'];
    if(filter_var($client, FILTER_VALIDATE_IP)) {
      $ip = $client;
    } elseif(filter_var($forward, FILTER_VALIDATE_IP)) {
    $ip = $forward;
    } else {
      $ip = $remote;
    } return $ip;
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
    <?php
    require_once("php/database_connection.php");

    if(isset($_GET['details'])){
      $query= 'select * from job_offer where id="' . $_GET['id'] . '"';
      $response= mysqli_query($dbc, $query);
      if($row= mysqli_fetch_array($response)){
        $u= "";
        if(isset($_SESSION['username']))
          $u= $_SESSION['username'];
        if($row['onhold'] == 1 || $row['username'] == $u || isset($_SESSION['admin'])){
          //add a view
          if(isset($_SESSION['username'])){//user
            $query= 'select * from views where job_offer_id= '. $_GET['id'] .' and username= "'. $_SESSION['username'] .'"';
            $aresponse= mysqli_query($dbc, $query);
            if(!($view= mysqli_fetch_array($aresponse))){
              $query= 'select username from job_offer where id= '. $_GET['id'];
              $aresponse= mysqli_query($dbc, $query);
              if($offer= mysqli_fetch_array($aresponse)){

                if(!($offer['username'] == $_SESSION['username'])){
                  
                  $query= 'insert into views(job_offer_id, username, IP) VALUES('. $_GET['id'] .', "'. $_SESSION['username'] .'",
                   "'. getUserIP() .'")';
                  mysqli_query($dbc, $query);
                }
              }
            }
          }else{//guest
            $query= 'select * from views where job_offer_id= '. $_GET['id'] .' and IP= "'. getUserIP() .'"';
            $aresponse= mysqli_query($dbc, $query);
            if(!($view= mysqli_fetch_array($aresponse))){
              $query= 'insert into views(job_offer_id, username, IP) VALUES('. $_GET['id'] .', "",
               "'. getUserIP() .'")';
              mysqli_query($dbc, $query);
              echo mysqli_error($dbc);
            }
          }

          //View Details
          echo '
            <ul class="list-group">
            <div class="container">';

          echo '<li class="list-group-item">';
          echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
          if($row['image'] != '')             #place a ! or (a not) before $row
            echo '<img class="responsive-img float-left" src="' . $row['image'] .'">';
          else
            echo '<img class="responsive-img float-left" src="img/job.png">';
          echo '<h5>' . $row['job_title'] . '</h5>';
          echo '<p>' . $row['job_description'] . '</p>';
          echo '<p>Company Name: ' . $row['company'] . '</p>';
          echo '<div class="boost">';
          echo '<p>Contact info: ' . $row['contact_info'] . '</p>';
          echo '<p>City: ' . $row['city'] . '</p>';
          echo '<p>Company Address: ' . $row['address'] . '</p>';
          echo '<p>street: ' . $row['street'] . '</p>';
          echo '<p>Job Requirements: ' . $row['job_requirements'] . '</p>';
          echo '<p>Salary: $' . $row['salary'] . '</p>';
          if($row['category'] == 0){
            echo '<p>Job Category: Part time </p>';
          }else{
            echo '<p>Job Category: Full time </p>';
          }
          $views= mysqli_fetch_array(mysqli_query($dbc, 'select COUNT(*) as total from views where job_offer_id='. $row['id']))['total'];
          echo '<p>Number of Views: ' . $views . '</p>';
          echo '<date class="float-right">' . $row['post_date'] . '</date>';
          echo '</div>';
          echo "</li>";

          echo '    </ul>
          </div><!-- .container -->';
        }else{
          echo "Dead End";
        }
      }
    //delete
    }else if(isset($_GET['delete'])){
      if(isset($_GET['id'])){
        if(isset($_SESSION['username']))
          $query= 'delete from job_offer where id= '. $_GET['id'] .' and username= "'. $_SESSION['username'] .'"';
        else if(isset($_SESSION['admin']))
          $query= 'delete from job_offer where id= '. $_GET['id'];
        mysqli_query($dbc, $query);
        if(isset($_SESSION['admin']))
          header('Location: jobscontrol.php');
        else header('Location: announcements.php');
      }
      //header('Location: announcements.php');
    //update
    }else if(isset($_GET['edit']) || isset($_POST['update'])){

      if(!(isset($_SESSION['username']) || isset($_SESSION['admin']))){
        header('Location: index.php');
      }
      if (isset($_GET['id'])){
        $_POST['id']= $_GET['id'];
      }
      $query= "select * from job_offer where id= ". $_POST['id'];
      $row= mysqli_fetch_array(mysqli_query($dbc, $query));

      $_POST['editERR']= 0;
      $iError= '';
      $title= $row['job_title'];
      $company= $row['company'];
      $address= $row['address'];
      $street= $row['street'];
      $city= $row['city'];
      $desc= $row['job_description'];
      $requirements= $row['job_requirements'];
      $contact= $row['contact_info'];
      $salary= $row['salary'];
      $image= $row['image'];
      $category= $row['category'];
      $type= $row['type'];

      if(isset($_POST['update'])){
        if($_POST['job_title'] != ''){
          if($_POST['company'] != ''){
            if($_POST['address'] != ''){
              if($_POST['street'] != ''){
                if($_POST['city'] != ''){
                  if($_POST['contact'] != ''){
                    if(is_numeric($_POST['salary'])){
                      require_once("php/database_connection.php");
                      echo "a";

                      if(isset($_SESSION['username']))
                        $query= 'update job_offer SET job_title= "'. $_POST['job_title'] .'", company= "'. $_POST['company'] .'",
                         category= '. $_POST['category'] .', address= "'. $_POST['address'] .'", street= "'. $_POST['street'] .'",
                          city= "'. $_POST['city'] .'", job_description= "'. $_POST['description'] .'",
                           job_requirements= "'. $_POST['requirements'] .'", salary= '. $_POST['salary'] .',
                            contact_info= "'. $_POST['contact'] .'", image= "'. $_POST['image'] .'", type= '. $_POST['type'] .'
                             where username= "'. $_SESSION['username'] .'" and id= '. $row['id'];
                      else if(isset($_SESSION['admin']))
                        $query= 'update job_offer SET job_title= "'. $_POST['job_title'] .'", company= "'. $_POST['company'] .'",
                         category= '. $_POST['category'] .', address= "'. $_POST['address'] .'", street= "'. $_POST['street'] .'",
                          city= "'. $_POST['city'] .'", job_description= "'. $_POST['description'] .'",
                           job_requirements= "'. $_POST['requirements'] .'", salary= '. $_POST['salary'] .',
                            contact_info= "'. $_POST['contact'] .'", image= "'. $_POST['image'] .'", type= '. $_POST['type'] .'
                             where id= '. $row['id'];
                      mysqli_query($dbc, $query);
                      echo mysqli_error($dbc);
                      header('Location: announcements.php');
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
        $_POST['editERR']= 1;

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

      require_once("editjob.php");
    }else if(isset($_GET['accept']) && isset($_SESSION['admin'])){
      $query= 'update job_offer SET onhold= 1 where id= '. $_GET['id'];
      mysqli_query($dbc, $query);
      header('Location: reviewjobs.php');
    }else{
      echo 'Item does not exist';
    }
      ?>
  <!-- Javascript -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="js/tether.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>
</html>
