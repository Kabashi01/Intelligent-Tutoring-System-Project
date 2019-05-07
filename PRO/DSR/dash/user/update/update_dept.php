<?php
header('Access-Control-Allow-Origin: *');
include('../database_connection.php');
$statement = $connect->prepare("SET NAMES 'utf8';SET CHARACTER SET utf8");
$statement->execute();
if(isset($_POST["deptname"]) && !empty($_POST["deptname"])){
    $success = '';
    $name = $_POST["deptname"];
    $data = array(
        ':name'   => $name,
        ':id' => $_POST['deptId']
    );

    $query = "UPDATE department SET name = :name WHERE id = :id";
    $statement = $connect->prepare($query);
    $statement->execute($data);
    $success = 'Department Data Updated';
    $output = array(
        'success'  => $success,
    );
    echo json_encode($output);
}

?>