<?php

if($_SERVER['HTTP_HOST'] == "localhost"){
    include($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/parkplace/database/db.php');
}
else {
    include($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/database/db.php');
}

$row = mysqli_fetch_assoc(mysqli_query($conn, "SELECT MAX(id) AS id FROM city"));
$id = $row["id"] + 1;

$city_input = mysqli_real_escape_string($conn,$_POST['city_input']);

$sql = "INSERT INTO `city`(id,city) VAlUES('$id','$city_input')";

if (mysqli_query($conn, $sql)) {
	echo 1;
}
else {
	echo 0;
}
