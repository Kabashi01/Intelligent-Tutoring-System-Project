<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

require_once('../db-inc.php');
$date = date('Y-m-d');

//$sqlQuery = "SELECT COUNT(*)AS num, collage.name AS cname FROM research INNER JOIN teacher ON `research`.`researcher-name-id` = `teacher`.id INNER JOIN department ON `teacher`.`dept_id`=department.id INNER JOIN collage on `department`.`collage_id` = collage.id GROUP BY collage.name;
$sqlQuery="SELECT  count(*) as num from research where `end-date` >= '$date' ";
$sqlQuery1="SELECT  count(*) as num1 from research ";
#INNER JOIN degree on `teacher`.`degree_id` = degree.id ;
//";

$result = mysqli_query($connect,$sqlQuery);
$result1 = mysqli_query($connect,$sqlQuery1);
//$n =$result['num'];

//echo $date;
$data = array();
$data1 = array();

foreach ($result as $row) {
	$data[] = $row;
}
$num= $data[0]['num'];

foreach ($result1 as $row) {
	$data1[] = $row;
}
mysqli_close($connect);
$num1= $data1[0]['num1'];
$num2 = $num1 -$num;
 $arr = array(
	'currentResearch' => $num,
    'finishedResearch' =>  $num2,
    'all' =>  $num1

 );
//print_r ($arr);
echo json_encode($arr);


?>