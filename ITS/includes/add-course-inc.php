<?php
    session_start();
    if(isset($_POST['submit'])){
        include "db-inc.php";
        $level = mysqli_real_escape_string($conn,$_POST['level']);
        if(empty($level)){
            header("location: ../admin.php?add=empty");
            exit();
        }else{
            $stmt =  mysqli_stmt_prepare($conn,"select id from courses where name = ?;");
            mysqli_stmt_bind_param($stmt ,'s',$name);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_num_rows($stmt);
                if(mysqli_num_rows($result) > 0){
                    header("location: ../admin.php?add=level_exist");
                    exit();
                }else{
                    $stmt = mysqli_stmt_prepare($conn , "insert into courses (name) values (?);");
                    mysqli_stmt_bind_param($stmt,'s',$level);
                    mysqli_stmt_execute($stmt);
                    header("location: ../admin.php?add=success");
                    exit();
                    }
                }
        }