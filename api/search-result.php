<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include '../db.php';

if(isset($_POST['query'])){
    $search_query = mysqli_real_escape_string($conn,$_POST['query']);
}
else {
    echo 0;
}

$service = mysqli_query($conn, "SELECT `s_name`,`service_type` FROM `service` WHERE `s_name` LIKE '%{$search_query}%' OR `service_type` LIKE '%{$search_query}%';");
$index = 0;

while($row = mysqli_fetch_assoc($service)){
    $result[$index]=$row;
    $index++;
}
echo json_encode($result);
