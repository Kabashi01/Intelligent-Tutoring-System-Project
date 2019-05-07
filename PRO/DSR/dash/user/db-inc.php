<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "dsr";

    $connect = mysqli_connect($servername,$username,$password,$dbname);
    mysqli_query($connect,"SET NAMES 'utf8'");
    mysqli_query($connect,'SET CHARACTER SET utf8');
    if(!$connect){
        die("connection faild".mysqli_connect_error());
    }else{
        
    }
    ?>