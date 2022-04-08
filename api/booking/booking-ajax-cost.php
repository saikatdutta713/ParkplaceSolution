<?php
if($_SERVER['HTTP_HOST'] == "localhost"){
  include($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/parkplace/database/db.php');
}
else {
  include($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/database/db.php');
}

$city = mysqli_real_escape_string($conn,$_POST['city']);
$os = mysqli_real_escape_string($conn,$_POST['os']);

$result = mysqli_query($conn,"SELECT `city`,`$os` FROM `city` WHERE `city` = '$city';");

if($result){
    $cost = mysqli_fetch_assoc($result);
    echo $cost[$os];
}
else {
    echo 0;
}
