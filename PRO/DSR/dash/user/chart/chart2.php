<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

require_once('../db-inc.php');


//$sqlQuery = "SELECT COUNT(*)AS num, collage.name AS cname FROM research INNER JOIN teacher ON `research`.`researcher-name-id` = `teacher`.id INNER JOIN department ON `teacher`.`dept_id`=department.id INNER JOIN collage on `department`.`collage_id` = collage.id GROUP BY collage.name;
$sqlQuery="SELECT COUNT(name)AS num , edu FROM `foreign_teacher` where edu!='' GROUP BY edu ";

#INNER JOIN degree on `teacher`.`degree_id` = degree.id ;
//";

$result = mysqli_query($connect,$sqlQuery);



$data = array();


//$c = count($arr);
foreach ($result as $row) {
    
    $data[] = $row;
    
}





/*foreach ($result1 as $row) {
	$data1[] = $row;
}*/
mysqli_close($connect);
//$num1= $data[0]['num1'];




 
 //$p=$data['0']['donor'];
 
//print_r($data[0]['donor']);
echo json_encode($data);


?>