<?php

if($_SERVER['HTTP_HOST'] == "localhost"){
    include($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/parkplace/database/db.php');
}
else {
    include($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/database/db.php');
}

$id = mysqli_real_escape_string($conn,$_POST['staff_id']);

$sql = "DELETE FROM `p_details` WHERE p_id = $id";

if (mysqli_query($conn, $sql)) {
	echo 1;
} 
else{
	echo 0;
}
