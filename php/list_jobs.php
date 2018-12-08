<?php
  require_once("database_connection.php");
  //select * from job_offer where type = sponsored
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
    echo '<button class="btn btn-primary float-right" type="submit">Details</button>';
    if($my == 1){
      echo '<button class="btn btn-primary float-right" type="submit" name="delete">Delete</button>';
      echo '<button class="btn btn-primary float-right" type="submit" name="update">Edit</button>';      
    }
    echo '</form><!-- form -->';
    echo '<p>' . $row['job_description'];
    if($adv){
      echo '<br><sub class="float-left">Adv</sub></p>';
    }else{
      echo '</p>';
    }
    echo '<date class="float-right">' . $row['post_date'] . '</date>';

    echo "</li>";
  }
?>
