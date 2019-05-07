<?php
session_start();
header('Access-Control-Allow-Origin: *');
include('../database_connection.php');
$statement = $connect->prepare("SET NAMES 'utf8';SET CHARACTER SET utf8");
$statement->execute();
if(isset($_POST["deptname"]) && !empty($_POST['deptname'])){
    $data = array(
      ':deptname'   => $_POST['deptname'],
      ':collage_id' => $_SESSION['collage_id']
    );
    $stmt ="SELECT :collage_id FROM department WHERE name = :deptname";
    $statement = $connect->prepare($stmt);
    $statement->execute($data);

    if($statement->rowCount() > 0){
      $success = "Already Exist";
    }else{
      $query = "INSERT INTO `department`( name,collage_id) VALUES (:deptname,:collage_id)";
      $statement = $connect->prepare($query);
      $statement->execute($data);
      $success = 'Department Data Inserted';
    } 
    $output = array(
     'success'  => $success
    );
    echo json_encode($output);

}

?>