<?php
header('Access-Control-Allow-Origin: *');
//delete_collage.php
include('../database_connection.php');

if(isset($_POST["deptId"])){
    $query = "DELETE FROM `department` WHERE `id` = '".$_POST["deptId"]."'";
    $statement = $connect->prepare($query);
    $statement->execute();
    exit('Data Deleted');
}
?>
