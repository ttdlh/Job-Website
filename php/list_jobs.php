<?
  require_once("database_connection.php");
  //select * from job_offer where type = sponsored
  $response= mysqli_query($dbc, $query);
  while($row= mysqli_fetch_array($response)){
    echo '<li class="list-group-item">';
    echo '<img class="responsive-img" src="' . $row['image'] .'">';
    echo '<h5>' . $row['job_title'] . '</h5>';
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
