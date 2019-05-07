<?php
header('Access-Control-Allow-Origin: *');
$connect = mysqli_connect("localhost", "root", "", "dsr");
mysqli_query($connect,"SET NAMES 'utf8'");
mysqli_query($connect,'SET CHARACTER SET utf8');
    $query = "SELECT id,name AS dname FROM department WHERE collage_id = ".$_POST['collage_id']." ";
    $response = "<option selected value=''>القسم</option>";
    $result = mysqli_query($connect, $query);
    while($row = mysqli_fetch_array($result)){
        if(!empty($row["dname"]))
            $response.= '<option value="'.$row["id"].'">'.$row["dname"].'</option>';
        }
    echo $response;
?>