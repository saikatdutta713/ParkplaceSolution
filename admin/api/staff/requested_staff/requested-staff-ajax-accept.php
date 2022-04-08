<?php  
date_default_timezone_set('Asia/Kolkata');

if($_SERVER['HTTP_HOST'] == "localhost"){
    include($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/parkplace/database/db.php');
}
else {
    include($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/database/db.php');
}

$req_id = mysqli_real_escape_string($conn,$_POST['req_id']);

$sql = "SELECT `p_id`,`p_name`,`email`,`phn_no`,`address`,`profession`,`password`,`Request_date` FROM `temp_p_details` WHERE `p_id` LIKE '%$req_id%'";

$result = mysqli_query($conn, $sql) or die("Query failed!");

if (mysqli_num_rows($result) > 0) {
	
	$row = mysqli_fetch_assoc($result);

	$p_id = $row['p_id'];
	$p_name = $row['p_name'];
	$email = $row['email'];
	$phn_no = $row['phn_no'];
	$address = $row['address'];
	$profession = $row['profession'];
	$password = $row['password'];

	$date = date("d")."/".date("m")."/".date("Y");

	$joining_date = $date;
}

$insert_sql = "INSERT INTO p_details(p_id, p_name,email,phn_no,address,profession,password,joining_date,status) VALUES ('$p_id','$p_name','$email','$phn_no','$address','$profession','$password','$joining_date','Working')";

if (mysqli_query($conn, $insert_sql)) {

	if (mysqli_query($conn, "DELETE FROM `temp_p_details` WHERE p_id = $req_id")) {
		echo 1;
	}
	else {
		echo 0;
	}
}
else {
	echo 0;
}
