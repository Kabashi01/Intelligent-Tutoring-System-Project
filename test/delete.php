<?php
$connect = mysqli_connect("localhost", "root", "", "dsr");
if(isset($_POST["id"]))
{
 $query = "DELETE FROM collage WHERE id = '".$_POST["id"]."'";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Deleted';
 }
}
?>