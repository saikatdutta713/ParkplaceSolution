<?php

if($_SERVER['HTTP_HOST'] == "localhost"){
    include($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/parkplace/database/db.php');
}
else {
    include($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/database/db.php');
}

$city = mysqli_real_escape_string($conn,$_POST['city']);
$mobile = mysqli_real_escape_string($conn,$_POST['mobile']);
$laptop = mysqli_real_escape_string($conn,$_POST['laptop']);
$desktop = mysqli_real_escape_string($conn,$_POST['desktop']);
$win7 = mysqli_real_escape_string($conn,$_POST['win7']);
$win8 = mysqli_real_escape_string($conn,$_POST['win8']);
$win10 = mysqli_real_escape_string($conn,$_POST['win10']);

$sql = "UPDATE `city` SET `mobile_repair` = '$mobile', `laptop_repair` = '$laptop', `desktop_repair` = '$desktop', `windows_7` = '$win7', `windows_8` = '$win8', `windows_10` = '$win10' WHERE `city`.`city` = '$city'; ";

if(mysqli_query($conn,$sql)){
    echo 1;
}
else {
    echo 0;
}
