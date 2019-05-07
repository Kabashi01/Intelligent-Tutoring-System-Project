<?php
header('Access-Control-Allow-Origin: *');
include('../database_connection.php');
$statement = $connect->prepare("SET NAMES 'utf8';SET CHARACTER SET utf8");
$statement->execute();
if(isset($_POST["tname"]) && !empty($_POST['tname'])  && !empty($_POST['dname']) && !empty($_POST['dename']) ){
        $data = array(
            ':tname'   => $_POST['tname'],
            ':dname'   => $_POST['dname'],
            ':dename'   => $_POST['dename'],
            ':tphone'   => $_POST['tphone']
        );
        $data1 = array(
            ':tname'   => $_POST['tname'],
            ':dname'   => $_POST['dname']
        );
    $stmt ="SELECT * FROM teacher WHERE name = :tname AND dept_id = :dname";
    $statement = $connect->prepare($stmt);
    $statement->execute($data1);
    
    if($statement->rowCount() > 0){
        $success = "Already Exist";
    }else{
        $query = "INSERT INTO `teacher`(name,dept_id,degree_id,phone) VALUES (:tname,:dname,:dename,:tphone)";
        $statement = $connect->prepare($query);
        $statement->execute($data);
        $success = 'Teacher Data Inserted';
    }
    $output = array(
        'success'  => $success,
        );
    echo json_encode($output);
}

?>