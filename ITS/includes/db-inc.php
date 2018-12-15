<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "its";

    $conn = mysqli_connect($servername,$username,$password,$dbname);

    if(!$conn){
        die("connection faild".mysqli_connect_error());
    }else{
        echo "connected";
    }
    ?>