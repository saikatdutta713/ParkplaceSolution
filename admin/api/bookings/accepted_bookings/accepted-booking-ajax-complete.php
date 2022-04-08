<?php
date_default_timezone_set('Asia/Kolkata');

if($_SERVER['HTTP_HOST'] == "localhost"){
    include($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/parkplace/database/db.php');
}
else {
    include($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/database/db.php');
}

$id = mysqli_real_escape_string($conn,$_POST['id']);

// $id = 1;

$sql = "SELECT * FROM `accepted_booking` WHERE `booking_id` = '$id'";

$result = mysqli_query($conn, $sql) or die("Query failed!");

if (mysqli_num_rows($result) > 0) {
	
	$row = mysqli_fetch_assoc($result);

	$date = date("Y-m-d H:i:s");

	$insert_sql = "INSERT INTO `handled_booking` (`booking_id`, `full_name`, `phone`, `email`, `building`, `area`, `landmark`, `pincode`,`city`,`service`,`time_slot`, `booking_date`,`completing_date`,`status`) VALUES ('{$row["booking_id"]}', '{$row["full_name"]}', '{$row["phone"]}', '{$row["email"]}', '{$row["building"]}', '{$row["area"]}', '{$row["landmark"]}', '{$row["pincode"]}', '{$row["city"]}', '{$row["service"]}','{$row["time_slot"]}', '{$row["booking_date"]}','{$date}','completed')";

	if(mysqli_query($conn, $insert_sql)) {
		if(mysqli_query($conn, "DELETE FROM `accepted_booking` WHERE booking_id = '{$id}'")) {
			echo 1;
		}
		else {
			echo 0;
		}
	}
	else {
		echo 0;
	}
}
