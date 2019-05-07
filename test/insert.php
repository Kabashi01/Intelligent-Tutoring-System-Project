<?php
$connect = mysqli_connect("localhost", "root", "", "dsr");
if(isset($_POST["first_name"]))
{
 $first_name = mysqli_real_escape_string($connect, $_POST["first_name"]);

 $query = "INSERT INTO collage(`name`) VALUES('$first_name')";
 if(mysqli_query($connect, $query))
 {
  echo 'Data Inserted';
 }
}
?>
