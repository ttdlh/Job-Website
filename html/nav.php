<?php
  if (session_status() == PHP_SESSION_NONE)
  session_start();
?>
<nav class="navbar navbar-expand">
  <div class="container">
    <a class="navbar-brand" href="index.php">Jobs</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ml-auto">
        <a class="nav-link" href="index.php">Home</a>
        <a class="nav-link" href="search.php">Search</a>
        <a class="nav-link" href="mostviewedjob.php">Most Viewed</a>
        <?php
        if(isset($_SESSION['admin'])){
          echo '<a class="nav-link" href="jobscontrol.php">Jobs</a>';
          echo '<a class="nav-link" href="reviewjobs.php">Review Jobs</a>';
          echo '<a class="nav-link" href="users.php">Users</a>';
          echo '<a class="nav-link" href="php/logout.php">Log out</a>';
        }else if(isset($_SESSION['username'])){
          echo '<a class="nav-link" href="addjob.php">Add a Job</a>';
          echo '<a class="nav-link" href="announcements.php">My Announcements</a>';
          echo '<a class="nav-link" href="php/logout.php">Log out</a>';
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
