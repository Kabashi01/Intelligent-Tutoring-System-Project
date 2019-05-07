<?php
header('Access-Control-Allow-Origin: *');
//delete_Teacher.php

include('../database_connection.php');

if(isset($_POST["id"])){
 $query = "
 DELETE FROM `teacher` 
 WHERE `id` = '".$_POST["id"]."'
 ";
 $statement = $connect->prepare($query);
 $statement->execute();
}

?>
