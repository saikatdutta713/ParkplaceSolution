<?php

if ($_SERVER['HTTP_HOST'] == "localhost") {
	include($_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/parkplace/database/db.php');
} else {
	include($_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/database/db.php');
}

$s_id = mysqli_real_escape_string($conn, $_POST['s_id']);
$service_name = mysqli_real_escape_string($conn, $_POST['service_name']);
$type = mysqli_real_escape_string($conn, $_POST['type']);
$offer = mysqli_real_escape_string($conn, $_POST['offer']);

if ($offer == "") {
	$offer = "NA";
}

$sql = "INSERT INTO `service`(s_id,s_name,service_type,offer) VAlUES('$s_id','$service_name','$type','$offer')";

if (mysqli_query($conn, $sql)) {
	echo 1;
} else {
	echo 0;
}
