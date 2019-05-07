<?php
session_start();
//Checking User Logged or Not
if(empty($_SESSION['user'])){
 header('location:../../index.php');
}
//Restrict admin or Moderator to Access user.php page
if($_SESSION['user']['role']=='admin'){
 header('location:../../DSR/form.php');
}
if($_SESSION['user']['role']=='user'){
 header('location: ../../DSR/form.php');
}
?>
