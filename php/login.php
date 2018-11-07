<?
  session_start();

  if((isset($_SESSION['username']))){
    header('Location: index.php');
  }

  if(isset($_POST['username']) && isset($_POST['password'])){
    require_once('database_connection.php');
    $query= 'select * from users where username="' . $_POST['username'] . '"';
    $response= mysqli_query($dbc, $query);
    $row= mysqli_fetch_array($response);
    if($row['password'] == $_POST['password']){
      $_SESSION['username']= $row['username'];
      header('Location: ../index.php');
    }else{
      echo"wrong";
    }
  }else{
    echo "Error";
  }
?>
