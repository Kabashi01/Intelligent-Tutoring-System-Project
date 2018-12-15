<?php
    session_start();
    //check for clicking button
    if (isset($_POST['submit'])) {
        //set the DB connection
        include 'db-inc.php';

        //get the data from the form
        $uid = mysqli_real_escape_string($conn,$_POST['uid']);
        $pwd = mysqli_real_escape_string($conn,$_POST['pwd']);

        //check if one field is empty
        if (empty($uid)||empty($pwd)) {
            header("location: ../login.php?login=empty");
            exit();
        }else{
            //get the user data from the DB
            $sql = "select * from login where uid='$uid';";
            $result = mysqli_query($conn,$sql);
            $result_check = mysqli_num_rows($result);
            if($result_check < 1){
                header("location: ../login.php?login=error");
                exit();
            }else{
                if($row = mysqli_fetch_assoc($result)){
                    if($pwd == $row['password']){
                        $_SESSION['uid'] = $row['uid']; 
                        $_SESSION['name'] = $row['name']; 
                        header("location: ../admin.php?login=success");
                        exit(); 
                    }else{
                        header("location: ../login.php?login=error");
                        exit();
                    }
                }
            }
        }
        

        
    }

    ?>