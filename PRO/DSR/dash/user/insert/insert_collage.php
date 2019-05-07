<?php
header('Access-Control-Allow-Origin: *');
include('../database_connection.php');
$statement = $connect->prepare("SET NAMES 'utf8';SET CHARACTER SET utf8");
$statement->execute();

if(isset($_POST["cname"]) && !empty($_POST["cname"])){
  $data = array(
    ':cname'   => $_POST['cname']
  );
  $stmt ="SELECT * FROM collage WHERE name = :cname";
  $statement = $connect->prepare($stmt);
  $statement->execute($data);
  
  if($statement->rowCount() > 0){
    $success = "Already Exist";
  }else{
    $query = "INSERT INTO `collage`( name) VALUES (:cname)";
    $statement = $connect->prepare($query);
    $statement->execute($data);
    $success = 'Collage Data Inserted';
  } 
 $output = array(
  'success'  => $success
 );
 echo json_encode($output);

}

?>