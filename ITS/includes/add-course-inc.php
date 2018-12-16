<?php
    session_start();
    if(isset($_POST['submit'])){
        include "db-inc.php";
        $level = mysqli_real_escape_string($conn,$_POST['level']);
        if(empty($level)){
            header("location: ../admin.php?add=empty");
            exit();
        }else{
            $sql = "select id from courses where name = '$level';";
            $result = mysqli_query($conn,$sql);

                if(mysqli_num_rows($result) > 0){
                    header("location: ../admin.php?add=level_exist");
                    exit();
                }else{
                    $sql = "insert into courses (name) values ('$level');";
                    mysqli_query($conn,$sql);
                    header("location: ../admin.php?add=success");
                    exit();
                    }
                }
        }