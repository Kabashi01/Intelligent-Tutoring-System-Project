<?php
   session_start();
   if(!isset($_SESSION['user'])){
    header('location:../index.php');
     exit();
   }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="form/css/bootstrap.min.css" >
    <link rel="stylesheet" href="form/css/main.css">
    <title>Home</title>
  </head>
  <body>
    <div class="container-fluid color">
      <nav class="navbar navbar-expand-lg navbar-dark row p-0">
        <div class="col-sm-4 ml-3">
          <a class="navbar-brand p-0" href="#">
          <img src="form/images/logo.png" class="img-fluid img-logo pr-2"  alt=""><h2 class="d-inline align-middle">DSR</h2></a>
        </div>        
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>      
        <div class="collapse navbar-collapse pl-4 " id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="form.php">Forms </a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-white" href="report.php">Reports</a>
            </li>
            <?php
                include ('../login/includes/isadmin.php');
                if(isAdmin()){
                echo '<li class="nav-item">
                    <a class="nav-link text-white" href="dash/dashboard.php">Dashboord</a>
                  </li>';
                }
            ?>
          </ul>
        </div>
        <?php echo "<h7 style='color:black;'>(".$_SESSION['user']['username'].")</h7><a href='../login/logout.php' class='text-white mr-5'> &nbsp&nbsp&nbspLogout</a>";?>
      </nav>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.j<script src="js/jquery-3.3.1.slim.min.js"  ></script>s, then Bootstrap JS -->
    <script src="form/js/popper.min.js"  ></script>
    <script src="form/js/bootstrap.min.js" ></script>
  </body>
</html>