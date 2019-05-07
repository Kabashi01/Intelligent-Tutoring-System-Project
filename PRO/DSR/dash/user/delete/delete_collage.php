<?php
header('Access-Control-Allow-Origin: *');
//delete_collage.php
include('../database_connection.php');

if(isset($_POST["collageId"])){
    $query = "DELETE FROM `collage` WHERE `id` = '".$_POST["collageId"]."'";
    $statement = $connect->prepare($query);
    $statement->execute();
    exit('Data Deleted');
}
?>
