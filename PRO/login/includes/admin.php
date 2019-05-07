<?php
session_start();
//Checking User Logged or Not
if(empty($_SESSION['user'])){
 header('location:../../index.php');
}
//Restrict User or Moderator to Access Admin.php page
if($_SESSION['user']['role']=='admin'){
    header('location:../../DSR/form.php');
}if($_SESSION['user']['role']=='user'){
    header('location: ../../DSR/form.php');
}
?>

