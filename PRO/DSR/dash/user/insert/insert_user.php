<?php
header('Access-Control-Allow-Origin: *');
include('../database_connection.php');
$statement = $connect->prepare("SET NAMES 'utf8';SET CHARACTER SET utf8");
$statement->execute();
if(isset($_POST["name"]) && !empty($_POST['name']) && !empty($_POST['gender']) && !empty($_POST['designation'])){
    $success = '';
    $role = $_POST["gender"];
    $name = $_POST["name"];
    $pass = $_POST["designation"];

    $data = array(
        ':name'   => $name,
        ':role'  => $role,
        ':pass' => $pass
    );
    $data1 = array(
        ':name'   => $name,
        ':pass' => $pass
    );

    $stmt ="SELECT * FROM users WHERE username = :name AND password = :pass";
    $statement = $connect->prepare($stmt);
    $statement->execute($data1);
  
    if($statement->rowCount() > 0){
        $success = "Already Exist";
    }else{
        $query = "INSERT INTO users (username, password, role) VALUES (:name, :pass, :role);";
        $statement = $connect->prepare($query);
        $statement->execute($data);
        $success = 'User Data Inserted';
    }
    $output = array(
        'success'  => $success,
    );
 echo json_encode($output);
}

?>