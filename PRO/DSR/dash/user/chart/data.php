<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

require_once('../db-inc.php');

$sqlQuery = "SELECT COUNT(*)AS num, collage.name AS cname FROM research INNER JOIN teacher ON `research`.`researcher-name-id` = `teacher`.id INNER JOIN department ON `teacher`.`dept_id`=department.id INNER JOIN collage on `department`.`collage_id` = collage.id GROUP BY collage.name;

#INNER JOIN degree on `teacher`.`degree_id` = degree.id ;
";

$result = mysqli_query($connect,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($connect);

echo json_encode($data);
?>