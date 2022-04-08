<?php

if($_SERVER['HTTP_HOST'] == "localhost"){
    include($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/parkplace/database/db.php');
}
else {
    include($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/database/db.php');
}

$email = mysqli_real_escape_string($conn,$_POST['email']);
$pass = mysqli_real_escape_string($conn,trim($_POST['pass']));

$check_mail = mysqli_query($conn,"SELECT `username` FROM `admin` WHERE username = '$email';");

if(mysqli_num_rows($check_mail) > 0){

    $check_pass = mysqli_query($conn,"SELECT * FROM `admin` WHERE `username`='$email';");
    $row = mysqli_fetch_assoc($check_pass);

    $hash= trim($row['password']);

    if(password_verify($pass,$hash)){
        echo 1;
    }
    else {
        echo 0;
    }
}
else {
    echo 2;
}

?>