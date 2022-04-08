<?php

if($_SERVER['HTTP_HOST'] == "localhost"){
    include($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/parkplace/database/db.php');
}
else {
    include($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/database/db.php');
}

$id = mysqli_real_escape_string($conn,$_POST['id']);

$sql = "DELETE FROM `booking_request` WHERE booking_id = $id";

if (mysqli_query($conn, $sql)) {

	$sql_1 = "SELECT * FROM booking_request WHERE `booking_id` = '$id'";

	$result = mysqli_query($conn,$sql_1) or die("Query failed!");
	$row = mysqli_fetch_assoc($result);

	// $user_mail= $row['email'];

	// mail($user_mail, "Rejection of Booking", "Sorry! Your booking request is rejected.");

	echo 1;
} 
else{
	echo 0;
}
