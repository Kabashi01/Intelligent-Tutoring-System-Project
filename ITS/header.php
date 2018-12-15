<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <!--link main.css-->
      <link rel="stylesheet" href="css/main.css">
      <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    </head>
    <body>
      <!-- start the header -->
      <div class="navbar-fixed">
        <nav class="teal lighten-1" role="navigation">
          <div class="row nav-wrapper container">
             <a id="logo-container col s3 left" href="home.php" class="brand-logo " >ITS</a>
             <ul class="col s6 push-s4 hide-on-med-and-down">
              <li><a href="home.php">Home</a></li>
              <li><a href="#">About Us</a></li>
              <li><a href="#">Contact</a></li>
            </ul>
            <a href="" data-target ='mobel-nav' class="sidenav-trigger" ><i class="material-icons">menu</i></a> 
            <?php
              if(isset($_SESSION['uid'])){
                echo '<form action="includes/logout.inc.php" method="post">
                      <button class="logout right   btn-flat " type="submit" name="submit">Logout</button>
                      </form>';
              }else
              if($_SESSION['login_page']==false){
                echo '<a class="right a-login" href="login.php">Login</a>';
                }
              ?>
          </div>
        </nav>
      </div>
      <!-- mobile sidenav-->
      <ul id='mobel-nav' class="sidenav">
        <li><a href="home.php">Home</a></li>
        <li><a href="#">About Us</a></li>
        <li><a href="#">Contact</a></li>
      </ul>
      <!-- end of the header -->
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
      <!-- import materialize css JS  -->
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <!-- JS code -->
      <script>
        //jquery queries to run materialize 
        $(document).ready(function () {
          //initalize the the javaScript component
          $('.sidenav').sidenav();
          
        });
      </script>