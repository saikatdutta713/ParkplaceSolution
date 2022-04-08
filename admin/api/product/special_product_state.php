<?php

if ($_SERVER['HTTP_HOST'] == "localhost") {
    include($_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/parkplace/database/db.php');
} else {
    include($_SERVER['CONTEXT_DOCUMENT_ROOT'] . '/database/db.php');
}

$id = mysqli_real_escape_string($conn, $_POST['id']);
$state = mysqli_real_escape_string($conn, $_POST['state']);

if (mysqli_query($conn, "UPDATE `products` SET `special` = '$state' WHERE `products`.`id` = $id;")) {
    echo "Product special state changed!";
} else {
    echo "Failed! Try again";
}
