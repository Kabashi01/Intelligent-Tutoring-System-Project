<?php
header('Access-Control-Allow-Origin: *');
include('../database_connection.php');
$statement = $connect->prepare("SET NAMES 'utf8';SET CHARACTER SET utf8");
$statement->execute();
if(isset($_POST["cname"]) && !empty($_POST["cname"])){
    $success = '';
    $name = $_POST["cname"];
    $data = array(
        ':name'   => $name,
        ':id' => $_POST['collageId']
    );
    $data1 = array(
        ':name'   => $name
    );
    $stmt ="SELECT * FROM collage WHERE name = :name";
    $statement = $connect->prepare($stmt);
    $statement->execute($data1);
  
  if($statement->rowCount() > 0){
    $success = "Already Exist";
  }else{
    $query = "UPDATE collage SET name = :name WHERE id = :id";
    $statement = $connect->prepare($query);
    $statement->execute($data);
    $success = 'Collage Data Updated';
  }
    $output = array(
        'success'  => $success,
    );
    echo json_encode($output);
}

?>