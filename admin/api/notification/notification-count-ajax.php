<?php

if($_SERVER['HTTP_HOST'] == "localhost"){
    include($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/parkplace/database/db.php');
}
else {
    include($_SERVER['CONTEXT_DOCUMENT_ROOT'].'/database/db.php');
}

$sql = "SELECT `id`,`subject`,`note`,`date` FROM `notify`";

$result = mysqli_query($conn, $sql) or die("Query failed!");

if(mysqli_num_rows($result) > 0){
    $count = mysqli_num_rows($result);
}
else {
    $count = 0;
}

if($count > 99){
	echo "99+";
}
else {
	echo $count;
}

?>