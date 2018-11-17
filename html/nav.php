<?
  if (session_status() == PHP_SESSION_NONE)
    session_start();
?>
<nav class="navbar navbar-expand">
  <div class="container">
    <a class="navbar-brand" href="index.php">Jobs</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ml-auto">
        <a class="nav-link" href="index.php">Home</a>
        <?
        if(isset($_SESSION['username'])){
          echo '<a class="nav-link" href="addjob.php">Add a Job</a>';
          echo '<a class="nav-link" href="announcements.php">My Announcements</a>';
          echo '<a class="nav-link" data-target="#signup" href="php/logout.php">Log out</a>';
        }else{
          echo '<a class="nav-link" data-toggle="modal" data-target="#login" href="#">Login</a>';
          require_once("html/login.php");
          echo '<a class="nav-link" data-toggle="modal" data-target="#signup" href="#">Sing up</a>';
          require_once("html/signup.php");
                  }
        ?>
      </ul>
    </div>
  </div>
</nav><!-- nav -->
