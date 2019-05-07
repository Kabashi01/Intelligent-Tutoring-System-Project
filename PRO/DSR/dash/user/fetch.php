<?php
//fetch.php
header('Access-Control-Allow-Origin: *');
session_start();
if(isset($_POST['key'])){
    include('database_connection.php');
    $statement = $connect->prepare("SET NAMES 'utf8';SET CHARACTER SET utf8");
    $statement->execute();

    if($_POST['key'] == 'user'){
        $query = '';
        $output = array();
        $query .= "SELECT * FROM users ";
        if(isset($_POST["search"]["value"])){
            $query .= 'WHERE `username` LIKE "%'.$_POST["search"]["value"].'%"  OR role LIKE "%'.$_POST["search"]["value"].'%"  ';
        }

        if(isset($_POST["order"])){
            $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
        }
        else{
            $query .= 'ORDER BY id DESC ';
        }

        if($_POST["length"] != -1){
            $query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }

        $statement = $connect->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        $data = array();
        $filtered_rows = $statement->rowCount();
        foreach($result as $row){
            $sub_array = array();
            $sub_array[] = $row["username"];
            $sub_array[] = $row["password"];
            $sub_array[] = $row["role"];
            $sub_array[] = '<button type="button" name="delete" id="'.$row["id"].'" class="btn btn-danger btn-xs delete">Delete</button>';
            $sub_array[] = '<button type="button" name="update" id="'.$row["id"].'" class="btn btn-primary btn-xs update">Update</button>';
            $data[] = $sub_array;
        }

        function get_total_all_records($connect){
            $statement = $connect->prepare("SELECT * FROM users;");
            $statement->execute();
            $result = $statement->fetchAll();
            return $statement->rowCount();
        }

        $output = array(
            "draw"    => intval($_POST["draw"]),
            "recordsTotal"  =>  $filtered_rows,
            "recordsFiltered" => get_total_all_records($connect),
            "data"    => $data
        );
        echo json_encode($output);

    }else if($_POST['key'] == 'collage'){
        $query = '';
        $output = array();
        $query .= "SELECT * FROM collage ";
        if(isset($_POST["search"]["value"])){
            $query .= 'WHERE `name` LIKE "%'.$_POST["search"]["value"].'%" ';
        }

        if(isset($_POST["order"])){
            $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
        }
        else{
            $query .= 'ORDER BY id DESC ';
        }

        if($_POST["length"] != -1){
            $query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }

        $statement = $connect->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        $data = array();
        $filtered_rows = $statement->rowCount();
        foreach($result as $row){
            $sub_array = array();
            $sub_array[] = $row["name"];
            $sub_array[] = '<button type="button" name="deleteCollage" id="'.$row["id"].'" class="btn btn-danger  deleteCollage">Delete</button>';
            $sub_array[] = '<button type="button" name="updateCollage" id="'.$row["id"].'" class="btn btn-primary  updateCollage">Update</button>';
            $sub_array[] = '<a href="user/dept.php?id='.$row["id"].'">show</a>';
            $data[] = $sub_array;
        }

        function get_total_all_records($connect){
            $statement = $connect->prepare("SELECT * FROM collage;");
            $statement->execute();
            $result = $statement->fetchAll();
            return $statement->rowCount();
        }

        $output = array(
            "draw"    => intval($_POST["draw"]),
            "recordsTotal"  =>  $filtered_rows,
            "recordsFiltered" => get_total_all_records($connect),
            "data"    => $data
        );

        echo json_encode($output);
    }else if($_POST['key'] == 'teacher'){
        $query = '';
        $output = array();
        $query .= "SELECT teacher.id AS tid, teacher.name AS tname, department.name AS dname,degree.name AS dename , collage.name AS cname ,teacher.phone AS tphone FROM teacher 
        LEFT JOIN department ON `teacher`.`dept_id`=department.id LEFT JOIN collage on `department`.`collage_id` = collage.id LEFT JOIN 
        degree on `teacher`.`degree_id` = degree.id WHERE ";
        if(isset($_POST["search"]["value"])){
            $query .= '
                (teacher.name LIKE "%'.$_POST["search"]["value"].'%"
                OR collage.name LIKE "%'.$_POST["search"]["value"].'%"
                OR department.name LIKE "%'.$_POST["search"]["value"].'%"
                OR degree.name LIKE "%'.$_POST["search"]["value"].'%"
                OR phone LIKE "%'.$_POST["search"]["value"].'%")
                ';
        }

        if(isset($_POST["order"])){
            $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
        }
        else{
            $query .= 'ORDER BY teacher.id DESC ';
        }

        if($_POST["length"] != -1){
            $query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }

        $statement = $connect->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        $data = array();
        $filtered_rows = $statement->rowCount();
        foreach($result as $row){
            $sub_array = array();
            $sub_array[] = $row["tname"];
            $sub_array[] = $row["cname"];
            $sub_array[] = $row["dname"];
            $sub_array[] = $row["dename"];
            $sub_array[] = $row["tphone"];
            $sub_array[] = '<button type="button" name="deleteTeacher" id="'.$row["tid"].'" class="btn btn-danger btn-xs deleteTeacher">Delete</button>';
            $sub_array[] = '<button type="button" name="updateTeacher" id="'.$row["tid"].'" class="btn btn-primary btn-xs updateTeacher">Update</button>';
            $data[] = $sub_array;
        }

        function get_total_all_records($connect){
            $statement = $connect->prepare("SELECT teacher.id AS tid, teacher.name AS tname, department.name AS dname,degree.name AS dename , collage.name AS cname ,teacher.phone AS tphone FROM teacher 
            LEFT JOIN department ON `teacher`.`dept_id`=department.id LEFT JOIN collage on `department`.`collage_id` = collage.id LEFT JOIN 
            degree on `teacher`.`degree_id` = degree.id;");
            $statement->execute();
            $result = $statement->fetchAll();
            return $statement->rowCount();
        }

        $output = array(
            "draw"    => intval($_POST["draw"]),
            "recordsTotal"  =>  $filtered_rows,
            "recordsFiltered" => get_total_all_records($connect),
            "data"    => $data
        );
        echo json_encode($output);
    }else if($_POST['key'] == 'dept'){
        $query = '';
        $output = array();
        $cole_id = $_SESSION['collage_id'];
        $query .= "SELECT * FROM department WHERE collage_id ='$cole_id' AND ";
        if(isset($_POST["search"]["value"])){
            $query .= ' `name` LIKE "%'.$_POST["search"]["value"].'%" ';
        }

        if(isset($_POST["order"])){
            $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
        }
        else{
            $query .= 'ORDER BY id DESC ';
        }

        if($_POST["length"] != -1){
            $query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
        }

        $statement = $connect->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();
        $data = array();
        $filtered_rows = $statement->rowCount();
        foreach($result as $row){
            $sub_array = array();
            $sub_array[] = $row["name"];
            $sub_array[] = '<button type="button" name="deleteDept" id="'.$row["id"].'" class="btn btn-danger btn-xs deleteDept">Delete</button>';
            $sub_array[] = '<button type="button" name="updateDept" id="'.$row["id"].'" class="btn btn-primary btn-xs updateDept">Update</button>';
            $data[] = $sub_array;
        }

        function get_total_all_records($connect){
            $cole_id = $_SESSION['collage_id'];
            $statement = $connect->prepare("SELECT * FROM department WHERE collage_id ='$cole_id';");
            $statement->execute();
            $result = $statement->fetchAll();
            return $statement->rowCount();
        }

        $output = array(
            "draw"    => intval($_POST["draw"]),
            "recordsTotal"  =>  $filtered_rows,
            "recordsFiltered" => get_total_all_records($connect),
            "data"    => $data
        );

        echo json_encode($output);
    }
}
?>
