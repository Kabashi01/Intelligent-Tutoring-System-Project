<?php
header('Access-Control-Allow-Origin: *');
include('../database_connection.php');
$statement = $connect->prepare("SET NAMES 'utf8';SET CHARACTER SET utf8");
$statement->execute();
if(isset($_POST["name"]) && !empty($_POST['name']) && !empty($_POST['password']) && !empty($_POST['role'])){
    $role = $_POST["role"];
    $name = $_POST["name"];
    $password = $_POST["password"];
    $data = array(
        ':name'   => $name,
        ':role'  => $role,
        ':password' => $password,
        ':id' => $_POST['id']
   );
   $data1 = array(
    ':name'   => $name,
    ':pass' => $password
    );

    $stmt ="SELECT * FROM users WHERE username = :name AND password = :pass";
    $statement = $connect->prepare($stmt);
    $statement->execute($data1);

    if($statement->rowCount() > 0){
        $success = "Already Exist";
    }else{
        $query = "UPDATE users SET username = :name ,password = :password , role = :role WHERE id = :id";
        $statement = $connect->prepare($query);
        $statement->execute($data);
        $success = 'User Data Updated';
    }
    $output = array(
       'success'  => $success,
    );
    echo json_encode($output);
}

?>