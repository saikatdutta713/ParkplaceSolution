<?php

if($_SERVER['HTTP_HOST'] == "localhost"){
    include($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/parkplace/database/db.php');
}
else {
    include($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/database/db.php');
}

$id = mysqli_real_escape_string($conn,$_POST['id']);

$sql = "DELETE FROM `users` WHERE id = $id";

if (mysqli_query($conn, $sql)) {
	echo 1;
} 
else{
	echo 0;
}
