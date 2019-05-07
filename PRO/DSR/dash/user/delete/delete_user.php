<?php
header('Access-Control-Allow-Origin: *');
//delete_user.php

include('../database_connection.php');

if(isset($_POST["id"])){
    $query = "DELETE FROM `users` WHERE `id` = '".$_POST["id"]."'";
    $statement = $connect->prepare($query);
    $statement->execute();
    exit('Data Deleted');
}

?>
